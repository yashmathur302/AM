@props([
    'title',
    'description',
    'keyword' => null,
    'image' => null,
    'type' => 'website',
    'noindex' => false,
    'article' => null,
])

@php
    $siteName = config('app.name');
    $fullTitle = str_contains($title, $siteName) ? $title : "{$title} | {$siteName}";
    $canonical = url()->current();
    $ogImage = $image ? (str_starts_with($image, 'http') ? $image : asset($image)) : asset(config('seo.default_og_image'));
@endphp

<title>{{ $fullTitle }}</title>
<meta name="description" content="{{ Str::limit($description, 300, '') }}">
@if ($keyword)
    <meta name="keywords" content="{{ $keyword }}">
@endif
<meta name="robots" content="{{ $noindex ? 'noindex, nofollow' : 'index, follow' }}">
<link rel="canonical" href="{{ $canonical }}">

{{-- Open Graph --}}
<meta property="og:site_name" content="{{ $siteName }}">
<meta property="og:type" content="{{ $type }}">
<meta property="og:title" content="{{ $fullTitle }}">
<meta property="og:description" content="{{ Str::limit($description, 300, '') }}">
<meta property="og:url" content="{{ $canonical }}">
<meta property="og:image" content="{{ $ogImage }}">
<meta property="og:locale" content="en_US">

{{-- Twitter Card --}}
<meta name="twitter:card" content="summary_large_image">
@if (config('seo.twitter_handle'))
    <meta name="twitter:site" content="{{ config('seo.twitter_handle') }}">
@endif
<meta name="twitter:title" content="{{ $fullTitle }}">
<meta name="twitter:description" content="{{ Str::limit($description, 300, '') }}">
<meta name="twitter:image" content="{{ $ogImage }}">

@if ($article)
    <meta property="article:published_time" content="{{ $article['published_at'] }}">
    @if (!empty($article['modified_at']))
        <meta property="article:modified_time" content="{{ $article['modified_at'] }}">
    @endif
    @if (!empty($article['author']))
        <meta property="article:author" content="{{ $article['author'] }}">
    @endif
@endif
