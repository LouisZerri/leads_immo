<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lead #{{ $lead->id }} — Admin GEST'IMMO</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🎯</text></svg>">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
</head>
<body style="background-color: #f3f4f6; font-family: 'DM Sans', sans-serif; color: #333; margin: 0;">

    <header style="background: #1A3A5C; color: #fff; padding: 16px 24px; display: flex; align-items: center; justify-content: space-between;">
        <h1 style="font-size: 18px; font-weight: 700;">🎯 GEST'IMMO — Lead #{{ $lead->id }}</h1>
        <a href="{{ route('admin.dashboard') }}" style="color: #fff; text-decoration: none; font-size: 14px; opacity: 0.8;">← Retour au dashboard</a>
    </header>

    <div style="max-width: 800px; margin: 0 auto; padding: 24px;">

        @if(session('success'))
            <div style="background-color: rgba(39, 174, 96, 0.1); border: 1px solid #27AE60; border-radius: 8px; padding: 12px 16px; margin-bottom: 16px; color: #27AE60; font-size: 14px;">
                {{ session('success') }}
            </div>
        @endif

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">

            {{-- Infos contact --}}
            <div style="background: #fff; border-radius: 12px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.06);">
                <h2 style="font-size: 16px; font-weight: 700; color: #1A3A5C; margin: 0 0 20px;">Contact</h2>

                <div style="space-y: 12px;">
                    <div style="margin-bottom: 16px;">
                        <p style="font-size: 12px; color: #999; margin: 0 0 2px;">Prénom</p>
                        <p style="font-size: 16px; font-weight: 600; margin: 0;">{{ $lead->prenom }}</p>
                    </div>
                    <div style="margin-bottom: 16px;">
                        <p style="font-size: 12px; color: #999; margin: 0 0 2px;">Téléphone</p>
                        <p style="margin: 0;"><a href="tel:{{ $lead->telephone }}" style="font-size: 16px; font-weight: 600; color: #0254a3; text-decoration: none;">{{ $lead->telephone }}</a></p>
                    </div>
                    <div style="margin-bottom: 16px;">
                        <p style="font-size: 12px; color: #999; margin: 0 0 2px;">Email</p>
                        <p style="margin: 0;"><a href="mailto:{{ $lead->email }}" style="font-size: 16px; font-weight: 600; color: #0254a3; text-decoration: none;">{{ $lead->email }}</a></p>
                    </div>
                    <div style="margin-bottom: 16px;">
                        <p style="font-size: 12px; color: #999; margin: 0 0 2px;">Code postal</p>
                        <p style="font-size: 16px; font-weight: 600; margin: 0;">{{ $lead->code_postal ?? '—' }}</p>
                    </div>
                    @if($lead->type_logement)
                        <div style="margin-bottom: 16px;">
                            <p style="font-size: 12px; color: #999; margin: 0 0 2px;">Type de logement</p>
                            <p style="font-size: 16px; font-weight: 600; margin: 0;">{{ ucfirst($lead->type_logement) }}</p>
                        </div>
                    @endif
                    @if($lead->budget_investissement)
                        <div style="margin-bottom: 16px;">
                            <p style="font-size: 12px; color: #999; margin: 0 0 2px;">Budget</p>
                            <p style="font-size: 16px; font-weight: 600; margin: 0;">{{ $lead->budget_investissement }}</p>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Infos techniques --}}
            <div style="background: #fff; border-radius: 12px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.06);">
                <h2 style="font-size: 16px; font-weight: 700; color: #1A3A5C; margin: 0 0 20px;">Détails</h2>

                <div style="margin-bottom: 16px;">
                    <p style="font-size: 12px; color: #999; margin: 0 0 2px;">Page source</p>
                    @php
                        $pageLabels = ['P1' => 'P1 — État des lieux', 'P2' => 'P2 — Litige EDL', 'P3' => 'P3 — Investissement', 'P4' => 'P4 — Défiscalisation'];
                    @endphp
                    <p style="font-size: 16px; font-weight: 600; margin: 0;">{{ $pageLabels[$lead->page_source] ?? $lead->page_source }}</p>
                </div>

                <div style="margin-bottom: 16px;">
                    <p style="font-size: 12px; color: #999; margin: 0 0 2px;">Statut</p>
                    <form method="POST" action="{{ route('admin.leads.statut', $lead) }}" style="margin: 4px 0 0;">
                        @csrf
                        @method('PATCH')
                        <select
                            name="statut"
                            onchange="this.form.submit()"
                            style="padding: 6px 12px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 14px; font-weight: 600; cursor: pointer; color: #333; background: #fff;"
                        >
                            <option value="nouveau" {{ $lead->statut === 'nouveau' ? 'selected' : '' }}>Nouveau</option>
                            <option value="contacte" {{ $lead->statut === 'contacte' ? 'selected' : '' }}>Contacté</option>
                            <option value="converti" {{ $lead->statut === 'converti' ? 'selected' : '' }}>Converti</option>
                            <option value="perdu" {{ $lead->statut === 'perdu' ? 'selected' : '' }}>Perdu</option>
                        </select>
                    </form>
                </div>

                <div style="margin-bottom: 16px;">
                    <p style="font-size: 12px; color: #999; margin: 0 0 2px;">Date de réception</p>
                    <p style="font-size: 16px; font-weight: 600; margin: 0;">{{ $lead->created_at->format('d/m/Y à H:i') }}</p>
                </div>

                <div style="margin-bottom: 16px;">
                    <p style="font-size: 12px; color: #999; margin: 0 0 2px;">IP (anonymisée)</p>
                    <p style="font-size: 14px; margin: 0; color: #666;">{{ $lead->ip_address ?? '—' }}</p>
                </div>

                @if($lead->utm_source)
                    <div style="margin-bottom: 16px; padding: 12px; background: #f9fafb; border-radius: 8px;">
                        <p style="font-size: 12px; color: #999; margin: 0 0 8px; font-weight: 600;">Paramètres UTM</p>
                        <p style="font-size: 13px; margin: 0 0 4px; color: #666;">Source : <strong style="color: #333;">{{ $lead->utm_source }}</strong></p>
                        @if($lead->utm_medium)<p style="font-size: 13px; margin: 0 0 4px; color: #666;">Medium : <strong style="color: #333;">{{ $lead->utm_medium }}</strong></p>@endif
                        @if($lead->utm_campaign)<p style="font-size: 13px; margin: 0 0 4px; color: #666;">Campaign : <strong style="color: #333;">{{ $lead->utm_campaign }}</strong></p>@endif
                        @if($lead->utm_term)<p style="font-size: 13px; margin: 0 0 4px; color: #666;">Term : <strong style="color: #333;">{{ $lead->utm_term }}</strong></p>@endif
                        @if($lead->utm_content)<p style="font-size: 13px; margin: 0; color: #666;">Content : <strong style="color: #333;">{{ $lead->utm_content }}</strong></p>@endif
                    </div>
                @endif

                <div>
                    <p style="font-size: 12px; color: #999; margin: 0 0 2px;">Consentement RGPD</p>
                    <p style="font-size: 14px; margin: 0; color: {{ $lead->consentement_rgpd ? '#27AE60' : '#C0392B' }}; font-weight: 600;">
                        {{ $lead->consentement_rgpd ? '✅ Accepté' : '❌ Non accepté' }}
                    </p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
