@props([
    'items' => [],
    'themeColor' => 'bleu-marine',
])

<section class="bg-beige py-8">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-{{ count($items) }} gap-6">
            @foreach($items as $item)
                <div class="flex flex-col items-center text-center gap-2">
                    <span class="text-3xl">{{ $item['icon'] }}</span>
                    <span class="text-sm font-semibold text-{{ $themeColor }}">{{ $item['text'] }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>
