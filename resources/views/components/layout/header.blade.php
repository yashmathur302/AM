<header class="sticky top-0 z-40 bg-navy-900">
    <div class="max-w-7xl mx-auto px-6 flex items-center justify-between py-4">
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
            class="flex flex-col gap-1.5 rounded bg-white/10 p-3 hover:bg-white/20 transition-colors"
        >
            <span class="w-5 h-0.5 bg-white"></span>
            <span class="w-5 h-0.5 bg-white"></span>
            <span class="w-5 h-0.5 bg-white"></span>
        </button>

        <nav
            id="primary-nav"
            data-nav
            aria-label="Primary"
            class="fixed inset-y-0 right-0 z-50 w-80 max-w-[85vw] bg-navy-900 px-6 py-8 overflow-y-auto translate-x-full transition-transform duration-200"
        >
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

            <button type="button" data-nav-close aria-label="Close menu" class="mb-8 flex items-center gap-2 text-white/70 hover:text-white text-sm">
                &times; Close
            </button>

            <ul class="flex flex-col gap-4">
                @foreach ($navLinks as $link)
                    <li>
                        <a
                            href="{{ route($link['route']) }}"
                            class="block text-lg font-medium {{ request()->routeIs($link['pattern']) ? 'text-gold-500' : 'text-white/85 hover:text-gold-500' }}"
                        >
                            {{ $link['label'] }}
                        </a>
                    </li>
                @endforeach
                <li class="mt-4">
                    <x-ui.button href="{{ route('contact') }}" variant="primary">Request a Consultation</x-ui.button>
                </li>
            </ul>
        </nav>
    </div>

    <div data-nav-overlay class="fixed inset-0 z-40 bg-navy-900/60 opacity-0 pointer-events-none transition-opacity duration-200"></div>
</header>
