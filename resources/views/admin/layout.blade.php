<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('admin-title') | {{ config('app.name') }} Admin</title>
    <meta name="robots" content="noindex, nofollow">
    @vite(['resources/sass/admin.scss', 'resources/js/admin.js'])
</head>
<body>
    <div class="admin-layout">
        <aside class="admin-sidebar">
            <a class="admin-sidebar__brand" href="{{ route('admin.dashboard') }}">{{ config('app.name') }} Admin</a>
            <nav class="admin-sidebar__nav">
                <a class="admin-sidebar__link @if(request()->routeIs('admin.dashboard')) is-active @endif" href="{{ route('admin.dashboard') }}">Dashboard</a>
                <a class="admin-sidebar__link @if(request()->routeIs('admin.posts.*')) is-active @endif" href="{{ route('admin.posts.index') }}">Blog Posts</a>
                <a class="admin-sidebar__link @if(request()->routeIs('admin.team.*')) is-active @endif" href="{{ route('admin.team.index') }}">Team Members</a>
                <a class="admin-sidebar__link @if(request()->routeIs('admin.pages.*')) is-active @endif" href="{{ route('admin.pages.index') }}">Page SEO</a>
                <a class="admin-sidebar__link @if(request()->routeIs('admin.leads.*')) is-active @endif" href="{{ route('admin.leads.index') }}">Contact Leads</a>
            </nav>
            <form class="admin-sidebar__form" method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="c-btn c-btn--secondary c-btn--block">Log Out</button>
            </form>
        </aside>

        <div class="admin-main">
            <div class="admin-header">
                <h1>@yield('admin-title')</h1>
                @hasSection('admin-actions')
                    <div>@yield('admin-actions')</div>
                @endif
            </div>

            @if (session('status'))
                <div class="admin-alert admin-alert--success">{{ session('status') }}</div>
            @endif

            @yield('admin-content')
        </div>
    </div>
</body>
</html>
