<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    public function index()
    {
        return view('admin.team-members.index', [
            'items' => TeamMember::orderBy('order')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.team-members.form', ['item' => new TeamMember()]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['photo'] = $this->handlePhoto($request);

        TeamMember::create($data);

        return redirect()->route('admin.team-members.index')->with('status', 'Team member created.');
    }

    public function edit(TeamMember $teamMember)
    {
        return view('admin.team-members.form', ['item' => $teamMember]);
    }

    public function update(Request $request, TeamMember $teamMember)
    {
        $data = $this->validated($request);
        $photo = $this->handlePhoto($request);
        if ($photo) {
            $data['photo'] = $photo;
        }

        $teamMember->update($data);

        return redirect()->route('admin.team-members.index')->with('status', 'Team member updated.');
    }

    public function destroy(TeamMember $teamMember)
    {
        $teamMember->delete();

        return back()->with('status', 'Team member deleted.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'badge' => ['nullable', 'string', 'max:100'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'icon' => ['nullable', 'string', 'max:100'],
            'bio' => ['required', 'string'],
            'stat1_value' => ['nullable', 'string', 'max:20'],
            'stat1_label' => ['nullable', 'string', 'max:50'],
            'stat2_value' => ['nullable', 'string', 'max:20'],
            'stat2_label' => ['nullable', 'string', 'max:50'],
            'stat3_value' => ['nullable', 'string', 'max:20'],
            'stat3_label' => ['nullable', 'string', 'max:50'],
            'expertise' => ['nullable', 'string'], // comma separated in the form
            'order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['expertise'] = $data['expertise']
            ? array_map('trim', explode(',', $data['expertise']))
            : [];
        $data['is_active'] = $request->boolean('is_active');

        return $data;
    }

    private function handlePhoto(Request $request): ?string
    {
        if ($request->hasFile('photo')) {
            return $request->file('photo')->store('team', 'public');
        }

        return null;
    }
}
