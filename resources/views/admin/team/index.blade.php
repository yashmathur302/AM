@extends('admin.layout')

@section('admin-title', 'Team Members')

@section('admin-actions')
    <x-ui.button href="{{ route('admin.team.create') }}" variant="primary">New Team Member</x-ui.button>
@endsection

@section('admin-content')
    <x-admin.panel>
        <table class="w-full text-sm">
            <thead>
                <tr class="text-left text-xs uppercase tracking-wide text-slate-500 border-b border-slate-100">
                    <th class="py-3">Name</th>
                    <th class="py-3">Role</th>
                    <th class="py-3">Active</th>
                    <th class="py-3"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($members as $member)
                    <tr class="border-b border-slate-100 hover:bg-offwhite">
                        <td class="py-3">{{ $member->name }}</td>
                        <td class="py-3">{{ $member->role }}</td>
                        <td class="py-3">{{ $member->is_active ? 'Yes' : 'No' }}</td>
                        <td class="py-3">
                            <div class="flex gap-2">
                                <x-ui.button href="{{ route('admin.team.edit', $member) }}" variant="outline">Edit</x-ui.button>
                                <form method="POST" action="{{ route('admin.team.destroy', $member) }}" data-confirm="Remove this team member?">
                                    @csrf
                                    @method('DELETE')
                                    <x-ui.button type="submit" variant="outline">Delete</x-ui.button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="py-3 text-slate-500">No team members yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </x-admin.panel>
@endsection
