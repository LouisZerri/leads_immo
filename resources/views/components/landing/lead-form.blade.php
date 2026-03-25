@props([
    'pageSource',
    'ctaText' => 'Être rappelé gratuitement',
    'themeColor' => 'bleu-marine',
])

<form
    id="lead-form"
    data-page-source="{{ $pageSource }}"
    data-action="{{ route('lead.store') }}"
    class="space-y-4"
    novalidate
>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    {{-- Honeypot anti-spam --}}
    <div class="absolute -left-[9999px]" aria-hidden="true">
        <input type="text" name="website" tabindex="-1" autocomplete="off">
    </div>

    {{-- UTM cachés --}}
    <input type="hidden" name="utm_source" value="">
    <input type="hidden" name="utm_medium" value="">
    <input type="hidden" name="utm_campaign" value="">
    <input type="hidden" name="utm_term" value="">
    <input type="hidden" name="utm_content" value="">

    {{-- Barre de progression --}}
    <div class="flex items-center gap-2 mb-4">
        <div class="flex items-center gap-1">
            <span id="step-indicator-1" class="w-8 h-8 rounded-full bg-{{ $themeColor }} text-blanc flex items-center justify-center text-sm font-bold">1</span>
            <span class="text-sm font-medium text-texte">Votre besoin</span>
        </div>
        <div class="flex-1 h-0.5 bg-gray-200">
            <div id="progress-bar" class="h-full bg-{{ $themeColor }} transition-all duration-300" style="width: 0%"></div>
        </div>
        <div class="flex items-center gap-1">
            <span id="step-indicator-2" class="w-8 h-8 rounded-full bg-gray-200 text-texte-light flex items-center justify-center text-sm font-bold">2</span>
            <span class="text-sm text-texte-light">Vos coordonnées</span>
        </div>
    </div>

    {{-- Étape 1 --}}
    <div id="form-step-1" class="space-y-4">
        @if(in_array($pageSource, ['P1', 'P2']))
            <div>
                <label for="code_postal" class="block text-sm font-medium text-texte mb-1">Code postal</label>
                <input
                    type="text"
                    id="code_postal"
                    name="code_postal"
                    maxlength="5"
                    pattern="[0-9]{5}"
                    inputmode="numeric"
                    placeholder="Ex: 33100"
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-{{ $themeColor }} focus:border-transparent outline-none transition"
                >
                <p class="mt-1 text-sm text-rouge hidden" id="error-code_postal"></p>
            </div>
            <div>
                <label for="type_logement" class="block text-sm font-medium text-texte mb-1">Type de logement</label>
                <select
                    id="type_logement"
                    name="type_logement"
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-{{ $themeColor }} focus:border-transparent outline-none transition"
                >
                    <option value="">Sélectionnez...</option>
                    <option value="studio">Studio</option>
                    <option value="t2">T2</option>
                    <option value="t3">T3</option>
                    <option value="t4+">T4+</option>
                    <option value="maison">Maison</option>
                </select>
                <p class="mt-1 text-sm text-rouge hidden" id="error-type_logement"></p>
            </div>
        @endif

        @if(in_array($pageSource, ['P3']))
            <div>
                <label for="code_postal" class="block text-sm font-medium text-texte mb-1">Code postal</label>
                <input
                    type="text"
                    id="code_postal"
                    name="code_postal"
                    maxlength="5"
                    pattern="[0-9]{5}"
                    inputmode="numeric"
                    placeholder="Ex: 33100"
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-{{ $themeColor }} focus:border-transparent outline-none transition"
                >
                <p class="mt-1 text-sm text-rouge hidden" id="error-code_postal"></p>
            </div>
            <div>
                <label for="budget_investissement" class="block text-sm font-medium text-texte mb-1">Budget d'investissement</label>
                <select
                    id="budget_investissement"
                    name="budget_investissement"
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-{{ $themeColor }} focus:border-transparent outline-none transition"
                >
                    <option value="">Sélectionnez...</option>
                    <option value="< 100k">Moins de 100 000 €</option>
                    <option value="100-200k">100 000 € à 200 000 €</option>
                    <option value="200-300k">200 000 € à 300 000 €</option>
                    <option value="300k+">Plus de 300 000 €</option>
                </select>
                <p class="mt-1 text-sm text-rouge hidden" id="error-budget_investissement"></p>
            </div>
        @endif

        @if(in_array($pageSource, ['P4']))
            <div>
                <label for="budget_investissement" class="block text-sm font-medium text-texte mb-1">Budget d'investissement</label>
                <select
                    id="budget_investissement"
                    name="budget_investissement"
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-{{ $themeColor }} focus:border-transparent outline-none transition"
                >
                    <option value="">Sélectionnez...</option>
                    <option value="< 100k">Moins de 100 000 €</option>
                    <option value="100-200k">100 000 € à 200 000 €</option>
                    <option value="200-300k">200 000 € à 300 000 €</option>
                    <option value="300k+">Plus de 300 000 €</option>
                </select>
                <p class="mt-1 text-sm text-rouge hidden" id="error-budget_investissement"></p>
            </div>
        @endif

        <button
            type="button"
            id="btn-next-step"
            class="w-full py-3 px-6 bg-or hover:bg-or-dark text-blanc font-bold rounded-lg transition duration-200 text-lg cursor-pointer"
        >
            Continuer →
        </button>
    </div>

    {{-- Étape 2 --}}
    <div id="form-step-2" class="space-y-4 hidden">
        <div>
            <label for="prenom" class="block text-sm font-medium text-texte mb-1">Prénom</label>
            <input
                type="text"
                id="prenom"
                name="prenom"
                required
                placeholder="Votre prénom"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-{{ $themeColor }} focus:border-transparent outline-none transition"
            >
            <p class="mt-1 text-sm text-rouge hidden" id="error-prenom"></p>
        </div>
        <div>
            <label for="telephone" class="block text-sm font-medium text-texte mb-1">Téléphone</label>
            <input
                type="tel"
                id="telephone"
                name="telephone"
                required
                inputmode="tel"
                placeholder="06 00 00 00 00"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-{{ $themeColor }} focus:border-transparent outline-none transition"
            >
            <p class="mt-1 text-sm text-rouge hidden" id="error-telephone"></p>
        </div>
        <div>
            <label for="email" class="block text-sm font-medium text-texte mb-1">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                required
                inputmode="email"
                placeholder="votre@email.fr"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-{{ $themeColor }} focus:border-transparent outline-none transition"
            >
            <p class="mt-1 text-sm text-rouge hidden" id="error-email"></p>
        </div>
        <div class="flex items-start gap-2">
            <input
                type="checkbox"
                id="consentement_rgpd"
                name="consentement_rgpd"
                required
                class="mt-1 h-4 w-4 rounded border-gray-300 text-{{ $themeColor }} focus:ring-{{ $themeColor }}"
            >
            <label for="consentement_rgpd" class="text-xs text-texte-light">
                J'accepte que mes données soient traitées dans le cadre de ma demande. <a href="/politique-de-confidentialite" class="underline hover:text-{{ $themeColor }}">Politique de confidentialité</a>
            </label>
        </div>
        <p class="mt-1 text-sm text-rouge hidden" id="error-consentement_rgpd"></p>

        <div class="flex gap-3">
            <button
                type="button"
                id="btn-prev-step"
                class="py-3 px-6 bg-gray-100 hover:bg-gray-200 text-texte font-medium rounded-lg transition duration-200 cursor-pointer"
            >
                ← Retour
            </button>
            <button
                type="submit"
                id="btn-submit"
                class="flex-1 py-3 px-6 bg-or hover:bg-or-dark text-blanc font-bold rounded-lg transition duration-200 text-lg cursor-pointer"
            >
                {{ $ctaText }}
            </button>
        </div>
    </div>

    {{-- Message de succès --}}
    <div id="form-success" class="hidden text-center py-6">
        <div class="w-16 h-16 bg-vert-valid/10 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-8 h-8 text-vert-valid" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
        </div>
        <h3 class="text-xl font-bold text-texte mb-2">Demande envoyée !</h3>
        <p class="text-texte-light">Nous vous recontactons sous 24h.</p>
    </div>
</form>
