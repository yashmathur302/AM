@extends('admin.layout')

@section('admin-title', 'Lead: '.$lead->name)

@section('admin-content')
    <div class="admin-panel">
        <table class="admin-table">
            <tbody>
                <tr><th>Name</th><td>{{ $lead->name }}</td></tr>
                <tr><th>Email</th><td><a href="mailto:{{ $lead->email }}">{{ $lead->email }}</a></td></tr>
                <tr><th>Phone</th><td>{{ $lead->phone ?? '-' }}</td></tr>
                <tr><th>Company</th><td>{{ $lead->company ?? '-' }}</td></tr>
                <tr><th>Service Interest</th><td>{{ $lead->service_interest ?? '-' }}</td></tr>
                <tr><th>Received</th><td>{{ $lead->created_at->format('M j, Y g:ia') }}</td></tr>
                <tr><th>Message</th><td>{{ $lead->message }}</td></tr>
            </tbody>
        </table>
    </div>

    <form method="POST" action="{{ route('admin.leads.destroy', $lead) }}" data-confirm="Delete this lead?">
        @csrf
        @method('DELETE')
        <button type="submit" class="c-btn c-btn--outline">Delete Lead</button>
    </form>
@endsection
