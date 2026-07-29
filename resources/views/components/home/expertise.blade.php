@php
    $practices = [
        [
            'index' => '01',
            'name' => 'Mergers & Acquisitions',
            'columns' => [
                ['Sell-Side M&A', 'Corporate Alliances & JVs', 'Takeover Strategies'],
                ['Buy-Side M&A', 'Business Divestitures', 'Acquisition Financing'],
            ],
        ],
        [
            'index' => '02',
            'name' => 'Fundraising',
            'columns' => [
                ['Private Equity & Venture Capital', 'Real Estate Finance', 'Impact Funding'],
                ['Mezzanine Finance', 'Infrastructure Finance', 'ESG Funding'],
            ],
        ],
        [
            'index' => '03',
            'name' => 'Restructuring',
            'columns' => [
                ['Balance Sheet Recapitalization', 'Distressed M&A', 'Litigation Support'],
                ['Special Situations', 'NPA Resolution', 'Distressed Debt Sale'],
            ],
        ],
        [
            'index' => '04',
            'name' => 'Corporate Advisory',
            'columns' => [
                ['Valuations & Fairness Opinions', 'Capital Structure Planning', 'General Advisory'],
                ['Group Reorganization', 'Financial Planning', 'Strategic Reviews'],
            ],
        ],
    ];
@endphp

{{-- "Four practices, one promise": statement heading + intro paragraph,
     followed by a pinned scroll-stack where each practice takes the full
     viewport and the next one covers it as you scroll — matching the
     reference template's "Things We Offer" section (position:absolute
     stacked panels inside a sticky-pinned viewport). Reimplemented in
     vanilla JS since the source's own pin/stack script wasn't available;
     below lg the panels just stack in normal document flow instead. --}}
<section class="bg-cream-50 mt-10 lg:mt-16">
    <div class="w-full px-[5.5%]">
        <div class="grid lg:grid-cols-2 gap-8 lg:gap-16 items-start pb-12 lg:pb-16">
            <h2 class="font-banner font-normal leading-tight text-navy-900 text-[clamp(1.75rem,1.3rem_+_2vw,3.25rem)]">
                Four practices.<br>
                <span class="italic text-gold-600">One promise.</span>
            </h2>
            <p class="text-[clamp(1rem,0.92rem_+_0.35vw,1.25rem)] text-slate-600 leading-relaxed">
                Whether we are selling a family business, raising a fund's first institutional round, or rescuing a balance sheet, our work moves through a single set of senior hands &mdash; yours, and ours.
            </p>
        </div>
    </div>

    <div data-stack-wrapper class="relative border-t border-navy-900/10">
        <div data-stack-sticky class="lg:sticky lg:top-0 lg:h-screen lg:overflow-hidden">
            @foreach ($practices as $i => $practice)
                <div
                    data-stack-item
                    data-index="{{ $i }}"
                    class="w-full lg:h-full flex items-center border-b border-navy-900/10 lg:border-b-0 {{ $i > 0 ? 'lg:absolute lg:inset-0 lg:opacity-0' : '' }}"
                >
                    <div class="w-full px-[5.5%] py-14 lg:py-0 grid lg:grid-cols-2 gap-8 lg:gap-16 items-center">
                        <div>
                            <span data-stack-index class="block font-menu text-xs tracking-[0.2em] text-slate-400">{{ $practice['index'] }}</span>
                            <h3 data-stack-heading class="mt-3 font-banner font-normal text-navy-900 text-[clamp(1.75rem,1.3rem_+_2.2vw,3.5rem)] leading-tight">
                                {{ $practice['name'] }}
                            </h3>
                            <div data-stack-body class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-x-12 gap-y-2 max-w-2xl">
                                @foreach ($practice['columns'] as $column)
                                    <ul class="space-y-3">
                                        @foreach ($column as $item)
                                            <li class="text-sm sm:text-base text-slate-600 border-t border-dashed border-[#878482]/50 pt-3">{{ $item }}</li>
                                        @endforeach
                                    </ul>
                                @endforeach
                            </div>
                        </div>

                        <div class="rounded-2xl bg-navy-900/5 border border-navy-900/10 aspect-[4/3] flex items-center justify-center overflow-hidden">
                            <svg class="w-10 h-10 text-navy-900/20" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <rect x="3" y="3" width="18" height="18" rx="2" stroke="currentColor" stroke-width="1.5"/>
                                <circle cx="8.5" cy="8.5" r="1.5" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M21 15l-5-5-4 4-3-3-6 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
