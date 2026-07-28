@php
    $marqueeItems = [
        'Est. 2012',
        'India-focused',
        'Mergers & Acquisitions',
        'Fundraising',
        'Restructuring',
        'Corporate Advisory',
    ];
@endphp

{{-- Continuous scrolling strip of firm highlights. The track is rendered
     twice back-to-back and translated by exactly -50% of its own width, so
     the loop point is pixel-identical to the start — no reset jump. --}}
<section class="relative bg-gold-500 py-7 lg:py-9 mt-10 lg:mt-16 overflow-hidden">
    <div class="flex w-max animate-marquee motion-reduce:animate-none">
        @for ($set = 0; $set < 2; $set++)
            <div class="flex items-center gap-7 px-7 shrink-0" @if ($set === 1) aria-hidden="true" @endif>
                @foreach ($marqueeItems as $item)
                    <span class="font-menu font-bold leading-none text-white text-[clamp(1.375rem,1.05rem_+_1.3vw,2.25rem)] whitespace-nowrap">{{ $item }}</span>
                    <span class="leading-none text-white text-[clamp(1.25rem,0.98rem_+_1.1vw,2rem)]" aria-hidden="true">&#10022;</span>
                @endforeach
            </div>
        @endfor
    </div>

    <div class="absolute inset-x-0 bottom-0 flex flex-col gap-1.5" aria-hidden="true">
        <span class="block h-px scale-y-25 bg-cream-50"></span>
        <span class="block h-px scale-y-25 bg-cream-50"></span>
        <span class="block h-px scale-y-25 bg-cream-50"></span>
        <span class="block h-px scale-y-25 bg-cream-50"></span>
    </div>
</section>
