export default () => ({
    step: 1,
    losses: [750, 1750, 3750, 7500],
    estimatedLoss: '~750 €/location',

    selectOption(el, stepNum) {
        // Highlight selected
        const parent = el.closest('.quiz-options');
        parent.querySelectorAll('.quiz-opt').forEach(o => o.classList.remove('selected'));
        el.classList.add('selected');

        // Auto-advance after 400ms
        setTimeout(() => {
            if (stepNum < 4) {
                this.step = stepNum + 1;
                if (this.step === 4) {
                    const idx = Math.min(stepNum - 1, 3);
                    this.estimatedLoss = '~' + this.losses[idx].toLocaleString('fr') + ' €/location';
                }
            }
        }, 400);
    },

    get progressWidth() {
        return (this.step * 25) + '%';
    },
});
