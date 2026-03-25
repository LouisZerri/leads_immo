export default () => ({
    visible: false,

    init() {
        window.addEventListener('scroll', () => {
            this.visible = window.scrollY > 300;
        }, { passive: true });
    },
});
