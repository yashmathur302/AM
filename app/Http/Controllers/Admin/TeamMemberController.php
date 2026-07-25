<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TeamMemberRequest;
use App\Models\TeamMember;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    public function index()
    {
        return view('admin.team.index', [
            'members' => TeamMember::orderBy('sort_order')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(TeamMemberRequest $request)
    {
        $data = $request->safe()->except('photo');
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('photo')) {
            $data['photo'] = Storage::disk('public')->put('team', $request->file('photo'));
        }

        TeamMember::create($data);

        return redirect()->route('admin.team.index')->with('status', 'Team member added.');
    }

    public function edit(TeamMember $teamMember)
    {
        return view('admin.team.edit', ['member' => $teamMember]);
    }

    public function update(TeamMemberRequest $request, TeamMember $teamMember)
    {
        $data = $request->safe()->except('photo');
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('photo')) {
            if ($teamMember->photo) {
                Storage::disk('public')->delete($teamMember->photo);
            }
            $data['photo'] = Storage::disk('public')->put('team', $request->file('photo'));
        }

        $teamMember->update($data);

        return redirect()->route('admin.team.index')->with('status', 'Team member updated.');
    }

    public function destroy(TeamMember $teamMember)
    {
        if ($teamMember->photo) {
            Storage::disk('public')->delete($teamMember->photo);
        }

        $teamMember->delete();

        return redirect()->route('admin.team.index')->with('status', 'Team member removed.');
    }
}
