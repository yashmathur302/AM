@extends('admin.layout')

@section('admin-title', 'Blog Posts')

@section('admin-actions')
    <a class="c-btn c-btn--primary" href="{{ route('admin.posts.create') }}">New Post</a>
@endsection

@section('admin-content')
    <div class="admin-panel">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>Published</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->author->name }}</td>
                        <td>
                            <span class="admin-badge admin-badge--{{ $post->status }}">{{ ucfirst($post->status) }}</span>
                        </td>
                        <td>{{ $post->published_at?->format('M j, Y') ?? '-' }}</td>
                        <td class="admin-table__actions">
                            <a class="c-btn c-btn--outline" href="{{ route('admin.posts.edit', $post) }}">Edit</a>
                            <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" data-confirm="Delete this post?">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="c-btn c-btn--outline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5">No posts yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $posts->links() }}
@endsection
