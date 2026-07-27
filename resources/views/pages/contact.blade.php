@extends('layouts.app')

@section('content')
    <section class="bg-cream-50 py-16">
        <div class="max-w-6xl mx-auto px-4">
            <h1>Contact Us</h1>
            <p class="mt-4 text-slate-600">Tell us about your situation and a member of our advisory team will respond promptly.</p>
        </div>
    </section>

    <section class="py-16">
        <div class="max-w-6xl mx-auto px-4 grid gap-8 lg:grid-cols-2">
            <div>
                @if ($errors->any())
                    <div class="mb-4 rounded bg-red-50 px-4 py-3 text-sm text-red-700" role="alert">
                        Please correct the errors below and resubmit the form.
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.store') }}" novalidate>
                    @csrf

                    <x-ui.form.input name="name" label="Full name" required maxlength="120" autocomplete="name" />
                    <x-ui.form.input name="email" type="email" label="Email address" required maxlength="190" autocomplete="email" />
                    <x-ui.form.input name="phone" type="tel" label="Phone (optional)" maxlength="30" autocomplete="tel" />
                    <x-ui.form.input name="company" label="Company (optional)" maxlength="150" autocomplete="organization" />

                    <x-ui.form.select name="service_interest" label="Service of interest (optional)">
                        <option value="">Select an option</option>
                        <option value="Mergers & Acquisitions" @selected(old('service_interest') === 'Mergers & Acquisitions')>Mergers &amp; Acquisitions</option>
                        <option value="Capital Raising" @selected(old('service_interest') === 'Capital Raising')>Capital Raising</option>
                        <option value="Valuation" @selected(old('service_interest') === 'Valuation')>Valuation &amp; Fairness Opinions</option>
                        <option value="Restructuring" @selected(old('service_interest') === 'Restructuring')>Restructuring Advisory</option>
                        <option value="Other" @selected(old('service_interest') === 'Other')>Other</option>
                    </x-ui.form.select>

                    <x-ui.form.textarea name="message" label="Message" required maxlength="5000" rows="6" />

                    {{-- Honeypot: left blank by real visitors, hidden from assistive tech --}}
                    <div class="sr-only" aria-hidden="true">
                        <label for="website">Leave this field blank</label>
                        <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                    </div>

                    <x-ui.button type="submit" variant="primary" block>Send Message</x-ui.button>
                </form>
            </div>

            <div>
                <div class="flex gap-3">
                    <span class="shrink-0 text-gold-600" aria-hidden="true">&#9993;</span>
                    <a class="hover:text-gold-600" href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.address') }}</a>
                </div>
            </div>
        </div>
    </section>
@endsection
