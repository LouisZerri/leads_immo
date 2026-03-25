@props([
    'title' => 'Questions fréquentes',
    'questions' => [],
])

<section class="py-16">
    <div class="max-w-3xl mx-auto px-4">
        <h2 class="font-serif text-2xl md:text-3xl font-bold text-center mb-10" style="color: var(--color-primary)">
            {{ $title }}
        </h2>
        <div x-data="faq" class="space-y-3">
            @foreach($questions as $index => $faq)
                <div class="rounded-lg overflow-hidden" style="border: 1px solid #e5e7eb">
                    <button
                        type="button"
                        @click="toggle({{ $index }})"
                        class="w-full flex items-center justify-between px-6 py-4 text-left font-medium text-texte hover:bg-gray-50 transition cursor-pointer"
                        :aria-expanded="isOpen({{ $index }})"
                    >
                        <span>{{ $faq['question'] }}</span>
                        <svg
                            class="w-5 h-5 text-texte-light shrink-0 ml-4 transition-transform duration-200"
                            :class="isOpen({{ $index }}) && 'rotate-180'"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="isOpen({{ $index }})" x-collapse x-cloak class="px-6 pb-4">
                        <p class="text-texte-light text-sm leading-relaxed">{{ $faq['answer'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
