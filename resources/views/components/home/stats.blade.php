@php
    $stats = [
        [
            'value' => 200,
            'suffix' => '+',
            'label' => 'Transactions Closed',
            'description' => 'Successfully concluded across every major sector of the Indian economy.',
        ],
        [
            'value' => 2000,
            'suffix' => '+',
            'label' => 'Deals Scrutinised',
            'description' => 'Pattern-recognition compounded over a decade of disciplined diligence.',
        ],
        [
            'value' => 5,
            'suffixWord' => 'decades',
            'label' => 'Cumulative Deal Experience',
            'description' => "Senior bankers with a craftsman's view of structuring and execution.",
        ],
        [
            'value' => 4,
            'suffixWord' => 'cities',
            'label' => 'India Footprint',
            'description' => 'Delhi NCR · Mumbai · Bengaluru · Chennai — close to clients, capital and policy.',
        ],
    ];
@endphp

{{-- Stat counters: an inset gold card (not full-bleed like the marquee),
     rounded corners, white text. Numbers count up from 0 once the card
     scrolls into view. --}}
<section class="bg-cream-50 mt-10 lg:mt-16">
    <div class="px-[5.5%]">
        <div class="rounded-[2rem] bg-gold-500 px-8 py-12 sm:px-12 lg:px-16 lg:py-16">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-10">
                @foreach ($stats as $i => $stat)
                    <div class="{{ $i > 0 ? 'lg:border-l lg:border-white/25 lg:pl-8' : '' }}">
                        <div class="flex items-baseline gap-2">
                            <span
                                data-stat-counter
                                data-value="{{ $stat['value'] }}"
                                data-suffix="{{ $stat['suffix'] ?? '' }}"
                                class="font-banner text-white text-[clamp(2rem,1.4rem_+_2.5vw,3.25rem)] leading-none whitespace-nowrap"
                            >0{{ $stat['suffix'] ?? '' }}</span>
                            @if (isset($stat['suffixWord']))
                                <span class="font-banner font-normal text-white/70 text-[clamp(1.25rem,1.1rem_+_0.7vw,1.75rem)] leading-none">{{ $stat['suffixWord'] }}</span>
                            @endif
                        </div>
                        <p class="mt-3 font-banner font-semibold text-white text-[clamp(0.95rem,0.85rem_+_0.4vw,1.2rem)] leading-snug whitespace-nowrap">{{ $stat['label'] }}</p>
                        <p class="mt-2 text-[clamp(1rem,0.92rem_+_0.35vw,1.25rem)] text-white/80 leading-relaxed">{{ $stat['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
