<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">

    <title>Merci — Votre demande a été envoyée | GEST'IMMO</title>

    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🎯</text></svg>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css'])

    @yield('gtm_head')
</head>
<body class="font-sans antialiased" style="background-color: #F2F0E8; color: #333333">

    <div class="min-h-screen flex items-center justify-center px-4">
        <div style="background: #fff; border-radius: 16px; box-shadow: 0 4px 24px rgba(0,0,0,0.08); max-width: 480px; width: 100%; padding: 48px 32px; text-align: center;">

            {{-- Icône succès --}}
            <div style="width: 80px; height: 80px; border-radius: 50%; background-color: rgba(39, 174, 96, 0.1); display: flex; align-items: center; justify-content: center; margin: 0 auto 24px;">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#27AE60" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 13l4 4L19 7"/>
                </svg>
            </div>

            <h1 style="font-family: 'Playfair Display', Georgia, serif; font-size: 28px; font-weight: 700; color: #1A3A5C; margin-bottom: 16px;">
                Merci pour votre demande !
            </h1>

            <p style="color: #666; line-height: 1.6; margin-bottom: 24px;">
                Votre demande a bien été reçue. Un conseiller GEST'IMMO vous recontacte
                <strong style="color: #333;">sous 24h</strong> pour discuter de votre projet.
            </p>

            <div style="border: 1px solid #e5e7eb; background-color: #f9fafb; border-radius: 12px; padding: 16px; margin-bottom: 24px;">
                <p style="color: #666; font-size: 14px; margin-bottom: 8px;">
                    📞 En cas d'urgence, appelez-nous directement :
                </p>
                <a href="tel:0649505250" style="color: #C9A84C; font-size: 20px; font-weight: 700; text-decoration: none;">
                    06 49 50 52 50
                </a>
            </div>

            <a href="/" style="color: #999; font-size: 14px; text-decoration: none;">
                ← Retour à l'accueil
            </a>
        </div>
    </div>

</body>
</html>
