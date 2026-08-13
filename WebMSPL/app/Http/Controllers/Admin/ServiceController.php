<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceFeature;
use App\Models\ServiceProcessStep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('order')->paginate(10);

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:services,slug',
            'icon' => 'nullable|string|max:255',
            'excerpt' => 'required|string',
            'description' => 'required|string',
            'full_description' => 'nullable|string',
            'icon_image' => 'nullable|file|mimes:jpeg,jpg,png,gif,webp|max:5120',
            'hero_image' => 'nullable|file|mimes:jpeg,jpg,png,gif,webp|max:5120',
            'gallery_image_1' => 'nullable|file|mimes:jpeg,jpg,png,gif,webp|max:5120',
            'gallery_image_2' => 'nullable|file|mimes:jpeg,jpg,png,gif,webp|max:5120',
            'brochure_pdf' => 'nullable|file|mimes:pdf|max:10240',
            'is_affiliate' => 'nullable|boolean',
            'status' => 'required|in:draft,published',
            'order' => 'nullable|integer|min:0',
            'category' => 'nullable|string|max:100',
        ]);

        $validated['is_affiliate'] = $request->boolean('is_affiliate');
        $validated['category'] = $request->input('category') ?: null;

        foreach (['icon_image', 'hero_image', 'gallery_image_1', 'gallery_image_2', 'brochure_pdf'] as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                if ($field === 'brochure_pdf') {
                    $filename = Str::uuid() . '.' . $file->extension();
                    $file->move(public_path('images'), $filename);
                } else {
                    $filename = ImageHelper::saveAsWebP($file, public_path('images'));
                }
                $validated[$field] = $filename;
            } else {
                unset($validated[$field]);
            }
        }

        $service = Service::create($validated);

        $this->syncFeatures($service, $request);
        $this->syncProcessSteps($service, $request);

        Log::info('Service created', ['title' => $service->title, 'by' => auth()->user()->name]);

        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit(Service $service)
    {
        $service->load('features', 'processSteps');

        return view('admin.services.form', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:services,slug,' . $service->id,
            'icon' => 'nullable|string|max:255',
            'excerpt' => 'required|string',
            'description' => 'required|string',
            'full_description' => 'nullable|string',
            'icon_image' => 'nullable|file|mimes:jpeg,jpg,png,gif,webp|max:5120',
            'hero_image' => 'nullable|file|mimes:jpeg,jpg,png,gif,webp|max:5120',
            'gallery_image_1' => 'nullable|file|mimes:jpeg,jpg,png,gif,webp|max:5120',
            'gallery_image_2' => 'nullable|file|mimes:jpeg,jpg,png,gif,webp|max:5120',
            'brochure_pdf' => 'nullable|file|mimes:pdf|max:10240',
            'is_affiliate' => 'nullable|boolean',
            'status' => 'required|in:draft,published',
            'order' => 'nullable|integer|min:0',
            'category' => 'nullable|string|max:100',
        ]);

        $validated['is_affiliate'] = $request->boolean('is_affiliate');
        $validated['category'] = $request->input('category') ?: null;

        foreach (['icon_image', 'hero_image', 'gallery_image_1', 'gallery_image_2', 'brochure_pdf'] as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                if ($field === 'brochure_pdf') {
                    $filename = Str::uuid() . '.' . $file->extension();
                    $file->move(public_path('images'), $filename);
                } else {
                    $filename = ImageHelper::saveAsWebP($file, public_path('images'));
                }
                $validated[$field] = $filename;
            } else {
                unset($validated[$field]);
            }
        }

        $service->update($validated);

        $this->syncFeatures($service, $request);
        $this->syncProcessSteps($service, $request);

        Log::info('Service updated', ['id' => $service->id, 'title' => $service->title, 'by' => auth()->user()->name]);

        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy(Service $service)
    {
        Log::info('Service deleted', ['id' => $service->id, 'title' => $service->title, 'by' => auth()->user()->name]);

        $service->features()->delete();
        $service->processSteps()->delete();
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil dihapus.');
    }

    public function reorder(Request $request, Service $service)
    {
        $direction = $request->input('direction');

        DB::transaction(function () use ($direction, $service) {
            if ($direction === 'up') {
                $swap = Service::where('order', '<', $service->order)->orderBy('order', 'desc')->first();
            } else {
                $swap = Service::where('order', '>', $service->order)->orderBy('order', 'asc')->first();
            }

            if ($swap) {
                $temp = $service->order;
                $service->update(['order' => $swap->order]);
                $swap->update(['order' => $temp]);
            }
        });

        return redirect()->route('admin.services.index')->with('success', 'Urutan layanan diperbarui.');
    }

    private function syncFeatures(Service $service, Request $request): void
    {
        $features = $request->input('features', []);

        $existingIds = $service->features()->pluck('id')->toArray();
        $incomingIds = [];

        foreach ($features as $index => $feature) {
            if (empty($feature['title'])) continue;

            $data = [
                'title' => $feature['title'],
                'description' => $feature['description'] ?? '',
                'order' => $index + 1,
                'group' => $feature['group'] ?? null,
            ];

            if (!empty($feature['id'])) {
                $service->features()->where('id', $feature['id'])->where('service_id', $service->id)->update($data);
                $incomingIds[] = $feature['id'];
            } else {
                $new = $service->features()->create($data);
                $incomingIds[] = $new->id;
            }
        }

        $toDelete = array_diff($existingIds, $incomingIds);
        if (!empty($toDelete)) {
            $service->features()->whereIn('id', $toDelete)->delete();
        }
    }

    private function syncProcessSteps(Service $service, Request $request): void
    {
        $steps = $request->input('process_steps', []);

        $existingIds = $service->processSteps()->pluck('id')->toArray();
        $incomingIds = [];

        foreach ($steps as $index => $step) {
            if (empty($step['title'])) continue;

            $data = [
                'title' => $step['title'],
                'description' => $step['description'] ?? '',
                'order' => $index + 1,
            ];

            if (!empty($step['id'])) {
                $service->processSteps()->where('id', $step['id'])->where('service_id', $service->id)->update($data);
                $incomingIds[] = $step['id'];
            } else {
                $new = $service->processSteps()->create($data);
                $incomingIds[] = $new->id;
            }
        }

        $toDelete = array_diff($existingIds, $incomingIds);
        if (!empty($toDelete)) {
            $service->processSteps()->whereIn('id', $toDelete)->delete();
        }
    }
}
