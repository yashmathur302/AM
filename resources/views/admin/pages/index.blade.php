@extends('admin.layout')

@section('admin-title', 'Page SEO')

@section('admin-content')
    <div class="admin-panel">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Page</th>
                    <th>Meta Title</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pages as $page)
                    <tr>
                        <td>{{ $page->name }}</td>
                        <td>{{ $page->meta_title }}</td>
                        <td class="admin-table__actions">
                            <a class="c-btn c-btn--outline" href="{{ route('admin.pages.edit', $page) }}">Edit SEO</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3">No pages seeded yet. Run the database seeder.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
