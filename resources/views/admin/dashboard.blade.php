@extends('admin.layout')

@section('admin-title', 'Dashboard')

@section('admin-content')
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        <x-admin.panel class="mb-0">
            <div class="font-heading text-2xl text-navy-800">{{ $postCount }}</div>
            <div class="text-sm text-slate-600">Total Posts</div>
        </x-admin.panel>
        <x-admin.panel class="mb-0">
            <div class="font-heading text-2xl text-navy-800">{{ $publishedPostCount }}</div>
            <div class="text-sm text-slate-600">Published Posts</div>
        </x-admin.panel>
        <x-admin.panel class="mb-0">
            <div class="font-heading text-2xl text-navy-800">{{ $teamCount }}</div>
            <div class="text-sm text-slate-600">Team Members</div>
        </x-admin.panel>
        <x-admin.panel class="mb-0">
            <div class="font-heading text-2xl text-navy-800">{{ $unreadLeadCount }}</div>
            <div class="text-sm text-slate-600">Unread Leads</div>
        </x-admin.panel>
    </div>

    <x-admin.panel>
        <h2 class="mb-4">Recent Leads</h2>
        <table class="w-full text-sm">
            <thead>
                <tr class="text-left text-xs uppercase tracking-wide text-slate-500 border-b border-slate-100">
                    <th class="py-3">Name</th>
                    <th class="py-3">Email</th>
                    <th class="py-3">Received</th>
                    <th class="py-3">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($recentLeads as $lead)
                    <tr class="border-b border-slate-100 hover:bg-offwhite">
                        <td class="py-3"><a class="hover:text-gold-600" href="{{ route('admin.leads.show', $lead) }}">{{ $lead->name }}</a></td>
                        <td class="py-3">{{ $lead->email }}</td>
                        <td class="py-3">{{ $lead->created_at->diffForHumans() }}</td>
                        <td class="py-3">
                            @if ($lead->is_read)
                                <x-admin.badge variant="success">Read</x-admin.badge>
                            @else
                                <x-admin.badge variant="warning">Unread</x-admin.badge>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="py-3 text-slate-500">No leads yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </x-admin.panel>
@endsection
