@props([
    'ctaText' => 'Être rappelé gratuitement',
])

<div id="sticky-cta" class="fixed bottom-0 left-0 right-0 z-40 bg-blanc shadow-[0_-4px_12px_rgba(0,0,0,0.1)] p-3 lg:hidden translate-y-full transition-transform duration-300">
    <a
        href="#lead-form"
        class="block w-full py-3 px-6 bg-or hover:bg-or-dark text-blanc font-bold rounded-lg text-center text-lg transition duration-200"
    >
        {{ $ctaText }}
    </a>
</div>
