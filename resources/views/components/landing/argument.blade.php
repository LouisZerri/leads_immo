@props([
    'title',
    'items' => [],
])

<section class="py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="font-serif text-2xl md:text-3xl font-bold text-center mb-10" style="color: var(--color-primary)">
            {{ $title }}
        </h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($items as $item)
                <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition" style="border: 1px solid #f3f4f6">
                    <span class="text-3xl mb-4 block">{{ $item['icon'] }}</span>
                    <h3 class="font-bold text-lg text-texte mb-2">{{ $item['title'] }}</h3>
                    <p class="text-texte-light text-sm">{{ $item['description'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
