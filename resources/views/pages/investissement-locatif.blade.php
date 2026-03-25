@extends('layouts.landing')

@section('title', 'Investissement Locatif Rentable : Stratégie, Simulation & Accompagnement')
@section('meta_description', 'Calculez votre rendement locatif réel, comparez LMNP vs SCI, et bénéficiez d\'un accompagnement expert. Simulation gratuite en 3 min.')
@section('theme', 'immo')
@section('cta_text', 'Calculer mon rendement net')
@section('cta_anchor', '#simulator')

@section('schema_json_ld')
<script type="application/ld+json">{!! $schemaJsonLd !!}</script>
@endsection

@section('content')

    <x-landing.hero
        title="Investissement Locatif : Simulez Votre Rendement Réel et Investissez Sereinement"
        subtitle="Faites travailler votre argent. Un bien rentable sélectionné pour vous en 30 jours."
        page-source="P3"
        cta-text="Calculer mon rendement net — Gratuit"
        :badges="[
            ['icon' => '📊', 'text' => 'Simulation gratuite'],
            ['icon' => '🏠', 'text' => '150+ biens analysés/an'],
            ['icon' => '✅', 'text' => 'Accompagnement A à Z'],
        ]"
    />

    <x-landing.reassurance
        :items="[
            ['icon' => '📈', 'text' => 'Rendement optimisé'],
            ['icon' => '🔍', 'text' => 'Biens sélectionnés'],
            ['icon' => '🏦', 'text' => 'Aide au financement'],
            ['icon' => '⚖️', 'text' => 'Conseil fiscal'],
            ['icon' => '🤝', 'text' => 'Accompagnement complet'],
        ]"
    />

    <x-landing.argument
        title="Pourquoi investir dans l'immobilier locatif ?"
        :items="[
            ['icon' => '💰', 'title' => 'Des revenus passifs chaque mois', 'description' => 'Un bien bien choisi génère un cashflow positif dès le premier mois. Votre locataire rembourse votre crédit pendant que vous construisez votre patrimoine.'],
            ['icon' => '🛡️', 'title' => 'Un patrimoine tangible et sécurisé', 'description' => 'Contrairement aux placements financiers, l\'immobilier est un actif concret qui prend de la valeur sur le long terme et résiste à l\'inflation.'],
            ['icon' => '📉', 'title' => 'Des avantages fiscaux importants', 'description' => 'LMNP, déficit foncier, SCI à l\'IS : les dispositifs fiscaux permettent de réduire significativement votre imposition sur les revenus locatifs.'],
        ]"
    />

    <x-landing.testimonials
        title="Ils ont investi avec nous"
        :reviews="$reviews"
    />

    <x-landing.prestations
        title="Notre accompagnement investissement"
        :items="[
            ['icon' => '🎯', 'title' => 'Stratégie personnalisée', 'description' => 'Définition de votre objectif (cashflow, patrimoine, défiscalisation) et recherche du bien idéal selon votre budget et votre situation.'],
            ['icon' => '📊', 'title' => 'Analyse de rentabilité', 'description' => 'Étude complète du rendement brut, net, du cashflow et de la fiscalité avant tout engagement. Pas de mauvaise surprise.'],
            ['icon' => '🔑', 'title' => 'De la recherche à la mise en location', 'description' => 'Sélection du bien, négociation, montage du financement, travaux si nécessaire, et mise en location avec un locataire qualifié.'],
        ]"
    />

    {{-- Simulateur cashflow --}}
    <x-landing.simulator
        cta-text="Parler à un conseiller — Gratuit"
        page-source="P3"
    />

    <x-landing.process
        title="Comment investir avec GEST'IMMO ?"
        :steps="[
            ['title' => 'Simulation gratuite', 'description' => 'Calculez votre rendement et définissez votre stratégie d\'investissement.'],
            ['title' => 'Recherche du bien', 'description' => 'Nous sélectionnons les meilleures opportunités selon vos critères.'],
            ['title' => 'Financement & acquisition', 'description' => 'Montage du dossier bancaire, négociation et signature.'],
            ['title' => 'Mise en location', 'description' => 'Votre bien est loué et génère des revenus dès le premier mois.'],
        ]"
    />

    <x-landing.faq
        title="Questions fréquentes sur l'investissement locatif"
        :questions="$faqItems"
    />

    <x-landing.cta-closure
        title="Lancez votre investissement locatif"
        subtitle="Simulation gratuite, accompagnement personnalisé, résultat concret."
        cta-text="Calculer mon rendement net — Gratuit"
        page-source="P3"
    />

@endsection
