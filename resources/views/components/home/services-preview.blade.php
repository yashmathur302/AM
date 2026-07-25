@php
    $services = [
        ['title' => 'Mergers & Acquisitions', 'excerpt' => 'Buy-side and sell-side advisory for founders and boards.'],
        ['title' => 'Capital Raising', 'excerpt' => 'Debt and equity financing solutions tailored to your growth stage.'],
        ['title' => 'Strategic Advisory', 'excerpt' => 'Valuation, restructuring, and long-term financial strategy.'],
    ];
@endphp

<section class="py-16">
    <div class="max-w-6xl mx-auto px-4">
        <div class="max-w-[60ch] mb-10">
            <h2>What We Do</h2>
            <p class="mt-2 text-slate-600">An overview of our core advisory services.</p>
        </div>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($services as $service)
                <x-ui.card>
                    <h3 class="text-lg font-heading font-bold text-navy-900">{{ $service['title'] }}</h3>
                    <p class="text-slate-600 text-sm">{{ $service['excerpt'] }}</p>
                    <a class="mt-auto font-semibold text-navy-700 hover:text-gold-600" href="{{ route('services.index') }}">Learn more &rarr;</a>
                </x-ui.card>
            @endforeach
        </div>
    </div>
</section>
