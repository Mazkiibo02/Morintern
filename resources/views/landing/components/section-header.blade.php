@props(['title','subtitle' => null, 'align' => 'text-center', 'wrapClass' => 'mb-12 md:mb-16'])

<div class="{{ $wrapClass }}">
    <h2 {{ $attributes->merge(['class' => 'text-3xl md:text-4xl lg:text-5xl font-bold text-gray-800 mb-4 ' . $align]) }}>
        {{ $title }}
    </h2>

    @if($subtitle)
        <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto">
            {{ $subtitle }}
        </p>
    @endif
</div>