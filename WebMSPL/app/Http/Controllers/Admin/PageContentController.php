<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use Illuminate\Http\Request;

class PageContentController extends Controller
{
    /**
     * Schema lengkap per halaman — semua field yang harus ada.
     * Format: key => [type, label]
     */
    private function pageSchema(): array
    {
        return [
            'home' => [
                'hero_title'             => ['text',  'Judul Hero'],
                'hero_subtitle'          => ['text',  'Subjudul Hero'],
                'hero_image'             => ['image', 'Gambar Background Hero'],
                'stat_1_value'           => ['text',  'Statistik 1 — Angka'],
                'stat_1_label'           => ['text',  'Statistik 1 — Label'],
                'stat_2_value'           => ['text',  'Statistik 2 — Angka'],
                'stat_2_label'           => ['text',  'Statistik 2 — Label'],
                'stat_3_value'           => ['text',  'Statistik 3 — Angka'],
                'stat_3_label'           => ['text',  'Statistik 3 — Label'],
                'about_title'            => ['text',  'Judul Seksi Tentang'],
                'about_description'      => ['text',  'Deskripsi Tentang (Paragraf 1)'],
                'about_description_2'    => ['text',  'Deskripsi Tentang (Paragraf 2)'],
                'about_image'            => ['image', 'Gambar Seksi Tentang'],
                'about_metric_1'         => ['text',  'Metrik 1 — Angka'],
                'about_metric_1_label'   => ['text',  'Metrik 1 — Label'],
                'about_metric_2'         => ['text',  'Metrik 2 — Angka'],
                'about_metric_2_label'   => ['text',  'Metrik 2 — Label'],
                'about_metric_3'         => ['text',  'Metrik 3 — Angka'],
                'about_metric_3_label'   => ['text',  'Metrik 3 — Label'],
                'news_section_title'     => ['text',  'Judul Seksi Berita'],
                'news_section_subtitle'  => ['text',  'Subjudul Seksi Berita'],
                'innovation_title'       => ['text',  'Judul Seksi Inovasi'],
                'innovation_body_1'      => ['text',  'Paragraf Inovasi 1'],
                'innovation_body_2'      => ['text',  'Paragraf Inovasi 2'],
                'services_grid_title'    => ['text',  'Judul Grid Layanan'],
                'services_grid_subtitle' => ['text',  'Subjudul Grid Layanan'],
            ],
            'about' => [
                'hero_title'           => ['text',  'Judul Hero'],
                'hero_subtitle'        => ['text',  'Subjudul Hero'],
                'hero_image'           => ['image', 'Gambar Background Hero'],
                'story'                => ['text',  'Cerita Perusahaan'],
                'story_image'          => ['image', 'Foto di Seksi Sejarah'],
                'history_section_title'=> ['text',  'Judul Seksi Sejarah'],
                'team_section_title'   => ['text',  'Judul Seksi Tim'],
                'team_section_subtitle'=> ['text',  'Subjudul Seksi Tim'],
                'cta_title'            => ['text',  'Judul CTA'],
                'cta_subtitle'         => ['text',  'Subjudul CTA'],
            ],
            'services' => [
                'hero_title'          => ['text',  'Judul Hero'],
                'hero_subtitle'       => ['text',  'Subjudul Hero'],
                'hero_image'          => ['image', 'Gambar Background Hero'],
                'main_services_title' => ['text',  'Judul Solusi Utama'],
                'quality_image'       => ['image', 'Gambar Highlight Kualitas'],
                'quality_title'       => ['text',  'Judul Highlight Kualitas'],
                'quality_body'        => ['text',  'Deskripsi Highlight Kualitas'],
                'cta_title'           => ['text',  'Judul CTA'],
                'cta_subtitle'        => ['text',  'Subjudul CTA'],
            ],
            'contact' => [
                'hero_title'    => ['text',  'Judul Hero'],
                'hero_subtitle' => ['text',  'Subjudul Hero'],
                'hero_image'    => ['image', 'Gambar Background Hero'],
                'map_embed_url' => ['text',  'URL Embed Google Maps'],
            ],
        ];
    }

    public function index()
    {
        $schema = $this->pageSchema();
        $pages = collect(array_keys($schema))->map(function ($page) {
            $item = new \stdClass();
            $item->page = $page;
            $item->contents = PageContent::where('page', $page)->get();
            return $item;
        });

        return view('admin.page-content.index', compact('pages'));
    }

    public function edit(string $page)
    {
        $schema = $this->pageSchema();
        $pageSchema = $schema[$page] ?? [];

        // Upsert: pastikan semua key dalam schema ada di DB
        foreach ($pageSchema as $key => [$type, $label]) {
            PageContent::firstOrCreate(
                ['page' => $page, 'key' => $key],
                ['type' => $type, 'label' => $label, 'value' => null]
            );
        }

        // Load dalam urutan schema
        $ordered = [];
        foreach (array_keys($pageSchema) as $key) {
            $row = PageContent::where('page', $page)->where('key', $key)->first();
            if ($row) {
                $ordered[] = $row;
            }
        }

        // Append rows yang tidak ada di schema (custom rows lama)
        $schemaKeys = array_keys($pageSchema);
        $extra = PageContent::where('page', $page)
            ->when(count($schemaKeys) > 0, fn ($q) => $q->whereNotIn('key', $schemaKeys))
            ->orderBy('id')
            ->get();

        $contents = collect(array_merge($ordered, $extra->all()));

        return view('admin.page-content.form', compact('page', 'contents'));
    }

    public function update(Request $request, string $page)
    {
        $request->validate([
            'contents'         => 'required|array',
            'contents.*.id'    => 'required|exists:page_contents,id',
            'contents.*.value' => 'nullable|string|max:65535',
        ]);

        foreach ($request->input('contents') as $idx => $item) {
            $record = PageContent::find((int) $item['id']);
            if (! $record) {
                continue;
            }

            if ($record->type === 'image') {
                $fileKey = "file_{$record->id}";
                if ($request->hasFile($fileKey) && $request->file($fileKey)->isValid()) {
                    $file = $request->file($fileKey);
                    $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
                    $file->move(public_path('images'), $filename);
                    $record->value = $filename;
                } else {
                    // Keep existing value from hidden input
                    $record->value = $item['value'] ?? $record->value;
                }
            } else {
                $record->value = $item['value'] ?? null;
            }

            $record->save();
        }

        return redirect()->route('admin.page-content.edit', $page)
            ->with('success', 'Konten halaman berhasil diperbarui.');
    }
}
