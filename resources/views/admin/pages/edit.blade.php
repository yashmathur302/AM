@extends('admin.layout')

@section('admin-title', 'Edit SEO: '.$page->name)

@section('admin-content')
    <form method="POST" action="{{ route('admin.pages.update', $page) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <x-admin.panel>
            <x-ui.form.input name="meta_title" label="Meta title" required maxlength="70" :value="$page->meta_title" hint="Recommended max 60 characters." />
            <x-ui.form.textarea name="meta_description" label="Meta description" required maxlength="160" :value="$page->meta_description" hint="Recommended max 155 characters." rows="3" />
            <x-ui.form.input name="focus_keyword" label="Focus keyword" maxlength="100" :value="$page->focus_keyword" />
            <x-ui.form.file name="og_image" label="Social share image (OG image)" :preview="$page->og_image_url" />
        </x-admin.panel>

        <x-ui.button type="submit" variant="primary">Save SEO Settings</x-ui.button>
    </form>
@endsection
