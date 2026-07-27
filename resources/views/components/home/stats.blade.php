@php
    $stats = [
        ['value' => '$2B+', 'label' => 'Transactions Advised'],
        ['value' => '150+', 'label' => 'Deals Closed'],
        ['value' => '20+', 'label' => 'Years Combined Experience'],
        ['value' => '98%', 'label' => 'Client Retention'],
    ];
@endphp

<section class="bg-cream-100 py-16">
    <div class="max-w-6xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-8">
        @foreach ($stats as $stat)
            <div class="text-center">
                <div class="font-heading text-3xl text-navy-800">{{ $stat['value'] }}</div>
                <div class="mt-2 text-sm text-slate-600">{{ $stat['label'] }}</div>
            </div>
        @endforeach
    </div>
</section>
