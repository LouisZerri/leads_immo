@props([
    'title',
    'description',
    'ctaText' => 'Télécharger gratuitement',
    'icon' => '📥',
    'type' => 'download',
    'pageSource' => '',
])

<section class="py-16">
    <div class="max-w-3xl mx-auto px-4">
        <div class="lead-magnet-card">
            <div class="decor-circle-1"></div>
            <div class="decor-circle-2"></div>

            <span class="lead-magnet-icon">{{ $icon }}</span>

            <h2>{{ $title }}</h2>

            <p class="description">{{ $description }}</p>

            @if($type === 'download')
                <div
                    x-data="{
                        email: '',
                        sent: false,
                        loading: false,
                        error: '',
                        async submit() {
                            if (!this.email || !this.email.includes('@')) {
                                this.error = 'Veuillez entrer un email valide.';
                                return;
                            }
                            this.error = '';
                            this.loading = true;
                            try {
                                const response = await fetch('{{ route('lead-magnet.send') }}', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'Accept': 'application/json',
                                        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
                                    },
                                    body: JSON.stringify({ email: this.email, page_source: '{{ $pageSource }}' }),
                                });
                                const data = await response.json();
                                if (response.ok && data.success) {
                                    this.sent = true;
                                    (window.dataLayer || []).push({ event: 'lead_magnet_download', page_source: '{{ $pageSource }}' });
                                } else {
                                    this.error = data.message || 'Erreur lors de l\'envoi.';
                                }
                            } catch {
                                this.error = 'Erreur réseau. Veuillez réessayer.';
                            } finally {
                                this.loading = false;
                            }
                        }
                    }"
                    class="lead-magnet-form"
                >
                    <div x-show="!sent">
                        <div class="input-row">
                            <input
                                type="email"
                                x-model="email"
                                @keydown.enter="submit()"
                                placeholder="Votre email"
                            >
                            <button
                                type="button"
                                @click="submit()"
                                :disabled="loading"
                                class="submit-btn"
                            >
                                <span x-show="!loading">{{ $ctaText }}</span>
                                <span x-show="loading" x-cloak>Envoi...</span>
                            </button>
                        </div>
                        <p x-show="error" x-text="error" class="error-msg"></p>
                        <p class="privacy-note">Gratuit — Votre email ne sera jamais partagé</p>
                    </div>
                    <div x-show="sent" x-cloak class="success-box">
                        <p class="title">✅ C'est envoyé !</p>
                        <p class="subtitle">Vérifiez votre boîte mail dans quelques instants.</p>
                    </div>
                </div>
            @else
                <a href="#lead-form" class="lead-magnet-cta">{{ $ctaText }}</a>
            @endif
        </div>
    </div>
</section>
