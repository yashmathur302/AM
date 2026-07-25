@extends('admin.layout')

@section('admin-title', 'New Team Member')

@section('admin-content')
    <form method="POST" action="{{ route('admin.team.store') }}" enctype="multipart/form-data">
        @include('admin.team._form')
    </form>
@endsection
