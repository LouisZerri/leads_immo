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
                            <h1 style="color: #ffffff; font-size: 20px; margin: 0; font-weight: 700;">
                                @if($pageSource === 'P1')
                                    📖 Votre guide est prêt !
                                @else
                                    📄 Votre document est prêt !
                                @endif
                            </h1>
                        </td>
                    </tr>

                    {{-- Body --}}
                    <tr>
                        <td style="background-color: #ffffff; padding: 32px;">

                            <p style="font-size: 16px; color: #333; line-height: 1.6; margin: 0 0 16px;">
                                Bonjour,
                            </p>

                            <p style="font-size: 15px; color: #666; line-height: 1.6; margin: 0 0 24px;">
                                @if($pageSource === 'P1')
                                    Merci pour votre intérêt ! Vous trouverez en pièce jointe notre guide :
                                @else
                                    Merci pour votre intérêt ! Vous trouverez en pièce jointe :
                                @endif
                            </p>

                            {{-- Document highlight --}}
                            <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom: 24px;">
                                <tr>
                                    <td style="background-color: #f9fafb; border-radius: 8px; padding: 20px; border-left: 4px solid #C9A84C;">
                                        <p style="font-size: 15px; font-weight: 700; color: #333; margin: 0 0 4px;">
                                            @if($pageSource === 'P1')
                                                📖 Les 7 erreurs qui font perdre votre caution — et comment les éviter
                                            @else
                                                📄 Modèle de lettre de mise en demeure propriétaire
                                            @endif
                                        </p>
                                        <p style="font-size: 13px; color: #999; margin: 0;">
                                            @if($pageSource === 'P1')
                                                Guide PDF — 8 à 12 pages
                                            @else
                                                Document Word éditable — Prêt à personnaliser
                                            @endif
                                        </p>
                                    </td>
                                </tr>
                            </table>

                            {{-- Message complémentaire --}}
                            <p style="font-size: 15px; color: #666; line-height: 1.6; margin: 0 0 24px;">
                                @if($pageSource === 'P1')
                                    Besoin d'un état des lieux professionnel ? Nos experts certifiés se déplacent chez vous sous 48h.
                                @else
                                    Ce modèle est prêt à personnaliser avec vos informations. Si vous avez besoin d'un accompagnement pour votre litige, nous sommes là pour vous aider.
                                @endif
                            </p>

                            {{-- CTA --}}
                            <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom: 24px;">
                                <tr>
                                    <td align="center">
                                        @if($pageSource === 'P1')
                                            <a href="{{ route('landing.edl') }}" style="display: inline-block; padding: 14px 32px; background-color: #C9A84C; color: #ffffff; text-decoration: none; font-weight: 700; border-radius: 8px; font-size: 15px;">
                                                Demander un devis gratuit →
                                            </a>
                                        @else
                                            <a href="{{ route('landing.litige') }}" style="display: inline-block; padding: 14px 32px; background-color: #C9A84C; color: #ffffff; text-decoration: none; font-weight: 700; border-radius: 8px; font-size: 15px;">
                                                Faire analyser mon dossier →
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            </table>

                            {{-- Contact --}}
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="background-color: #f9fafb; border-radius: 8px; padding: 16px; text-align: center;">
                                        <p style="font-size: 14px; color: #666; margin: 0 0 4px;">
                                            Une question ? Appelez-nous directement :
                                        </p>
                                        <a href="tel:0649505250" style="font-size: 18px; font-weight: 700; color: #C9A84C; text-decoration: none;">
                                            📞 06 49 50 52 50
                                        </a>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td style="background-color: #f9fafb; padding: 20px 32px; border-radius: 0 0 12px 12px; text-align: center; border-top: 1px solid #e5e7eb;">
                            <p style="color: #999; font-size: 12px; margin: 0 0 8px;">
                                GEST'IMMO — 30 Rue Joseph Bonnet, 33100 Bordeaux
                            </p>
                            <p style="color: #bbb; font-size: 11px; margin: 0;">
                                Vous recevez cet email car vous avez téléchargé un document sur notre site.<br>
                                <a href="https://www.gestimmo-france.fr/confidentialite" style="color: #bbb; text-decoration: underline;">Politique de confidentialité</a>
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>
</html>
