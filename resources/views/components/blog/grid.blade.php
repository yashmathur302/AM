@props(['posts', 'heading' => null])

@if ($posts->isNotEmpty())
    <div>
        @if ($heading)
            <h2 class="mb-10">{{ $heading }}</h2>
        @endif
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($posts as $post)
                <x-ui.card>
                    <x-slot:media>
                        @if ($post->featured_image_url)
                            <img class="aspect-[16/10] object-cover" src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" loading="lazy" width="400" height="250">
                        @endif
                    </x-slot:media>
                    <span class="text-xs text-slate-500">{{ $post->published_at->format('M j, Y') }}</span>
                    <h3 class="text-lg font-heading font-bold text-navy-900">{{ $post->title }}</h3>
                    @if ($post->excerpt)
                        <p class="text-slate-600 text-sm">{{ $post->excerpt }}</p>
                    @endif
                    <a class="mt-auto font-semibold text-navy-700 hover:text-gold-600" href="{{ route('blog.show', $post) }}">Read more &rarr;</a>
                </x-ui.card>
            @endforeach
        </div>
    </div>
@else
    <p class="text-slate-600">No articles published yet.</p>
@endif
