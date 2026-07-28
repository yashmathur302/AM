// Homepage opener: subtext-width sync plus a one-time zoom + fade reveal on
// the full-width feature image, matching the reference template's GSAP call
// as closely as possible without pulling in GSAP itself:
//
//   gsap.timeline({ scrollTrigger: { trigger: wrap, start: "top 100%" } })
//     .from(img, { duration: 2, autoAlpha: 0, scale: 1.2, ease: Power2.easeOut });
//
// Power2.easeOut is a quadratic ease-out (1 - (1-t)^2), approximated below
// with the standard easeOutQuad cubic-bezier. It's a single reveal that
// fires once as the image enters the viewport — not a continuous
// scroll-tied parallax.

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

    const wrap = document.querySelector('[data-zoomin-wrap]');
    const image = document.querySelector('[data-zoomin-image]');

    if (!wrap || !image) {
        return;
    }

    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        image.classList.remove('opacity-0', 'scale-[1.2]');
        return;
    }

    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) {
                return;
            }

            // Tailwind's scale-[] utility sets the standalone CSS `scale`
            // property, not `transform` — the transition must target that.
            image.style.transition = 'opacity 2s cubic-bezier(0.25, 0.46, 0.45, 0.94), scale 2s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
            image.classList.remove('opacity-0', 'scale-[1.2]');
            obs.unobserve(wrap);
        });
    }, { threshold: 0 });

    observer.observe(wrap);
});
