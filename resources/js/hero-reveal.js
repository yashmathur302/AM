// Scroll-linked reveal for the homepage opener: the feature image starts at
// the same width as the text content above it (rounded corners), then grows
// to fullscreen (corners unrounding) while pinned, with its corner labels
// fading in early in the scroll. Plain rAF-throttled scroll handler — no
// animation library — and it's a no-op below the lg breakpoint or with
// reduced motion.

document.addEventListener('DOMContentLoaded', () => {
    // Keep the subtext's right edge aligned with the heading above it —
    // the heading's width is fluid (clamp-based font size), so this is
    // measured rather than a fixed max-width.
    const heading = document.querySelector('[data-hero-heading]');
    const subtext = document.querySelector('[data-hero-subtext]');

    if (heading && subtext) {
        const syncSubtextWidth = () => {
            subtext.style.maxWidth = `${heading.getBoundingClientRect().width}px`;
        };
        window.addEventListener('resize', syncSubtextWidth);
        syncSubtextWidth();
    }

    const section = document.querySelector('[data-hero-reveal]');
    const stage = document.querySelector('[data-hero-reveal-stage]');
    const image = document.querySelector('[data-hero-reveal-image]');

    if (!section || !stage || !image) {
        return;
    }

    // Matches the image's own Tailwind classes (lg:w-[89%] lg:h-[520px]
    // rounded-2xl) so there's no jump when JS first takes over sizing.
    const CONTENT_WIDTH_FRACTION = 0.89;
    const startH = 520;
    const startRadius = 16;

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const isDesktop = () => window.matchMedia('(min-width: 1024px)').matches;

    const lerp = (start, end, t) => start + (end - start) * t;

    let ticking = false;

    const reset = () => {
        image.style.removeProperty('width');
        image.style.removeProperty('height');
        image.style.removeProperty('border-radius');
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

        const startW = window.innerWidth * CONTENT_WIDTH_FRACTION;
        const width = lerp(startW, window.innerWidth, progress);
        const height = lerp(startH, window.innerHeight, progress);
        const radius = lerp(startRadius, 0, progress);
        const labelProgress = Math.min(1, progress / 0.2);

        image.style.width = `${width}px`;
        image.style.height = `${height}px`;
        image.style.borderRadius = `${radius}px`;
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
