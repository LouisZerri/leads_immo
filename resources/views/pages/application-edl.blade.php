@extends('layouts.lp')

@section('title', 'Application état des lieux | Rapports conformes ALUR en 15 min')
@section('meta_description', 'Réalisez des états des lieux professionnels depuis votre smartphone. Photos, signatures, PDF conforme. Essai gratuit.')
@section('lp_css', 'lp2')
@section('body_class', 'lp lp2')
@section('theme', 'edl')

@section('schema_json_ld')
<script type="application/ld+json">{!! $schemaJsonLd !!}</script>
@endsection

@section('content')

{{-- NAV --}}
<nav class="lp-nav"><div class="container nav-inner">
    <a href="/" class="nav-logo">
        <span class="brand"><span class="brand-gest">GEST'</span><span class="brand-immo">IMMO</span></span>
        <span class="tagline">L'investissement en plus simple</span>
    </a>
    <a href="#formulaire" class="btn btn-p nav-cta">Essayer gratuit →</a>
</div></nav>

{{-- HERO --}}
<section class="hero">
    <div class="container"><div class="hero-grid">
        <div>
            <h1><em>15 minutes.</em> Un rapport pro. Zéro paperasse.</h1>
            <p class="hero-sub">Photos intégrées, comparatif automatique, signature électronique, PDF conforme en 1 clic.</p>
            <div class="hero-hook">⚠️ <strong>63% des litiges locatifs</strong> sont liés à un état des lieux incomplet. Votre EDL papier ne vous protège pas.</div>
            <div class="hero-cta">
                <a href="#formulaire" class="btn btn-p">🚀 Demander un essai gratuit — 0 €</a>
                <a href="#calculateur" class="btn btn-o">⏱️ Calculer mon temps gagné</a>
            </div>
            <div class="hero-trust"><span>✓ Sans carte bancaire</span><span>✓ 5/5 stores</span><span>✓ 200+ utilisateurs</span></div>
        </div>
        {{-- PHONE MOCKUP --}}
        <div class="phone-wrap">
            <div class="phone-frame">
                <img src="{{ asset('images/app-screenshot.png') }}" alt="Application EDLYA — État des lieux numérique" class="phone-img">
            </div>
        </div>
    </div></div>
</section>

{{-- HOOKS --}}
<div class="hooks">
    <div class="hooks-track">
        <div class="hook-card"><span class="hook-tag fear">Peur de perte</span><p>Votre EDL papier <strong>ne vaut rien</strong> en cas de litige. Passez au numérique avant qu'il ne soit trop tard.</p></div>
        <div class="hook-card"><span class="hook-tag money">Gain financier</span><p>Nos utilisateurs récupèrent <strong>~300 € de plus par location</strong> en retenues justifiées.</p></div>
        <div class="hook-card"><span class="hook-tag time">Gain de temps</span><p><strong>15 min</strong> au lieu d'1h30. Le rapport est prêt quand vous quittez l'appartement.</p></div>
        <div class="hook-card"><span class="hook-tag tech">Modernité</span><p>En {{ date('Y') }}, faire un EDL sur papier, c'est comme envoyer un fax. <strong>Passez au numérique.</strong></p></div>
        <div class="hook-card"><span class="hook-tag proof">Preuve sociale</span><p>Rejoignez les propriétaires qui utilisent déjà l'app. <strong>Note : 5/5.</strong></p></div>
        <div class="hook-card"><span class="hook-tag fear">Comparaison</span><p><strong>Papier :</strong> illisible, incomplet, contestable. <strong>App :</strong> clair, complet, incontestable.</p></div>
        {{-- Duplicates --}}
        <div class="hook-card"><span class="hook-tag fear">Peur de perte</span><p>Votre EDL papier <strong>ne vaut rien</strong> en cas de litige.</p></div>
        <div class="hook-card"><span class="hook-tag money">Gain financier</span><p>Nos utilisateurs récupèrent <strong>~300 € de plus par location</strong>.</p></div>
        <div class="hook-card"><span class="hook-tag time">Gain de temps</span><p><strong>15 min</strong> au lieu d'1h30.</p></div>
        <div class="hook-card"><span class="hook-tag tech">Modernité</span><p>Passez au numérique. <strong>Aujourd'hui.</strong></p></div>
    </div>
</div>

{{-- PROOF --}}
<div class="proof-bar"><div class="container"><div class="proof-grid">
    <div><div class="proof-val"><span class="counter" data-target="200">0</span>+</div><div class="proof-label">Utilisateurs</div></div>
    <div><div class="proof-val"><span class="counter" data-target="200">0</span>+</div><div class="proof-label">EDL réalisés</div></div>
    <div><div class="proof-val">5/5</div><div class="proof-label">Note stores</div></div>
    <div><div class="proof-val"><span class="counter" data-target="15">0</span> min</div><div class="proof-label">Temps moyen</div></div>
</div></div></div>

{{-- PROBLEMS --}}
<section class="section">
    <div class="container">
        <div class="section-header anim"><span class="badge badge-p">Le problème</span><h2>Votre EDL papier <em>ne vous protège pas</em></h2></div>
        <div class="pain-grid">
            <div class="pain-card anim"><div class="pain-icon">📝</div><div><h3>Illisible et incomplet</h3><p>Écriture manuscrite, oublis. Contesté dès la sortie.</p><div class="pain-cost">→ Caution perdue</div></div></div>
            <div class="pain-card anim"><div class="pain-icon">⏰</div><div><h3>1h30 minimum par EDL</h3><p>Rédaction, mise en forme, envoi. 10 biens = 1 journée perdue/mois.</p><div class="pain-cost">→ 15h gaspillées/mois</div></div></div>
            <div class="pain-card anim"><div class="pain-icon">📷</div><div><h3>Zéro preuve photo</h3><p>Sans horodatage, impossible de prouver l'état initial.</p><div class="pain-cost">→ Parole contre parole</div></div></div>
            <div class="pain-card anim"><div class="pain-icon">⚖️</div><div><h3>Non conforme ALUR</h3><p>Les modèles Word en ligne ne respectent pas le décret 2016.</p><div class="pain-cost">→ Rejeté en justice</div></div></div>
            <div class="pain-card anim"><div class="pain-icon">🔍</div><div><h3>Comparaison impossible</h3><p>Entrée vs sortie à l'œil = oublis = argent perdu.</p><div class="pain-cost">→ Dégradations ratées</div></div></div>
            <div class="pain-card anim"><div class="pain-icon">📁</div><div><h3>Archivage cauchemar</h3><p>3 ans d'obligation légale. Les papiers s'accumulent et se perdent.</p><div class="pain-cost">→ Non-conformité</div></div></div>
        </div>
        <div class="stat-box anim"><p>💡 <strong>63% des litiges locatifs en France</strong> sont liés à un EDL incomplet. Ne faites pas partie de cette statistique.</p></div>
        <div class="text-center mt-24"><a href="#formulaire" class="btn btn-p">Ne perdez plus votre caution →</a></div>
    </div>
</section>

{{-- TIME CALCULATOR --}}
<section class="section section-purple scroll-anchor" id="calculateur" x-data="lp2Calculator">
    <div class="container">
        <div class="section-header anim"><span class="badge badge-c">Simulateur</span><h2>Combien de temps <em>gagnez-vous</em> avec l'app ?</h2></div>
        <div class="time-calc anim">
            <div class="tc-header"><h3>⏱️ Calculateur de temps gagné</h3></div>
            <div class="tc-body">
                <div class="tc-slider-group"><label>Nombre de lots gérés <span x-text="lots"></span></label><input type="range" class="tc-slider" min="1" max="100" x-model.number="lots"></div>
                <div class="tc-slider-group"><label>Taux de rotation annuel <span x-text="rotation + '%'"></span></label><input type="range" class="tc-slider" min="5" max="80" x-model.number="rotation"></div>
                <div class="tc-results">
                    <div class="tc-res bad"><div class="label">📝 Avec le papier</div><div class="val" x-text="paperLabel"></div><div class="sub">Entrée + sortie combinées</div></div>
                    <div class="tc-res good"><div class="label">📱 Avec l'app</div><div class="val" x-text="appLabel"></div><div class="sub">Entrée + sortie combinées</div></div>
                </div>
                <div class="tc-saved" x-text="savedLabel"></div>
                <div class="tc-money" x-text="moneyLabel"></div>
                <div class="tc-cta"><a href="#formulaire" class="btn btn-p">Récupérer ce temps →</a></div>
            </div>
        </div>
    </div>
</section>

{{-- FEATURES --}}
<section class="section section-alt" id="fonctionnalites">
    <div class="container">
        <div class="section-header anim"><span class="badge badge-c">Fonctionnalités</span><h2>Tout pour des EDL <em>incontestables</em></h2></div>
        <div class="feat-grid">
            <div class="feat-card anim"><div class="feat-icon">📋</div><h3>Modèle ALUR</h3><p>Tous les points de contrôle</p></div>
            <div class="feat-card anim"><div class="feat-icon">📸</div><h3>Photos HD</h3><p>Horodatage + géolocalisation</p></div>
            <div class="feat-card anim"><div class="feat-icon">✏️</div><h3>Annotations</h3><p>Commentaires en direct</p></div>
            <div class="feat-card anim"><div class="feat-icon">🔄</div><h3>Comparatif IA</h3><p>Analyse entrée/sortie automatique</p></div>
            <div class="feat-card anim"><div class="feat-icon">✍️</div><h3>e-Signature</h3><p>Le locataire signe sur l'écran</p></div>
            <div class="feat-card anim"><div class="feat-icon">📄</div><h3>PDF instantané</h3><p>Rapport conforme en 1 clic</p></div>
            <div class="feat-card anim"><div class="feat-icon">☁️</div><h3>Cloud sécurisé</h3><p>Accès et archivage illimités</p></div>
            <div class="feat-card anim"><div class="feat-icon">📴</div><h3>Mode hors-ligne</h3><p>Fonctionne sans réseau</p></div>
        </div>
    </div>
</section>

{{-- PROCESS --}}
<section class="section">
    <div class="container">
        <div class="section-header anim"><span class="badge badge-m">4 étapes</span><h2>Simple comme <em>1, 2, 3, 4</em></h2></div>
        <div class="proc-grid">
            <div class="proc-step anim"><div class="proc-num">1</div><h3>Ouvrir</h3><p>Nouvel EDL en 10 sec</p></div>
            <div class="proc-step anim"><div class="proc-num">2</div><h3>Photographier</h3><p>Guide pièce par pièce</p></div>
            <div class="proc-step anim"><div class="proc-num">3</div><h3>Signer</h3><p>e-Signature locataire</p></div>
            <div class="proc-step anim"><div class="proc-num">4</div><h3>Envoyer</h3><p>PDF conforme instantané</p></div>
        </div>
        <div class="text-center mt-32"><a href="#formulaire" class="btn btn-p">Tester maintenant →</a></div>
    </div>
</section>

{{-- BENEFITS --}}
<section class="section section-purple">
    <div class="container">
        <div class="section-header anim"><span class="badge badge-p">Résultats</span><h2>Ce qui change quand vous passez au <em>numérique</em></h2></div>
        <div class="ben-list">
            <div class="ben-row anim"><div class="ben-check">✓</div><div><h3>÷4 le temps par EDL</h3><p>15 minutes au lieu d'1h30. Le rapport est prêt avant de quitter l'appartement.</p></div></div>
            <div class="ben-row anim"><div class="ben-check">✓</div><div><h3>Rapports impossibles à contester</h3><p>Photos horodatées + description normalisée = preuves irréfutables.</p></div></div>
            <div class="ben-row anim"><div class="ben-check">✓</div><div><h3>Zéro oubli garanti</h3><p>L'app vérifie la complétude. Vous ne pouvez pas valider sans tout remplir.</p></div></div>
            <div class="ben-row anim"><div class="ben-check">✓</div><div><h3>~300 € de plus récupérés par location</h3><p>Retenues mieux documentées et incontestables à chaque changement.</p></div></div>
            <div class="ben-row anim"><div class="ben-check">✓</div><div><h3>Comparatif entrée/sortie par IA</h3><p>L'IA analyse vos photos de sortie et génère un rapport détaillé des différences par rapport à l'entrée.</p></div></div>
            <div class="ben-row anim"><div class="ben-check">✓</div><div><h3>Estimation des coûts de remise en état</h3><p>Chiffrez les dégradations directement dans le rapport pour justifier chaque retenue sur caution.</p></div></div>
        </div>
    </div>
</section>

{{-- TESTIMONIALS --}}
<section class="section" id="temoignages">
    <div class="container">
        <div class="section-header anim"><span class="badge badge-c">Témoignages</span><h2>200+ propriétaires ont <em>adopté l'app</em></h2></div>
        <div class="testi-grid">
            @foreach($reviews as $review)
            <div class="testi-card anim">
                <div class="testi-stars">★★★★★</div>
                <p class="testi-text">« {{ $review['text'] }} »</p>
                <div class="testi-author">
                    <div class="testi-avatar">{{ collect(explode(' ', $review['name']))->map(fn($w) => mb_substr($w, 0, 1))->join('') }}</div>
                    <div><div class="testi-name">{{ $review['name'] }}</div><div class="testi-role">{{ $review['role'] ?? '' }}</div></div>
                </div>
                @if(isset($review['result']))
                <div class="testi-result">→ {{ $review['result'] }}</div>
                @endif
            </div>
            @endforeach
        </div>
        <div class="text-center mt-24"><a href="#formulaire" class="btn btn-c">Rejoindre nos utilisateurs satisfaits →</a></div>
    </div>
</section>

{{-- FORMULAIRE --}}
<section class="form-section scroll-anchor" id="formulaire">
    <div class="container"><div class="form-grid">
        <div class="form-left anim">
            <h2>Demandez votre essai gratuit</h2>
            <p>Premier état des lieux offert. Sans engagement, sans carte bancaire.</p>
            <div class="form-perks">
                <div class="form-perk"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>1er état des lieux offert</div>
                <div class="form-perk"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>Essai gratuit 30 jours</div>
                <div class="form-perk"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>Sans engagement</div>
                <div class="form-perk"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>Données protégées</div>
            </div>
        </div>
        <div class="anim form-card-wrapper">
            <div class="form-card-header">
                <h3>🚀 Demander un essai gratuit</h3>
            </div>
            <div id="lead-form" class="form-card-body">
                <x-landing.lead-form page-source="P2" cta-text="🚀 Demander un essai gratuit →" />
            </div>
        </div>
    </div></div>
</section>

{{-- FAQ --}}
<section class="section section-alt" id="faq">
    <div class="container">
        <div class="section-header anim"><span class="badge badge-p">FAQ</span><h2>Vos questions</h2></div>
        <div class="faq-list" x-data="faq">
            @foreach($faqItems as $index => $faqItem)
            <div class="faq-item" :class="isOpen({{ $index }}) && 'active'">
                <div class="faq-q" @click="toggle({{ $index }})">
                    <h3>{{ $faqItem['question'] }}</h3>
                    <div class="faq-icon">+</div>
                </div>
                <div class="faq-a"><div class="faq-a-inner">{{ $faqItem['answer'] }}</div></div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FINAL CTA --}}
<section class="final-cta">
    <div class="container anim">
        <h2>Prêt à digitaliser vos EDL ?</h2>
        <p>Rejoignez 200+ propriétaires. 1er EDL gratuit, sans engagement.</p>
        <a href="#formulaire" class="btn btn-p btn-lg">Demander un essai gratuit →</a>
    </div>
</section>

{{-- CHATBOT --}}
<div x-data="lp2Chatbot">
    <button class="cb-btn" @click="toggle()">
        💬<div class="notif" x-show="hasNotif" x-cloak>1</div>
    </button>
    <div class="cb-window" :class="isOpen && 'open'">
        <div class="cb-head">
            <div class="cb-head-content">
                <div class="cb-av">📱</div>
                <div>
                    <h4>Lucas — Support GEST'IMMO</h4>
                    <p class="status"><span class="online-dot"></span> En ligne</p>
                </div>
            </div>
            <button class="cb-close" @click="toggle()">✕</button>
        </div>
        <div class="cb-msgs">
            <template x-for="(msg, i) in messages" :key="i">
                <div>
                    <div x-show="msg.type === 'bot'" class="cb-msg bot" x-text="msg.text"></div>
                    <div x-show="msg.type === 'user'" class="cb-msg user" x-text="msg.text"></div>
                    <div x-show="msg.type === 'typing'" class="cb-msg typing"><div class="dots"><span></span><span></span><span></span></div></div>
                </div>
            </template>
        </div>
        <div class="cb-opts">
            <template x-for="(opt, i) in options" :key="i">
                <button class="cb-opt" x-text="opt.text" @click="selectOpt(opt)"></button>
            </template>
        </div>
        <div class="cb-input" x-show="showInput" x-cloak>
            <input type="text" placeholder="Votre message..." x-model="inputValue" @keydown.enter="sendMsg()">
            <button @click="sendMsg()">→</button>
        </div>
    </div>
</div>

@endsection
