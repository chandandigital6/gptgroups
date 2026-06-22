<?php

namespace App\Http\Controllers;

use App\Models\TeamMemberGpt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    public function index(Request $request)
    {
        $query = TeamMemberGpt::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('designation', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $teamMembers = $query
            ->orderBy('sort_order')
            ->latest()
            ->paginate(10);

        return view('team_members.index', compact('teamMembers'));
    }

    public function create()
    {
        return view('team_members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'profile_link' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);

        $data = $request->except('image');

        $data['status'] = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->sort_order ?? 0;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('team-members', 'public');
        }

        TeamMemberGpt::create($data);

        return redirect()
            ->route('team-members.index')
            ->with('success', 'Team member created successfully.');
    }

    public function show(TeamMemberGpt $teamMember)
    {
        return view('team_members.show', compact('teamMember'));
    }

    public function edit(TeamMemberGpt $teamMember)
    {
        return view('team_members.edit', compact('teamMember'));
    }

    public function update(Request $request, TeamMemberGpt $teamMember)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'profile_link' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);

        $data = $request->except('image');

        $data['status'] = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->sort_order ?? 0;

        if ($request->hasFile('image')) {
            if ($teamMember->image) {
                Storage::disk('public')->delete($teamMember->image);
            }

            $data['image'] = $request->file('image')->store('team-members', 'public');
        }

        $teamMember->update($data);

        return redirect()
            ->route('team-members.index')
            ->with('success', 'Team member updated successfully.');
    }

    public function destroy(TeamMemberGpt $teamMember)
    {
        if ($teamMember->image) {
            Storage::disk('public')->delete($teamMember->image);
        }

        $teamMember->delete();

        return redirect()
            ->route('team-members.index')
            ->with('success', 'Team member deleted successfully.');
    }
}