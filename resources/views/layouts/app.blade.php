<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <x-seo
        :title="$seoTitle"
        :description="$seoDescription"
        :keyword="$seoKeyword ?? null"
        :image="$seoImage ?? null"
        :type="$seoType ?? 'website'"
        :noindex="$seoNoindex ?? false"
        :article="$seoArticle ?? null"
    />
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
    <x-organization-jsonld :nonce="$cspNonce" />
    @stack('head')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <a class="u-sr-only-focusable" href="#main-content">Skip to main content</a>

    @include('partials.header')

    <main id="main-content" class="{{ $pageClass ?? '' }}">
        @yield('content')
    </main>

    @include('partials.footer')

    @stack('scripts')
</body>
</html>
