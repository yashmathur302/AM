@extends('layouts.app')

@section('content')
    <section class="hero">
        <div class="hero__inner">
            <h1>About Us</h1>
            <p>Placeholder — replace with the firm's approved company story.</p>
        </div>
    </section>

    <section class="story">
        <div class="story__inner">
            <div>
                <h2>Our Story</h2>
                <p>Placeholder company history and mission copy. Content and imagery will be finalised from the provided page design.</p>
            </div>
            <div>
                <img src="https://placehold.co/640x480?text=Firm+Photo" alt="Firm office" loading="lazy" width="640" height="480">
            </div>
        </div>
    </section>

    <section class="values">
        <div class="values__inner">
            <h2>Our Values</h2>
            <div class="values__grid">
                <div class="values__item">
                    <h3>Integrity</h3>
                    <p>Placeholder value description.</p>
                </div>
                <div class="values__item">
                    <h3>Discretion</h3>
                    <p>Placeholder value description.</p>
                </div>
                <div class="values__item">
                    <h3>Rigor</h3>
                    <p>Placeholder value description.</p>
                </div>
                <div class="values__item">
                    <h3>Partnership</h3>
                    <p>Placeholder value description.</p>
                </div>
            </div>
        </div>
    </section>

    @if ($leadership->isNotEmpty())
        <section class="leadership">
            <div class="leadership__inner">
                <h2>Leadership Team</h2>
                <div class="c-grid">
                    @foreach ($leadership as $member)
                        <div class="c-card">
                            @if ($member->photo_url)
                                <img class="c-card__media" src="{{ $member->photo_url }}" alt="{{ $member->name }}" loading="lazy" width="400" height="250">
                            @endif
                            <div class="c-card__body">
                                <h3 class="c-card__title">{{ $member->name }}</h3>
                                <p class="c-card__meta">{{ $member->role }}</p>
                                @if ($member->bio)
                                    <p class="c-card__excerpt">{{ Str::limit($member->bio, 140) }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
