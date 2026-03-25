<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | GEST'IMMO</title>
    <meta name="description" content="@yield('meta_description')">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- DNS prefetch pour les services externes --}}
    <link rel="dns-prefetch" href="https://www.googletagmanager.com">
    <link rel="dns-prefetch" href="https://www.google-analytics.com">
    <link rel="dns-prefetch" href="https://www.google.com">
    <link rel="dns-prefetch" href="https://connect.facebook.net">

    {{-- Open Graph --}}
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('meta_description')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="@yield('og_image', asset('images/og-default.jpg'))">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title')">
    <meta name="twitter:description" content="@yield('meta_description')">

    {{-- Favicon --}}
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🎯</text></svg>">

    {{-- Fonts — preload pour éviter le FOUT --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700;800&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">

    {{-- Styles --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- JSON-LD --}}
    @yield('schema_json_ld')

    {{-- reCAPTCHA v3 --}}
    @if(config('services.recaptcha.site_key'))
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}" async defer></script>
    @endif

    {{-- Google Consent Mode v2 — bloqué par défaut --}}
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('consent', 'default', {
        'analytics_storage': 'denied',
        'ad_storage': 'denied',
        'ad_user_data': 'denied',
        'ad_personalization': 'denied',
    });
    </script>
    {{-- GTM Head --}}
    @if(config('services.gtm.id'))
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','{{ config('services.gtm.id') }}');</script>
    @endif
</head>
<body class="font-sans text-texte bg-blanc antialiased">
    {{-- GTM Body --}}
    @if(config('services.gtm.id'))
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ config('services.gtm.id') }}" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    @endif

    {{-- Header --}}
    <header class="sticky top-0 z-50 bg-blanc shadow-sm">
        <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
            <a href="/" class="flex flex-col">
                <span class="font-sans font-black text-2xl tracking-wide">
                    <span class="text-[#0254a3]">GEST'</span><span class="text-[#ED2939]">IMMO</span>
                </span>
                <span class="text-[10px] font-semibold tracking-[0.15em] text-[#5A7A9B] uppercase">L'investissement en plus simple</span>
            </a>
            <a href="tel:0649505250" class="flex items-center gap-2 text-sm font-semibold hover:opacity-80 transition" style="color: var(--color-primary)">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                </svg>
                06 49 50 52 50
            </a>
        </div>
    </header>

    {{-- Contenu principal avec thème --}}
    <main data-theme="@yield('theme', 'edl')">
        @yield('content')
    </main>

    {{-- Sticky CTA Mobile --}}
    <x-landing.sticky-cta
        :cta-text="View::yieldContent('cta_text', 'Être rappelé gratuitement')"
        :anchor="View::yieldContent('cta_anchor', '#lead-form')"
    />

    {{-- Footer --}}
    <x-landing.footer />

    {{-- Bandeau cookies RGPD --}}
    <x-landing.cookie-consent />
</body>
</html>
