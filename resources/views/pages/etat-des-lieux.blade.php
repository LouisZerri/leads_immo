@extends('layouts.landing')

@section('title', 'État des Lieux Professionnel à Domicile — Devis Gratuit en 2 min')
@section('meta_description', 'Besoin d\'un état des lieux d\'entrée ou de sortie ? Nos experts certifiés se déplacent sous 48h. Conforme loi Alur, rapport photos inclus. Devis gratuit et immédiat.')
@section('theme', 'edl')
@section('cta_text', 'Obtenir mon devis en 2 min')

@section('schema_json_ld')
<script type="application/ld+json">{!! $schemaJsonLd !!}</script>
@endsection

@section('content')

    <x-landing.hero
        title="État des Lieux Professionnel : Expert Certifié à Domicile — Devis Gratuit"
        subtitle="Protégez votre dépôt de garantie. Un expert certifié chez vous sous 48h."
        page-source="P1"
        cta-text="Obtenir mon devis en 2 min"
        :badges="[
            ['icon' => '⭐', 'text' => '4.8/5 — 350+ avis'],
            ['icon' => '✅', 'text' => 'Certifié loi Alur'],
            ['icon' => '⚡', 'text' => 'Sous 48h'],
        ]"
    />

    <x-landing.reassurance
        :items="[
            ['icon' => '🛡️', 'text' => 'Expert certifié'],
            ['icon' => '📸', 'text' => 'Rapport photos inclus'],
            ['icon' => '⚡', 'text' => 'Intervention sous 48h'],
            ['icon' => '📋', 'text' => 'Conforme loi Alur'],
            ['icon' => '💰', 'text' => '100% gratuit & sans engagement'],
        ]"
    />

    <x-landing.argument
        title="Pourquoi faire appel à un professionnel pour votre état des lieux ?"
        :items="[
            ['icon' => '⚠️', 'title' => 'Les risques d\'un état des lieux mal réalisé', 'description' => 'Un état des lieux bâclé peut vous coûter des centaines d\'euros en retenues abusives sur votre caution. Sans document conforme, vous n\'avez aucun recours.'],
            ['icon' => '✅', 'title' => 'Ce que garantit un expert certifié', 'description' => 'Un rapport détaillé conforme à la loi Alur, avec photos horodatées, descriptions précises et valeur juridique en cas de litige.'],
            ['icon' => '🔒', 'title' => 'Votre caution protégée', 'description' => 'Avec un état des lieux professionnel, vous disposez d\'une preuve irréfutable de l\'état du logement à votre entrée et sortie.'],
        ]"
    />

    <x-landing.testimonials
        title="Avis clients"
        :reviews="$reviews"
    />

    <x-landing.prestations
        title="Nos prestations d'état des lieux"
        :items="[
            ['icon' => '🏠', 'title' => 'État des lieux d\'entrée', 'description' => 'Constatation détaillée de l\'état du logement à votre arrivée. Rapport conforme loi Alur avec photos.'],
            ['icon' => '🚪', 'title' => 'État des lieux de sortie', 'description' => 'Constatation de l\'état du logement à votre départ. Comparaison avec l\'état d\'entrée pour protéger votre caution.'],
            ['icon' => '⚖️', 'title' => 'État des lieux contradictoire', 'description' => 'En cas de désaccord entre locataire et propriétaire, notre expert intervient comme tiers de confiance.'],
        ]"
    />

    {{-- Lead Magnet --}}
    <x-landing.lead-magnet
        title="7 erreurs qui font perdre votre caution"
        description="Téléchargez notre guide gratuit et découvrez les pièges à éviter lors de votre état des lieux pour protéger votre dépôt de garantie."
        cta-text="Recevoir le guide"
        icon="📖"
        type="download"
        page-source="P1"
    />

    <x-landing.process
        title="Comment se déroule votre état des lieux ?"
        :steps="[
            ['title' => 'Demande en ligne', 'description' => 'Remplissez le formulaire en 2 minutes avec vos informations.'],
            ['title' => 'Prise de contact', 'description' => 'Un expert vous rappelle sous 24h pour fixer le rendez-vous.'],
            ['title' => 'Intervention', 'description' => 'L\'expert se déplace chez vous et réalise l\'état des lieux complet.'],
            ['title' => 'Rapport envoyé', 'description' => 'Vous recevez votre rapport détaillé avec photos sous 48h.'],
        ]"
    />

    <x-landing.faq
        title="Questions fréquentes sur l'état des lieux"
        :questions="$faqItems"
    />

    <x-landing.cta-closure
        title="Protégez votre caution dès maintenant"
        subtitle="Un expert certifié chez vous sous 48h. Devis gratuit et sans engagement."
        cta-text="Obtenir mon devis en 2 min"
        page-source="P1"
    />

@endsection
