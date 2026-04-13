export default () => ({
    step: 1,
    selectedVolume: 15,
    estimatedGain: '~4 500 €',
    gainsByVolume: { 5: 1800, 12: 4320, 25: 9000, 40: 14400 },

    selectOption(el, stepNum, value) {
        const parent = el.closest('.quiz-options');
        parent.querySelectorAll('.quiz-opt').forEach(o => o.classList.remove('selected'));
        el.classList.add('selected');

        if (stepNum === 1) this.selectedVolume = value;

        setTimeout(() => {
            if (stepNum < 3) {
                this.step = stepNum + 1;
            } else {
                this.step = 4;
                const gain = this.gainsByVolume[this.selectedVolume] || 4500;
                this.estimatedGain = '~' + gain.toLocaleString('fr') + ' €';
            }
        }, 350);
    },

    get progressWidth() {
        return (this.step * 33) + '%';
    },
});
