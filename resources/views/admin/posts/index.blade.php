@extends('admin.layout')

@section('admin-title', 'Blog Posts')

@section('admin-actions')
    <x-ui.button href="{{ route('admin.posts.create') }}" variant="primary">New Post</x-ui.button>
@endsection

@section('admin-content')
    <x-admin.panel>
        <table class="w-full text-sm">
            <thead>
                <tr class="text-left text-xs uppercase tracking-wide text-slate-500 border-b border-slate-100">
                    <th class="py-3">Title</th>
                    <th class="py-3">Author</th>
                    <th class="py-3">Status</th>
                    <th class="py-3">Published</th>
                    <th class="py-3"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr class="border-b border-slate-100 hover:bg-offwhite">
                        <td class="py-3">{{ $post->title }}</td>
                        <td class="py-3">{{ $post->author->name }}</td>
                        <td class="py-3">
                            <x-admin.badge :variant="$post->status === 'published' ? 'success' : 'muted'">{{ ucfirst($post->status) }}</x-admin.badge>
                        </td>
                        <td class="py-3">{{ $post->published_at?->format('M j, Y') ?? '-' }}</td>
                        <td class="py-3">
                            <div class="flex gap-2">
                                <x-ui.button href="{{ route('admin.posts.edit', $post) }}" variant="outline">Edit</x-ui.button>
                                <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" data-confirm="Delete this post?">
                                    @csrf
                                    @method('DELETE')
                                    <x-ui.button type="submit" variant="outline">Delete</x-ui.button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="py-3 text-slate-500">No posts yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </x-admin.panel>

    <div class="flex gap-2">
        {{ $posts->links() }}
    </div>
@endsection
