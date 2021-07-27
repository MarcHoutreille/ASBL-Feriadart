@props(['active'])

@php
$classes = ($active ?? false)
            ? 'uppercase inline-flex items-center px-4 pt-1 text-lg font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'uppercase inline-flex items-center px-4 pt-1 text-lg font-medium leading-5 text-gray-200 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
