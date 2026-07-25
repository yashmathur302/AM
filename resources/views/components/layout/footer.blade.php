<footer class="bg-navy-900 text-white/75 pt-16 pb-8">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-[2fr_1fr_1fr_1fr] gap-8">
            <div>
                <h3 class="text-white text-base mb-3">{{ config('app.name') }}</h3>
                <p>Independent investment banking advisory services covering mergers &amp; acquisitions, capital raising, and strategic financial consulting.</p>
            </div>

            <div>
                <h3 class="text-white text-base mb-3">Company</h3>
                <ul class="flex flex-col gap-2">
                    <li><a class="hover:text-gold-500" href="{{ route('about') }}">About Us</a></li>
                    <li><a class="hover:text-gold-500" href="{{ route('team.index') }}">Our Team</a></li>
                    <li><a class="hover:text-gold-500" href="{{ route('blog.index') }}">Insights</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-white text-base mb-3">Services</h3>
                <ul class="flex flex-col gap-2">
                    <li><a class="hover:text-gold-500" href="{{ route('services.index') }}">All Services</a></li>
                    <li><a class="hover:text-gold-500" href="{{ route('contact') }}">Request a Consultation</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-white text-base mb-3">Contact</h3>
                <ul class="flex flex-col gap-2">
                    <li><a class="hover:text-gold-500" href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.address') }}</a></li>
                </ul>
            </div>
        </div>

        <div class="mt-16 pt-4 border-t border-white/10 flex flex-wrap gap-3 justify-between text-sm">
            <span>&copy; {{ now()->year }} {{ config('app.name') }}. All rights reserved.</span>
            <span>Investment banking services are offered subject to applicable regulatory disclosures.</span>
        </div>
    </div>
</footer>
