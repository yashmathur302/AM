// Homepage opener: subtext-width sync, a one-time zoom + fade reveal on the
// feature image (matching the reference template's GSAP call as closely as
// possible without pulling in GSAP itself:
//
//   gsap.timeline({ scrollTrigger: { trigger: wrap, start: "top 100%" } })
//     .from(img, { duration: 2, autoAlpha: 0, scale: 1.2, ease: Power2.easeOut });
//
// Power2.easeOut is a quadratic ease-out, approximated with the standard
// easeOutQuad cubic-bezier), plus a continuous scroll parallax on top of it.
// The reveal (opacity/scale) and the parallax (transform: translateY) are
// separate CSS properties in modern browsers, so both can animate the same
// image element independently without conflicting.

document.addEventListener('DOMContentLoaded', () => {
    // Keep the subtext's right edge aligned with the heading above it —
    // the heading's width is fluid (clamp-based font size), so this is
    // measured rather than a fixed max-width. Re-run once the typewriter
    // below finishes too, since the heading grows from empty to full width
    // as it types and the initial measurement would otherwise be ~0.
    const heading = document.querySelector('[data-hero-heading]');
    const subtext = document.querySelector('[data-hero-subtext]');
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    let syncSubtextWidth = () => {};

    if (heading && subtext) {
        syncSubtextWidth = () => {
            subtext.style.maxWidth = `${heading.getBoundingClientRect().width}px`;
        };
        window.addEventListener('resize', syncSubtextWidth);
        syncSubtextWidth();
    }

    // Heading types out character by character; once fully typed, the gold
    // circle draws once around "everything" and the subtext fades in from
    // slightly above its resting position — matching the requested order
    // (heading finishes first, then the circle plays, not concurrently).
    const typewriterEls = document.querySelectorAll('[data-typewriter]');
    const circle = document.querySelector('[data-circle]');

    if (typewriterEls.length) {
        const revealSubtext = () => {
            if (!subtext) {
                return;
            }
            subtext.style.transition = 'opacity 700ms ease-out, transform 700ms ease-out';
            subtext.classList.remove('opacity-0', '-translate-y-4');
        };

        if (prefersReducedMotion) {
            typewriterEls.forEach((el) => {
                el.textContent = el.dataset.text || '';
            });
            syncSubtextWidth();
            revealSubtext();
            // Circle stays hidden under reduced motion (see app.css).
        } else {
            const segments = Array.from(typewriterEls).map((el) => ({
                el,
                text: el.dataset.text || '',
                i: 0,
            }));
            const CHAR_DELAY = 38;
            let segIndex = 0;

            const typeStep = () => {
                if (segIndex >= segments.length) {
                    syncSubtextWidth();
                    if (circle) {
                        circle.classList.add('is-drawing');
                    }
                    revealSubtext();
                    return;
                }

                const seg = segments[segIndex];

                if (seg.i < seg.text.length) {
                    seg.el.textContent += seg.text[seg.i];
                    seg.i += 1;
                    setTimeout(typeStep, CHAR_DELAY);
                } else {
                    segIndex += 1;
                    typeStep();
                }
            };

            typeStep();
        }
    }

    const wrap = document.querySelector('[data-zoomin-wrap]');
    const image = document.querySelector('[data-zoomin-image]');

    if (wrap && image) {
        if (prefersReducedMotion) {
            image.classList.remove('opacity-0', 'scale-[1.2]');
        } else {
            const observer = new IntersectionObserver((entries, obs) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) {
                        return;
                    }

                    // Tailwind's scale-[] utility sets the standalone CSS
                    // `scale` property, not `transform` — the transition
                    // must target that, and it won't collide with the
                    // parallax translateY below since they're separate
                    // properties.
                    image.style.transition = 'opacity 2s cubic-bezier(0.25, 0.46, 0.45, 0.94), scale 2s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
                    image.classList.remove('opacity-0', 'scale-[1.2]');
                    obs.unobserve(wrap);
                });
            }, { threshold: 0 });

            observer.observe(wrap);
        }
    }

    const parallaxContainer = document.querySelector('[data-parallax]');
    const parallaxImage = document.querySelector('[data-parallax-image]');

    if (!parallaxContainer || !parallaxImage || prefersReducedMotion) {
        return;
    }

    // The image is oversized to 130% of the container's height (see the
    // -top-[15%] h-[130%] classes), leaving a 15%-of-height buffer on each
    // side to move within. Using a fraction of the container's own height
    // (rather than a fixed px value) keeps the range proportional and safely
    // inside that buffer at every breakpoint, instead of overflowing it on
    // shorter mobile containers.
    const RANGE_FRACTION = 0.22;

    const computeOffset = () => {
        const rect = parallaxContainer.getBoundingClientRect();
        const vh = window.innerHeight;
        const total = vh + rect.height;
        const traveled = vh - rect.top;
        const progress = Math.min(1, Math.max(0, traveled / total));

        return (progress - 0.5) * rect.height * RANGE_FRACTION;
    };

    let rafId = null;

    const loop = () => {
        parallaxImage.style.transform = `translateY(${computeOffset()}px)`;
        rafId = requestAnimationFrame(loop);
    };

    rafId = requestAnimationFrame(loop);

    window.addEventListener('beforeunload', () => cancelAnimationFrame(rafId));
});
