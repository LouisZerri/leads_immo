<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | GEST'IMMO</title>
    <meta name="description" content="@yield('meta_description')">
    <link rel="canonical" href="{{ url()->current() }}">

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

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">

    {{-- Styles --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- JSON-LD --}}
    @yield('schema_json_ld')

    {{-- GTM Head --}}
    @yield('gtm_head')
</head>
<body class="font-sans text-texte bg-blanc antialiased">
    {{-- GTM Body --}}
    @yield('gtm_body')

    {{-- Header --}}
    <header class="sticky top-0 z-50 bg-blanc shadow-sm">
        <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
            <a href="/" class="flex items-center gap-2">
                <img src="{{ asset('images/logo.png') }}" alt="GEST'IMMO" class="h-10 w-auto" width="40" height="40">
                <span class="font-serif font-bold text-xl text-@yield('theme_color', 'bleu-marine')">GEST'IMMO</span>
            </a>
            <a href="tel:0649505250" class="flex items-center gap-2 text-sm font-semibold text-@yield('theme_color', 'bleu-marine') hover:opacity-80 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                </svg>
                06 49 50 52 50
            </a>
        </div>
    </header>

    {{-- Contenu principal --}}
    <main>
        @yield('content')
    </main>

    {{-- Sticky CTA Mobile --}}
    <x-landing.sticky-cta :cta-text="View::yieldContent('cta_text', 'Être rappelé gratuitement')" />

    {{-- Footer --}}
    <x-landing.footer />
</body>
</html>
