import { pushFormStep1, pushFormComplete } from './tracking';
import { getRecaptchaToken } from './shared/recaptcha';

export default () => ({
    step: 1,
    loading: false,
    success: false,
    errors: {},

    // Données du formulaire
    form: {
        code_postal: '',
        selection: '',
        budget_investissement: '',
        prenom: '',
        telephone: '',
        email: '',
        consentement_rgpd: false,
        website: '', // honeypot
        utm_source: '',
        utm_medium: '',
        utm_campaign: '',
        utm_term: '',
        utm_content: '',
    },

    init() {
        // Récupérer les UTM depuis l'URL
        const params = new URLSearchParams(window.location.search);
        ['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content'].forEach(key => {
            if (params.has(key)) this.form[key] = params.get(key);
        });
    },

    get pageSource() {
        return this.$root.dataset.pageSource;
    },

    get actionUrl() {
        return this.$root.dataset.action;
    },

    // Validation
    validateStep1() {
        this.errors = {};

        if (['P1', 'P2', 'P3'].includes(this.pageSource)) {
            if (!this.form.code_postal) {
                this.errors.code_postal = 'Ce champ est requis.';
            } else if (!/^\d{5}$/.test(this.form.code_postal)) {
                this.errors.code_postal = 'Veuillez entrer un code postal valide (5 chiffres).';
            }
        }

        if (['P1', 'P2'].includes(this.pageSource) && !this.form.selection) {
            this.errors.selection = 'Ce champ est requis.';
        }

        if (['P3', 'P4'].includes(this.pageSource) && !this.form.budget_investissement) {
            this.errors.budget_investissement = 'Ce champ est requis.';
        }

        return Object.keys(this.errors).length === 0;
    },

    validateStep2() {
        this.errors = {};

        if (!this.form.prenom.trim()) {
            this.errors.prenom = 'Ce champ est requis.';
        }

        const tel = this.form.telephone.replace(/\s/g, '');
        if (!tel) {
            this.errors.telephone = 'Ce champ est requis.';
        } else if (!/^0[67]\d{8}$/.test(tel)) {
            this.errors.telephone = 'Veuillez entrer un numéro de mobile valide (06 ou 07).';
        }

        if (!this.form.email.trim()) {
            this.errors.email = 'Ce champ est requis.';
        } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.form.email)) {
            this.errors.email = 'Veuillez entrer une adresse email valide.';
        }

        if (!this.form.consentement_rgpd) {
            this.errors.consentement_rgpd = 'Vous devez accepter la politique de confidentialité.';
        }

        return Object.keys(this.errors).length === 0;
    },

    nextStep() {
        if (this.validateStep1()) {
            this.step = 2;
            pushFormStep1(this.pageSource);
        }
    },

    prevStep() {
        this.errors = {};
        this.step = 1;
    },

    async submit() {
        if (!this.validateStep2()) return;

        // Honeypot
        if (this.form.website) return;

        this.loading = true;

        try {
            const recaptchaToken = await getRecaptchaToken('lead_submit');

            const body = {
                ...this.form,
                page_source: this.pageSource,
                telephone: this.form.telephone.replace(/\s/g, ''),
                recaptcha_token: recaptchaToken,
            };

            const response = await fetch(this.actionUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify(body),
            });

            const data = await response.json();

            if (response.ok && data.success) {
                this.success = true;
                pushFormComplete(this.pageSource);
                setTimeout(() => {
                    window.location.href = data.redirect;
                }, 2000);
            } else if (data.errors) {
                this.errors = {};
                Object.entries(data.errors).forEach(([key, messages]) => {
                    this.errors[key] = messages[0];
                });
            }
        } catch {
            this.errors.general = 'Une erreur est survenue. Veuillez réessayer.';
        } finally {
            this.loading = false;
        }
    },

    fieldStyle(field) {
        if (this.errors[field]) return 'border: 1px solid #C0392B';
        if (this.form[field] && !this.errors[field]) return 'border: 1px solid #27AE60';
        return 'border: 1px solid #d1d5db';
    },
});
