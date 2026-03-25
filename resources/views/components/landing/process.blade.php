@props([
    'title' => 'Comment ça marche ?',
    'steps' => [],
])

<section class="bg-beige py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="font-serif text-2xl md:text-3xl font-bold text-center mb-10" style="color: var(--color-primary)">
            {{ $title }}
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($steps as $index => $step)
                <div class="relative text-center">
                    <div
                        class="w-14 h-14 rounded-full text-blanc flex items-center justify-center text-xl font-bold mx-auto mb-4"
                        style="background-color: var(--color-primary)"
                    >
                        {{ $index + 1 }}
                    </div>
                    <h3 class="font-bold text-texte mb-2">{{ $step['title'] }}</h3>
                    <p class="text-texte-light text-sm">{{ $step['description'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
