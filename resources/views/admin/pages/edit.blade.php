@extends('admin.layout')

@section('admin-title', 'Edit SEO: '.$page->name)

@section('admin-content')
    <form method="POST" action="{{ route('admin.pages.update', $page) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="admin-panel">
            <div class="c-form-group">
                <label class="c-form-label" for="meta_title">Meta title</label>
                <input class="c-form-control @error('meta_title') is-invalid @enderror" type="text" id="meta_title" name="meta_title" value="{{ old('meta_title', $page->meta_title) }}" required maxlength="70">
                <span class="c-form-hint">Recommended max 60 characters.</span>
                @error('meta_title')<span class="c-form-error">{{ $message }}</span>@enderror
            </div>

            <div class="c-form-group">
                <label class="c-form-label" for="meta_description">Meta description</label>
                <textarea class="c-form-control @error('meta_description') is-invalid @enderror" id="meta_description" name="meta_description" maxlength="160" required>{{ old('meta_description', $page->meta_description) }}</textarea>
                <span class="c-form-hint">Recommended max 155 characters.</span>
                @error('meta_description')<span class="c-form-error">{{ $message }}</span>@enderror
            </div>

            <div class="c-form-group">
                <label class="c-form-label" for="focus_keyword">Focus keyword</label>
                <input class="c-form-control @error('focus_keyword') is-invalid @enderror" type="text" id="focus_keyword" name="focus_keyword" value="{{ old('focus_keyword', $page->focus_keyword) }}" maxlength="100">
                @error('focus_keyword')<span class="c-form-error">{{ $message }}</span>@enderror
            </div>

            <div class="c-form-group">
                <label class="c-form-label" for="og_image">Social share image (OG image)</label>
                <input class="c-form-control @error('og_image') is-invalid @enderror" type="file" id="og_image" name="og_image" accept="image/png,image/jpeg,image/webp">
                @if ($page->og_image_url)
                    <img class="c-form-preview" src="{{ $page->og_image_url }}" alt="" width="160">
                @endif
                @error('og_image')<span class="c-form-error">{{ $message }}</span>@enderror
            </div>
        </div>

        <button type="submit" class="c-btn c-btn--primary">Save SEO Settings</button>
    </form>
@endsection
