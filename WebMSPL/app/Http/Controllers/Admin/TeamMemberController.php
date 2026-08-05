<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    public function index()
    {
        $teamMembers = TeamMember::orderBy('order')->paginate(10);

        return view('admin.team-members.index', compact('teamMembers'));
    }

    public function create()
    {
        return view('admin.team-members.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo' => 'nullable|file|mimes:jpeg,jpg,png,gif,webp|max:5120',
            'order' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = \Illuminate\Support\Str::uuid() . '.' . $file->extension();
            $file->move(public_path('images'), $filename);
            $validated['photo'] = $filename;
        } else {
            unset($validated['photo']);
        }

        TeamMember::create($validated);

        return redirect()->route('admin.team-members.index')->with('success', 'Anggota tim berhasil ditambahkan.');
    }

    public function edit(TeamMember $teamMember)
    {
        return view('admin.team-members.form', compact('teamMember'));
    }

    public function update(Request $request, TeamMember $teamMember)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo' => 'nullable|file|mimes:jpeg,jpg,png,gif,webp|max:5120',
            'order' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = \Illuminate\Support\Str::uuid() . '.' . $file->extension();
            $file->move(public_path('images'), $filename);
            $validated['photo'] = $filename;
        } else {
            unset($validated['photo']);
        }

        $teamMember->update($validated);

        return redirect()->route('admin.team-members.index')->with('success', 'Anggota tim berhasil diperbarui.');
    }

    public function destroy(TeamMember $teamMember)
    {
        $teamMember->delete();

        return redirect()->route('admin.team-members.index')->with('success', 'Anggota tim berhasil dihapus.');
    }
}
