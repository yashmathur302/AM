@extends('admin.layout')

@section('admin-title', 'Edit Team Member')

@section('admin-content')
    <form method="POST" action="{{ route('admin.team.update', $member) }}" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.team._form')
    </form>
@endsection
