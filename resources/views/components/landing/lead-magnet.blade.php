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
        <div style="background: linear-gradient(135deg, var(--color-primary), var(--color-primary-dark, var(--color-primary))); border-radius: 16px; padding: 40px 32px; text-align: center; color: #fff; position: relative; overflow: hidden;">

            {{-- Fond décoratif --}}
            <div style="position: absolute; top: -30px; right: -30px; width: 120px; height: 120px; background: rgba(255,255,255,0.05); border-radius: 50%;"></div>
            <div style="position: absolute; bottom: -20px; left: -20px; width: 80px; height: 80px; background: rgba(255,255,255,0.05); border-radius: 50%;"></div>

            <span style="font-size: 48px; display: block; margin-bottom: 16px;">{{ $icon }}</span>

            <h2 style="font-family: 'Playfair Display', Georgia, serif; font-size: 24px; font-weight: 700; margin: 0 0 12px;">
                {{ $title }}
            </h2>

            <p style="opacity: 0.85; font-size: 15px; line-height: 1.6; margin: 0 0 24px; max-width: 500px; display: inline-block;">
                {{ $description }}
            </p>

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
                    style="max-width: 400px; margin: 0 auto;"
                >
                    <div x-show="!sent">
                        <div style="display: flex; gap: 8px;">
                            <input
                                type="email"
                                x-model="email"
                                @keydown.enter="submit()"
                                placeholder="Votre email"
                                style="flex: 1; padding: 12px 16px; border: 2px solid rgba(255,255,255,0.3); border-radius: 8px; font-size: 15px; outline: none; background: rgba(255,255,255,0.1); color: #fff;"
                            >
                            <button
                                type="button"
                                @click="submit()"
                                :disabled="loading"
                                style="padding: 12px 24px; background-color: #C9A84C; color: #fff; border: none; border-radius: 8px; font-weight: 700; font-size: 15px; cursor: pointer; white-space: nowrap;"
                            >
                                <span x-show="!loading">{{ $ctaText }}</span>
                                <span x-show="loading" x-cloak>Envoi...</span>
                            </button>
                        </div>
                        <p x-show="error" x-text="error" style="color: #ff9999; font-size: 13px; margin-top: 8px;"></p>
                        <p style="font-size: 11px; opacity: 0.6; margin-top: 8px;">Gratuit — Votre email ne sera jamais partagé</p>
                    </div>
                    <div x-show="sent" x-cloak style="padding: 16px; background: rgba(255,255,255,0.1); border-radius: 8px;">
                        <p style="font-size: 16px; font-weight: 600; margin: 0 0 4px;">✅ C'est envoyé !</p>
                        <p style="font-size: 14px; opacity: 0.8; margin: 0;">Vérifiez votre boîte mail dans quelques instants.</p>
                    </div>
                </div>
            @else
                <a
                    href="#lead-form"
                    style="display: inline-block; padding: 14px 32px; background-color: #C9A84C; color: #fff; text-decoration: none; font-weight: 700; border-radius: 8px; font-size: 16px;"
                >
                    {{ $ctaText }}
                </a>
            @endif
        </div>
    </div>
</section>
