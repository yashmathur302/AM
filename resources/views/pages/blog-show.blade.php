@extends('layouts.app')

@section('content')
    <section class="hero">
        <div class="hero__inner">
            <h1>{{ $post->title }}</h1>
            <div class="hero__meta">
                <span>{{ $post->published_at->format('F j, Y') }}</span>
                <span>By {{ $post->author->name }}</span>
            </div>
        </div>
    </section>

    <article class="article">
        <div class="article__inner">
            @if ($post->featured_image_url)
                <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" width="760" height="428">
            @endif

            <div class="article__body">
                {!! $post->body !!}
            </div>
        </div>
    </article>

    @if ($related->isNotEmpty())
        <section class="related">
            <div class="related__inner">
                <h2>Related Insights</h2>
                <div class="c-grid">
                    @foreach ($related as $item)
                        <div class="c-card">
                            @if ($item->featured_image_url)
                                <img class="c-card__media" src="{{ $item->featured_image_url }}" alt="{{ $item->title }}" loading="lazy" width="400" height="250">
                            @endif
                            <div class="c-card__body">
                                <h3 class="c-card__title">{{ $item->title }}</h3>
                                <a class="c-card__link" href="{{ route('blog.show', $item) }}">Read more &rarr;</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
