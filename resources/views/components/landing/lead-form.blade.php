@props([
    'pageSource',
    'ctaText' => 'Être rappelé gratuitement',
])

<div
    x-data="leadForm"
    data-page-source="{{ $pageSource }}"
    data-action="{{ route('lead.store') }}"
>
    {{-- Honeypot anti-spam --}}
    <div class="absolute -left-[9999px]" aria-hidden="true">
        <input type="text" x-model="form.website" tabindex="-1" autocomplete="off">
    </div>

    {{-- Barre de progression --}}
    <div class="flex items-center gap-2 mb-6">
        <div class="flex items-center gap-1">
            <span
                class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold text-blanc"
                style="background-color: var(--color-primary)"
            >1</span>
            <span class="text-sm font-medium text-texte">Votre besoin</span>
        </div>
        <div class="flex-1 h-0.5 bg-gray-200 overflow-hidden">
            <div
                class="h-full transition-all duration-300"
                style="background-color: var(--color-primary)"
                :style="{ width: step === 2 ? '100%' : '0%' }"
            ></div>
        </div>
        <div class="flex items-center gap-1">
            <span
                class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold transition-colors"
                :class="step === 2 ? 'text-blanc' : 'bg-gray-200 text-texte-light'"
                :style="step === 2 ? 'background-color: var(--color-primary)' : ''"
            >2</span>
            <span class="text-sm" :class="step === 2 ? 'font-medium text-texte' : 'text-texte-light'">Vos coordonnées</span>
        </div>
    </div>

    {{-- Étape 1 --}}
    <div x-show="step === 1 && !success" class="space-y-4">
        @if(in_array($pageSource, ['P1', 'P2', 'P3']))
            <div>
                <label for="code_postal" class="block text-sm font-medium text-texte mb-1">Code postal</label>
                <input
                    type="text"
                    id="code_postal"
                    x-model="form.code_postal"
                    maxlength="5"
                    inputmode="numeric"
                    placeholder="Ex: 33100"
                    class="w-full px-4 py-3 rounded-lg outline-none transition text-gray-900 placeholder-gray-400 bg-white"
                    :style="fieldStyle('code_postal')"
                >
                <p x-show="errors.code_postal" x-text="errors.code_postal" class="mt-1 text-sm text-rouge"></p>
            </div>
        @endif

        @if($pageSource === 'P1')
            <div>
                <label for="selection" class="block text-sm font-medium text-texte mb-1">Type de logement</label>
                <select
                    id="selection"
                    x-model="form.selection"
                    class="w-full px-4 py-3 rounded-lg outline-none transition text-gray-900 placeholder-gray-400 bg-white"
                    :style="fieldStyle('selection')"
                >
                    <option value="">Sélectionnez...</option>
                    <option value="studio">Studio</option>
                    <option value="t2">T2</option>
                    <option value="t3">T3</option>
                    <option value="t4+">T4+</option>
                    <option value="maison">Maison</option>
                </select>
                <p x-show="errors.selection" x-text="errors.selection" class="mt-1 text-sm text-rouge"></p>
            </div>
        @endif

        @if($pageSource === 'P2')
            <div>
                <label for="selection" class="block text-sm font-medium text-texte mb-1">Vous êtes</label>
                <select
                    id="selection"
                    x-model="form.selection"
                    class="w-full px-4 py-3 rounded-lg outline-none transition text-gray-900 placeholder-gray-400 bg-white"
                    :style="fieldStyle('selection')"
                >
                    <option value="">Sélectionnez...</option>
                    <option value="proprietaire">Propriétaire particulier</option>
                    <option value="agence">Agence immobilière</option>
                    <option value="gestionnaire">Gestionnaire indépendant</option>
                    <option value="sci">SCI / Investisseur</option>
                </select>
                <p x-show="errors.selection" x-text="errors.selection" class="mt-1 text-sm text-rouge"></p>
            </div>
        @endif

        @if(in_array($pageSource, ['P3', 'P4']))
            <div>
                <label for="budget_investissement" class="block text-sm font-medium text-texte mb-1">Budget d'investissement</label>
                <select
                    id="budget_investissement"
                    x-model="form.budget_investissement"
                    class="w-full px-4 py-3 rounded-lg outline-none transition text-gray-900 placeholder-gray-400 bg-white"
                    :style="fieldStyle('budget_investissement')"
                >
                    <option value="">Sélectionnez...</option>
                    <option value="< 100k">Moins de 100 000 €</option>
                    <option value="100-200k">100 000 € à 200 000 €</option>
                    <option value="200-300k">200 000 € à 300 000 €</option>
                    <option value="300k+">Plus de 300 000 €</option>
                </select>
                <p x-show="errors.budget_investissement" x-text="errors.budget_investissement" class="mt-1 text-sm text-rouge"></p>
            </div>
        @endif

        <button
            type="button"
            @click="nextStep()"
            class="w-full py-3 px-6 bg-or hover:bg-or-dark text-blanc font-bold rounded-lg transition duration-200 text-lg cursor-pointer"
        >
            Continuer →
        </button>
    </div>

    {{-- Étape 2 --}}
    <div x-show="step === 2 && !success" x-cloak class="space-y-4">
        <div>
            <label for="prenom" class="block text-sm font-medium text-texte mb-1">Prénom</label>
            <input
                type="text"
                id="prenom"
                x-model="form.prenom"
                placeholder="Votre prénom"
                class="w-full px-4 py-3 rounded-lg outline-none transition text-gray-900 placeholder-gray-400 bg-white"
                :style="fieldStyle('prenom')"
            >
            <p x-show="errors.prenom" x-text="errors.prenom" class="mt-1 text-sm text-rouge"></p>
        </div>
        <div>
            <label for="telephone" class="block text-sm font-medium text-texte mb-1">Téléphone</label>
            <input
                type="tel"
                id="telephone"
                x-model="form.telephone"
                inputmode="tel"
                placeholder="06 00 00 00 00"
                class="w-full px-4 py-3 rounded-lg outline-none transition text-gray-900 placeholder-gray-400 bg-white"
                :style="fieldStyle('telephone')"
            >
            <p x-show="errors.telephone" x-text="errors.telephone" class="mt-1 text-sm text-rouge"></p>
        </div>
        <div>
            <label for="email" class="block text-sm font-medium text-texte mb-1">Email</label>
            <input
                type="email"
                id="email"
                x-model="form.email"
                inputmode="email"
                placeholder="votre@email.fr"
                class="w-full px-4 py-3 rounded-lg outline-none transition text-gray-900 placeholder-gray-400 bg-white"
                :style="fieldStyle('email')"
            >
            <p x-show="errors.email" x-text="errors.email" class="mt-1 text-sm text-rouge"></p>
        </div>
        <div class="flex items-start gap-2">
            <input
                type="checkbox"
                id="consentement_rgpd"
                x-model="form.consentement_rgpd"
                class="mt-1 h-4 w-4 rounded border-gray-300"
            >
            <label for="consentement_rgpd" class="text-xs text-texte-light">
                J'accepte que mes données soient traitées dans le cadre de ma demande.
                <a href="https://www.gestimmo-france.fr/confidentialite" target="_blank" rel="noopener" class="underline hover:opacity-80" style="color: var(--color-primary)">Politique de confidentialité</a>
            </label>
        </div>
        <p x-show="errors.consentement_rgpd" x-text="errors.consentement_rgpd" class="text-sm text-rouge"></p>
        <p x-show="errors.general" x-text="errors.general" class="text-sm text-rouge text-center"></p>

        <p style="font-size: 10px; color: #999; line-height: 1.4;">
            Ce site est protégé par reCAPTCHA. <a href="https://policies.google.com/privacy" target="_blank" rel="noopener" style="text-decoration: underline;">Confidentialité</a> et <a href="https://policies.google.com/terms" target="_blank" rel="noopener" style="text-decoration: underline;">Conditions</a> de Google.
        </p>

        <div class="flex gap-3">
            <button
                type="button"
                @click="prevStep()"
                class="py-3 px-6 bg-gray-100 hover:bg-gray-200 text-texte font-medium rounded-lg transition duration-200 cursor-pointer"
            >
                ← Retour
            </button>
            <button
                type="button"
                @click="submit()"
                :disabled="loading"
                class="flex-1 py-3 px-6 bg-or hover:bg-or-dark text-blanc font-bold rounded-lg transition duration-200 text-lg cursor-pointer disabled:opacity-50"
            >
                <span x-show="!loading">{{ $ctaText }}</span>
                <span x-show="loading" x-cloak>Envoi en cours...</span>
            </button>
        </div>
    </div>

    {{-- Succès --}}
    <div x-show="success" x-cloak class="text-center py-6">
        <div class="w-16 h-16 bg-vert-valid/10 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-8 h-8 text-vert-valid" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
        </div>
        <h3 class="text-xl font-bold text-texte mb-2">Demande envoyée !</h3>
        <p class="text-texte-light">Nous vous recontactons sous 24h.</p>
    </div>
</div>
