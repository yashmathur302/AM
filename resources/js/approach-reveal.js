// Scroll-linked reveal for the "Who We Are" approach list, matching the
// source template's GSAP call as closely as possible without pulling in
// GSAP itself:
//
//   gsap.from(boxes, {
//     x: "100%", duration: 1, stagger: 0.3, ease: "power2.out",
//     scrollTrigger: {
//       scrub: 2, trigger: ".approach-wrapper-box",
//       start: "top 100%", end: "bottom 40%",
//     }
//   });
//
// The critical detail: all four boxes share ONE scroll-linked timeline
// driven by the WRAPPER's position (start when its top hits the bottom of
// the viewport, end when its bottom reaches 40% down the viewport) — the
// stagger just offsets each item's start time *within* that single
// timeline, it does not give each item its own independent trigger. A
// per-item independent trigger (each box watching its own position) is
// what caused items to reveal one at a time as you scrolled down the
// whole list, instead of together within one shorter scroll window.

document.addEventListener('DOMContentLoaded', () => {
    const wrapper = document.querySelector('[data-approach-wrapper]');
    const items = document.querySelectorAll('[data-approach-item]');

    if (!wrapper || !items.length || window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        return;
    }

    const DURATION = 1;
    const STAGGER = 0.3;
    const OFFSET_PX = 140;
    const totalTime = DURATION + STAGGER * (items.length - 1);

    // power2.out
    const ease = (t) => 1 - (1 - t) * (1 - t);

    const itemWindows = Array.from(items).map((_, i) => ({
        start: (i * STAGGER) / totalTime,
        end: (i * STAGGER + DURATION) / totalTime,
    }));

    let lastProgress = -1;
    let rafId = null;

    const computeTarget = () => {
        const rect = wrapper.getBoundingClientRect();
        const vh = window.innerHeight;
        const startTop = vh; // trigger: "top 100%"
        const endTop = vh * 0.4 - rect.height; // trigger: "bottom 40%"
        const range = startTop - endTop;

        return range > 0
            ? Math.min(1, Math.max(0, (startTop - rect.top) / range))
            : 0;
    };

    const apply = (progress) => {
        items.forEach((item, i) => {
            const { start, end } = itemWindows[i];
            const local = end > start ? (progress - start) / (end - start) : 0;
            const eased = ease(Math.min(1, Math.max(0, local)));

            item.style.transform = `translateX(${(1 - eased) * OFFSET_PX}px)`;
        });
    };

    // Tied 1:1 to scroll position (see hero-reveal.js) so the reveal speed
    // tracks actual scroll speed instead of trailing at a fixed rate.
    const loop = () => {
        const target = computeTarget();

        if (target !== lastProgress) {
            apply(target);
            lastProgress = target;
        }

        rafId = requestAnimationFrame(loop);
    };

    rafId = requestAnimationFrame(loop);

    window.addEventListener('beforeunload', () => cancelAnimationFrame(rafId));
});
