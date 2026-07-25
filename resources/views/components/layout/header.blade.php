@php
    $navLinks = [
        ['route' => 'home', 'pattern' => 'home', 'label' => 'Home'],
        ['route' => 'about', 'pattern' => 'about', 'label' => 'About'],
        ['route' => 'services.index', 'pattern' => 'services.index', 'label' => 'Services'],
        ['route' => 'team.index', 'pattern' => 'team.index', 'label' => 'Team'],
        ['route' => 'blog.index', 'pattern' => 'blog.*', 'label' => 'Insights'],
        ['route' => 'contact', 'pattern' => 'contact', 'label' => 'Contact'],
    ];
@endphp

<header class="sticky top-0 z-40 bg-navy-900 shadow-sm">
    <div class="max-w-6xl mx-auto px-4 flex items-center justify-between py-3">
        <a href="{{ route('home') }}" class="flex items-center gap-2 font-heading font-bold text-lg text-white">
            <span class="text-gold-500" aria-hidden="true">&#9670;</span>
            {{ config('app.name') }}
        </a>

        <button
            type="button"
            data-nav-toggle
            aria-expanded="false"
            aria-controls="primary-nav"
            aria-label="Toggle menu"
            class="flex flex-col gap-1.5 p-2 lg:hidden"
        >
            <span class="w-6 h-0.5 bg-white"></span>
            <span class="w-6 h-0.5 bg-white"></span>
            <span class="w-6 h-0.5 bg-white"></span>
        </button>

        <nav
            id="primary-nav"
            data-nav
            aria-label="Primary"
            class="fixed inset-y-0 right-0 w-80 max-w-[85vw] bg-navy-900 px-4 py-8 overflow-y-auto translate-x-full transition-transform duration-200 lg:static lg:w-auto lg:max-w-none lg:bg-transparent lg:px-0 lg:py-0 lg:translate-x-0 lg:overflow-visible"
        >
            <ul class="flex flex-col gap-4 lg:flex-row lg:items-center lg:gap-6">
                @foreach ($navLinks as $link)
                    <li>
                        <a
                            href="{{ route($link['route']) }}"
                            class="block font-medium text-sm {{ request()->routeIs($link['pattern']) ? 'text-gold-500' : 'text-white/85 hover:text-gold-500' }}"
                        >
                            {{ $link['label'] }}
                        </a>
                    </li>
                @endforeach
                <li class="mt-4 lg:mt-0">
                    <x-ui.button href="{{ route('contact') }}" variant="primary">Request a Consultation</x-ui.button>
                </li>
            </ul>
        </nav>
    </div>

    <div data-nav-overlay class="fixed inset-0 bg-navy-900/60 opacity-0 pointer-events-none transition-opacity duration-200 lg:hidden"></div>
</header>
