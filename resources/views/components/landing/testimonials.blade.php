@props([
    'title' => 'Ce que disent nos clients',
    'themeColor' => 'bleu-marine',
    'reviews' => [],
])

<section class="bg-beige py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="font-serif text-2xl md:text-3xl font-bold text-{{ $themeColor }} text-center mb-10">
            {{ $title }}
        </h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($reviews as $review)
                <div class="bg-blanc rounded-xl shadow-sm p-6">
                    <div class="flex items-center gap-1 mb-3">
                        @for($i = 0; $i < ($review['stars'] ?? 5); $i++)
                            <svg class="w-5 h-5 text-or" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        @endfor
                    </div>
                    <p class="text-texte-light text-sm mb-4 italic">"{{ $review['text'] }}"</p>
                    <p class="font-semibold text-texte text-sm">{{ $review['name'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
