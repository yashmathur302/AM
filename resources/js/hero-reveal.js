// Scroll-linked reveal for the homepage opener: the feature image grows from
// a fixed 500x650 box to fullscreen while pinned, and its corner labels fade
// in early in the scroll. Plain rAF-throttled scroll handler — no animation
// library — and it's a no-op below the lg breakpoint or with reduced motion.

document.addEventListener('DOMContentLoaded', () => {
    const section = document.querySelector('[data-hero-reveal]');
    const stage = document.querySelector('[data-hero-reveal-stage]');
    const image = document.querySelector('[data-hero-reveal-image]');

    if (!section || !stage || !image) {
        return;
    }

    const startW = 500;
    const startH = 650;
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const isDesktop = () => window.matchMedia('(min-width: 1024px)').matches;

    const lerp = (start, end, t) => start + (end - start) * t;

    let ticking = false;

    const reset = () => {
        image.style.removeProperty('width');
        image.style.removeProperty('height');
        stage.style.removeProperty('--reveal-label');
    };

    const update = () => {
        ticking = false;

        if (prefersReducedMotion || !isDesktop()) {
            reset();
            return;
        }

        const rect = section.getBoundingClientRect();
        const scrollable = rect.height - window.innerHeight;
        const progress = scrollable > 0
            ? Math.min(1, Math.max(0, -rect.top / scrollable))
            : 0;

        const width = lerp(startW, window.innerWidth, progress);
        const height = lerp(startH, window.innerHeight, progress);
        const labelProgress = Math.min(1, progress / 0.2);

        image.style.width = `${width}px`;
        image.style.height = `${height}px`;
        stage.style.setProperty('--reveal-label', labelProgress.toFixed(4));
    };

    const onScroll = () => {
        if (!ticking) {
            ticking = true;
            requestAnimationFrame(update);
        }
    };

    if (!prefersReducedMotion) {
        window.addEventListener('scroll', onScroll, { passive: true });
        window.addEventListener('resize', onScroll);
    }

    update();
});
