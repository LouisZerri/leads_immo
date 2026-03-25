@props([
    'title' => 'Comment ça marche ?',
    'themeColor' => 'bleu-marine',
    'steps' => [],
])

<section class="bg-beige py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="font-serif text-2xl md:text-3xl font-bold text-{{ $themeColor }} text-center mb-10">
            {{ $title }}
        </h2>
        <div class="grid md:grid-cols-{{ count($steps) }} gap-8">
            @foreach($steps as $index => $step)
                <div class="relative text-center">
                    <div class="w-14 h-14 rounded-full bg-{{ $themeColor }} text-blanc flex items-center justify-center text-xl font-bold mx-auto mb-4">
                        {{ $index + 1 }}
                    </div>
                    <h3 class="font-bold text-texte mb-2">{{ $step['title'] }}</h3>
                    <p class="text-texte-light text-sm">{{ $step['description'] }}</p>

                    @if(!$loop->last)
                        <div class="hidden md:block absolute top-7 left-[60%] w-[80%] h-0.5 bg-{{ $themeColor }}/20"></div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>
