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
        }, 15000);
    },

    toggle() {
        this.isOpen = !this.isOpen;
        this.hasNotif = false;
        if (this.isOpen && !this.started) {
            this.started = true;
            this.startChat();
        }
    },

    async addBotMsg(text, delay = 600) {
        // Show typing
        this.messages.push({ type: 'typing' });
        await this.wait(delay);
        // Replace typing with message
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
        await this.addBotMsg("Bonjour ! 👋 Je suis Sarah, votre conseillère états des lieux.", 800);
        await this.addBotMsg("Comment puis-je vous aider aujourd'hui ?", 600);
        this.showOpts([
            {
                text: "💰 Combien ça coûte ?",
                action: async () => {
                    await this.addBotMsg("Nos tarifs varient de 90 à 180 € TTC selon la surface et la localisation.", 600);
                    await this.addBotMsg("Ce coût est largement amorti : nos clients récupèrent en moyenne 3× plus de retenues sur caution ! 🎯", 800);
                    this.showOpts([
                        { text: "📞 Obtenir un devis précis", action: () => this.showForm() },
                        { text: "🤔 J'ai d'autres questions", action: () => this.moreQuestions() },
                    ]);
                },
            },
            {
                text: "⏰ Quel délai d'intervention ?",
                action: async () => {
                    await this.addBotMsg("Nous intervenons sous 48h partout en France. En urgence, sous 24h ! ⚡", 600);
                    await this.addBotMsg("Vous avez un état des lieux à planifier ?", 500);
                    this.showOpts([
                        { text: "Oui, je veux réserver", action: () => this.showForm() },
                        { text: "Pas encore, juste des infos", action: () => this.moreQuestions() },
                    ]);
                },
            },
            {
                text: "📋 Comment ça fonctionne ?",
                action: async () => {
                    await this.addBotMsg("C'est très simple en 3 étapes :", 500);
                    await this.addBotMsg("1️⃣ Vous réservez en ligne\n2️⃣ Notre expert intervient sous 48h\n3️⃣ Vous recevez le rapport en 24h", 800);
                    await this.addBotMsg("Le rapport est 100% conforme ALUR avec photos horodatées et comparatif automatique ! 🛡️", 600);
                    this.showOpts([
                        { text: "👍 Je veux essayer", action: () => this.showForm() },
                        { text: "📞 Être rappelé", action: () => this.showForm() },
                    ]);
                },
            },
            {
                text: "📞 Être rappelé",
                action: () => this.showForm(),
            },
        ]);
    },

    async moreQuestions() {
        this.showOpts([
            {
                text: "📄 Les rapports sont-ils conformes ?",
                action: async () => {
                    await this.addBotMsg("Oui, 100% conformes au décret ALUR du 30 mars 2016. Opposables en cas de litige. ✅", 600);
                    this.showOpts([
                        { text: "📞 Obtenir un devis", action: () => this.showForm() },
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
        await this.addBotMsg("Parfait ! Laissez-moi vos coordonnées et un expert vous rappelle sous 24h 👇");
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
        await this.addBotMsg("Merci ! ✅ Un expert vous recontacte très vite. Belle journée ! 🌟");
    },

    wait(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    },
});
