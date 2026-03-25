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
    style="position: fixed; bottom: 0; left: 0; right: 0; z-index: 9999; background: #fff; box-shadow: 0 -4px 20px rgba(0,0,0,0.12); padding: 20px; border-top: 2px solid #e5e7eb;"
>
    <div style="max-width: 1000px; margin: 0 auto; display: flex; flex-wrap: wrap; align-items: center; gap: 16px; justify-content: space-between;">
        <div style="flex: 1; min-width: 280px;">
            <p style="font-size: 14px; font-weight: 600; color: #333; margin: 0 0 4px;">🍪 Ce site utilise des cookies</p>
            <p style="font-size: 13px; color: #666; margin: 0; line-height: 1.5;">
                Nous utilisons des cookies pour analyser le trafic et améliorer nos campagnes publicitaires (Google Analytics, Google Ads, Meta Pixel).
                <a href="https://www.gestimmo-france.fr/confidentialite" target="_blank" rel="noopener" style="color: #C9A84C; text-decoration: underline;">En savoir plus</a>
            </p>
        </div>
        <div style="display: flex; gap: 10px; flex-shrink: 0;">
            <button
                @click="refuse()"
                style="padding: 10px 20px; background: #f3f4f6; color: #666; border: none; border-radius: 8px; font-size: 14px; font-weight: 500; cursor: pointer;"
            >
                Refuser
            </button>
            <button
                @click="accept()"
                style="padding: 10px 20px; background: #1A3A5C; color: #fff; border: none; border-radius: 8px; font-size: 14px; font-weight: 600; cursor: pointer;"
            >
                Accepter
            </button>
        </div>
    </div>
</div>
