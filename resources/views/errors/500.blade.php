@extends('layouts.minimal')

@section('title', 'Erreur serveur')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4">
    <div class="text-center max-w-lg">
        <p class="text-9xl font-extrabold opacity-15" style="color: #C0392B; line-height: 1;">500</p>
        <h1 class="font-sans text-2xl md:text-3xl font-bold -mt-6 mb-4" style="color: #1A3A5C">
            Erreur serveur
        </h1>
        <p class="text-gray-500 text-base leading-relaxed mb-8">
            Une erreur inattendue s'est produite. Nos équipes sont informées.<br>
            Veuillez réessayer dans quelques instants.
        </p>
        <a href="/" class="inline-block py-3 px-8 text-white font-bold rounded-lg text-base" style="background-color: #C9A84C; text-decoration: none;">
            Retour à l'accueil
        </a>
    </div>
</div>
@endsection
