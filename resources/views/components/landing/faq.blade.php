@props([
    'title' => 'Questions fréquentes',
    'themeColor' => 'bleu-marine',
    'questions' => [],
])

<section class="py-16">
    <div class="max-w-3xl mx-auto px-4">
        <h2 class="font-serif text-2xl md:text-3xl font-bold text-{{ $themeColor }} text-center mb-10">
            {{ $title }}
        </h2>
        <div class="space-y-3" id="faq-accordion">
            @foreach($questions as $index => $faq)
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button
                        type="button"
                        class="faq-toggle w-full flex items-center justify-between px-6 py-4 text-left font-medium text-texte hover:bg-gray-50 transition cursor-pointer"
                        aria-expanded="false"
                        aria-controls="faq-{{ $index }}"
                    >
                        <span>{{ $faq['question'] }}</span>
                        <svg class="faq-chevron w-5 h-5 text-texte-light transition-transform duration-200 shrink-0 ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div id="faq-{{ $index }}" class="faq-content hidden px-6 pb-4">
                        <p class="text-texte-light text-sm leading-relaxed">{{ $faq['answer'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
