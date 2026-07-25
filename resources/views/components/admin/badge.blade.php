@props(['variant' => 'default'])

@php
    $variants = [
        'success' => 'bg-green-100 text-green-700',
        'muted' => 'bg-slate-200 text-slate-600',
        'warning' => 'bg-gold-500/20 text-gold-600',
    ];
@endphp

<span {{ $attributes->merge(['class' => 'inline-block rounded-full px-2 py-0.5 text-xs font-semibold '.($variants[$variant] ?? $variants['muted'])]) }}>
    {{ $slot }}
</span>
