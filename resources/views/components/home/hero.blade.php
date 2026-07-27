{{--
    Layout reference: purchased template hero ("Orisa"). Structure/spacing
    copied; colors switched to our light blue/gold brand (client requires a
    light theme throughout, no dark sections), and the template's own
    placeholder copy kept as-is for now until real content is provided.
--}}
<section class="grid grid-cols-1 md:grid-cols-2 min-h-[560px] md:min-h-[640px]">
    {{-- Left: image half --}}
    <div class="relative bg-blue-100 flex items-end justify-start p-6 md:p-10 min-h-[320px] md:min-h-0 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center text-navy-700/40 text-sm">
            Hero image placeholder
        </div>

        <div class="relative z-10 flex items-center gap-2 text-sm text-navy-700">
            <span aria-hidden="true">&#127760;</span>
            <span>27.1127&deg; S, 109.3497&deg; W</span>
        </div>
    </div>

    {{-- Right: text half --}}
    <div class="relative bg-blue-50 flex flex-col justify-center gap-6 p-8 md:p-14 lg:p-20">
        <div class="flex items-center gap-3 text-xs font-semibold tracking-[0.2em] text-slate-500 uppercase">
            <span class="w-6 h-px bg-slate-400" aria-hidden="true"></span>
            Aurum Equity Partners &mdash; Since 2012
        </div>

        <h1 class="font-banner font-normal leading-[1.2] tracking-normal text-navy-900 text-5xl sm:text-6xl lg:text-7xl">
            Trust is<br>
            everything.
        </h1>

        <div class="flex items-start gap-4">
            <span class="mt-1 text-2xl text-gold-500" aria-hidden="true">&#10038;</span>
            <p class="max-w-[46ch] text-slate-600">
                An India-focused investment bank built on character, competence and connections — advising mid-market and large corporates across mergers, fundraising and restructuring.
            </p>
        </div>
    </div>
</section>
