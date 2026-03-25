@props([
    'ctaText' => 'Être rappelé gratuitement',
    'anchor' => '#lead-form',
])

<div
    x-data="stickyCta"
    x-show="visible"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="translate-y-full"
    x-transition:enter-end="translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="translate-y-0"
    x-transition:leave-end="translate-y-full"
    x-cloak
    class="fixed bottom-0 left-0 right-0 z-40 lg:hidden"
    style="background: #fff; box-shadow: 0 -4px 12px rgba(0,0,0,0.1); padding: 12px 12px calc(12px + env(safe-area-inset-bottom, 0px));"
>
    <a
        href="{{ $anchor }}"
        class="block w-full py-3 px-6 bg-or hover:bg-or-dark text-blanc font-bold rounded-lg text-center text-lg transition duration-200"
    >
        {{ $ctaText }}
    </a>
</div>
