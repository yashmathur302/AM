@props([
    'variant' => 'primary',
    'block' => false,
    'href' => null,
    'type' => 'button',
])

@php
    $variants = [
        'primary' => 'bg-gold-500 text-navy-900 hover:bg-gold-600 border-transparent',
        'secondary' => 'bg-transparent text-white border-white/80 hover:bg-white/10',
        'outline' => 'bg-transparent text-navy-800 border-navy-800 hover:bg-navy-800 hover:text-white',
    ];

    $classes = 'inline-flex items-center justify-center gap-2 rounded font-semibold text-sm tracking-wide px-6 py-3 border transition-colors duration-200 focus-visible:outline focus-visible:outline-3 focus-visible:outline-gold-500/60 focus-visible:outline-offset-2'
        . ' ' . ($variants[$variant] ?? $variants['primary'])
        . ($block ? ' flex w-full' : '');
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
