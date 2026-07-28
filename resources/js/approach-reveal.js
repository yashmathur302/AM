// Scroll-linked reveal for the "Who We Are" approach list: each item slides
// horizontally into place as it enters the viewport — no opacity change,
// items stay fully visible throughout, matching the source template's
// `gsap.from(boxes, { x: "100%", ... })` (opacity was never part of that
// tween). Tied directly to scroll position (not a one-shot trigger), so it
// naturally reverses when scrolling back up, without pulling in GSAP.

document.addEventListener('DOMContentLoaded', () => {
    const items = document.querySelectorAll('[data-approach-item]');

    if (!items.length || window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        return;
    }

    let ticking = false;

    const update = () => {
        ticking = false;

        const vh = window.innerHeight;
        const start = vh * 0.95;
        const end = vh * 0.55;

        items.forEach((item) => {
            const top = item.getBoundingClientRect().top;
            const progress = Math.min(1, Math.max(0, (start - top) / (start - end)));

            item.style.transform = `translateX(${(1 - progress) * 140}px)`;
        });
    };

    const onScroll = () => {
        if (!ticking) {
            ticking = true;
            requestAnimationFrame(update);
        }
    };

    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', onScroll);
    update();
});
