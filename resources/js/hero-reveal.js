// Scroll-linked reveal for the homepage opener: the feature image starts at
// the same width as the text content above it (rounded corners), then grows
// to fullscreen (corners unrounding) while pinned. A persistent rAF loop
// lerps toward the scroll-computed target every frame — tying the size
// directly 1:1 to the raw scroll event felt laggy/stepped on discrete
// wheel/trackpad input, this smooths it out continuously regardless of how
// choppy the incoming scroll events are. No animation library; a no-op
// below the lg breakpoint or with reduced motion.

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
    const image = document.querySelector('[data-hero-reveal-image]');

    if (!section || !image) {
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

    if (prefersReducedMotion) {
        return;
    }

    const computeTarget = () => {
        const rect = section.getBoundingClientRect();
        const scrollable = rect.height - window.innerHeight;
        return scrollable > 0
            ? Math.min(1, Math.max(0, -rect.top / scrollable))
            : 0;
    };

    let current = computeTarget();
    let rafId = null;

    const apply = (progress) => {
        if (!isDesktop()) {
            image.style.removeProperty('width');
            image.style.removeProperty('height');
            image.style.removeProperty('border-radius');
            return;
        }

        const startW = window.innerWidth * CONTENT_WIDTH_FRACTION;

        image.style.width = `${lerp(startW, window.innerWidth, progress)}px`;
        image.style.height = `${lerp(startH, window.innerHeight, progress)}px`;
        image.style.borderRadius = `${lerp(startRadius, 0, progress)}px`;
    };

    const loop = () => {
        const target = computeTarget();
        current += (target - current) * 0.15;

        if (Math.abs(target - current) < 0.0005) {
            current = target;
        }

        apply(current);
        rafId = requestAnimationFrame(loop);
    };

    rafId = requestAnimationFrame(loop);

    window.addEventListener('beforeunload', () => cancelAnimationFrame(rafId));
});
