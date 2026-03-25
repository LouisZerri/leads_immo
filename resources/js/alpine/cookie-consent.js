export default () => ({
    visible: false,
    consent: null,

    init() {
        const stored = localStorage.getItem('cookie_consent');
        if (stored) {
            this.consent = stored;
            if (stored === 'accepted') this.enableTracking();
        } else {
            setTimeout(() => { this.visible = true; }, 1000);
        }
    },

    accept() {
        this.consent = 'accepted';
        this.visible = false;
        localStorage.setItem('cookie_consent', 'accepted');
        this.enableTracking();
    },

    refuse() {
        this.consent = 'refused';
        this.visible = false;
        localStorage.setItem('cookie_consent', 'refused');
    },

    enableTracking() {
        // Google Consent Mode v2 — débloquer analytics et ads
        if (typeof gtag === 'function') {
            gtag('consent', 'update', {
                'analytics_storage': 'granted',
                'ad_storage': 'granted',
                'ad_user_data': 'granted',
                'ad_personalization': 'granted',
            });
        }

        (window.dataLayer || []).push({ event: 'cookie_consent_granted' });
    },
});
