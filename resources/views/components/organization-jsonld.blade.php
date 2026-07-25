@props(['nonce' => null])

@php
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'FinancialService',
        'name' => config('seo.organization_name'),
        'url' => url('/'),
        'logo' => asset(config('seo.organization_logo')),
        'sameAs' => array_values(config('seo.social_profiles', [])),
    ];
@endphp
<script type="application/ld+json" @if($nonce) nonce="{{ $nonce }}" @endif>{!! json_encode(array_filter($schema), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
