export default () => ({
    lots: 10,
    rotation: 30,
    lossPerEdl: 500,

    get totalLoss() {
        return Math.round(this.lots * (this.rotation / 100) * this.lossPerEdl / 2);
    },

    get formattedLoss() {
        return this.totalLoss.toLocaleString('fr') + ' €/location';
    },

    get formattedLossVal() {
        return this.lossPerEdl.toLocaleString('fr') + ' €';
    },
});
