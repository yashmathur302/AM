@props(['posts'])

@if ($posts->isNotEmpty())
    <section class="py-16">
        <div class="max-w-6xl mx-auto px-4">
            <x-blog.grid :posts="$posts" heading="Latest Insights" />
        </div>
    </section>
@endif
