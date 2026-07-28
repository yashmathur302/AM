@php
    $approachItems = [
        [
            'title' => 'Character.',
            'text' => 'A partner-led ethic. Honest counsel, even when it costs us a mandate. Long-term relationships over transactional wins.',
        ],
        [
            'title' => 'Competence.',
            'text' => 'Senior bankers on every deal. Sector specialists, structuring depth and a track record across cycles and geographies.',
        ],
        [
            'title' => 'Connections.',
            'text' => 'Three decades of relationships with promoters, funds and corporates — amplified by strategic partners across nine industry verticals.',
        ],
    ];
@endphp

{{-- "Who We Are" intro: eyebrow, two-line serif statement heading (left),
     firm description paragraph plus a scroll-linked approach list (right),
     both columns starting on the same row. --}}
<section class="bg-cream-50 pb-16 lg:pb-24 mt-10 lg:mt-16">
    <div class="w-full px-[5.5%]">
        <div class="flex items-center gap-3 text-xs font-menu font-semibold tracking-[0.2em] text-slate-500 uppercase">
            <span class="w-6 h-px bg-slate-400" aria-hidden="true"></span>
            Who We Are
        </div>

        <div class="mt-5 grid lg:grid-cols-2 gap-8 lg:gap-16 items-start">
            <div>
                <h2 class="font-banner font-normal leading-tight text-navy-900 text-[clamp(1.75rem,1.3rem_+_2vw,3.25rem)]">
                    An India-focused<br>
                    investment bank,<br>
                    <span class="italic text-gold-600">built on trust.</span>
                </h2>

                <div class="mt-8 w-48 sm:w-56 aspect-[4/3] rounded-2xl bg-navy-900/5 border border-navy-900/10 flex items-center justify-center overflow-hidden">
                    <svg class="w-10 h-10 text-navy-900/20" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <rect x="3" y="3" width="18" height="18" rx="2" stroke="currentColor" stroke-width="1.5"/>
                        <circle cx="8.5" cy="8.5" r="1.5" stroke="currentColor" stroke-width="1.5"/>
                        <path d="M21 15l-5-5-4 4-3-3-6 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>

            <div>
                <p class="text-[clamp(1rem,0.92rem_+_0.35vw,1.25rem)] text-slate-600 leading-relaxed">
                    Set up in 2012 and led by a team of qualified, experienced professionals, Aurum Equity Partners advises mid-market and large corporates, multinationals and institutional financial investors across mergers and acquisitions, fundraising, restructuring and corporate strategic advisory.
                </p>

                <div class="mt-10 lg:mt-14" data-approach-wrapper>
                    @foreach ($approachItems as $i => $item)
                        <div
                            data-approach-item
                            class="grid grid-cols-[3rem_1fr] gap-x-4 gap-y-2 py-6 border-b border-dashed border-[#878482]/60 {{ $i === 0 ? 'border-t' : '' }}"
                        >
                            <span class="font-menu text-[18px] leading-[26px] text-navy-900">{{ sprintf('%02d', $i + 1) }}</span>
                            <div>
                                <h3 class="font-banner text-lg lg:text-xl text-gold-600">{{ $item['title'] }}</h3>
                                <p class="mt-2 text-sm text-slate-600 leading-relaxed">{{ $item['text'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
