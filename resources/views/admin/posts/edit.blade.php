@extends('admin.layout')

@section('admin-title', 'Edit Post')

@section('admin-content')
    <form method="POST" action="{{ route('admin.posts.update', $post) }}" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.posts._form')
    </form>
@endsection
