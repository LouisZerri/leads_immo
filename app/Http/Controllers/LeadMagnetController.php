<?php

namespace App\Http\Controllers;

use App\Mail\LeadMagnetMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class LeadMagnetController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255',
            'page_source' => 'required|in:P1,P2',
        ]);

        try {
            Mail::to($validated['email'])->send(new LeadMagnetMail($validated['page_source']));
        } catch (\Exception $e) {
            Log::error('Erreur envoi lead magnet', [
                'email' => $validated['email'],
                'page' => $validated['page_source'],
                'error' => $e->getMessage(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l\'envoi. Veuillez réessayer.',
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => 'Email envoyé avec succès.',
        ]);
    }
}
