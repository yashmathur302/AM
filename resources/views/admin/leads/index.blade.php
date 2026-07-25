@extends('admin.layout')

@section('admin-title', 'Contact Leads')

@section('admin-content')
    <x-admin.panel>
        <table class="w-full text-sm">
            <thead>
                <tr class="text-left text-xs uppercase tracking-wide text-slate-500 border-b border-slate-100">
                    <th class="py-3">Name</th>
                    <th class="py-3">Email</th>
                    <th class="py-3">Service Interest</th>
                    <th class="py-3">Received</th>
                    <th class="py-3">Status</th>
                    <th class="py-3"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($leads as $lead)
                    <tr class="border-b border-slate-100 hover:bg-offwhite">
                        <td class="py-3"><a class="hover:text-gold-600" href="{{ route('admin.leads.show', $lead) }}">{{ $lead->name }}</a></td>
                        <td class="py-3">{{ $lead->email }}</td>
                        <td class="py-3">{{ $lead->service_interest ?? '-' }}</td>
                        <td class="py-3">{{ $lead->created_at->format('M j, Y g:ia') }}</td>
                        <td class="py-3">
                            @if ($lead->is_read)
                                <x-admin.badge variant="success">Read</x-admin.badge>
                            @else
                                <x-admin.badge variant="warning">Unread</x-admin.badge>
                            @endif
                        </td>
                        <td class="py-3">
                            <form method="POST" action="{{ route('admin.leads.destroy', $lead) }}" data-confirm="Delete this lead?">
                                @csrf
                                @method('DELETE')
                                <x-ui.button type="submit" variant="outline">Delete</x-ui.button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="py-3 text-slate-500">No leads yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </x-admin.panel>

    <div class="flex gap-2">
        {{ $leads->links() }}
    </div>
@endsection
