export default () => ({
    edlPerMonth: 15,
    hourlyCost: 75,
    timePerEdl: 2,

    get internalMonthly() {
        return Math.round(this.edlPerMonth * this.hourlyCost * this.timePerEdl);
    },

    get gestimmoMonthly() {
        return Math.round(this.edlPerMonth * 125);
    },

    get yearlySaving() {
        return Math.max(0, (this.internalMonthly - this.gestimmoMonthly) * 12);
    },

    get formattedInternal() {
        return this.internalMonthly.toLocaleString('fr') + ' €/mois';
    },

    get formattedGestimmo() {
        return this.gestimmoMonthly.toLocaleString('fr') + ' €/mois';
    },

    get formattedSaving() {
        return this.yearlySaving.toLocaleString('fr') + ' €';
    },

    get formattedCost() {
        return this.hourlyCost + ' €';
    },

    get formattedTime() {
        return this.timePerEdl + ' h';
    },
});
