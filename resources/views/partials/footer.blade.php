<footer class="l-footer">
    <div class="u-container">
        <div class="l-footer__grid">
            <div>
                <h3 class="l-footer__heading">{{ config('app.name') }}</h3>
                <p>Independent investment banking advisory services covering mergers &amp; acquisitions, capital raising, and strategic financial consulting.</p>
            </div>

            <div>
                <h3 class="l-footer__heading">Company</h3>
                <ul class="l-footer__list">
                    <li><a class="l-footer__link" href="{{ route('about') }}">About Us</a></li>
                    <li><a class="l-footer__link" href="{{ route('team.index') }}">Our Team</a></li>
                    <li><a class="l-footer__link" href="{{ route('blog.index') }}">Insights</a></li>
                </ul>
            </div>

            <div>
                <h3 class="l-footer__heading">Services</h3>
                <ul class="l-footer__list">
                    <li><a class="l-footer__link" href="{{ route('services.index') }}">All Services</a></li>
                    <li><a class="l-footer__link" href="{{ route('contact') }}">Request a Consultation</a></li>
                </ul>
            </div>

            <div>
                <h3 class="l-footer__heading">Contact</h3>
                <ul class="l-footer__list">
                    <li><a class="l-footer__link" href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.address') }}</a></li>
                </ul>
            </div>
        </div>

        <div class="l-footer__bottom">
            <span>&copy; {{ now()->year }} {{ config('app.name') }}. All rights reserved.</span>
            <span>Investment banking services are offered subject to applicable regulatory disclosures.</span>
        </div>
    </div>
</footer>
