@extends('layouts.app')

@section('content')
    <section class="text-white bg-gradient-to-br from-navy-900 to-navy-700 py-16">
        <div class="max-w-6xl mx-auto px-4">
            <h1 class="text-white">Our Services</h1>
            <p class="mt-4 text-white/85">Placeholder — replace with the firm's approved services overview.</p>
        </div>
    </section>

    <section class="py-16">
        <div class="max-w-6xl mx-auto px-4 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ([
                ['title' => 'Mergers & Acquisitions', 'text' => 'Buy-side and sell-side advisory, deal structuring, and negotiation support.'],
                ['title' => 'Capital Raising', 'text' => 'Debt and equity financing solutions across growth stages.'],
                ['title' => 'Valuation & Fairness Opinions', 'text' => 'Independent valuation analysis for transactions and disputes.'],
                ['title' => 'Restructuring Advisory', 'text' => 'Balance sheet and operational restructuring guidance.'],
                ['title' => 'Strategic Consulting', 'text' => 'Long-term financial and corporate strategy advisory.'],
                ['title' => 'Due Diligence', 'text' => 'Financial and commercial due diligence for transactions.'],
            ] as $service)
                <x-ui.card>
                    <h2 class="text-lg font-heading font-bold text-navy-900">{{ $service['title'] }}</h2>
                    <p class="text-slate-600 text-sm">{{ $service['text'] }}</p>
                </x-ui.card>
            @endforeach
        </div>
    </section>

    <section class="bg-offwhite py-16">
        <div class="max-w-6xl mx-auto px-4">
            <h2>How We Work</h2>
            <div class="mt-10 grid gap-6 md:grid-cols-4">
                @foreach ([
                    ['step' => '1', 'title' => 'Discovery', 'text' => 'Understand your goals and constraints.'],
                    ['step' => '2', 'title' => 'Strategy', 'text' => 'Define the optimal path forward.'],
                    ['step' => '3', 'title' => 'Execution', 'text' => 'Manage the process end-to-end.'],
                    ['step' => '4', 'title' => 'Close', 'text' => 'Finalise terms and complete the transaction.'],
                ] as $item)
                    <div class="text-center">
                        <div class="mx-auto mb-3 flex h-12 w-12 items-center justify-center rounded-full bg-navy-900 font-heading text-gold-500">{{ $item['step'] }}</div>
                        <h3 class="text-lg">{{ $item['title'] }}</h3>
                        <p class="mt-2 text-sm text-slate-600">{{ $item['text'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
