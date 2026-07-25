{{--
    Layout reference: purchased template hero ("Orisa"). Structure/spacing
    copied; colors switched to our light blue/gold brand (client requires a
    light theme throughout, no dark sections), and the template's own
    placeholder copy kept as-is for now until real content is provided.
--}}
<section class="grid grid-cols-1 md:grid-cols-2 min-h-[560px] md:min-h-[640px]">
    {{-- Left: image half --}}
    <div class="relative bg-blue-50 flex items-end justify-start p-6 md:p-10 min-h-[320px] md:min-h-0 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-50 to-blue-100 flex items-center justify-center text-navy-700/40 text-sm">
            Hero image placeholder
        </div>

        <div class="relative z-10 flex items-center gap-2 text-sm text-navy-700">
            <span aria-hidden="true">&#127760;</span>
            <span>27.1127&deg; S, 109.3497&deg; W</span>
        </div>
    </div>

    {{-- Right: text half --}}
    <div class="relative bg-white flex flex-col justify-center gap-6 p-8 md:p-14 lg:p-20">
        <div class="flex flex-wrap gap-4 text-xs font-semibold tracking-widest text-blue-600">
            <span>[ BUILD ]</span>
            <span>[ GROW ]</span>
            <span>[ SCALE ]</span>
            <span>[ BOOST ]</span>
        </div>

        <div class="relative">
            <h1 class="font-body font-black uppercase leading-[0.95] tracking-tight text-navy-900 text-4xl sm:text-5xl lg:text-6xl">
                Advancing<br>
                Startup<br>
                Innovation
            </h1>
            <span class="hidden sm:block absolute top-2 -right-2 lg:right-8 text-blue-600 text-3xl" aria-hidden="true">&#8599;</span>
        </div>

        <div class="flex items-start gap-4">
            <span class="mt-1 text-2xl text-gold-500" aria-hidden="true">&#10038;</span>
            <p class="max-w-[46ch] text-slate-600">
                From MVP launch to global scaling, we provide the strategic design and high-performance technology startups need to dominate their market. Our team delivers products that matter.
            </p>
        </div>
    </div>
</section>
