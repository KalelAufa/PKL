<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
            $validated['photo'] = ImageHelper::saveAsWebP($request->file('photo'), public_path('images'));
        } else {
            unset($validated['photo']);
        }

        $teamMember = TeamMember::create($validated);

        Log::info('Team member created', ['name' => $teamMember->name, 'by' => auth()->user()->name]);

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
            $validated['photo'] = ImageHelper::saveAsWebP($request->file('photo'), public_path('images'));
        } else {
            unset($validated['photo']);
        }

        $teamMember->update($validated);

        Log::info('Team member updated', ['id' => $teamMember->id, 'name' => $teamMember->name, 'by' => auth()->user()->name]);

        return redirect()->route('admin.team-members.index')->with('success', 'Anggota tim berhasil diperbarui.');
    }

    public function destroy(TeamMember $teamMember)
    {
        Log::info('Team member deleted', ['id' => $teamMember->id, 'name' => $teamMember->name, 'by' => auth()->user()->name]);

        $teamMember->delete();

        return redirect()->route('admin.team-members.index')->with('success', 'Anggota tim berhasil dihapus.');
    }
}
