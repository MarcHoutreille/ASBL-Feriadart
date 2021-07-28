@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-yellow-300 text-center block mx-1 my-2 sm:my-auto hover:text-yellow-300 transition duration-150 ease-in-out'
            : 'text-yellow-200 text-center block mx-1 my-2 sm:my-auto hover:text-yellow-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
