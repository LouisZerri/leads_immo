export default () => ({
    // Champs de saisie
    prixAchat: 150000,
    loyerMensuel: 750,
    chargesMensuelles: 150,
    dureeCredit: 20,
    tauxInteret: 3.5,
    regimeFiscal: 'lmnp',

    // Résultats calculés
    get rendementBrut() {
        if (!this.prixAchat || this.prixAchat <= 0) return 0;
        return ((this.loyerMensuel * 12) / this.prixAchat * 100).toFixed(2);
    },

    get mensualiteCredit() {
        const capital = this.prixAchat;
        const tauxMensuel = (this.tauxInteret / 100) / 12;
        const nbMensualites = this.dureeCredit * 12;

        if (tauxMensuel <= 0) return capital / nbMensualites;

        return (capital * tauxMensuel * Math.pow(1 + tauxMensuel, nbMensualites))
            / (Math.pow(1 + tauxMensuel, nbMensualites) - 1);
    },

    get rendementNet() {
        if (!this.prixAchat || this.prixAchat <= 0) return 0;
        // Vacance locative estimée à 1 mois/an
        const loyerAnnuelNet = (this.loyerMensuel * 11) - (this.chargesMensuelles * 12);
        return (loyerAnnuelNet / this.prixAchat * 100).toFixed(2);
    },

    get cashflowMensuel() {
        return (this.loyerMensuel - this.mensualiteCredit - this.chargesMensuelles).toFixed(0);
    },

    get economieFiscale() {
        const loyerAnnuel = this.loyerMensuel * 12;

        switch (this.regimeFiscal) {
            case 'lmnp':
                // LMNP : amortissement du bien (~3% par an) + charges déductibles
                const amortissement = this.prixAchat * 0.03;
                const chargesDeductibles = this.chargesMensuelles * 12;
                const baseImposable = Math.max(0, loyerAnnuel - amortissement - chargesDeductibles);
                // TMI estimée à 30%
                return Math.round((loyerAnnuel - baseImposable) * 0.30);

            case 'nue':
                // Location nue : micro-foncier (abattement 30%) si revenus < 15k
                const abattement = loyerAnnuel * 0.30;
                return Math.round(abattement * 0.30);

            case 'sci':
                // SCI IS : amortissement + taux IS 15% jusqu'à 42 500€
                const amortSci = this.prixAchat * 0.03;
                const chargesSci = this.chargesMensuelles * 12;
                const resultatSci = Math.max(0, loyerAnnuel - amortSci - chargesSci);
                const impotSci = resultatSci * 0.15;
                const impotIr = (loyerAnnuel - this.chargesMensuelles * 12) * 0.30;
                return Math.round(Math.max(0, impotIr - impotSci));

            default:
                return 0;
        }
    },

    get regimeFiscalLabel() {
        const labels = {
            'lmnp': 'LMNP (Loueur Meublé Non Professionnel)',
            'nue': 'Location nue (micro-foncier)',
            'sci': 'SCI à l\'IS',
        };
        return labels[this.regimeFiscal] || '';
    },

    get cashflowPositif() {
        return parseInt(this.cashflowMensuel) >= 0;
    },

    formatEuro(value) {
        return new Intl.NumberFormat('fr-FR', {
            style: 'currency',
            currency: 'EUR',
            maximumFractionDigits: 0,
        }).format(value);
    },
});
