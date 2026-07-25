@extends('admin.layout')

@section('admin-title', 'Dashboard')

@section('admin-content')
    <div class="admin-stats">
        <div class="admin-stat">
            <div class="admin-stat__value">{{ $postCount }}</div>
            <div class="admin-stat__label">Total Posts</div>
        </div>
        <div class="admin-stat">
            <div class="admin-stat__value">{{ $publishedPostCount }}</div>
            <div class="admin-stat__label">Published Posts</div>
        </div>
        <div class="admin-stat">
            <div class="admin-stat__value">{{ $teamCount }}</div>
            <div class="admin-stat__label">Team Members</div>
        </div>
        <div class="admin-stat">
            <div class="admin-stat__value">{{ $unreadLeadCount }}</div>
            <div class="admin-stat__label">Unread Leads</div>
        </div>
    </div>

    <div class="admin-panel">
        <h2>Recent Leads</h2>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Received</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($recentLeads as $lead)
                    <tr>
                        <td><a href="{{ route('admin.leads.show', $lead) }}">{{ $lead->name }}</a></td>
                        <td>{{ $lead->email }}</td>
                        <td>{{ $lead->created_at->diffForHumans() }}</td>
                        <td>
                            @if ($lead->is_read)
                                <span class="admin-badge admin-badge--published">Read</span>
                            @else
                                <span class="admin-badge admin-badge--unread">Unread</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4">No leads yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
