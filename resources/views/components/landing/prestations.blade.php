@props([
    'title',
    'themeColor' => 'bleu-marine',
    'items' => [],
])

<section class="py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="font-serif text-2xl md:text-3xl font-bold text-{{ $themeColor }} text-center mb-10">
            {{ $title }}
        </h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($items as $item)
                <div class="bg-blanc border-2 border-gray-100 rounded-xl p-6 text-center hover:border-{{ $themeColor }} transition">
                    <span class="text-4xl mb-4 block">{{ $item['icon'] }}</span>
                    <h3 class="font-bold text-lg text-texte mb-2">{{ $item['title'] }}</h3>
                    <p class="text-texte-light text-sm">{{ $item['description'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
