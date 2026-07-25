@extends('layouts.app')

@section('content')
    <section class="hero">
        <div class="hero__inner">
            <h1>Our Team</h1>
            <p>Meet the advisors behind our engagements.</p>
        </div>
    </section>

    <section class="listing">
        <div class="listing__inner">
            @if ($members->isEmpty())
                <p>Team profiles will appear here once added in the admin panel.</p>
            @else
                <div class="c-grid">
                    @foreach ($members as $member)
                        <div class="c-card">
                            @if ($member->photo_url)
                                <img class="c-card__media" src="{{ $member->photo_url }}" alt="{{ $member->name }}" loading="lazy" width="400" height="250">
                            @endif
                            <div class="c-card__body">
                                <h2 class="c-card__title">{{ $member->name }}</h2>
                                <p class="c-card__meta">{{ $member->role }}</p>
                                @if ($member->bio)
                                    <p class="c-card__excerpt">{{ $member->bio }}</p>
                                @endif
                                @if ($member->linkedin_url)
                                    <a class="c-card__link" href="{{ $member->linkedin_url }}" target="_blank" rel="noopener noreferrer">LinkedIn &rarr;</a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
