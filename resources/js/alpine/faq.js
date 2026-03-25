export default () => ({
    active: null,

    toggle(index) {
        this.active = this.active === index ? null : index;
    },

    isOpen(index) {
        return this.active === index;
    },
});
