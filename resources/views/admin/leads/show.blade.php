@extends('admin.layout')

@section('admin-title', 'Lead: '.$lead->name)

@section('admin-content')
    <x-admin.panel>
        <table class="w-full text-sm">
            <tbody>
                <tr class="border-b border-slate-100"><th class="py-3 pr-4 text-left w-40">Name</th><td class="py-3">{{ $lead->name }}</td></tr>
                <tr class="border-b border-slate-100"><th class="py-3 pr-4 text-left">Email</th><td class="py-3"><a class="hover:text-gold-600" href="mailto:{{ $lead->email }}">{{ $lead->email }}</a></td></tr>
                <tr class="border-b border-slate-100"><th class="py-3 pr-4 text-left">Phone</th><td class="py-3">{{ $lead->phone ?? '-' }}</td></tr>
                <tr class="border-b border-slate-100"><th class="py-3 pr-4 text-left">Company</th><td class="py-3">{{ $lead->company ?? '-' }}</td></tr>
                <tr class="border-b border-slate-100"><th class="py-3 pr-4 text-left">Service Interest</th><td class="py-3">{{ $lead->service_interest ?? '-' }}</td></tr>
                <tr class="border-b border-slate-100"><th class="py-3 pr-4 text-left">Received</th><td class="py-3">{{ $lead->created_at->format('M j, Y g:ia') }}</td></tr>
                <tr><th class="py-3 pr-4 text-left align-top">Message</th><td class="py-3">{{ $lead->message }}</td></tr>
            </tbody>
        </table>
    </x-admin.panel>

    <form method="POST" action="{{ route('admin.leads.destroy', $lead) }}" data-confirm="Delete this lead?">
        @csrf
        @method('DELETE')
        <x-ui.button type="submit" variant="outline">Delete Lead</x-ui.button>
    </form>
@endsection
