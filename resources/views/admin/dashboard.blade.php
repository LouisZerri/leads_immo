<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — Admin GEST'IMMO</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🎯</text></svg>">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
</head>
<body style="background-color: #f3f4f6; font-family: 'DM Sans', sans-serif; color: #333; margin: 0;">

    {{-- Header --}}
    <header style="background: #1A3A5C; color: #fff; padding: 16px 24px; display: flex; align-items: center; justify-content: space-between;">
        <h1 style="font-size: 18px; font-weight: 700;">🎯 GEST'IMMO — Leads</h1>
        <div style="display: flex; align-items: center; gap: 16px;">
            <span style="font-size: 14px; opacity: 0.8;">{{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('admin.logout') }}" style="margin: 0;">
                @csrf
                <button type="submit" style="background: rgba(255,255,255,0.15); border: none; color: #fff; padding: 6px 14px; border-radius: 6px; font-size: 13px; cursor: pointer;">
                    Déconnexion
                </button>
            </form>
        </div>
    </header>

    <div style="max-width: 1200px; margin: 0 auto; padding: 24px;">

        {{-- Stats --}}
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 16px; margin-bottom: 24px;">
            <div style="background: #fff; border-radius: 12px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.06);">
                <p style="font-size: 13px; color: #666; margin: 0 0 4px;">Total leads</p>
                <p style="font-size: 28px; font-weight: 700; color: #1A3A5C; margin: 0;">{{ $stats['total'] }}</p>
            </div>
            <div style="background: #fff; border-radius: 12px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.06);">
                <p style="font-size: 13px; color: #666; margin: 0 0 4px;">Nouveaux</p>
                <p style="font-size: 28px; font-weight: 700; color: #C9A84C; margin: 0;">{{ $stats['nouveau'] }}</p>
            </div>
            <div style="background: #fff; border-radius: 12px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.06);">
                <p style="font-size: 13px; color: #666; margin: 0 0 4px;">Contactés</p>
                <p style="font-size: 28px; font-weight: 700; color: #0254a3; margin: 0;">{{ $stats['contacte'] }}</p>
            </div>
            <div style="background: #fff; border-radius: 12px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.06);">
                <p style="font-size: 13px; color: #666; margin: 0 0 4px;">Convertis</p>
                <p style="font-size: 28px; font-weight: 700; color: #27AE60; margin: 0;">{{ $stats['converti'] }}</p>
            </div>
            <div style="background: #fff; border-radius: 12px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.06);">
                <p style="font-size: 13px; color: #666; margin: 0 0 4px;">Perdus</p>
                <p style="font-size: 28px; font-weight: 700; color: #C0392B; margin: 0;">{{ $stats['perdu'] }}</p>
            </div>
        </div>

        {{-- Message succès --}}
        @if(session('success'))
            <div style="background-color: rgba(39, 174, 96, 0.1); border: 1px solid #27AE60; border-radius: 8px; padding: 12px 16px; margin-bottom: 16px; color: #27AE60; font-size: 14px;">
                {{ session('success') }}
            </div>
        @endif

        {{-- Filtres --}}
        <div style="background: #fff; border-radius: 12px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.06); margin-bottom: 24px;">
            <form method="GET" action="{{ route('admin.dashboard') }}" style="display: flex; flex-wrap: wrap; gap: 12px; align-items: end;">
                <div>
                    <label style="display: block; font-size: 12px; color: #666; margin-bottom: 4px;">Recherche</label>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Nom, email, tel..." style="padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 14px; width: 180px; color: #333; background: #fff;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; color: #666; margin-bottom: 4px;">Page</label>
                    <select name="page_source" style="padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 14px; color: #333; background: #fff;">
                        <option value="">Toutes</option>
                        <option value="P1" {{ request('page_source') === 'P1' ? 'selected' : '' }}>P1 — État des lieux</option>
                        <option value="P2" {{ request('page_source') === 'P2' ? 'selected' : '' }}>P2 — Litige EDL</option>
                        <option value="P3" {{ request('page_source') === 'P3' ? 'selected' : '' }}>P3 — Investissement</option>
                        <option value="P4" {{ request('page_source') === 'P4' ? 'selected' : '' }}>P4 — Défiscalisation</option>
                    </select>
                </div>
                <div>
                    <label style="display: block; font-size: 12px; color: #666; margin-bottom: 4px;">Statut</label>
                    <select name="statut" style="padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 14px; color: #333; background: #fff;">
                        <option value="">Tous</option>
                        <option value="nouveau" {{ request('statut') === 'nouveau' ? 'selected' : '' }}>Nouveau</option>
                        <option value="contacte" {{ request('statut') === 'contacte' ? 'selected' : '' }}>Contacté</option>
                        <option value="converti" {{ request('statut') === 'converti' ? 'selected' : '' }}>Converti</option>
                        <option value="perdu" {{ request('statut') === 'perdu' ? 'selected' : '' }}>Perdu</option>
                    </select>
                </div>
                <div>
                    <label style="display: block; font-size: 12px; color: #666; margin-bottom: 4px;">Du</label>
                    <input type="date" name="date_from" value="{{ request('date_from') }}" style="padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 14px; color: #333; background: #fff;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; color: #666; margin-bottom: 4px;">Au</label>
                    <input type="date" name="date_to" value="{{ request('date_to') }}" style="padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 14px; color: #333; background: #fff;">
                </div>
                <div style="display: flex; gap: 8px;">
                    <button type="submit" style="padding: 8px 16px; background-color: #1A3A5C; color: #fff; border: none; border-radius: 6px; font-size: 14px; cursor: pointer; font-weight: 600;">
                        Filtrer
                    </button>
                    <a href="{{ route('admin.dashboard') }}" style="padding: 8px 16px; background-color: #e5e7eb; color: #333; border-radius: 6px; font-size: 14px; text-decoration: none; font-weight: 500;">
                        Reset
                    </a>
                    <a href="{{ route('admin.leads.export', request()->query()) }}" style="padding: 8px 16px; background-color: #27AE60; color: #fff; border-radius: 6px; font-size: 14px; text-decoration: none; font-weight: 600;">
                        Export CSV
                    </a>
                </div>
            </form>
        </div>

        {{-- Tableau --}}
        <div style="background: #fff; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.06); overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; font-size: 14px;">
                <thead>
                    <tr style="background: #f9fafb; border-bottom: 2px solid #e5e7eb;">
                        <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #666; font-size: 12px; text-transform: uppercase;">Date</th>
                        <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #666; font-size: 12px; text-transform: uppercase;">Page</th>
                        <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #666; font-size: 12px; text-transform: uppercase;">Prénom</th>
                        <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #666; font-size: 12px; text-transform: uppercase;">Téléphone</th>
                        <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #666; font-size: 12px; text-transform: uppercase;">Email</th>
                        <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #666; font-size: 12px; text-transform: uppercase;">Statut</th>
                        <th style="padding: 12px 16px; text-align: left; font-weight: 600; color: #666; font-size: 12px; text-transform: uppercase;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($leads as $lead)
                        <tr style="border-bottom: 1px solid #f3f4f6;">
                            <td style="padding: 12px 16px; white-space: nowrap; color: #666;">{{ $lead->created_at->format('d/m/Y H:i') }}</td>
                            <td style="padding: 12px 16px;">
                                @php
                                    $pageColors = ['P1' => '#1A3A5C', 'P2' => '#1A3A5C', 'P3' => '#1A6B3C', 'P4' => '#1A6B3C'];
                                    $pageLabels = ['P1' => 'EDL', 'P2' => 'Litige', 'P3' => 'Invest.', 'P4' => 'Défisca.'];
                                @endphp
                                <span style="background-color: {{ $pageColors[$lead->page_source] ?? '#666' }}; color: #fff; padding: 2px 8px; border-radius: 4px; font-size: 12px; font-weight: 600;">
                                    {{ $pageLabels[$lead->page_source] ?? $lead->page_source }}
                                </span>
                            </td>
                            <td style="padding: 12px 16px; font-weight: 500;">{{ $lead->prenom }}</td>
                            <td style="padding: 12px 16px;">
                                <a href="tel:{{ $lead->telephone }}" style="color: #0254a3; text-decoration: none;">{{ $lead->telephone }}</a>
                            </td>
                            <td style="padding: 12px 16px;">
                                <a href="mailto:{{ $lead->email }}" style="color: #0254a3; text-decoration: none;">{{ $lead->email }}</a>
                            </td>
                            <td style="padding: 12px 16px;">
                                <form method="POST" action="{{ route('admin.leads.statut', $lead) }}" style="margin: 0;">
                                    @csrf
                                    @method('PATCH')
                                    @php
                                        $statutColors = [
                                            'nouveau' => ['bg' => 'rgba(201,168,76,0.15)', 'color' => '#A88A3A'],
                                            'contacte' => ['bg' => 'rgba(2,84,163,0.15)', 'color' => '#0254a3'],
                                            'converti' => ['bg' => 'rgba(39,174,96,0.15)', 'color' => '#27AE60'],
                                            'perdu' => ['bg' => 'rgba(192,57,43,0.15)', 'color' => '#C0392B'],
                                        ];
                                        $sc = $statutColors[$lead->statut] ?? ['bg' => '#eee', 'color' => '#666'];
                                    @endphp
                                    <select
                                        name="statut"
                                        onchange="this.form.submit()"
                                        style="padding: 4px 8px; border: none; border-radius: 4px; font-size: 13px; font-weight: 600; cursor: pointer; background-color: {{ $sc['bg'] }}; color: {{ $sc['color'] }};"
                                    >
                                        <option value="nouveau" {{ $lead->statut === 'nouveau' ? 'selected' : '' }}>Nouveau</option>
                                        <option value="contacte" {{ $lead->statut === 'contacte' ? 'selected' : '' }}>Contacté</option>
                                        <option value="converti" {{ $lead->statut === 'converti' ? 'selected' : '' }}>Converti</option>
                                        <option value="perdu" {{ $lead->statut === 'perdu' ? 'selected' : '' }}>Perdu</option>
                                    </select>
                                </form>
                            </td>
                            <td style="padding: 12px 16px;">
                                <a href="{{ route('admin.leads.show', $lead) }}" style="color: #0254a3; text-decoration: none; font-size: 13px; font-weight: 500;">
                                    Détail →
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="padding: 40px 16px; text-align: center; color: #999;">Aucun lead trouvé.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($leads->hasPages())
            <div style="margin-top: 20px; display: flex; justify-content: center;">
                {{ $leads->links() }}
            </div>
        @endif
    </div>

</body>
</html>
