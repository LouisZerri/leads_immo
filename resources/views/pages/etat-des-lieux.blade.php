@extends('layouts.lp')

@section('title', 'EDL externalisé pour agences immobilières | GEST\'IMMO Pro')
@section('meta_description', 'GEST\'IMMO réalise les états des lieux de votre agence en Île-de-France sous 48h. Conformité ALUR, photos HD horodatées, rapport PDF + version éditable. Tarifs pro à partir de 110€.')
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
            <span class="tagline">Pro — EDL externalisé</span>
        </a>
        <a href="#tarifs" class="btn btn-primary nav-cta">Voir les tarifs →</a>
    </div>
</nav>

{{-- HERO --}}
<section class="hero">
    <div class="container">
        <div class="hero-grid">
            <div>
                <div class="badge-mb"><span class="badge badge-blue">Réservé aux agences immobilières</span></div>
                <h1>Externalisez vos états des lieux. <em>Reprenez votre temps commercial.</em></h1>
                <p class="hero-sub">GEST'IMMO réalise vos EDL d'entrée et de sortie en Île-de-France sous 48h. Conformité loi ALUR, photos HD horodatées, rapport PDF + version éditable.</p>
                <div class="hero-hook">💡 <strong>Vos négociateurs passent 2h par EDL.</strong> Du temps qui ne signe aucun mandat. Et si vous récupériez ces heures ?</div>
                <div class="hero-cta">
                    <a href="#tarifs" class="btn btn-primary">Voir les tarifs pro →</a>
                    <a href="#calculateur" class="btn btn-outline">Calculer mes économies</a>
                </div>
                <div class="hero-trust">
                    <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg> Sans engagement</span>
                    <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg> Membre SNPI</span>
                    <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg> Intervention 48h</span>
                </div>
            </div>

            {{-- QUIZ --}}
            <div class="hero-quiz anim" x-data="lp1Quiz">
                <div class="quiz-header">
                    <h3>🎯 Combien votre agence économiserait avec GEST'IMMO ?</h3>
                    <p>3 questions — résultat immédiat</p>
                    <div class="quiz-progress"><div class="quiz-progress-bar" :style="{ width: progressWidth }"></div></div>
                </div>
                <div class="quiz-body">
                    <div x-show="step === 1">
                        <div class="quiz-question">Combien d'EDL réalise votre agence par mois ?</div>
                        <div class="quiz-options">
                            <div class="quiz-opt" @click="selectOption($el, 1, 5)"><div class="quiz-opt-radio"></div>1 à 5 EDL/mois</div>
                            <div class="quiz-opt" @click="selectOption($el, 1, 12)"><div class="quiz-opt-radio"></div>6 à 15 EDL/mois</div>
                            <div class="quiz-opt" @click="selectOption($el, 1, 25)"><div class="quiz-opt-radio"></div>16 à 30 EDL/mois</div>
                            <div class="quiz-opt" @click="selectOption($el, 1, 40)"><div class="quiz-opt-radio"></div>Plus de 30 EDL/mois</div>
                        </div>
                    </div>
                    <div x-show="step === 2" x-cloak>
                        <div class="quiz-question">Qui les réalise actuellement dans votre agence ?</div>
                        <div class="quiz-options">
                            <div class="quiz-opt" @click="selectOption($el, 2, 1)"><div class="quiz-opt-radio"></div>Le ou la gérante</div>
                            <div class="quiz-opt" @click="selectOption($el, 2, 1)"><div class="quiz-opt-radio"></div>Mes négociateurs commerciaux</div>
                            <div class="quiz-opt" @click="selectOption($el, 2, 1)"><div class="quiz-opt-radio"></div>Une assistante dédiée</div>
                            <div class="quiz-opt" @click="selectOption($el, 2, 1)"><div class="quiz-opt-radio"></div>Un prestataire externe</div>
                        </div>
                    </div>
                    <div x-show="step === 3" x-cloak>
                        <div class="quiz-question">Votre objectif principal ?</div>
                        <div class="quiz-options">
                            <div class="quiz-opt" @click="selectOption($el, 3, 1)"><div class="quiz-opt-radio"></div>Libérer du temps commercial</div>
                            <div class="quiz-opt" @click="selectOption($el, 3, 1)"><div class="quiz-opt-radio"></div>Réduire les litiges locatifs</div>
                            <div class="quiz-opt" @click="selectOption($el, 3, 1)"><div class="quiz-opt-radio"></div>Standardiser mes rapports</div>
                            <div class="quiz-opt" @click="selectOption($el, 3, 1)"><div class="quiz-opt-radio"></div>Sécuriser ma croissance</div>
                        </div>
                    </div>
                    <div x-show="step === 4" x-cloak>
                        <div class="quiz-result">
                            <div class="big" x-text="estimatedGain"></div>
                            <p>d'économies estimées par an pour votre agence</p>
                        </div>
                        <div class="text-center mt-16">
                            <a href="#formulaire" class="btn btn-primary quiz-result-cta">Recevoir mon analyse + grille tarifaire →</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- TRUST BAR --}}
<div class="trust-bar">
    <div class="container">
        <div class="trust-grid">
            <div class="trust-item">
                <div class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 22s-8-4.5-8-11.8A8 8 0 0112 2a8 8 0 018 8.2c0 7.3-8 11.8-8 11.8z"/><circle cx="12" cy="10" r="3"/></svg></div>
                <div class="label">Île-de-France</div>
                <div class="sub">Couverture 7j/7</div>
            </div>
            <div class="trust-item">
                <div class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
                <div class="label">48h chrono</div>
                <div class="sub">Délai garanti</div>
            </div>
            <div class="trust-item">
                <div class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div>
                <div class="label">Loi ALUR</div>
                <div class="sub">Conformité garantie</div>
            </div>
            <div class="trust-item">
                <div class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 11h-6"/><path d="M19 8v6"/></svg></div>
                <div class="label">Membre SNPI</div>
                <div class="sub">Réseau professionnel</div>
            </div>
        </div>
    </div>
</div>

{{-- PROBLEMS --}}
<section class="section section-alt" id="problemes">
    <div class="container">
        <div class="section-header anim"><span class="badge badge-blue">Le constat</span><h2>L'EDL en interne, c'est l'angle mort de votre rentabilité</h2><p>Vos négociateurs sont payés au mandat, pas à l'EDL. Chaque heure perdue sur le terrain est une signature qui ne se fait pas.</p></div>
        <div class="problems-grid">
            <div class="problem-card anim"><div class="problem-icon">⏰</div><h3>Temps commercial perdu</h3><p>2h par EDL entre déplacement, visite, rédaction et photos. Sur 15 EDL/mois, c'est 30h commerciales évaporées.</p><div class="problem-cost">→ Soit 1 négociateur en moins, à temps partiel</div></div>
            <div class="problem-card anim"><div class="problem-icon">⚖️</div><h3>Risque juridique permanent</h3><p>Un EDL bâclé ou non conforme ALUR = un litige garanti. Vos bailleurs vous tiennent pour responsables.</p><div class="problem-cost">→ Image agence + relation client en jeu</div></div>
            <div class="problem-card anim"><div class="problem-icon">📊</div><h3>Standardisation impossible</h3><p>Chaque négociateur fait à sa façon. Rapports inégaux, photos approximatives, qualité variable.</p><div class="problem-cost">→ Aucune montée en charge possible</div></div>
            <div class="problem-card anim"><div class="problem-icon">💸</div><h3>Recruter coûte trop cher</h3><p>Un opérateur EDL dédié = 4 000€ chargés/mois minimum. Plus formation, voiture, encadrement.</p><div class="problem-cost">→ ROI négatif sous 60 EDL/mois</div></div>
            <div class="problem-card anim"><div class="problem-icon">📈</div><h3>Croissance bridée</h3><p>Vous voulez plus de mandats de gestion mais les EDL freinent vos équipes. Sans externalisation, impossible de scaler.</p><div class="problem-cost">→ Plafond de verre commercial</div></div>
            <div class="problem-card anim"><div class="problem-icon">😓</div><h3>Vacances et arrêts maladie</h3><p>Quand votre référent EDL est absent, tout s'arrête. Les bailleurs s'impatientent.</p><div class="problem-cost">→ Perte de qualité de service</div></div>
        </div>
        <div class="text-center mt-32"><a href="#tarifs" class="btn btn-primary">Voir comment GEST'IMMO résout ça →</a></div>
    </div>
</section>

{{-- CALCULATOR --}}
<section class="calc-section scroll-anchor" id="calculateur" x-data="lp1Calculator">
    <div class="container">
        <div class="section-header anim"><span class="badge badge-gold">Simulateur</span><h2>Combien vous coûtent vos EDL en interne ?</h2><p>Réponse en 30 secondes — comparaison directe avec le coût GEST'IMMO</p></div>
        <div class="calc-card anim">
            <div class="calc-header"><h3>🧮 Simulateur d'économies pour votre agence</h3></div>
            <div class="calc-body">
                <div class="calc-slider-group"><label>Nombre d'EDL réalisés par mois <span x-text="edlPerMonth"></span></label><input type="range" class="calc-slider" min="1" max="80" x-model.number="edlPerMonth"></div>
                <div class="calc-slider-group"><label>Coût horaire chargé d'un négociateur <span x-text="formattedCost"></span></label><input type="range" class="calc-slider" min="25" max="150" step="5" x-model.number="hourlyCost"></div>
                <div class="calc-slider-group"><label>Temps moyen par EDL <span x-text="formattedTime"></span></label><input type="range" class="calc-slider" min="1" max="4" step="0.5" x-model.number="timePerEdl"></div>
                <div class="calc-result">
                    <div class="label">Économie annuelle estimée avec GEST'IMMO</div>
                    <div class="big" x-text="formattedSaving"></div>
                    <div class="vs">
                        <div>Coût interne actuel<span x-text="formattedInternal"></span></div>
                        <div>Avec GEST'IMMO<span x-text="formattedGestimmo"></span></div>
                    </div>
                </div>
                <div class="calc-cta"><a href="#tarifs" class="btn btn-primary">Voir les tarifs détaillés →</a></div>
            </div>
        </div>
    </div>
</section>

{{-- HOW IT WORKS --}}
<section class="section">
    <div class="container">
        <div class="section-header anim"><span class="badge badge-gold">Comment ça marche</span><h2>Vous gardez la relation client. Nous gérons le terrain.</h2><p>4 étapes, zéro complexité, votre marque préservée.</p></div>
        <div class="how-grid">
            <div class="how-step anim"><div class="num">1</div><h3>Vous transmettez</h3><p>Email ou espace pro. Adresse, contact locataire, date. 30 secondes chrono.</p></div>
            <div class="how-step anim"><div class="num">2</div><h3>RDV pris</h3><p>Notre opérateur contacte directement le locataire et fixe le créneau.</p></div>
            <div class="how-step anim"><div class="num">3</div><h3>Visite et constat</h3><p>EDL réalisé selon vos standards. Photos HD horodatées, relevés compteurs.</p></div>
            <div class="how-step anim"><div class="num">4</div><h3>Rapport sous 24h</h3><p>PDF signé + version éditable Word. Envoyé à vous, au locataire et au bailleur.</p></div>
        </div>
    </div>
</section>

{{-- PRICING --}}
<section class="section section-alt" id="tarifs" x-data="lp1BookingModal">
    <div class="container">
        <div class="section-header anim"><span class="badge badge-gold">Tarifs transparents</span><h2>Nos prestations EDL</h2><p>Tarifs HT par état des lieux — sans engagement, sans frais cachés, facturation mensuelle groupée.</p></div>
        <div class="pricing-grid">
            <div class="price-card anim">
                <div class="price-name">EDL Studio</div>
                <div class="price-amount">110 €<small> HT / EDL</small></div>
                <div class="price-desc">Studios et petites surfaces jusqu'à 30 m².</div>
                <ul class="price-features">
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>Conformité loi ALUR garantie</li>
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>Photos HD horodatées</li>
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>Rapport PDF + Word</li>
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>Délai 48h garanti</li>
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>Relevés compteurs inclus</li>
                </ul>
                <button type="button" class="btn btn-outline" @click="openModal('edl-studio')">Réserver</button>
            </div>
            <div class="price-card featured anim">
                <div class="price-badge">Le plus demandé</div>
                <div class="price-name">EDL T2</div>
                <div class="price-amount">125 €<small> HT / EDL</small></div>
                <div class="price-desc">Appartements 2 pièces, jusqu'à 50 m².</div>
                <ul class="price-features">
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>Conformité loi ALUR garantie</li>
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>Photos HD horodatées</li>
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>Rapport PDF + Word</li>
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg><strong>Délai 48h garanti</strong></li>
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>Relevés compteurs inclus</li>
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>Inventaire mobilier (si meublé)</li>
                </ul>
                <button type="button" class="btn btn-primary" @click="openModal('edl-t2')">Réserver</button>
            </div>
            <div class="price-card anim">
                <div class="price-name">EDL T3</div>
                <div class="price-amount">140 €<small> HT / EDL</small></div>
                <div class="price-desc">Appartements 3 pièces, jusqu'à 75 m².</div>
                <ul class="price-features">
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>Conformité loi ALUR garantie</li>
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>Photos HD horodatées</li>
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>Rapport PDF + Word</li>
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>Délai 48h garanti</li>
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>Relevés compteurs inclus</li>
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>Inventaire mobilier (si meublé)</li>
                </ul>
                <button type="button" class="btn btn-outline" @click="openModal('edl-t3')">Réserver</button>
            </div>
        </div>
        <div class="pricing-note anim">📌 <strong>T4 et plus, maisons, locaux commerciaux :</strong> tarifs sur devis. Facturation mensuelle groupée à 30 jours pour les agences partenaires.</div>
    </div>

    {{-- Modal de réservation --}}
    <div x-show="open" x-cloak class="modal-overlay" @click.self="close()">
        <div class="modal-card" @click.stop>
            <div class="modal-header">
                <h3>Réserver un EDL</h3>
                <button class="modal-close" @click="close()">✕</button>
            </div>
            <div class="modal-body">
                <template x-if="!success">
                    <div>
                        <div class="modal-edl-badge" x-text="edlLabel"></div>

                        <div class="modal-fg">
                            <label>Prénom *</label>
                            <input type="text" x-model="form.prenom" placeholder="Votre prénom">
                            <p x-show="errors.prenom" x-text="errors.prenom" class="error"></p>
                        </div>
                        <div class="modal-fg">
                            <label>Téléphone *</label>
                            <input type="tel" x-model="form.telephone" inputmode="tel" placeholder="06 00 00 00 00">
                            <p x-show="errors.telephone" x-text="errors.telephone" class="error"></p>
                        </div>
                        <div class="modal-fg">
                            <label>Email professionnel *</label>
                            <input type="email" x-model="form.email" inputmode="email" placeholder="vous@agence.fr">
                            <p x-show="errors.email" x-text="errors.email" class="error"></p>
                        </div>

                        <p x-show="errors.general" x-text="errors.general" class="modal-error"></p>

                        <button type="button" class="btn btn-primary" @click="submit()" :disabled="loading"
                            style="width:100%;padding:13px;font-size:.95rem">
                            <span x-show="!loading">Confirmer ma réservation →</span>
                            <span x-show="loading" x-cloak>Envoi en cours...</span>
                        </button>

                        <p class="modal-notice">🔒 Données protégées (RGPD) — Un conseiller vous recontacte sous 24h</p>
                    </div>
                </template>
                <template x-if="success">
                    <div class="modal-success">
                        <div class="icon">✅</div>
                        <h4>Réservation envoyée !</h4>
                        <p>Un conseiller GEST'IMMO vous recontacte sous 24h pour confirmer le créneau.</p>
                    </div>
                </template>
            </div>
        </div>
    </div>
</section>

{{-- BENEFITS --}}
<section class="section">
    <div class="container">
        <div class="section-header anim"><span class="badge badge-blue">Ce qui change</span><h2>Ce que GEST'IMMO change concrètement pour votre agence</h2></div>
        <div class="benefits-grid">
            <div class="benefit-card anim"><div class="benefit-icon">⏱️</div><h3>30h commerciales libérées/mois</h3><p>Sur la base de 15 EDL/mois. Vos négociateurs retournent à leur vrai métier : signer des mandats.</p></div>
            <div class="benefit-card anim"><div class="benefit-icon">📋</div><h3>Standardisation totale</h3><p>Tous vos EDL suivent le même process, avec la même qualité, quel que soit le volume.</p></div>
            <div class="benefit-card anim"><div class="benefit-icon">🛡️</div><h3>Risque juridique externalisé</h3><p>Conformité ALUR garantie sur chaque dossier. Responsabilité technique transférée.</p></div>
            <div class="benefit-card anim"><div class="benefit-icon">📈</div><h3>Scalabilité immédiate</h3><p>Passez de 5 à 50 EDL/mois sans recruter. Notre capacité s'adapte à votre volume.</p></div>
            <div class="benefit-card anim"><div class="benefit-icon">💼</div><h3>Aucune charge fixe</h3><p>Pas de salaire, pas de charges sociales, pas de voiture. Vous payez à l'usage.</p></div>
            <div class="benefit-card anim"><div class="benefit-icon">🎯</div><h3>Disponibilité garantie</h3><p>Pas d'arrêt maladie, pas de vacances qui bloquent vos sorties. Continuité de service.</p></div>
        </div>
    </div>
</section>

{{-- DIFFERENTIATION --}}
<section class="section section-alt">
    <div class="container">
        <div class="section-header anim"><span class="badge badge-blue">Comparatif</span><h2>Pourquoi GEST'IMMO et pas un freelance ?</h2></div>
        <div class="diff-wrap anim">
            <table class="diff-table">
                <thead><tr><th></th><th>Freelance EDL</th><th class="col-us">GEST'IMMO Pro</th></tr></thead>
                <tbody>
                    <tr><td>Disponibilité 7j/7</td><td class="no">Variable</td><td class="col-us yes">✓ Garantie</td></tr>
                    <tr><td>Continuité maladie / vacances</td><td class="no">Bloquée</td><td class="col-us yes">✓ Équipe de remplacement</td></tr>
                    <tr><td>Standardisation des rapports</td><td class="no">Variable</td><td class="col-us yes">✓ Charte unique</td></tr>
                    <tr><td>Carte professionnelle SNPI</td><td class="no">Rare</td><td class="col-us yes">✓ Membre agréé</td></tr>
                    <tr><td>Facturation entreprise mensuelle</td><td class="no">À l'acte</td><td class="col-us yes">✓ Groupée 30 jours</td></tr>
                    <tr><td>Contre-visite si litige</td><td class="no">Refacturée</td><td class="col-us yes">✓ Sur demande</td></tr>
                    <tr><td>Interlocuteur unique dédié</td><td class="no">Non</td><td class="col-us yes">✓ Oui</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

{{-- TESTIMONIAL PLACEHOLDER --}}
<section class="section">
    <div class="container">
        <div class="section-header anim"><span class="badge badge-gold">Notre engagement</span><h2>Transparence totale, dès le départ</h2></div>
        <div class="testi-placeholder anim">
            <h3>Un service en lancement, des références qui se construisent</h3>
            <p>GEST'IMMO Pro lance officiellement son offre EDL externalisée. Plutôt que d'afficher de faux témoignages, nous préférons vous proposer ce qui compte vraiment :</p>
            <div class="pledge">« Demandez une démonstration gratuite. Nous réalisons un EDL test sur l'un de vos biens, sans aucun engagement. Vous jugez sur pièce. »</div>
            <div class="text-center mt-24"><a href="#formulaire" class="btn btn-primary">Demander un EDL test gratuit →</a></div>
        </div>
    </div>
</section>

{{-- FORMULAIRE --}}
<section class="form-section scroll-anchor" id="formulaire">
    <div class="container">
        <div class="form-grid">
            <div class="form-left anim">
                <h2>Recevez votre grille tarifaire personnalisée</h2>
                <p>Réponse sous 24h ouvrées par email + un appel court pour comprendre votre besoin exact.</p>
                <div class="form-perks">
                    <div class="form-perk"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20"><polyline points="20 6 9 17 4 12"/></svg>Sans engagement, sans frais cachés</div>
                    <div class="form-perk"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20"><polyline points="20 6 9 17 4 12"/></svg>Réponse sous 24h ouvrées</div>
                    <div class="form-perk"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20"><polyline points="20 6 9 17 4 12"/></svg>Démonstration gratuite possible</div>
                    <div class="form-perk"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20"><polyline points="20 6 9 17 4 12"/></svg>Données protégées (RGPD)</div>
                    <div class="form-perk"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20"><polyline points="20 6 9 17 4 12"/></svg>Facturation mensuelle groupée</div>
                </div>
            </div>
            <div class="anim form-card-wrapper">
                <div class="form-card-header">
                    <h3>Demande de tarifs</h3>
                </div>
                <div id="lead-form" class="form-card-body">
                    <x-landing.lead-form page-source="P1" cta-text="Recevoir ma grille tarifaire →" />
                </div>
            </div>
        </div>
    </div>
</section>

{{-- FAQ --}}
<section class="section section-alt" id="faq">
    <div class="container">
        <div class="section-header anim"><span class="badge badge-blue">FAQ</span><h2>Vos questions les plus fréquentes</h2></div>
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
        <h2>Libérez vos commerciaux du fardeau des EDL</h2>
        <p>Réservez 15 minutes avec nous pour découvrir votre grille tarifaire personnalisée et chiffrer vos économies.</p>
        <a href="#formulaire" class="btn btn-primary btn-lg">Demander ma grille tarifaire →</a>
    </div>
</section>

{{-- CHATBOT --}}
<div x-data="lp1Chatbot">
    <button class="chatbot-btn" @click="toggle()">💬</button>
    <div class="chatbot-window" :class="isOpen && 'open'">
        <div class="cb-header">
            <div class="cb-header-content">
                <div class="cb-avatar">🏠</div>
                <div>
                    <h4>GEST'IMMO Pro</h4>
                    <p class="status">Réponse en quelques minutes</p>
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
