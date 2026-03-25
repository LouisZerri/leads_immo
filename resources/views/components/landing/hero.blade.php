@props([
    'title',
    'subtitle',
    'themeColor' => 'bleu-marine',
    'pageSource',
    'ctaText' => 'Être rappelé gratuitement',
    'badges' => [],
])

<section class="relative bg-{{ $themeColor }} text-blanc overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 py-12 lg:py-20">
        <div class="grid lg:grid-cols-2 gap-10 items-center">
            {{-- Texte --}}
            <div>
                <h1 class="font-serif text-3xl md:text-4xl lg:text-5xl font-bold leading-tight mb-4">
                    {{ $title }}
                </h1>
                <p class="text-lg md:text-xl opacity-90 mb-6">
                    {{ $subtitle }}
                </p>

                {{-- Badges de confiance --}}
                @if(count($badges) > 0)
                    <div class="flex flex-wrap gap-4 mb-6">
                        @foreach($badges as $badge)
                            <div class="flex items-center gap-2 bg-blanc/10 rounded-lg px-3 py-2 text-sm">
                                <span>{{ $badge['icon'] }}</span>
                                <span>{{ $badge['text'] }}</span>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            {{-- Formulaire --}}
            <div class="bg-blanc rounded-2xl shadow-2xl p-6 md:p-8">
                <x-landing.lead-form
                    :page-source="$pageSource"
                    :cta-text="$ctaText"
                    :theme-color="$themeColor"
                />
            </div>
        </div>
    </div>
</section>
