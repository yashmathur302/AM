<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('admin-title') | {{ config('app.name') }} Admin</title>
    <meta name="robots" content="noindex, nofollow">
    @vite(['resources/css/admin.css', 'resources/js/admin.js'])
</head>
<body class="bg-offwhite">
    <div class="lg:grid lg:grid-cols-[240px_1fr] min-h-screen">
        <aside class="bg-navy-900 text-white p-4 flex flex-col">
            <a href="{{ route('admin.dashboard') }}" class="block font-heading font-bold text-lg text-white mb-8">{{ config('app.name') }} Admin</a>

            <nav class="flex flex-col gap-1">
                @foreach ([
                    ['route' => 'admin.dashboard', 'pattern' => 'admin.dashboard', 'label' => 'Dashboard'],
                    ['route' => 'admin.posts.index', 'pattern' => 'admin.posts.*', 'label' => 'Blog Posts'],
                    ['route' => 'admin.team.index', 'pattern' => 'admin.team.*', 'label' => 'Team Members'],
                    ['route' => 'admin.pages.index', 'pattern' => 'admin.pages.*', 'label' => 'Page SEO'],
                    ['route' => 'admin.leads.index', 'pattern' => 'admin.leads.*', 'label' => 'Contact Leads'],
                ] as $link)
                    <a
                        href="{{ route($link['route']) }}"
                        class="rounded px-3 py-2 {{ request()->routeIs($link['pattern']) ? 'bg-white/10 text-white' : 'text-white/80 hover:bg-white/10 hover:text-white' }}"
                    >
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </nav>

            <form method="POST" action="{{ route('admin.logout') }}" class="mt-auto pt-8">
                @csrf
                <x-ui.button type="submit" variant="secondary" block>Log Out</x-ui.button>
            </form>
        </aside>

        <div class="p-6">
            <div class="flex items-center justify-between mb-6">
                <h1>@yield('admin-title')</h1>
                @hasSection('admin-actions')
                    <div>@yield('admin-actions')</div>
                @endif
            </div>

            @if (session('status'))
                <div class="mb-4 rounded bg-green-50 px-4 py-3 text-sm text-green-700">{{ session('status') }}</div>
            @endif

            @yield('admin-content')
        </div>
    </div>
</body>
</html>
