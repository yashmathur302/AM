@extends('layouts.app')

@section('content')
    <section class="bg-blue-100 py-16">
        <div class="max-w-6xl mx-auto px-4">
            <h1>Thank You</h1>
        </div>
    </section>

    <section class="py-16">
        <div class="max-w-3xl mx-auto px-4">
            <p class="text-slate-600">Thank you for reaching out. A member of our advisory team will be in touch shortly.</p>
            <div class="mt-6">
                <x-ui.button href="{{ route('home') }}" variant="outline">Back to Home</x-ui.button>
            </div>
        </div>
    </section>
@endsection
