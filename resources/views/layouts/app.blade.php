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
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="text-slate-800">
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-2 focus:left-2 focus:z-50 focus:rounded focus:bg-white focus:px-4 focus:py-2 focus:text-navy-900">
        Skip to main content
    </a>

    <x-layout.header />

    <main id="main-content">
        @yield('content')
    </main>

    <x-layout.footer />

    @stack('scripts')
</body>
</html>
