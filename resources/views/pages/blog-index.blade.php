@extends('layouts.app')

@section('content')
    <section class="hero">
        <div class="hero__inner">
            <h1>Insights</h1>
            <p>Market commentary and analysis from our advisory team.</p>
        </div>
    </section>

    <section class="listing">
        <div class="listing__inner">
            @if ($posts->isEmpty())
                <p>No articles published yet.</p>
            @else
                <div class="c-grid">
                    @foreach ($posts as $post)
                        <div class="c-card">
                            @if ($post->featured_image_url)
                                <img class="c-card__media" src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" loading="lazy" width="400" height="250">
                            @endif
                            <div class="c-card__body">
                                <span class="c-card__meta">{{ $post->published_at->format('M j, Y') }}</span>
                                <h2 class="c-card__title">{{ $post->title }}</h2>
                                <p class="c-card__excerpt">{{ $post->excerpt }}</p>
                                <a class="c-card__link" href="{{ route('blog.show', $post) }}">Read more &rarr;</a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="pagination">
                    {{ $posts->links() }}
                </div>
            @endif
        </div>
    </section>
@endsection
