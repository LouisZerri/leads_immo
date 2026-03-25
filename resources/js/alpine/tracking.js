/**
 * Tracking GTM — 8 événements CDC
 *
 * 1. form_step1_submit  → GA4 + Meta Pixel
 * 2. form_complete       → GA4 + Google Ads + Meta
 * 3. lead_magnet_download → GA4 + Meta Pixel
 * 4. phone_click         → GA4 + Google Ads
 * 5. scroll_50           → GA4
 * 6. scroll_90           → GA4
 * 7. cta_click           → GA4 + Meta Pixel
 * 8. page_view_lp        → GA4 + Meta Pixel
 */

export function initTracking() {
    const dataLayer = window.dataLayer || [];

    // 8. page_view_lp — au chargement
    dataLayer.push({
        event: 'page_view_lp',
        page_path: window.location.pathname,
    });

    // 4. phone_click — clic sur numéro de téléphone
    document.querySelectorAll('a[href^="tel:"]').forEach(link => {
        link.addEventListener('click', () => {
            dataLayer.push({
                event: 'phone_click',
                phone_number: link.getAttribute('href'),
            });
        });
    });

    // 7. cta_click — clic sur boutons CTA principaux
    document.querySelectorAll('[data-track-cta]').forEach(btn => {
        btn.addEventListener('click', () => {
            dataLayer.push({
                event: 'cta_click',
                cta_text: btn.textContent.trim(),
                cta_location: btn.dataset.trackCta || 'unknown',
            });
        });
    });

    // 5 & 6. scroll_50 et scroll_90
    let scrolled50 = false;
    let scrolled90 = false;

    window.addEventListener('scroll', () => {
        const scrollPercent = (window.scrollY + window.innerHeight) / document.documentElement.scrollHeight * 100;

        if (!scrolled50 && scrollPercent >= 50) {
            scrolled50 = true;
            dataLayer.push({ event: 'scroll_50' });
        }

        if (!scrolled90 && scrollPercent >= 90) {
            scrolled90 = true;
            dataLayer.push({ event: 'scroll_90' });
        }
    }, { passive: true });
}

/**
 * Helpers appelés depuis les composants Alpine
 */
export function pushFormStep1(pageSource) {
    (window.dataLayer || []).push({
        event: 'form_step1_submit',
        page_source: pageSource,
    });
}

export function pushFormComplete(pageSource) {
    (window.dataLayer || []).push({
        event: 'form_complete',
        page_source: pageSource,
    });
}

export function pushLeadMagnetDownload(pageSource) {
    (window.dataLayer || []).push({
        event: 'lead_magnet_download',
        page_source: pageSource,
    });
}
