<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyMilestone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CompanyMilestoneController extends Controller
{
    public function index()
    {
        $milestones = CompanyMilestone::orderBy('order')->paginate(10);

        return view('admin.milestones.index', compact('milestones'));
    }

    public function create()
    {
        return view('admin.milestones.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'label' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order' => 'nullable|integer|min:0',
        ]);

        $milestone = CompanyMilestone::create($validated);

        Log::info('Milestone created', ['title' => $milestone->title, 'by' => auth()->user()->name]);

        return redirect()->route('admin.milestones.index')->with('success', 'Milestone berhasil ditambahkan.');
    }

    public function edit(CompanyMilestone $milestone)
    {
        return view('admin.milestones.form', compact('milestone'));
    }

    public function update(Request $request, CompanyMilestone $milestone)
    {
        $validated = $request->validate([
            'label' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order' => 'nullable|integer|min:0',
        ]);

        $milestone->update($validated);

        Log::info('Milestone updated', ['id' => $milestone->id, 'title' => $milestone->title, 'by' => auth()->user()->name]);

        return redirect()->route('admin.milestones.index')->with('success', 'Milestone berhasil diperbarui.');
    }

    public function destroy(CompanyMilestone $milestone)
    {
        Log::info('Milestone deleted', ['id' => $milestone->id, 'title' => $milestone->title, 'by' => auth()->user()->name]);

        $milestone->delete();

        return redirect()->route('admin.milestones.index')->with('success', 'Milestone berhasil dihapus.');
    }
}
