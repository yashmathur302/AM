<header class="l-header">
    <div class="l-header__inner u-container">
        <a href="{{ route('home') }}" class="l-header__logo">
            <span class="l-header__logo-mark" aria-hidden="true">&#9670;</span>
            {{ config('app.name') }}
        </a>

        <button type="button" class="l-nav__toggle" data-nav-toggle aria-expanded="false" aria-controls="primary-nav" aria-label="Toggle menu">
            <span class="l-nav__toggle-bar"></span>
            <span class="l-nav__toggle-bar"></span>
            <span class="l-nav__toggle-bar"></span>
        </button>

        <nav class="l-nav" id="primary-nav" data-nav aria-label="Primary">
            <ul class="l-nav__list">
                <li class="l-nav__item"><a class="l-nav__link @if(request()->routeIs('home')) is-active @endif" href="{{ route('home') }}">Home</a></li>
                <li class="l-nav__item"><a class="l-nav__link @if(request()->routeIs('about')) is-active @endif" href="{{ route('about') }}">About</a></li>
                <li class="l-nav__item"><a class="l-nav__link @if(request()->routeIs('services.index')) is-active @endif" href="{{ route('services.index') }}">Services</a></li>
                <li class="l-nav__item"><a class="l-nav__link @if(request()->routeIs('team.index')) is-active @endif" href="{{ route('team.index') }}">Team</a></li>
                <li class="l-nav__item"><a class="l-nav__link @if(request()->routeIs('blog.*')) is-active @endif" href="{{ route('blog.index') }}">Insights</a></li>
                <li class="l-nav__item"><a class="l-nav__link @if(request()->routeIs('contact')) is-active @endif" href="{{ route('contact') }}">Contact</a></li>
                <li class="l-nav__item l-nav__cta">
                    <a class="c-btn c-btn--primary" href="{{ route('contact') }}">Request a Consultation</a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="l-nav-overlay" data-nav-overlay></div>
</header>
