@extends('layouts.app')

@section('content')
    <x-home.hero />
    <x-home.stats />
    <x-home.intro />
    <x-home.services-preview />
    <x-home.team-preview :members="$teamPreview" />
    <x-home.insights-preview :posts="$latestPosts" />
    <x-home.cta-banner />
@endsection
