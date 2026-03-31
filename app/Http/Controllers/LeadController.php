<?php

namespace App\Http\Controllers;

use App\Mail\NewLeadNotification;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        // Honeypot : si le champ caché est rempli, c'est un bot
        if ($request->filled('website')) {
            return response()->json(['message' => 'Merci !'], 200);
        }

        // reCAPTCHA v3 — vérification côté serveur
        if (config('services.recaptcha.secret_key')) {
            $recaptchaToken = $request->input('recaptcha_token');

            if (!$recaptchaToken) {
                return response()->json(['message' => 'Vérification anti-spam échouée.'], 422);
            }

            try {
                $recaptchaResponse = Http::asForm()->timeout(5)->post('https://www.google.com/recaptcha/api/siteverify', [
                    'secret' => config('services.recaptcha.secret_key'),
                    'response' => $recaptchaToken,
                    'remoteip' => $request->ip(),
                ]);

                $recaptchaData = $recaptchaResponse->json();

                // Score minimum 0.3 (0.0 = bot, 1.0 = humain)
                if (!($recaptchaData['success'] ?? false) || ($recaptchaData['score'] ?? 0) < 0.3) {
                    Log::warning('reCAPTCHA score bas', ['score' => $recaptchaData['score'] ?? null]);
                    return response()->json(['message' => 'Vérification anti-spam échouée.'], 422);
                }
            } catch (\Exception $e) {
                // Si Google API est down, on laisse passer (honeypot + validation suffisent)
                Log::warning('reCAPTCHA API indisponible', ['error' => $e->getMessage()]);
            }
        }

        $validated = $request->validate([
            'page_source' => 'required|in:P1,P2,P3,P4',
            'code_postal' => 'nullable|digits:5',
            'selection' => 'nullable|in:studio,t2,t3,t4+,maison,proprietaire,agence,gestionnaire,sci',
            'budget_investissement' => 'nullable|in:< 100k,100-200k,200-300k,300k+',
            'prenom' => 'required|string|max:100',
            'telephone' => ['required', 'string', 'regex:/^0[67]\d{8}$/'],
            'email' => 'required|email|max:255',
            'consentement_rgpd' => 'accepted',
        ]);

        // Anonymiser l'IP (supprimer le dernier octet)
        $ip = $request->ip();
        $anonymizedIp = preg_replace('/\.\d+$/', '.0', $ip);

        $lead = Lead::create([
            ...$validated,
            'consentement_rgpd' => true,
            'utm_source' => $request->input('utm_source'),
            'utm_medium' => $request->input('utm_medium'),
            'utm_campaign' => $request->input('utm_campaign'),
            'utm_term' => $request->input('utm_term'),
            'utm_content' => $request->input('utm_content'),
            'ip_address' => $anonymizedIp,
        ]);

        // Notification email
        try {
            Mail::to(config('mail.from.address'))->send(new NewLeadNotification($lead));
        } catch (\Exception $e) {
            Log::error('Erreur envoi email lead', ['lead_id' => $lead->id, 'error' => $e->getMessage()]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Votre demande a bien été envoyée.',
            'redirect' => route('landing.merci'),
        ]);
    }

}
