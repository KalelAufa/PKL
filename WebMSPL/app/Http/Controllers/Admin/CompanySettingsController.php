<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use Illuminate\Http\Request;

class CompanySettingsController extends Controller
{
    private array $schema = [
        'company_name'        => ['text',  'Nama Perusahaan'],
        'company_description' => ['text',  'Deskripsi Singkat'],
        'address'             => ['text',  'Alamat Kantor'],
        'phone'               => ['text',  'Nomor Telepon'],
        'email'               => ['text',  'Alamat Email'],
        'office_hours'        => ['text',  'Jam Operasional'],
        'social_linkedin'     => ['text',  'URL LinkedIn'],
        'social_instagram'    => ['text',  'URL Instagram'],
        'social_facebook'     => ['text',  'URL Facebook'],
        'social_x'            => ['text',  'URL X (Twitter)'],
        'company_logo'        => ['image', 'Logo Perusahaan'],
    ];

    public function index()
    {
        $existing = PageContent::where('page', 'company')->pluck('key')->all();

        $missing = array_diff(array_keys($this->schema), $existing);
        foreach ($missing as $key) {
            [$type, $label] = $this->schema[$key];
            PageContent::create(['page' => 'company', 'key' => $key, 'type' => $type, 'label' => $label, 'value' => null]);
        }

        $settings = PageContent::where('page', 'company')->get()->keyBy('key');

        return view('admin.company-settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'settings'         => 'required|array',
            'settings.*.id'    => 'required|exists:page_contents,id',
            'settings.*.value' => 'nullable|string|max:65535',
        ]);

        foreach ($request->input('settings') as $item) {
            $record = PageContent::find((int) $item['id']);
            if (! $record || $record->page !== 'company') {
                continue;
            }

            if ($record->type === 'image') {
                $fileKey = "file_{$record->id}";
                if ($request->hasFile($fileKey)) {
                    $request->validate([$fileKey => 'file|mimes:jpeg,png,jpg,webp,gif|max:5120']);
                    $file     = $request->file($fileKey);
                    $filename = \Illuminate\Support\Str::uuid() . '.' . $file->extension();
                    $file->move(public_path('images'), $filename);
                    $record->value = $filename;
                } else {
                    $record->value = $item['value'] ?? $record->value;
                }
            } else {
                $record->value = $item['value'] ?? null;
            }

            $record->save();
        }

        return redirect()->route('admin.company-settings.index')
            ->with('success', 'Identitas perusahaan berhasil disimpan.');
    }
}
