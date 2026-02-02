@props([
    'type' => 'button',        // button | submit | reset
    'href' => null,            // if provided → render <a>
    'variant' => 'primary',    // primary | secondary | danger
    'size' => 'md',            // sm | md | lg
])

@php
$variants = [
    'primary' => 'bg-slate-700 text-white cursor-pointer hover:bg-slate-900',
    'secondary' => 'bg-gray-200 text-gray-800 hover:bg-gray-300',
    'danger' => 'bg-red-600 text-white hover:bg-red-700',
];

$sizes = [
    'sm' => 'px-3 py-1 text-sm',
    'md' => 'px-4 py-2',
    'lg' => 'px-6 py-3 text-lg',
];

$classes = ($variants[$variant] ?? $variants['primary']) . ' ' .
           ($sizes[$size] ?? $sizes['md']) .
           ' rounded font-medium transition mb-2 cursor:pointer duration-200 inline-flex items-center justify-center';
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
