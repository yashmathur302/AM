@extends('layouts.app')

@section('content')
    <section class="hero">
        <div class="hero__inner">
            <h1 class="hero__title">Strategic Investment Banking Advisory for Ambitious Companies</h1>
            <p class="hero__subtitle">We guide founders, boards, and investors through mergers &amp; acquisitions, capital raising, and complex financial decisions with independent, senior-led advice.</p>
            <div class="hero__actions">
                <a class="c-btn c-btn--primary" href="{{ route('contact') }}">Request a Consultation</a>
                <a class="c-btn c-btn--secondary" href="{{ route('services.index') }}">Our Services</a>
            </div>
        </div>
    </section>

    <section class="stats">
        <div class="stats__inner">
            <div class="stats__item">
                <div class="stats__value">$2B+</div>
                <div class="stats__label">Transactions Advised</div>
            </div>
            <div class="stats__item">
                <div class="stats__value">150+</div>
                <div class="stats__label">Deals Closed</div>
            </div>
            <div class="stats__item">
                <div class="stats__value">20+</div>
                <div class="stats__label">Years Combined Experience</div>
            </div>
            <div class="stats__item">
                <div class="stats__value">98%</div>
                <div class="stats__label">Client Retention</div>
            </div>
        </div>
    </section>

    <section class="intro">
        <div class="intro__inner">
            <h2>Independent advice, senior attention, every engagement</h2>
            <p>Placeholder introduction copy — replace with the client's approved messaging once final content and design are provided.</p>
        </div>
    </section>

    <section class="services-preview">
        <div class="services-preview__inner">
            <div class="services-preview__header">
                <h2>What We Do</h2>
                <p>An overview of our core advisory services.</p>
            </div>
            <div class="c-grid">
                <div class="c-card">
                    <div class="c-card__body">
                        <h3 class="c-card__title">Mergers &amp; Acquisitions</h3>
                        <p class="c-card__excerpt">Buy-side and sell-side advisory for founders and boards.</p>
                        <a class="c-card__link" href="{{ route('services.index') }}">Learn more &rarr;</a>
                    </div>
                </div>
                <div class="c-card">
                    <div class="c-card__body">
                        <h3 class="c-card__title">Capital Raising</h3>
                        <p class="c-card__excerpt">Debt and equity financing solutions tailored to your growth stage.</p>
                        <a class="c-card__link" href="{{ route('services.index') }}">Learn more &rarr;</a>
                    </div>
                </div>
                <div class="c-card">
                    <div class="c-card__body">
                        <h3 class="c-card__title">Strategic Advisory</h3>
                        <p class="c-card__excerpt">Valuation, restructuring, and long-term financial strategy.</p>
                        <a class="c-card__link" href="{{ route('services.index') }}">Learn more &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if ($teamPreview->isNotEmpty())
        <section class="team-preview">
            <div class="team-preview__inner">
                <div class="team-preview__header">
                    <h2>Leadership</h2>
                </div>
                <div class="c-grid">
                    @foreach ($teamPreview as $member)
                        <div class="c-card">
                            @if ($member->photo_url)
                                <img class="c-card__media" src="{{ $member->photo_url }}" alt="{{ $member->name }}" loading="lazy" width="400" height="250">
                            @endif
                            <div class="c-card__body">
                                <h3 class="c-card__title">{{ $member->name }}</h3>
                                <p class="c-card__meta">{{ $member->role }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if ($latestPosts->isNotEmpty())
        <section class="insights-preview">
            <div class="insights-preview__inner">
                <div class="insights-preview__header">
                    <h2>Latest Insights</h2>
                </div>
                <div class="c-grid">
                    @foreach ($latestPosts as $post)
                        <div class="c-card">
                            @if ($post->featured_image_url)
                                <img class="c-card__media" src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" loading="lazy" width="400" height="250">
                            @endif
                            <div class="c-card__body">
                                <span class="c-card__meta">{{ $post->published_at->format('M j, Y') }}</span>
                                <h3 class="c-card__title">{{ $post->title }}</h3>
                                <p class="c-card__excerpt">{{ $post->excerpt }}</p>
                                <a class="c-card__link" href="{{ route('blog.show', $post) }}">Read more &rarr;</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="cta-banner">
        <div class="cta-banner__inner">
            <h2>Ready to discuss your next move?</h2>
            <p>Speak with our advisory team in confidence.</p>
            <a class="c-btn c-btn--primary" href="{{ route('contact') }}">Request a Consultation</a>
        </div>
    </section>
@endsection
