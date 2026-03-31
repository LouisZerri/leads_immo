@extends('layouts.minimal')

@section('title', 'Merci — Votre demande a été envoyée')
@section('meta')
<meta name="robots" content="noindex, nofollow">
@endsection

@section('content')
<div class="min-h-screen flex items-center justify-center px-4">
    <div class="bg-white rounded-2xl shadow-lg max-w-lg w-full p-12 text-center">
        <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6" style="background-color: rgba(39, 174, 96, 0.1)">
            <svg class="w-10 h-10" style="color: #27AE60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
        </div>

        <h1 class="font-sans text-2xl md:text-3xl font-bold mb-4" style="color: #1A3A5C">
            Merci pour votre demande !
        </h1>

        <p class="text-gray-500 mb-6 leading-relaxed">
            Votre demande a bien été reçue. Un conseiller GEST'IMMO vous recontacte
            <strong class="text-gray-700">sous 24h</strong> pour discuter de votre projet.
        </p>

        <div class="rounded-xl p-4 mb-6" style="border: 1px solid #e5e7eb; background-color: #f9fafb">
            <p class="text-sm text-gray-500 mb-2">📞 En cas d'urgence, appelez-nous directement :</p>
            <a href="tel:0649505250" class="text-xl font-bold" style="color: #C9A84C; text-decoration: none;">06 49 50 52 50</a>
        </div>

        <a href="/" class="text-sm text-gray-400 hover:text-gray-600 transition" style="text-decoration: none;">← Retour à l'accueil</a>
    </div>
</div>
@endsection
