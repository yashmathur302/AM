@extends('admin.layout')

@section('admin-title', 'Contact Leads')

@section('admin-content')
    <div class="admin-panel">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Service Interest</th>
                    <th>Received</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($leads as $lead)
                    <tr>
                        <td><a href="{{ route('admin.leads.show', $lead) }}">{{ $lead->name }}</a></td>
                        <td>{{ $lead->email }}</td>
                        <td>{{ $lead->service_interest ?? '-' }}</td>
                        <td>{{ $lead->created_at->format('M j, Y g:ia') }}</td>
                        <td>
                            @if ($lead->is_read)
                                <span class="admin-badge admin-badge--published">Read</span>
                            @else
                                <span class="admin-badge admin-badge--unread">Unread</span>
                            @endif
                        </td>
                        <td class="admin-table__actions">
                            <form method="POST" action="{{ route('admin.leads.destroy', $lead) }}" data-confirm="Delete this lead?">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="c-btn c-btn--outline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6">No leads yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $leads->links() }}
@endsection
