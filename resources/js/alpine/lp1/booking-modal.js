import { getRecaptchaToken } from '../shared/recaptcha';

export default () => ({
    open: false,
    loading: false,
    success: false,
    errors: {},
    form: {
        prenom: '',
        telephone: '',
        email: '',
        selection: '',
    },

    openModal(edlType) {
        this.form.selection = edlType;
        this.open = true;
        this.success = false;
        this.errors = {};
    },

    close() {
        this.open = false;
    },

    get edlLabel() {
        const labels = {
            'edl-studio': 'EDL Studio (110€ HT)',
            'edl-t2': 'EDL T2 (125€ HT)',
            'edl-t3': 'EDL T3 (140€ HT)',
        };
        return labels[this.form.selection] || this.form.selection;
    },

    validate() {
        this.errors = {};

        if (!this.form.prenom.trim()) {
            this.errors.prenom = 'Ce champ est requis.';
        }

        const tel = this.form.telephone.replace(/\s/g, '');
        if (!tel) {
            this.errors.telephone = 'Ce champ est requis.';
        } else if (!/^0[67]\d{8}$/.test(tel)) {
            this.errors.telephone = 'Numéro de mobile invalide.';
        }

        if (!this.form.email.trim()) {
            this.errors.email = 'Ce champ est requis.';
        } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.form.email)) {
            this.errors.email = 'Email invalide.';
        }

        return Object.keys(this.errors).length === 0;
    },

    async submit() {
        if (!this.validate()) return;

        this.loading = true;

        try {
            const recaptchaToken = await getRecaptchaToken('booking');

            const response = await fetch('/lead', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({
                    page_source: 'P1',
                    prenom: this.form.prenom,
                    telephone: this.form.telephone.replace(/\s/g, ''),
                    email: this.form.email,
                    selection: this.form.selection,
                    consentement_rgpd: 'on',
                    recaptcha_token: recaptchaToken,
                }),
            });

            const data = await response.json();

            if (response.ok && data.success) {
                this.success = true;
            } else if (data.errors) {
                Object.entries(data.errors).forEach(([key, messages]) => {
                    this.errors[key] = messages[0];
                });
            }
        } catch {
            this.errors.general = 'Une erreur est survenue.';
        } finally {
            this.loading = false;
        }
    },
});
