@props([
    'items' => [],
])

<section class="bg-beige py-8">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            @foreach($items as $item)
                <div class="flex flex-col items-center text-center gap-2">
                    <span class="text-3xl">{{ $item['icon'] }}</span>
                    <span class="text-sm font-semibold" style="color: var(--color-primary)">{{ $item['text'] }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>
