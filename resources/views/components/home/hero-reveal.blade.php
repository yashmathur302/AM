{{-- Homepage opener: single-line statement heading and subtext, followed by
     a full-width feature image with a one-time scroll-triggered zoom + fade
     reveal (matches the reference template's .anim-zoomin behavior). --}}
<section class="bg-cream-50">
    <div class="pt-16 pb-1 lg:pt-24 lg:pb-2">
        <div class="w-full px-[5.5%]">
            <h1 data-hero-heading class="font-banner font-normal leading-tight text-navy-900 text-[clamp(2rem,1.26rem_+_3.27vw,6.5rem)] whitespace-nowrap">
                Trust is <span class="relative inline-block">everything<svg class="circle-underline -rotate-3 pointer-events-none absolute -inset-x-6 -inset-y-5 sm:-inset-x-9 sm:-inset-y-7 text-gold-500" viewBox="0 0 220 70" preserveAspectRatio="none" aria-hidden="true"><path d="M 12,38 C 12,15 45,4 110,4 C 178,4 208,16 208,38 C 208,60 175,68 110,68 C 48,68 15,58 14,40 C 13,34 15,30 20,28" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" /></svg></span>.
            </h1>

            <p data-hero-subtext class="mt-6 text-[clamp(1.125rem,1.06rem_+_0.27vw,1.5rem)] text-slate-600 leading-relaxed">
                An India-focused investment bank built on character, competence and connections &mdash; advising mid-market and large corporates across mergers, fundraising and restructuring.
            </p>

            <div class="mt-8 flex flex-wrap items-center gap-x-8 gap-y-3">
                <a
                    href="{{ route('services.index') }}"
                    class="group inline-flex items-center gap-1.5 text-navy-700 font-menu text-sm font-semibold uppercase tracking-wide border-b border-navy-700/40 pb-1 hover:text-blue-600 hover:border-blue-600 transition-colors"
                >
                    Explore Our Practice
                    <span class="inline-block transition-transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5" aria-hidden="true">&#8599;</span>
                </a>
                <a
                    href="{{ route('contact') }}"
                    class="group inline-flex items-center gap-1.5 text-navy-700 font-menu text-sm font-semibold uppercase tracking-wide border-b border-navy-700/40 pb-1 hover:text-blue-600 hover:border-blue-600 transition-colors"
                >
                    Discuss a Transaction
                    <span class="inline-block transition-transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5" aria-hidden="true">&#8599;</span>
                </a>
            </div>
        </div>
    </div>

    <div class="relative w-full h-[280px] sm:h-[420px] lg:h-[600px] overflow-hidden" data-zoomin-wrap>
        <img
            src="{{ asset('images/hero-banner-meeting.jpg') }}"
            alt="Advisory team reviewing deal analytics together"
            data-zoomin-image
            class="absolute inset-0 w-full h-full object-cover opacity-0 scale-[1.2]"
        >
    </div>
</section>
