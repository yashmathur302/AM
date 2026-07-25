@props(['members'])

@if ($members->isNotEmpty())
    <section class="py-16">
        <div class="max-w-6xl mx-auto px-4">
            <x-team.grid :members="$members" heading="Leadership" />
        </div>
    </section>
@endif
