@extends('admin.layout')

@section('admin-title', 'Page SEO')

@section('admin-content')
    <x-admin.panel>
        <table class="w-full text-sm">
            <thead>
                <tr class="text-left text-xs uppercase tracking-wide text-slate-500 border-b border-slate-100">
                    <th class="py-3">Page</th>
                    <th class="py-3">Meta Title</th>
                    <th class="py-3"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pages as $page)
                    <tr class="border-b border-slate-100 hover:bg-offwhite">
                        <td class="py-3">{{ $page->name }}</td>
                        <td class="py-3">{{ $page->meta_title }}</td>
                        <td class="py-3">
                            <x-ui.button href="{{ route('admin.pages.edit', $page) }}" variant="outline">Edit SEO</x-ui.button>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="py-3 text-slate-500">No pages seeded yet. Run the database seeder.</td></tr>
                @endforelse
            </tbody>
        </table>
    </x-admin.panel>
@endsection
