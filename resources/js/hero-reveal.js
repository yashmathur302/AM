// Homepage opener: subtext-width sync plus a scroll parallax effect on the
// full-width feature image. The image is oversized (130% height, offset
// -15% from the top) inside an overflow-hidden container, and translateY
// shifts it as the section passes through the viewport — since transform
// is compositor-only (no layout/reflow), it can be set directly from the
// raw scroll position every animation frame with no smoothing needed and
// no lag, unlike the old width/height expansion approach.

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

    const container = document.querySelector('[data-parallax]');
    const image = document.querySelector('[data-parallax-image]');

    if (!container || !image || window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        return;
    }

    const RANGE = 60; // total px of vertical travel across the section's pass through the viewport

    const computeOffset = () => {
        const rect = container.getBoundingClientRect();
        const vh = window.innerHeight;
        const total = vh + rect.height;
        const traveled = vh - rect.top;
        const progress = Math.min(1, Math.max(0, traveled / total));

        return (progress - 0.5) * RANGE;
    };

    let rafId = null;

    const loop = () => {
        image.style.transform = `translateY(${computeOffset()}px)`;
        rafId = requestAnimationFrame(loop);
    };

    rafId = requestAnimationFrame(loop);

    window.addEventListener('beforeunload', () => cancelAnimationFrame(rafId));
});
