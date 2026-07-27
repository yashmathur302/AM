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

        {{-- Desktop: horizontal pill bar that wipes open left-to-right.
             flex-nowrap never changes between states (only max-width does),
             so the browser never has to re-evaluate wrapping mid-transition
             — that's what caused the old height "jump". Overflow-hidden
             clips the nowrap content until max-width grows past it, which
             reads as a left-to-right reveal. The target max-width is an
             overestimate of the real content width (a standard trick for
             transitioning to an intrinsic size in CSS). --}}
        <nav
            aria-label="Primary"
            class="hidden lg:flex flex-nowrap items-center justify-start gap-1 ml-6 max-w-0 overflow-hidden transition-[max-width] duration-500 ease-in-out group-data-[nav-state=open]:max-w-[64rem]"
        >
            @foreach ($navLinks as $link)
                <a
                    href="{{ $link['route'] ? route($link['route']) : '#' }}"
                    class="flex items-center gap-1 rounded px-2 py-2 font-menu text-[17px] font-medium whitespace-nowrap {{ $link['pattern'] && request()->routeIs($link['pattern']) ? 'bg-white text-blue-600' : 'text-navy-700 hover:bg-white hover:text-blue-600' }}"
                >
                    {{ $link['label'] }}
                    <span class="text-xs opacity-70" aria-hidden="true">&#9662;</span>
                </a>
            @endforeach
        </nav>

        <button
            type="button"
            data-nav-toggle
            aria-expanded="false"
            aria-controls="primary-nav"
            aria-label="Toggle menu"
            class="relative flex items-center gap-3 rounded-xl bg-gold-500 px-5 py-3 text-navy-900 shadow-sm hover:bg-gold-600 transition-colors shrink-0"
        >
            <span class="text-sm font-bold tracking-wide group-data-[nav-state=open]:hidden">MENU</span>
            <span class="text-sm font-bold tracking-wide hidden group-data-[nav-state=open]:inline">CLOSE</span>

            <span class="grid grid-cols-2 gap-0.5 group-data-[nav-state=open]:hidden" aria-hidden="true">
                <span class="w-1.5 h-1.5 rounded-[1px] bg-navy-900"></span>
                <span class="w-1.5 h-1.5 rounded-[1px] bg-navy-900"></span>
                <span class="w-1.5 h-1.5 rounded-[1px] bg-navy-900"></span>
                <span class="w-1.5 h-1.5 rounded-[1px] bg-navy-900"></span>
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
