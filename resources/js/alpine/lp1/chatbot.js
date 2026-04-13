export default () => ({
    isOpen: false,
    messages: [],
    options: [],
    showInput: false,
    inputValue: '',
    started: false,

    toggle() {
        this.isOpen = !this.isOpen;
        if (this.isOpen && !this.started) {
            this.started = true;
            this.startChat();
        }
    },

    async addBotMsg(text, delay = 600) {
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
        await this.addBotMsg("Bonjour ! Je suis l'assistant GEST'IMMO Pro.", 700);
        await this.addBotMsg("Comment puis-je vous aider concernant l'externalisation de vos états des lieux ?", 600);
        this.showOpts([
            {
                text: "💰 Quels sont vos tarifs ?",
                action: async () => {
                    await this.addBotMsg("Nos tarifs HT par état des lieux :", 600);
                    await this.addBotMsg("• EDL Studio : 110 €\n• EDL T2 : 125 €\n• EDL T3 : 140 €\n\nT4 et plus, maisons et locaux commerciaux : sur devis.", 800);
                    this.showOpts([
                        { text: "📞 Recevoir une proposition", action: () => this.showForm() },
                        { text: "🤔 Autres questions", action: () => this.moreQuestions() },
                    ]);
                },
            },
            {
                text: "⏰ Quel délai d'intervention ?",
                action: async () => {
                    await this.addBotMsg("Délai standard : 48h en Île-de-France, 7j/7.", 600);
                    await this.addBotMsg("Vous avez un besoin urgent à venir ?", 500);
                    this.showOpts([
                        { text: "Oui, je veux en discuter", action: () => this.showForm() },
                        { text: "Non, juste me renseigner", action: () => this.moreQuestions() },
                    ]);
                },
            },
            {
                text: "📋 Comment ça marche ?",
                action: async () => {
                    await this.addBotMsg("Très simple, en 4 étapes :", 500);
                    await this.addBotMsg("1. Vous nous transmettez le dossier\n2. Nous prenons RDV avec le locataire\n3. EDL réalisé sur place, photos HD\n4. Rapport PDF + Word livré sous 24h", 900);
                    this.showOpts([
                        { text: "👍 Je veux tester", action: () => this.showForm() },
                        { text: "📞 Parler à un humain", action: () => this.showForm() },
                    ]);
                },
            },
            {
                text: "🧪 Faire un EDL test",
                action: async () => {
                    await this.addBotMsg("Pour les agences qui souhaitent juger sur pièce, nous proposons un EDL test gratuit sur l'un de vos biens.", 700);
                    await this.addBotMsg("Aucun engagement, vous évaluez la qualité du rapport et décidez ensuite.", 600);
                    this.showOpts([
                        { text: "💼 Organiser un test", action: () => this.showForm() },
                    ]);
                },
            },
        ]);
    },

    async moreQuestions() {
        this.showOpts([
            {
                text: "📄 Rapports opposables ?",
                action: async () => {
                    await this.addBotMsg("Oui, 100% conformes au décret du 30 mars 2016 et à la loi ALUR. Reconnus par les juridictions civiles.", 700);
                    this.showOpts([
                        { text: "📞 Recevoir la grille tarifaire", action: () => this.showForm() },
                    ]);
                },
            },
            {
                text: "📞 Parler à un humain",
                action: () => this.showForm(),
            },
        ]);
    },

    async showForm() {
        await this.addBotMsg("Parfait. Laissez-moi votre email ou téléphone, un conseiller vous recontacte sous 24h ouvrées.");
        this.showInput = true;
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
                body: JSON.stringify({ contact, page_source: 'P1' }),
            });
        } catch { /* silently fail */ }

        await this.wait(800);
        await this.addBotMsg("Merci ! Un conseiller GEST'IMMO vous recontacte sous 24h ouvrées. Belle journée !");
    },

    wait(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    },
});
