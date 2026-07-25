@php
    // Transactions, Sectors, and Life @ Aurum have no route yet — left as
    // label-only placeholders until those pages exist.
    $navLinks = [
        ['route' => 'about', 'pattern' => 'about', 'label' => 'About'],
        ['route' => 'services.index', 'pattern' => 'services.index', 'label' => 'Services'],
        ['route' => null, 'pattern' => null, 'label' => 'Transactions'],
        ['route' => null, 'pattern' => null, 'label' => 'Sectors'],
        ['route' => 'blog.index', 'pattern' => 'blog.*', 'label' => 'Insights'],
        ['route' => null, 'pattern' => null, 'label' => 'Life @ Aurum'],
        ['route' => 'contact', 'pattern' => 'contact', 'label' => 'Contact'],
    ];
@endphp

<header class="group sticky top-0 z-40 bg-navy-900" data-nav-state="closed">
    <div class="max-w-7xl mx-auto px-6 flex items-center justify-between py-4">
        <a href="{{ route('home') }}" class="flex items-center gap-2 font-heading font-bold text-lg text-white">
            <span class="text-gold-500" aria-hidden="true">&#9670;</span>
            {{ config('app.name') }}
        </a>

        {{-- Desktop: horizontal pill bar, hidden until the toggle opens it --}}
        <nav
            aria-label="Primary"
            class="hidden lg:group-data-[nav-state=open]:flex items-center gap-1 mx-6"
        >
            @foreach ($navLinks as $link)
                <a
                    href="{{ $link['route'] ? route($link['route']) : '#' }}"
                    class="flex items-center gap-1 rounded px-4 py-2 text-sm font-semibold whitespace-nowrap {{ $link['pattern'] && request()->routeIs($link['pattern']) ? 'bg-white/15 text-white' : 'text-white/85 hover:bg-white/10 hover:text-white' }}"
                >
                    {{ $link['label'] }}
                    <span class="text-[0.6rem] opacity-70" aria-hidden="true">&#9662;</span>
                </a>
            @endforeach
        </nav>

        <button
            type="button"
            data-nav-toggle
            aria-expanded="false"
            aria-controls="primary-nav"
            aria-label="Toggle menu"
            class="relative flex items-center justify-center rounded bg-white/10 p-3 hover:bg-white/20 transition-colors shrink-0"
        >
            <span class="flex flex-col gap-1.5 group-data-[nav-state=open]:hidden">
                <span class="w-5 h-0.5 bg-white"></span>
                <span class="w-5 h-0.5 bg-white"></span>
                <span class="w-5 h-0.5 bg-white"></span>
            </span>
            <span class="hidden group-data-[nav-state=open]:block text-white text-xl leading-none">&times;</span>
        </button>

        {{-- Mobile: off-canvas drawer, never shown at lg+ --}}
        <nav
            id="primary-nav"
            data-nav
            aria-label="Primary"
            class="lg:hidden fixed inset-y-0 right-0 z-50 w-80 max-w-[85vw] bg-navy-900 px-6 py-8 overflow-y-auto translate-x-full group-data-[nav-state=open]:translate-x-0 transition-transform duration-200"
        >
            <button type="button" data-nav-close aria-label="Close menu" class="mb-8 flex items-center gap-2 text-white/70 hover:text-white text-sm">
                &times; Close
            </button>

            <ul class="flex flex-col gap-4">
                @foreach ($navLinks as $link)
                    <li>
                        <a
                            href="{{ $link['route'] ? route($link['route']) : '#' }}"
                            class="block text-lg font-medium {{ $link['pattern'] && request()->routeIs($link['pattern']) ? 'text-gold-500' : 'text-white/85 hover:text-gold-500' }}"
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

    <div data-nav-overlay class="lg:hidden fixed inset-0 z-40 bg-navy-900/60 opacity-0 pointer-events-none transition-opacity duration-200 group-data-[nav-state=open]:opacity-100 group-data-[nav-state=open]:pointer-events-auto"></div>
</header>
