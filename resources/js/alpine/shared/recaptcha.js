/**
 * Helper reCAPTCHA v3 — retourne un token pour une action donnée.
 * Attend que grecaptcha soit prêt avant d'exécuter.
 */
export async function getRecaptchaToken(action = 'submit') {
    if (typeof grecaptcha === 'undefined') return '';

    const script = document.querySelector('script[src*="recaptcha/api.js"]');
    const siteKey = script?.src.match(/render=([^&]+)/)?.[1];
    if (!siteKey) return '';

    return new Promise((resolve) => {
        grecaptcha.ready(async () => {
            try {
                const token = await grecaptcha.execute(siteKey, { action });
                resolve(token || '');
            } catch {
                resolve('');
            }
        });
    });
}
