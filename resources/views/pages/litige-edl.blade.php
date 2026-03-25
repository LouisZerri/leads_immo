@extends('layouts.landing')

@section('title', 'Litige État des Lieux : Vos Droits, Recours et Solutions Légales')
@section('meta_description', 'État des lieux contesté, retenue abusive sur caution, désaccord ? Nos juristes et experts vous accompagnent. Consultation gratuite.')
@section('theme', 'edl')
@section('cta_text', 'Analyser mon dossier gratuitement')

@section('schema_json_ld')
<script type="application/ld+json">{!! $schemaJsonLd !!}</script>
@endsection

@section('content')

    <x-landing.hero
        title="Litige État des Lieux : Défendez Vos Droits et Récupérez Votre Caution"
        subtitle="Votre caution retenue injustement ? On vous aide à récupérer chaque euro."
        page-source="P2"
        cta-text="Analyser mon dossier gratuitement"
        :badges="[
            ['icon' => '✅', 'text' => '94% de cautions récupérées'],
            ['icon' => '📊', 'text' => '1 240 litiges résolus en 2024'],
            ['icon' => '⚡', 'text' => 'Analyse gratuite'],
        ]"
    />

    <x-landing.reassurance
        :items="[
            ['icon' => '⚖️', 'text' => 'Expertise juridique'],
            ['icon' => '💰', 'text' => '94% de cautions récupérées'],
            ['icon' => '📄', 'text' => 'Mise en demeure incluse'],
            ['icon' => '🤝', 'text' => 'Accompagnement complet'],
            ['icon' => '🆓', 'text' => 'Analyse gratuite'],
        ]"
    />

    <x-landing.argument
        title="Pourquoi contester une retenue abusive sur votre caution ?"
        :items="[
            ['icon' => '🚫', 'title' => 'Les retenues abusives sont fréquentes', 'description' => 'Plus de 30% des restitutions de caution font l\'objet de retenues injustifiées. Sans contestation, votre propriétaire garde votre argent.'],
            ['icon' => '⚖️', 'title' => 'La loi est de votre côté', 'description' => 'Le propriétaire doit justifier chaque retenue par des factures ou devis. Sans preuve, la retenue est illégale et vous pouvez exiger le remboursement intégral.'],
            ['icon' => '💪', 'title' => 'Une mise en demeure suffit souvent', 'description' => 'Dans 80% des cas, une lettre de mise en demeure bien rédigée suffit à débloquer la situation sans passer par le tribunal.'],
        ]"
    />

    <x-landing.testimonials
        title="Ils ont récupéré leur caution"
        :reviews="$reviews"
    />

    <x-landing.prestations
        title="Nos solutions pour votre litige"
        :items="[
            ['icon' => '🔍', 'title' => 'Analyse gratuite de votre dossier', 'description' => 'Un expert examine votre état des lieux, identifie les retenues contestables et évalue vos chances de récupération.'],
            ['icon' => '📝', 'title' => 'Lettre de mise en demeure', 'description' => 'Rédaction et envoi d\'une mise en demeure professionnelle rappelant au propriétaire ses obligations légales.'],
            ['icon' => '🤝', 'title' => 'Médiation et conciliation', 'description' => 'En cas de blocage, nous organisons une médiation avec un conciliateur de justice pour trouver un accord amiable.'],
        ]"
    />

    {{-- Lead Magnet --}}
    <x-landing.lead-magnet
        title="Modèle de lettre de mise en demeure"
        description="Téléchargez gratuitement notre modèle de lettre de mise en demeure au propriétaire, prêt à personnaliser (format Word éditable + PDF)."
        cta-text="Recevoir le modèle"
        icon="📄"
        type="download"
        page-source="P2"
    />

    <x-landing.process
        title="Comment récupérer votre caution ?"
        :steps="[
            ['title' => 'Envoyez votre dossier', 'description' => 'Remplissez le formulaire avec les détails de votre litige.'],
            ['title' => 'Analyse gratuite', 'description' => 'Un expert analyse votre situation et vos documents sous 24h.'],
            ['title' => 'Mise en demeure', 'description' => 'Nous rédigeons et envoyons la mise en demeure au propriétaire.'],
            ['title' => 'Caution récupérée', 'description' => 'Vous récupérez votre caution, en moyenne sous 3 semaines.'],
        ]"
    />

    <x-landing.faq
        title="Questions fréquentes sur les litiges état des lieux"
        :questions="$faqItems"
    />

    <x-landing.cta-closure
        title="Récupérez votre caution dès maintenant"
        subtitle="Analyse gratuite de votre dossier. 94% de cautions récupérées."
        cta-text="Analyser mon dossier gratuitement"
        page-source="P2"
    />

@endsection
