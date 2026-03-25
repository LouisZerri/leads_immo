@props([
    'title',
    'subtitle' => '',
    'ctaText' => 'Être rappelé gratuitement',
    'pageSource',
])

<section class="py-16" style="background-color: var(--color-primary)">
    <div class="max-w-3xl mx-auto px-4 text-center">
        <h2 class="font-serif text-2xl md:text-3xl font-bold text-blanc mb-4">
            {{ $title }}
        </h2>
        @if($subtitle)
            <p class="text-white/80 mb-8 text-lg">{{ $subtitle }}</p>
        @endif

        <div class="bg-blanc rounded-2xl shadow-2xl p-6 md:p-8">
            <x-landing.lead-form
                :page-source="$pageSource"
                :cta-text="$ctaText"
            />
        </div>
    </div>
</section>
