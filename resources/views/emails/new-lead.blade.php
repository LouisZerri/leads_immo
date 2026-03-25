<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="margin: 0; padding: 0; background-color: #f3f4f6; font-family: 'Helvetica Neue', Arial, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f3f4f6; padding: 32px 16px;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="max-width: 600px; width: 100%;">

                    {{-- Header --}}
                    <tr>
                        <td style="background-color: #1A3A5C; padding: 24px 32px; border-radius: 12px 12px 0 0; text-align: center;">
                            <h1 style="color: #ffffff; font-size: 20px; margin: 0; font-weight: 700;">🎯 Nouveau lead reçu !</h1>
                        </td>
                    </tr>

                    {{-- Body --}}
                    <tr>
                        <td style="background-color: #ffffff; padding: 32px;">

                            {{-- Badge page --}}
                            @php
                                $pageColors = ['P1' => '#1A3A5C', 'P2' => '#1A3A5C', 'P3' => '#1A6B3C', 'P4' => '#1A6B3C'];
                                $pageLabels = ['P1' => 'État des lieux', 'P2' => 'Litige EDL', 'P3' => 'Investissement', 'P4' => 'Défiscalisation'];
                            @endphp
                            <table cellpadding="0" cellspacing="0" style="margin-bottom: 24px;">
                                <tr>
                                    <td style="background-color: {{ $pageColors[$lead->page_source] ?? '#666' }}; color: #fff; padding: 4px 12px; border-radius: 4px; font-size: 13px; font-weight: 600;">
                                        {{ $pageLabels[$lead->page_source] ?? $lead->page_source }}
                                    </td>
                                    <td style="padding-left: 12px; color: #999; font-size: 13px;">
                                        {{ $lead->created_at->format('d/m/Y à H:i') }}
                                    </td>
                                </tr>
                            </table>

                            {{-- Contact --}}
                            <h2 style="font-size: 16px; color: #1A3A5C; margin: 0 0 16px; font-weight: 700;">Contact</h2>
                            <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom: 24px;">
                                <tr>
                                    <td style="padding: 8px 0; border-bottom: 1px solid #f3f4f6; width: 140px; color: #999; font-size: 14px;">Prénom</td>
                                    <td style="padding: 8px 0; border-bottom: 1px solid #f3f4f6; font-size: 14px; font-weight: 600; color: #333;">{{ $lead->prenom }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px 0; border-bottom: 1px solid #f3f4f6; color: #999; font-size: 14px;">Téléphone</td>
                                    <td style="padding: 8px 0; border-bottom: 1px solid #f3f4f6; font-size: 14px; font-weight: 600;">
                                        <a href="tel:{{ $lead->telephone }}" style="color: #0254a3; text-decoration: none;">{{ $lead->telephone }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px 0; border-bottom: 1px solid #f3f4f6; color: #999; font-size: 14px;">Email</td>
                                    <td style="padding: 8px 0; border-bottom: 1px solid #f3f4f6; font-size: 14px; font-weight: 600;">
                                        <a href="mailto:{{ $lead->email }}" style="color: #0254a3; text-decoration: none;">{{ $lead->email }}</a>
                                    </td>
                                </tr>
                                @if($lead->code_postal)
                                <tr>
                                    <td style="padding: 8px 0; border-bottom: 1px solid #f3f4f6; color: #999; font-size: 14px;">Code postal</td>
                                    <td style="padding: 8px 0; border-bottom: 1px solid #f3f4f6; font-size: 14px; font-weight: 600; color: #333;">{{ $lead->code_postal }}</td>
                                </tr>
                                @endif
                                @if($lead->type_logement)
                                <tr>
                                    <td style="padding: 8px 0; border-bottom: 1px solid #f3f4f6; color: #999; font-size: 14px;">Type logement</td>
                                    <td style="padding: 8px 0; border-bottom: 1px solid #f3f4f6; font-size: 14px; font-weight: 600; color: #333;">{{ ucfirst($lead->type_logement) }}</td>
                                </tr>
                                @endif
                                @if($lead->budget_investissement)
                                <tr>
                                    <td style="padding: 8px 0; border-bottom: 1px solid #f3f4f6; color: #999; font-size: 14px;">Budget</td>
                                    <td style="padding: 8px 0; border-bottom: 1px solid #f3f4f6; font-size: 14px; font-weight: 600; color: #333;">{{ $lead->budget_investissement }}</td>
                                </tr>
                                @endif
                            </table>

                            {{-- UTM --}}
                            @if($lead->utm_source)
                            <h2 style="font-size: 14px; color: #999; margin: 0 0 8px; font-weight: 600;">Source de trafic</h2>
                            <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f9fafb; border-radius: 8px; padding: 12px; margin-bottom: 24px;">
                                <tr>
                                    <td style="padding: 8px 12px; font-size: 13px; color: #666;">
                                        {{ $lead->utm_source }} / {{ $lead->utm_medium }} / {{ $lead->utm_campaign }}
                                    </td>
                                </tr>
                            </table>
                            @endif

                            {{-- CTA --}}
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="center" style="padding-top: 8px;">
                                        <a href="{{ route('admin.leads.show', $lead) }}" style="display: inline-block; padding: 12px 32px; background-color: #C9A84C; color: #ffffff; text-decoration: none; font-weight: 700; border-radius: 8px; font-size: 15px;">
                                            Voir le lead dans le backoffice →
                                        </a>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td style="background-color: #f9fafb; padding: 20px 32px; border-radius: 0 0 12px 12px; text-align: center; border-top: 1px solid #e5e7eb;">
                            <p style="color: #999; font-size: 12px; margin: 0;">
                                GEST'IMMO — 30 Rue Joseph Bonnet, 33100 Bordeaux<br>
                                <a href="tel:0649505250" style="color: #999; text-decoration: none;">06 49 50 52 50</a>
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>
</html>
