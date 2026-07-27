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

<header class="group sticky top-0 z-40 bg-cream-50 border-b border-cream-100" data-nav-state="closed">
    <div class="max-w-7xl mx-auto px-6 flex items-center justify-between py-4">
        <a href="{{ route('home') }}" class="flex items-center shrink-0">
            <img src="{{ asset('images/Aurum_Logo_Colour1-removebg-preview.png') }}" alt="Aurum" class="h-10 sm:h-12 w-auto">
        </a>

        {{-- Desktop: plain horizontal nav, always visible — no toggle. --}}
        <nav aria-label="Primary" class="hidden lg:flex items-center gap-1 ml-6">
            @foreach ($navLinks as $link)
                <a
                    href="{{ $link['route'] ? route($link['route']) : '#' }}"
                    class="rounded px-2 py-2 font-menu text-[17px] font-medium whitespace-nowrap {{ $link['pattern'] && request()->routeIs($link['pattern']) ? 'bg-white text-blue-600' : 'text-navy-700 hover:bg-white hover:text-blue-600' }}"
                >
                    {{ $link['label'] }}
                </a>
            @endforeach
        </nav>

        <a
            href="{{ route('contact') }}"
            class="hidden lg:inline-flex items-center gap-2 rounded-xl bg-gold-500 px-5 py-3 text-white font-bold text-sm tracking-wide shadow-sm hover:bg-gold-600 transition-colors shrink-0"
        >
            Enquire Now
            <span aria-hidden="true">&rarr;</span>
        </a>

        {{-- Mobile-only hamburger toggle for the off-canvas drawer below. --}}
        <button
            type="button"
            data-nav-toggle
            aria-expanded="false"
            aria-controls="primary-nav"
            aria-label="Toggle menu"
            class="lg:hidden relative flex items-center gap-3 rounded-xl bg-gold-500 px-5 py-3 text-white shadow-sm hover:bg-gold-600 transition-colors shrink-0"
        >
            <span class="text-sm font-bold tracking-wide group-data-[nav-state=open]:hidden">MENU</span>
            <span class="text-sm font-bold tracking-wide hidden group-data-[nav-state=open]:inline">CLOSE</span>

            <span class="grid grid-cols-2 gap-0.5 group-data-[nav-state=open]:hidden" aria-hidden="true">
                <span class="w-1.5 h-1.5 rounded-[1px] bg-white"></span>
                <span class="w-1.5 h-1.5 rounded-[1px] bg-white"></span>
                <span class="w-1.5 h-1.5 rounded-[1px] bg-white"></span>
                <span class="w-1.5 h-1.5 rounded-[1px] bg-white"></span>
            </span>
            <span class="hidden group-data-[nav-state=open]:block text-lg leading-none" aria-hidden="true">&times;</span>
        </button>

        {{-- Mobile: off-canvas drawer, never shown at lg+ --}}
        <nav
            id="primary-nav"
            data-nav
            aria-label="Primary"
            class="lg:hidden fixed inset-y-0 right-0 z-50 w-80 max-w-[85vw] bg-white shadow-xl px-6 py-8 overflow-y-auto translate-x-full group-data-[nav-state=open]:translate-x-0 transition-transform duration-500 ease-in-out"
        >
            <button type="button" data-nav-close aria-label="Close menu" class="mb-8 flex items-center gap-2 text-navy-500 hover:text-navy-900 text-sm">
                &times; Close
            </button>

            <ul class="flex flex-col gap-4">
                @foreach ($navLinks as $link)
                    <li>
                        <a
                            href="{{ $link['route'] ? route($link['route']) : '#' }}"
                            class="block font-menu text-[25px] font-medium {{ $link['pattern'] && request()->routeIs($link['pattern']) ? 'text-blue-600' : 'text-navy-700 hover:text-blue-600' }}"
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

    <div data-nav-overlay class="lg:hidden fixed inset-0 z-40 bg-slate-900/50 opacity-0 pointer-events-none transition-opacity duration-500 ease-in-out group-data-[nav-state=open]:opacity-100 group-data-[nav-state=open]:pointer-events-auto"></div>
</header>
