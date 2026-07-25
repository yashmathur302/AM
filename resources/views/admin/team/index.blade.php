@extends('admin.layout')

@section('admin-title', 'Team Members')

@section('admin-actions')
    <a class="c-btn c-btn--primary" href="{{ route('admin.team.create') }}">New Team Member</a>
@endsection

@section('admin-content')
    <div class="admin-panel">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Active</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($members as $member)
                    <tr>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->role }}</td>
                        <td>{{ $member->is_active ? 'Yes' : 'No' }}</td>
                        <td class="admin-table__actions">
                            <a class="c-btn c-btn--outline" href="{{ route('admin.team.edit', $member) }}">Edit</a>
                            <form method="POST" action="{{ route('admin.team.destroy', $member) }}" data-confirm="Remove this team member?">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="c-btn c-btn--outline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4">No team members yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
