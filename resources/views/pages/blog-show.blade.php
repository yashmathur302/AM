@extends('layouts.app')

@section('content')
    <section class="bg-blue-100 py-16">
        <div class="max-w-3xl mx-auto px-4">
            <h1>{{ $post->title }}</h1>
            <div class="mt-3 flex gap-4 text-sm text-slate-500">
                <span>{{ $post->published_at->format('F j, Y') }}</span>
                <span>By {{ $post->author->name }}</span>
            </div>
        </div>
    </section>

    <article class="py-16">
        <div class="max-w-3xl mx-auto px-4">
            @if ($post->featured_image_url)
                <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" width="760" height="428" class="rounded-lg mb-8">
            @endif

            <div class="prose prose-slate max-w-none prose-headings:font-heading prose-a:text-navy-700">
                {!! $post->body !!}
            </div>
        </div>
    </article>

    @if ($related->isNotEmpty())
        <section class="bg-blue-100 py-16">
            <div class="max-w-6xl mx-auto px-4">
                <x-blog.grid :posts="$related" heading="Related Insights" />
            </div>
        </section>
    @endif
@endsection
