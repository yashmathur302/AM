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

<header class="group sticky top-0 z-40 bg-white border-b border-slate-100" data-nav-state="closed">
    <div class="max-w-7xl mx-auto px-6 flex items-center justify-between py-4">
        <a href="{{ route('home') }}" class="flex items-center gap-2 font-heading font-bold text-lg text-navy-900">
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
                    class="flex items-center gap-1 rounded px-4 py-2 text-sm font-semibold whitespace-nowrap {{ $link['pattern'] && request()->routeIs($link['pattern']) ? 'bg-blue-50 text-blue-600' : 'text-navy-700 hover:bg-blue-50 hover:text-blue-600' }}"
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
            class="relative flex items-center gap-3 rounded-xl bg-blue-600 px-5 py-3 text-white shadow-sm hover:bg-blue-700 transition-colors shrink-0"
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
            class="lg:hidden fixed inset-y-0 right-0 z-50 w-80 max-w-[85vw] bg-white shadow-xl px-6 py-8 overflow-y-auto translate-x-full group-data-[nav-state=open]:translate-x-0 transition-transform duration-200"
        >
            <button type="button" data-nav-close aria-label="Close menu" class="mb-8 flex items-center gap-2 text-navy-500 hover:text-navy-900 text-sm">
                &times; Close
            </button>

            <ul class="flex flex-col gap-4">
                @foreach ($navLinks as $link)
                    <li>
                        <a
                            href="{{ $link['route'] ? route($link['route']) : '#' }}"
                            class="block text-lg font-medium {{ $link['pattern'] && request()->routeIs($link['pattern']) ? 'text-blue-600' : 'text-navy-700 hover:text-blue-600' }}"
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

    <div data-nav-overlay class="lg:hidden fixed inset-0 z-40 bg-slate-900/50 opacity-0 pointer-events-none transition-opacity duration-200 group-data-[nav-state=open]:opacity-100 group-data-[nav-state=open]:pointer-events-auto"></div>
</header>
