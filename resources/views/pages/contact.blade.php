@extends('layouts.app')

@section('content')
    <section class="hero">
        <div class="hero__inner">
            <h1>Contact Us</h1>
            <p>Tell us about your situation and a member of our advisory team will respond promptly.</p>
        </div>
    </section>

    <section class="content">
        <div class="content__inner">
            <div>
                @if ($errors->any())
                    <div class="c-form-error" role="alert">
                        Please correct the errors below and resubmit the form.
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.store') }}" novalidate>
                    @csrf

                    <div class="c-form-group">
                        <label class="c-form-label" for="name">Full name</label>
                        <input class="c-form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{ old('name') }}" required maxlength="120" autocomplete="name">
                        @error('name')<span class="c-form-error">{{ $message }}</span>@enderror
                    </div>

                    <div class="c-form-group">
                        <label class="c-form-label" for="email">Email address</label>
                        <input class="c-form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" value="{{ old('email') }}" required maxlength="190" autocomplete="email">
                        @error('email')<span class="c-form-error">{{ $message }}</span>@enderror
                    </div>

                    <div class="c-form-group">
                        <label class="c-form-label" for="phone">Phone (optional)</label>
                        <input class="c-form-control @error('phone') is-invalid @enderror" type="tel" id="phone" name="phone" value="{{ old('phone') }}" maxlength="30" autocomplete="tel">
                        @error('phone')<span class="c-form-error">{{ $message }}</span>@enderror
                    </div>

                    <div class="c-form-group">
                        <label class="c-form-label" for="company">Company (optional)</label>
                        <input class="c-form-control @error('company') is-invalid @enderror" type="text" id="company" name="company" value="{{ old('company') }}" maxlength="150" autocomplete="organization">
                        @error('company')<span class="c-form-error">{{ $message }}</span>@enderror
                    </div>

                    <div class="c-form-group">
                        <label class="c-form-label" for="service_interest">Service of interest (optional)</label>
                        <select class="c-form-control @error('service_interest') is-invalid @enderror" id="service_interest" name="service_interest">
                            <option value="">Select an option</option>
                            <option value="Mergers & Acquisitions" @selected(old('service_interest') === 'Mergers & Acquisitions')>Mergers &amp; Acquisitions</option>
                            <option value="Capital Raising" @selected(old('service_interest') === 'Capital Raising')>Capital Raising</option>
                            <option value="Valuation" @selected(old('service_interest') === 'Valuation')>Valuation &amp; Fairness Opinions</option>
                            <option value="Restructuring" @selected(old('service_interest') === 'Restructuring')>Restructuring Advisory</option>
                            <option value="Other" @selected(old('service_interest') === 'Other')>Other</option>
                        </select>
                        @error('service_interest')<span class="c-form-error">{{ $message }}</span>@enderror
                    </div>

                    <div class="c-form-group">
                        <label class="c-form-label" for="message">Message</label>
                        <textarea class="c-form-control @error('message') is-invalid @enderror" id="message" name="message" required maxlength="5000">{{ old('message') }}</textarea>
                        @error('message')<span class="c-form-error">{{ $message }}</span>@enderror
                    </div>

                    {{-- Honeypot: left blank by real visitors, hidden from assistive tech --}}
                    <div class="u-visually-hidden" aria-hidden="true">
                        <label for="website">Leave this field blank</label>
                        <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                    </div>

                    <button type="submit" class="c-btn c-btn--primary c-btn--block">Send Message</button>
                </form>
            </div>

            <div class="info">
                <div class="info__item">
                    <span class="info__icon" aria-hidden="true">&#9993;</span>
                    <span><a href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.address') }}</a></span>
                </div>
            </div>
        </div>
    </section>
@endsection
