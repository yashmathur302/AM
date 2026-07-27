@extends('layouts.app')

@section('content')
    <section class="bg-cream-50 py-16">
        <div class="max-w-6xl mx-auto px-4">
            <h1>About Us</h1>
            <p class="mt-4 text-slate-600">Placeholder — replace with the firm's approved company story.</p>
        </div>
    </section>

    <section class="py-16">
        <div class="max-w-6xl mx-auto px-4 grid gap-8 lg:grid-cols-[1.1fr_0.9fr] lg:items-center">
            <div>
                <h2>Our Story</h2>
                <p class="mt-4 text-slate-600">Placeholder company history and mission copy. Content and imagery will be finalised from the provided page design.</p>
            </div>
            <div class="aspect-[4/3] rounded-lg bg-slate-200 flex items-center justify-center text-slate-400 text-sm" role="img" aria-label="Firm photo placeholder">
                Firm photo placeholder
            </div>
        </div>
    </section>

    <section class="bg-cream-100 py-16">
        <div class="max-w-6xl mx-auto px-4">
            <h2>Our Values</h2>
            <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ([
                    ['title' => 'Integrity', 'text' => 'Placeholder value description.'],
                    ['title' => 'Discretion', 'text' => 'Placeholder value description.'],
                    ['title' => 'Rigor', 'text' => 'Placeholder value description.'],
                    ['title' => 'Partnership', 'text' => 'Placeholder value description.'],
                ] as $value)
                    <div class="bg-white rounded-lg shadow-sm p-5">
                        <h3 class="text-lg">{{ $value['title'] }}</h3>
                        <p class="mt-2 text-sm text-slate-600">{{ $value['text'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-16">
        <div class="max-w-6xl mx-auto px-4">
            <x-team.grid :members="$leadership" heading="Leadership Team" show-bio bio-limit="140" />
        </div>
    </section>
@endsection
