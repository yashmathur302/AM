@extends('layouts.app')

@section('content')
    <section class="bg-offwhite py-16">
        <div class="max-w-6xl mx-auto px-4">
            <h1>Insights</h1>
            <p class="mt-4 text-slate-600">Market commentary and analysis from our advisory team.</p>
        </div>
    </section>

    <section class="py-16">
        <div class="max-w-6xl mx-auto px-4">
            <x-blog.grid :posts="$posts" />

            @if ($posts->isNotEmpty())
                <div class="mt-10 flex justify-center gap-2">
                    {{ $posts->links() }}
                </div>
            @endif
        </div>
    </section>
@endsection
