@php
    $approachItems = [
        ['title' => 'Independent Advice', 'text' => 'Placeholder value description.'],
        ['title' => 'Sector Expertise', 'text' => 'Placeholder value description.'],
        ['title' => 'Disciplined Process', 'text' => 'Placeholder value description.'],
        ['title' => 'Long-Term Relationships', 'text' => 'Placeholder value description.'],
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
            <h2 class="font-banner font-normal leading-tight text-navy-900 text-[clamp(1.75rem,1.3rem_+_2vw,3.25rem)]">
                An India-focused<br>
                investment bank,<br>
                <span class="italic text-gold-600">built on trust.</span>
            </h2>

            <div>
                <p class="text-[clamp(1rem,0.92rem_+_0.35vw,1.25rem)] text-slate-600 leading-relaxed">
                    Set up in 2012 and led by a team of qualified, experienced professionals, Aurum Equity Partners advises mid-market and large corporates, multinationals and institutional financial investors across mergers and acquisitions, fundraising, restructuring and corporate strategic advisory.
                </p>

                <div class="mt-10 lg:mt-14">
                    @foreach ($approachItems as $i => $item)
                        <div
                            data-approach-item
                            class="grid grid-cols-[3rem_1fr] gap-x-4 gap-y-2 py-6 border-b border-dashed border-[#878482]/60 {{ $i === 0 ? 'border-t' : '' }}"
                        >
                            <span class="font-menu text-[18px] leading-[26px] text-navy-900">{{ sprintf('%02d', $i + 1) }}</span>
                            <div>
                                <h3 class="font-banner text-lg lg:text-xl text-navy-900">{{ $item['title'] }}</h3>
                                <p class="mt-2 text-sm text-slate-600 leading-relaxed">{{ $item['text'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
