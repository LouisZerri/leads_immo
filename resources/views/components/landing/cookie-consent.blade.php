<div
    x-data="cookieConsent"
    x-show="visible"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="translate-y-full opacity-0"
    x-transition:enter-end="translate-y-0 opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="translate-y-0 opacity-100"
    x-transition:leave-end="translate-y-full opacity-0"
    x-cloak
    class="cookie-banner"
>
    <div class="cookie-banner-inner">
        <div class="cookie-banner-text">
            <p class="title">🍪 Ce site utilise des cookies</p>
            <p class="description">
                Nous utilisons des cookies pour analyser le trafic et améliorer nos campagnes publicitaires (Google Analytics, Google Ads, Meta Pixel).
                <a href="https://www.gestimmo-france.fr/confidentialite" target="_blank" rel="noopener">En savoir plus</a>
            </p>
        </div>
        <div class="cookie-banner-actions">
            <button @click="refuse()" class="btn-refuse">Refuser</button>
            <button @click="accept()" class="btn-accept">Accepter</button>
        </div>
    </div>
</div>
