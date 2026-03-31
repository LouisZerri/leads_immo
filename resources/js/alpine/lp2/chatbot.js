export default () => ({
    isOpen: false,
    messages: [],
    options: [],
    showInput: false,
    inputValue: '',
    hasNotif: true,
    started: false,

    init() {
        setTimeout(() => {
            if (!this.isOpen) this.hasNotif = true;
        }, 12000);
    },

    toggle() {
        this.isOpen = !this.isOpen;
        this.hasNotif = false;
        if (this.isOpen && !this.started) {
            this.started = true;
            this.startChat();
        }
    },

    async addBotMsg(text, delay = 500) {
        this.messages.push({ type: 'typing' });
        await this.wait(delay);
        this.messages.pop();
        this.messages.push({ type: 'bot', text });
    },

    addUserMsg(text) {
        this.messages.push({ type: 'user', text });
    },

    showOpts(opts) {
        this.options = opts;
    },

    clearOpts() {
        this.options = [];
    },

    selectOpt(opt) {
        this.addUserMsg(opt.text);
        this.clearOpts();
        opt.action();
    },

    async startChat() {
        await this.addBotMsg("Bonjour ! 👋 Je suis Lucas, expert GEST'IMMO.", 700);
        await this.addBotMsg("Comment puis-je vous aider ?", 500);
        this.showOpts([
            {
                text: "📱 Comment ça marche ?",
                action: async () => {
                    await this.addBotMsg("Super simple ! Vous ouvrez l'app, elle vous guide pièce par pièce 📋", 500);
                    await this.addBotMsg("Vous prenez des photos, annotez, et le locataire signe sur l'écran. PDF conforme généré en 1 clic ! ✨", 700);
                    this.showOpts([
                        { text: "🚀 Je veux essayer", action: () => this.goToForm() },
                        { text: "💰 Combien ça coûte ?", action: () => this.pricing() },
                    ]);
                },
            },
            {
                text: "💰 C'est gratuit ?",
                action: () => this.pricing(),
            },
            {
                text: "🚀 Créer mon compte",
                action: () => this.goToForm(),
            },
        ]);
    },

    async pricing() {
        await this.addBotMsg("Votre 1er EDL est 100% gratuit ! Aucune carte bancaire nécessaire. 🎉", 500);
        await this.addBotMsg("Ensuite, à partir de 9,90 €/mois. Mais avec l'essai Premium 30 jours offert, vous avez tout le temps de tester !", 700);
        this.showOpts([
            { text: "🚀 Essayer gratuit", action: () => this.goToForm() },
        ]);
    },

    async goToForm() {
        await this.addBotMsg("Parfait ! Remplissez le formulaire juste en dessous 👇");
        setTimeout(() => {
            document.getElementById('lead-form')?.scrollIntoView({ behavior: 'smooth' });
        }, 1000);
    },

    async sendMsg() {
        if (!this.inputValue.trim()) return;
        const contact = this.inputValue.trim();
        this.addUserMsg(contact);
        this.inputValue = '';
        this.showInput = false;

        try {
            await fetch('/callback', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({ contact, page_source: 'P2' }),
            });
        } catch { /* silently fail */ }

        await this.wait(800);
        await this.addBotMsg("Merci ! Un conseiller vous recontacte rapidement. 🌟");
    },

    wait(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    },
});
