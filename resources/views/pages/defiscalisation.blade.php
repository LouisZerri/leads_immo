@extends('layouts.landing')

@section('title', 'Défiscalisation Immobilière ' . date('Y') . ' : LMNP, Déficit Foncier, SCI — Guide Complet')
@section('meta_description', 'Réduisez votre impôt grâce à l\'immobilier. Comparatif LMNP, déficit foncier, SCI IS. Audit fiscal personnalisé offert.')
@section('theme', 'immo')
@section('cta_text', 'Obtenir mon audit fiscal gratuit')

@section('schema_json_ld')
<script type="application/ld+json">{!! $schemaJsonLd !!}</script>
@endsection

@section('content')

    {{-- Bandeau urgence --}}
    <div style="background-color: #C0392B" class="text-white text-center py-2 px-4 text-sm font-semibold">
        ⏰ Déductible cette année si investissement avant le 31/12 — Ne perdez pas cet avantage fiscal
    </div>

    <x-landing.hero
        :title="'Défiscalisation Immobilière ' . date('Y') . ' : Réduisez Votre Impôt avec les Meilleures Stratégies'"
        subtitle="Payez moins d'impôts. Légalement. Dès cette année."
        page-source="P4"
        cta-text="Obtenir mon audit fiscal gratuit"
        :badges="[
            ['icon' => '📉', 'text' => 'Jusqu\'à 10 700€/an déduits'],
            ['icon' => '✅', 'text' => 'Audit fiscal gratuit'],
            ['icon' => '⏰', 'text' => 'Avant le 31/12'],
        ]"
    />

    <x-landing.reassurance
        :items="[
            ['icon' => '📉', 'text' => 'Réduction d\'impôt garantie'],
            ['icon' => '⚖️', 'text' => '100% légal'],
            ['icon' => '🎯', 'text' => 'Stratégie personnalisée'],
            ['icon' => '📊', 'text' => 'Audit fiscal offert'],
            ['icon' => '🤝', 'text' => 'Accompagnement expert'],
        ]"
    />

    <x-landing.argument
        title="Pourquoi défiscaliser grâce à l'immobilier ?"
        :items="[
            ['icon' => '💸', 'title' => 'Réduisez votre impôt concrètement', 'description' => 'LMNP, déficit foncier, SCI à l\'IS : les dispositifs immobiliers permettent de réduire votre impôt de plusieurs milliers d\'euros par an, en toute légalité.'],
            ['icon' => '🏠', 'title' => 'Construisez votre patrimoine en même temps', 'description' => 'Contrairement à un simple placement, l\'immobilier vous permet de défiscaliser tout en construisant un patrimoine tangible qui prend de la valeur.'],
            ['icon' => '📈', 'title' => 'Des revenus complémentaires à la clé', 'description' => 'Un investissement bien structuré génère des loyers qui couvrent le crédit et vous apportent un complément de revenus, aujourd\'hui ou à la retraite.'],
        ]"
    />

    <x-landing.testimonials
        title="Ils ont réduit leurs impôts"
        :reviews="$reviews"
    />

    <x-landing.prestations
        title="Nos stratégies de défiscalisation"
        :items="[
            ['icon' => '🏷️', 'title' => 'LMNP — Loueur Meublé', 'description' => 'Amortissez votre bien et votre mobilier pour générer des revenus locatifs peu ou pas imposés. Le dispositif le plus accessible.'],
            ['icon' => '🔧', 'title' => 'Déficit foncier', 'description' => 'Déduisez vos travaux de rénovation de votre revenu global jusqu\'à 10 700€/an. Idéal pour les biens anciens à rénover.'],
            ['icon' => '🏢', 'title' => 'SCI à l\'IS', 'description' => 'Structurez votre patrimoine en société, amortissez le bien et bénéficiez d\'un taux d\'IS de 15% sur les premiers 42 500€ de bénéfice.'],
        ]"
    />

    {{-- Lead Magnet --}}
    <x-landing.lead-magnet
        title="Audit fiscal patrimonial personnalisé"
        description="Recevez une estimation chiffrée de vos économies d'impôts potentielles sous 48h. Gratuit et sans engagement."
        cta-text="Demander mon audit gratuit"
        icon="📊"
        type="cta"
    />

    <x-landing.process
        title="Comment obtenir votre audit fiscal ?"
        :steps="[
            ['title' => '5 questions rapides', 'description' => 'Répondez à un court questionnaire sur vos revenus et objectifs.'],
            ['title' => 'Analyse personnalisée', 'description' => 'Un expert analyse votre situation fiscale sous 48h.'],
            ['title' => 'Estimation chiffrée', 'description' => 'Vous recevez vos économies potentielles par email.'],
            ['title' => 'Plan d\'action', 'description' => 'On définit ensemble la stratégie optimale pour votre profil.'],
        ]"
    />

    <x-landing.faq
        title="Questions fréquentes sur la défiscalisation immobilière"
        :questions="$faqItems"
    />

    <x-landing.cta-closure
        title="Réduisez vos impôts dès cette année"
        subtitle="Audit fiscal gratuit et personnalisé. Résultat sous 48h."
        cta-text="Obtenir mon audit fiscal gratuit"
        page-source="P4"
    />

@endsection
