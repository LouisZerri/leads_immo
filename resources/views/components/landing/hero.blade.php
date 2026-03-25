@props([
    'title',
    'subtitle',
    'pageSource',
    'ctaText' => 'Être rappelé gratuitement',
    'badges' => [],
])

<section class="relative text-blanc overflow-hidden" style="background-color: var(--color-primary)">
    <div class="max-w-7xl mx-auto px-4 py-12 lg:py-20">
        <div class="grid lg:grid-cols-2 gap-10 items-center">
            {{-- Texte --}}
            <div class="text-center lg:text-left">
                <h1 class="font-serif text-3xl md:text-4xl lg:text-5xl font-bold leading-tight mb-4">
                    {{ $title }}
                </h1>
                <p class="text-lg md:text-xl opacity-90 mb-6">
                    {{ $subtitle }}
                </p>

                @if(count($badges) > 0)
                    <div class="flex flex-wrap justify-center lg:justify-start gap-4 mb-6">
                        @foreach($badges as $badge)
                            <div class="flex items-center gap-2 bg-white/10 rounded-lg px-3 py-2 text-sm">
                                <span>{{ $badge['icon'] }}</span>
                                <span>{{ $badge['text'] }}</span>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            {{-- Formulaire --}}
            <div id="lead-form" class="bg-blanc rounded-2xl shadow-2xl p-6 md:p-8" style="scroll-margin-top: 80px">
                <x-landing.lead-form
                    :page-source="$pageSource"
                    :cta-text="$ctaText"
                />
            </div>
        </div>
    </div>
</section>
