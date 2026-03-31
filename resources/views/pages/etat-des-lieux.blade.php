@extends('layouts.lp')

@section('title', 'Sous-traitez vos états des lieux à un expert | Conformité ALUR garantie')
@section('meta_description', 'Déléguez vos états des lieux d\'entrée et de sortie à un professionnel certifié. Rapports conformes, intervention sous 48h, zéro litige. Devis gratuit.')
@section('lp_css', 'lp1')
@section('body_class', 'lp lp1')
@section('theme', 'edl')

@section('schema_json_ld')
<script type="application/ld+json">{!! $schemaJsonLd !!}</script>
@endsection

@section('content')

{{-- NAV --}}
<nav class="lp-nav">
    <div class="container nav-inner">
        <a href="/" class="nav-logo">
            <span class="brand"><span class="brand-gest">GEST'</span><span class="brand-immo">IMMO</span></span>
            <span class="tagline">L'investissement en plus simple</span>
        </a>
        <a href="#formulaire" class="btn btn-primary nav-cta">Devis gratuit →</a>
    </div>
</nav>

{{-- HERO --}}
<section class="hero">
    <div class="container">
        <div class="hero-grid">
            <div>
                <div class="badge-mb"><span class="badge badge-gold">N°1 en France</span></div>
                <h1>Vos états des lieux réalisés par un expert. <div class="rotating-text"><span>Zéro litige.</span><span>Zéro stress.</span><span>Zéro perte.</span></div></h1>
                <p class="hero-sub">Rapports conformes ALUR, photos horodatées, intervention sous 48h partout en France.</p>
                <div class="hero-hook">⚠️ <strong>Chaque changement de locataire mal documenté vous coûte en moyenne 500 €</strong> de réparations non récupérées.</div>
                <div class="hero-cta">
                    <a href="#formulaire" class="btn btn-primary">📞 Être rappelé gratuitement</a>
                    <a href="#calculateur" class="btn btn-outline">🧮 Calculer mes pertes</a>
                </div>
                <div class="hero-trust">
                    <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg> Sans engagement</span>
                    <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg> Réponse en 24h</span>
                    <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg> 48h d'intervention</span>
                </div>
            </div>

            {{-- QUIZ --}}
            <div class="hero-quiz anim" x-data="lp1Quiz">
                <div class="quiz-header">
                    <h3>🎯 Combien perdez-vous chaque année ?</h3>
                    <p>Répondez en 30 secondes — Résultat immédiat</p>
                    <div class="quiz-progress"><div class="quiz-progress-bar" :style="{ width: progressWidth }"></div></div>
                </div>
                <div class="quiz-body">
                    <div x-show="step === 1">
                        <div class="quiz-question">Combien de lots gérez-vous ?</div>
                        <div class="quiz-options">
                            <div class="quiz-opt" @click="selectOption($el, 1)"><div class="quiz-opt-radio"></div>1 à 5 lots</div>
                            <div class="quiz-opt" @click="selectOption($el, 1)"><div class="quiz-opt-radio"></div>6 à 20 lots</div>
                            <div class="quiz-opt" @click="selectOption($el, 1)"><div class="quiz-opt-radio"></div>21 à 50 lots</div>
                            <div class="quiz-opt" @click="selectOption($el, 1)"><div class="quiz-opt-radio"></div>Plus de 50 lots</div>
                        </div>
                    </div>
                    <div x-show="step === 2" x-cloak>
                        <div class="quiz-question">Vos états des lieux sont réalisés par :</div>
                        <div class="quiz-options">
                            <div class="quiz-opt" @click="selectOption($el, 2)"><div class="quiz-opt-radio"></div>Moi-même</div>
                            <div class="quiz-opt" @click="selectOption($el, 2)"><div class="quiz-opt-radio"></div>Un collaborateur non formé</div>
                            <div class="quiz-opt" @click="selectOption($el, 2)"><div class="quiz-opt-radio"></div>Un huissier (parfois)</div>
                            <div class="quiz-opt" @click="selectOption($el, 2)"><div class="quiz-opt-radio"></div>Un prestataire externe</div>
                        </div>
                    </div>
                    <div x-show="step === 3" x-cloak>
                        <div class="quiz-question">Avez-vous déjà perdu une retenue sur caution faute de preuves ?</div>
                        <div class="quiz-options">
                            <div class="quiz-opt" @click="selectOption($el, 3)"><div class="quiz-opt-radio"></div>Oui, plusieurs fois</div>
                            <div class="quiz-opt" @click="selectOption($el, 3)"><div class="quiz-opt-radio"></div>Oui, une fois</div>
                            <div class="quiz-opt" @click="selectOption($el, 3)"><div class="quiz-opt-radio"></div>Non, mais j'ai eu peur</div>
                            <div class="quiz-opt" @click="selectOption($el, 3)"><div class="quiz-opt-radio"></div>Non, jamais</div>
                        </div>
                    </div>
                    <div x-show="step === 4" x-cloak>
                        <div class="quiz-result">
                            <div class="big" x-text="estimatedLoss"></div>
                            <p>de pertes estimées en retenues non récupérées</p>
                        </div>
                        <div class="text-center mt-16">
                            <a href="#formulaire" class="btn btn-primary quiz-result-cta">Recevoir mon analyse + devis gratuit →</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- HOOKS CAROUSEL --}}
<div class="hooks-section">
    <div class="hooks-track">
        <div class="hook-card"><span class="hook-tag fear">Peur de perte</span><p>Chaque changement de locataire mal documenté vous coûte <strong>~500 €</strong>. Sur 10 lots avec 30% de rotation : <strong>750 € perdus par location.</strong></p></div>
        <div class="hook-card"><span class="hook-tag money">Gain financier</span><p>Nos clients récupèrent <strong>3× plus</strong> de retenues sur caution grâce à nos rapports détaillés et opposables.</p></div>
        <div class="hook-card"><span class="hook-tag time">Gain de temps</span><p>Un EDL vous prend <strong>2h</strong> ? Notre expert le fait en <strong>45 min</strong>, rapport complet inclus. 15h libérées par mois.</p></div>
        <div class="hook-card"><span class="hook-tag proof">Preuve sociale</span><p><strong>98% de nos clients</strong> nous recommandent. 850+ agences et propriétaires nous font confiance en France.</p></div>
        <div class="hook-card"><span class="hook-tag auth">Autorité</span><p><strong>200+ états des lieux réalisés</strong> pour 850 professionnels. Conformité ALUR à 100%. Zéro litige perdu.</p></div>
        <div class="hook-card"><span class="hook-tag fear">Conformité</span><p><strong>94% des litiges locatifs</strong> sont dus à un EDL incomplet. Le vôtre est-il aux normes ?</p></div>
        <div class="hook-card"><span class="hook-tag money">Comparaison</span><p><strong>3× moins cher qu'un huissier</strong>, des délais 2× plus courts, et la même valeur probante.</p></div>
        <div class="hook-card"><span class="hook-tag time">Simplicité</span><p>Vous réservez en ligne, on intervient sous <strong>48h</strong>. Rapport livré en 24h. <strong>Zéro logistique</strong> de votre côté.</p></div>
        {{-- Duplicates pour boucle infinie --}}
        <div class="hook-card"><span class="hook-tag fear">Peur de perte</span><p>Chaque changement de locataire mal documenté coûte <strong>~500 €</strong>. Sur 10 lots : <strong>~750 € perdus par location.</strong></p></div>
        <div class="hook-card"><span class="hook-tag money">Gain financier</span><p>Nos clients récupèrent <strong>3× plus</strong> de retenues sur caution grâce à nos rapports détaillés et opposables.</p></div>
        <div class="hook-card"><span class="hook-tag time">Gain de temps</span><p>Un EDL vous prend <strong>2h</strong> ? Notre expert le fait en <strong>45 min</strong>, rapport complet inclus.</p></div>
        <div class="hook-card"><span class="hook-tag proof">Preuve sociale</span><p><strong>98% de nos clients</strong> nous recommandent. 850+ agences nous font confiance.</p></div>
    </div>
</div>

{{-- PROOF BAR --}}
<div class="proof-bar">
    <div class="container">
        <div class="proof-stats">
            <div class="proof-stat"><div class="proof-val"><span class="counter" data-target="200">0</span>+</div><div class="proof-label">EDL réalisés</div></div>
            <div class="proof-stat"><div class="proof-val"><span class="counter" data-target="850">0</span>+</div><div class="proof-label">Clients actifs</div></div>
            <div class="proof-stat"><div class="proof-val"><span class="counter" data-target="98">0</span>%</div><div class="proof-label">Satisfaction</div></div>
            <div class="proof-stat"><div class="proof-val">-<span class="counter" data-target="78">0</span>%</div><div class="proof-label">Contestations</div></div>
        </div>
    </div>
</div>

{{-- PROBLEMS --}}
<section class="section" id="problemes">
    <div class="container">
        <div class="section-header anim"><span class="badge badge-blue">Le constat</span><h2>Vous perdez de l'argent à chaque changement de locataire</h2><p>Et la plupart des propriétaires ne s'en rendent même pas compte.</p></div>
        <div class="problems-grid">
            <div class="problem-card anim"><div class="problem-icon">📝</div><h3>Rapports contestés</h3><p>94% des litiges sont dus à un EDL insuffisant. Sans preuves solides, le tribunal tranche contre vous.</p><div class="problem-cost">→ Perte moyenne : 800 € par litige</div></div>
            <div class="problem-card anim"><div class="problem-icon">⏰</div><h3>Temps gaspillé</h3><p>2h par EDL entre déplacement et rédaction. Sur 20 lots : presque un mi-temps dédié.</p><div class="problem-cost">→ 15h perdues par mois</div></div>
            <div class="problem-card anim"><div class="problem-icon">💸</div><h3>Caution rendue à tort</h3><p>Sans photos horodatées, vous restituez intégralement. Un seul EDL mal fait = 500 à 3 000 € perdus.</p><div class="problem-cost">→ Jusqu'à 3 000 € par sortie</div></div>
            <div class="problem-card anim"><div class="problem-icon">⚖️</div><h3>Risque juridique</h3><p>Un EDL non conforme ALUR est rejeté en justice. Vous pensez être protégé, mais votre document est inutile.</p><div class="problem-cost">→ Frais juridiques : 1 500 €+</div></div>
            <div class="problem-card anim"><div class="problem-icon">📈</div><h3>Croissance bloquée</h3><p>Vous voulez plus de lots mais les EDL vous accaparent. Sans externalisation, impossible de scaler.</p><div class="problem-cost">→ Opportunités manquées</div></div>
            <div class="problem-card anim"><div class="problem-icon">🔓</div><h3>Aucune preuve valide</h3><p>Votre parole contre celle du locataire. Sans documentation photographique, vous perdez quasi systématiquement.</p><div class="problem-cost">→ 95% de victoire locataire</div></div>
        </div>
        <div class="amplify anim"><p>💡 <strong>Multipliez ces pertes par vos rotations annuelles.</strong> Un propriétaire de 20 lots perd en moyenne <strong>750 € par changement de locataire</strong> en retenues non récupérées.</p></div>
        <div class="text-center mt-28"><a href="#formulaire" class="btn btn-primary">Arrêter de perdre de l'argent →</a></div>
    </div>
</section>

{{-- CALCULATOR --}}
<section class="calc-section scroll-anchor" id="calculateur" x-data="lp1Calculator">
    <div class="container">
        <div class="section-header anim"><span class="badge badge-gold">Simulateur</span><h2>Calculez combien vous perdez chaque année</h2></div>
        <div class="calc-card anim">
            <div class="calc-header"><h3>🧮 Simulateur de pertes — Résultat instantané</h3></div>
            <div class="calc-body">
                <div class="calc-slider-group"><label>Nombre de lots gérés <span x-text="lots"></span></label><input type="range" class="calc-slider" min="1" max="100" x-model.number="lots"></div>
                <div class="calc-slider-group"><label>Taux de rotation annuel <span x-text="rotation + '%'"></span></label><input type="range" class="calc-slider" min="5" max="80" x-model.number="rotation"></div>
                <div class="calc-slider-group"><label>Perte moyenne par EDL mal fait <span x-text="formattedLossVal"></span></label><input type="range" class="calc-slider" min="100" max="2000" step="50" x-model.number="lossPerEdl"></div>
                <div class="calc-result"><div class="big" x-text="formattedLoss"></div><div class="sub">de pertes évitables par changement de locataire</div></div>
                <div class="calc-cta"><a href="#formulaire" class="btn btn-primary">Récupérer cet argent →</a></div>
            </div>
        </div>
    </div>
</section>

{{-- SOLUTION --}}
<section class="section section-alt" id="solution">
    <div class="container">
        <div class="section-header anim"><span class="badge badge-gold">La solution</span><h2>Un réseau national d'experts certifiés à votre service</h2></div>
        <div class="solution-grid">
            <div class="steps anim">
                <div class="step"><div class="step-num">1</div><div><h3>Vous réservez en ligne</h3><p>Choisissez votre créneau en 2 clics. Adresse, type de bien, c'est tout.</p></div></div>
                <div class="step"><div class="step-num">2</div><div><h3>Notre expert intervient sous 48h</h3><p>Professionnel formé et équipé, tablette, photos HD, relevés complets.</p></div></div>
                <div class="step"><div class="step-num">3</div><div><h3>Vous recevez le rapport en 24h</h3><p>PDF avec photos horodatées, comparatif entrée/sortie automatique, conforme ALUR.</p></div></div>
                <div class="mt-16">
                    <div class="diff-item"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg><strong>vs. Faire soi-même :</strong> gain de temps, zéro risque juridique</div>
                    <div class="diff-item"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg><strong>vs. Huissier :</strong> 3× moins cher, délais plus courts</div>
                    <div class="diff-item"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg><strong>vs. Autres :</strong> couverture nationale, comparatif automatique</div>
                </div>
            </div>
            <div class="anim solution-sidebar">
                <div class="solution-card"><div class="icon">🛡️</div><h3>Conformité ALUR à 100%</h3><p>Décret du 30 mars 2016 respecté intégralement. Opposable en cas de litige.</p></div>
                <div class="solution-card"><div class="icon">📱</div><h3>Espace en ligne dédié</h3><p>Suivez, archivez et partagez tous vos rapports depuis votre interface.</p></div>
            </div>
        </div>
    </div>
</section>

{{-- BENEFITS --}}
<section class="section">
    <div class="container">
        <div class="section-header anim"><span class="badge badge-blue">Résultats</span><h2>Ce qui change quand vous déléguez</h2></div>
        <div class="benefits-grid">
            <div class="benefit-card anim"><div class="benefit-icon">💰</div><h3>3× plus de retenues récupérées</h3><p>Rapports détaillés et opposables. Chaque euro de dégradation est documenté.</p></div>
            <div class="benefit-card anim"><div class="benefit-icon">⏱️</div><h3>15h libérées par mois</h3><p>Fini les déplacements. Concentrez-vous sur ce qui compte vraiment.</p></div>
            <div class="benefit-card anim"><div class="benefit-icon">🛡️</div><h3>95% de contestations éliminées</h3><p>Photos horodatées et géolocalisées. Plus aucune discussion possible.</p></div>
            <div class="benefit-card anim"><div class="benefit-icon">📈</div><h3>Scalez sans recruter</h3><p>10, 50 ou 200 lots, notre réseau s'adapte à votre volume.</p></div>
            <div class="benefit-card anim"><div class="benefit-icon">⚡</div><h3>Rapports livrés en 24h</h3><p>PDF complet disponible le lendemain sur votre espace en ligne.</p></div>
            <div class="benefit-card anim"><div class="benefit-icon">🏠</div><h3>Patrimoine protégé</h3><p>Documentation juridiquement solide à chaque changement de locataire.</p></div>
        </div>
        <div class="text-center mt-32"><a href="#formulaire" class="btn btn-primary">Déléguer mes états des lieux →</a></div>
    </div>
</section>

{{-- TESTIMONIALS --}}
<section class="section section-cream" id="temoignages">
    <div class="container">
        <div class="section-header anim"><span class="badge badge-gold">Ils nous font confiance</span><h2>850+ professionnels ont transformé leur gestion</h2></div>
        <div class="testi-grid">
            @foreach($reviews as $review)
            <div class="testi-card anim">
                <div class="testi-stars">★★★★★</div>
                <p class="testi-quote">« {{ $review['text'] }} »</p>
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
        <div class="text-center mt-28"><a href="#formulaire" class="btn btn-gold">Rejoindre nos 850 clients satisfaits →</a></div>
    </div>
</section>

{{-- LEAD MAGNETS --}}
<section class="section" id="ressources">
    <div class="container">
        <div class="section-header anim"><span class="badge badge-blue">Gratuit</span><h2>Téléchargez nos outils pour sécuriser vos locations</h2></div>
        <div class="magnets-grid">
            <div class="magnet-card anim"><div class="magnet-icon">📕</div><h3>7 erreurs qui font perdre votre caution</h3><p>Le guide PDF indispensable</p></div>
            <div class="magnet-card anim"><div class="magnet-icon">✅</div><h3>52 points de contrôle ALUR</h3><p>La checklist complète</p></div>
            <div class="magnet-card anim"><div class="magnet-icon">📄</div><h3>Modèle mise en demeure</h3><p>Lettre prête à envoyer</p></div>
            <div class="magnet-card anim"><div class="magnet-icon">🔍</div><h3>Audit gratuit de votre EDL</h3><p>On analyse votre dernier rapport</p></div>
            <div class="magnet-card anim"><a href="#calculateur" class="magnet-icon">🧮</a><h3>Simulateur de pertes</h3><p>Calculez vos pertes annuelles</p></div>
            <div class="magnet-card anim"><div class="magnet-icon">📄</div><h3>Réclamation dégradations</h3><p>Modèle de lettre officielle</p></div>
        </div>
    </div>
</section>

{{-- FORMULAIRE --}}
<section class="form-section scroll-anchor" id="formulaire">
    <div class="container">
        <div class="form-grid">
            <div class="form-left anim">
                <h2>Recevez votre devis personnalisé en 24h</h2>
                <p>Un conseiller expert vous recontacte gratuitement pour étudier vos besoins.</p>
                <div class="form-perks">
                    <div class="form-perk"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>100% gratuit et sans engagement</div>
                    <div class="form-perk"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>Rappel sous 24h par un expert</div>
                    <div class="form-perk"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>Données confidentielles</div>
                    <div class="form-perk"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>Garantie satisfaction ou refait</div>
                    <div class="form-perk"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>850+ professionnels convaincus</div>
                </div>
            </div>
            <div class="anim form-card-wrapper">
                <div class="form-card-header">
                    <h3>🎯 Être rappelé gratuitement</h3>
                </div>
                <div id="lead-form" class="form-card-body">
                    <x-landing.lead-form page-source="P1" cta-text="📞 Être rappelé sous 24h →" />
                </div>
            </div>
        </div>
    </div>
</section>

{{-- FAQ --}}
<section class="section section-alt" id="faq">
    <div class="container">
        <div class="section-header anim"><span class="badge badge-blue">FAQ</span><h2>Vos questions fréquentes</h2></div>
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
        <h2>Prêt à protéger votre patrimoine ?</h2>
        <p>850+ professionnels ont sécurisé leurs états des lieux. Devis gratuit, sans engagement, réponse sous 24h.</p>
        <a href="#formulaire" class="btn btn-primary btn-lg">Obtenir mon devis gratuit →</a>
    </div>
</section>

{{-- CHATBOT --}}
<div x-data="lp1Chatbot">
    <button class="chatbot-btn" @click="toggle()">
        💬<div class="notif" x-show="hasNotif" x-cloak>1</div>
    </button>
    <div class="chatbot-window" :class="isOpen && 'open'">
        <div class="cb-header">
            <div class="cb-header-content">
                <div class="cb-avatar">🏠</div>
                <div>
                    <h4>Sarah — Conseillère GEST'IMMO</h4>
                    <p class="status"><span class="online-dot"></span>En ligne</p>
                </div>
            </div>
            <button class="cb-close" @click="toggle()">✕</button>
        </div>
        <div class="cb-messages">
            <template x-for="(msg, i) in messages" :key="i">
                <div>
                    <div x-show="msg.type === 'bot'" class="cb-msg bot" x-text="msg.text"></div>
                    <div x-show="msg.type === 'user'" class="cb-msg user" x-text="msg.text"></div>
                    <div x-show="msg.type === 'typing'" class="cb-msg typing"><div class="dots"><span></span><span></span><span></span></div></div>
                </div>
            </template>
        </div>
        <div class="cb-options">
            <template x-for="(opt, i) in options" :key="i">
                <button class="cb-opt" x-text="opt.text" @click="selectOpt(opt)"></button>
            </template>
        </div>
        <div class="cb-input-bar" x-show="showInput" x-cloak>
            <input type="text" placeholder="Votre email ou téléphone..." x-model="inputValue" @keydown.enter="sendMsg()">
            <button @click="sendMsg()">→</button>
        </div>
    </div>
</div>

@endsection
