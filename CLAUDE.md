# Homepage section spacing rule

Every homepage section (`resources/views/components/home/*.blade.php`) must use
the same vertical gap to the section before it: `mt-10 lg:mt-16` on the
section's own root element, and nothing else.

- Do not add `pb-*`/`mb-*` for inter-section spacing on any section — only the
  next section's `mt-10 lg:mt-16` creates the gap. A section carrying its own
  trailing padding on top of the next section's margin double-stacks the gap
  and breaks the equal rhythm.
- When adding a new homepage section, give it `mt-10 lg:mt-16` and verify the
  gap above it matches the gaps elsewhere on the page (spot-check with
  `getBoundingClientRect()` between consecutive `<section>` elements).
- Decorative elements sitting between two sections (e.g. the marquee's bottom
  hairlines) are expected to add a little visual extra — that's fine and not
  a violation of this rule; only the section-to-section margin itself must
  stay consistent.
