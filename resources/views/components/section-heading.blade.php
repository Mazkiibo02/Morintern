@props(['title', 'subtitle' => null])

<section class="py-16 md:py-20 bg-gradient-to-b from-white to-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-800 mb-4 text-center">{{ $title }}</h2>
        @if($subtitle)
            <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto text-center">{{ $subtitle }}</p>
        @endif
    </div>
</section>