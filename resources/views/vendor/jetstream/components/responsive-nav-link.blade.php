@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 border-l-8 border-euro-darkest text-base font-medium text-white bg-euro focus:outline-none focus:text-white focus:bg-euro-dark focus:border-euro-darkest transition'
            : 'block pl-3 pr-4 py-2 border-l-8 border-transparent text-base font-medium text-white hover:text-white hover:bg-euro-dark hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-euro-dark focus:border-gray-300 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
