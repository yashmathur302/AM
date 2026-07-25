@extends('layouts.app')

@section('content')
    <section class="text-white bg-gradient-to-br from-navy-900 to-navy-700 py-16">
        <div class="max-w-6xl mx-auto px-4">
            <h1 class="text-white">Our Team</h1>
            <p class="mt-4 text-white/85">Meet the advisors behind our engagements.</p>
        </div>
    </section>

    <section class="py-16">
        <div class="max-w-6xl mx-auto px-4">
            @if ($members->isEmpty())
                <p class="text-slate-600">Team profiles will appear here once added in the admin panel.</p>
            @else
                <x-team.grid :members="$members" show-bio show-linkedin />
            @endif
        </div>
    </section>
@endsection
