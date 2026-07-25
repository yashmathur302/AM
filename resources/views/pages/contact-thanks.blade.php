@extends('layouts.app')

@section('content')
    <section class="hero">
        <div class="hero__inner">
            <h1>Thank You</h1>
        </div>
    </section>

    <section class="content">
        <div class="content__inner">
            <p>Thank you for reaching out. A member of our advisory team will be in touch shortly.</p>
            <a class="c-btn c-btn--outline" href="{{ route('home') }}">Back to Home</a>
        </div>
    </section>
@endsection
