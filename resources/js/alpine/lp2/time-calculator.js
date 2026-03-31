export default () => ({
    lots: 15,
    rotation: 30,

    get nbLocations() {
        return Math.round(this.lots * (this.rotation / 100));
    },

    get paperTime() {
        return 75; // minutes par location (entrée + sortie)
    },

    get appTime() {
        return 25; // minutes par location
    },

    get savedTime() {
        return this.paperTime - this.appTime;
    },

    formatTime(min) {
        const h = Math.floor(min / 60);
        const m = min % 60;
        if (h === 0) return m + ' min';
        return m > 0 ? h + 'h ' + String(m).padStart(2, '0') : h + 'h';
    },

    get paperLabel() {
        return this.formatTime(this.paperTime) + '/location';
    },

    get appLabel() {
        return this.formatTime(this.appTime) + '/location';
    },

    get savedLabel() {
        return '→ Vous économisez ' + this.formatTime(this.savedTime) + ' par location (' + this.nbLocations + ' locations/an)';
    },

    get moneyLabel() {
        const retenues = Math.round(0.40 * 650 / 2);
        return '💰 Retenues mieux justifiées : ~' + retenues + ' €/location en moyenne (40% des sorties avec retenue ~325 €)';
    },
});
