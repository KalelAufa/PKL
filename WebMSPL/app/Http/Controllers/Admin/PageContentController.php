<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\PageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
                'innovation_image_1'     => ['image', 'Gambar Inovasi (Kiri Atas)'],
                'innovation_image_2'     => ['image', 'Gambar Inovasi (Kanan Bawah)'],
                'services_grid_title'    => ['text',  'Judul Grid Layanan'],
                'services_grid_subtitle' => ['text',  'Subjudul Grid Layanan'],
            ],
            'about' => [
                'hero_title'           => ['text',  'Judul Hero'],
                'hero_subtitle'        => ['text',  'Subjudul Hero'],
                'hero_image'           => ['image', 'Gambar Background Hero'],
                'hero_badge'           => ['text',  'Badge/Eyebrow Hero'],
                'story'                => ['text',  'Cerita Perusahaan'],
                'story_image'          => ['image', 'Foto di Seksi Sejarah'],
                'history_section_title'=> ['text',  'Judul Seksi Sejarah'],
                'team_section_title'   => ['text',  'Judul Seksi Tim'],
                'team_section_subtitle'=> ['text',  'Subjudul Seksi Tim'],
                'cta_title'            => ['text',  'Judul CTA'],
                'cta_subtitle'         => ['text',  'Subjudul CTA'],
                'cta_button_primary'   => ['text',  'Teks Tombol CTA Utama'],
                'cta_button_secondary' => ['text',  'Teks Tombol CTA Sekunder'],
            ],
            'services' => [
                'hero_title'            => ['text',  'Judul Hero'],
                'hero_subtitle'         => ['text',  'Subjudul Hero'],
                'hero_image'            => ['image', 'Gambar Background Hero'],
                'main_services_title'   => ['text',  'Judul Solusi Utama'],
                'quality_image'         => ['image', 'Gambar Highlight Kualitas'],
                'quality_title'         => ['text',  'Judul Highlight Kualitas'],
                'quality_body'          => ['text',  'Deskripsi Highlight Kualitas'],
                'sister_badge'          => ['text',  'Badge Seksi Afiliasi'],
                'sister_title'          => ['text',  'Judul Seksi Afiliasi'],
                'sister_description'    => ['text',  'Deskripsi Seksi Afiliasi'],
                'sister_url'            => ['text',  'URL Website Afiliasi (PT TNS)'],
                'sister_cta_label'      => ['text',  'Teks Tombol Afiliasi'],
                'cta_title'             => ['text',  'Judul CTA'],
                'cta_subtitle'          => ['text',  'Subjudul CTA'],
                'cta_button_primary'    => ['text',  'Teks Tombol CTA Utama'],
                'cta_button_secondary'  => ['text',  'Teks Tombol CTA Sekunder'],
            ],
            'contact' => [
                'hero_title'           => ['text',  'Judul Hero'],
                'hero_subtitle'        => ['text',  'Subjudul Hero'],
                'hero_image'           => ['image', 'Gambar Background Hero'],
                'hero_cta'             => ['text',  'Teks Tombol Hero'],
                'contact_info_title'   => ['text',  'Judul Seksi Info Kontak'],
                'contact_info_subtitle'=> ['text',  'Subjudul Seksi Info Kontak'],
                'map_title'            => ['text',  'Judul Seksi Peta'],
                'map_embed_url'        => ['text',  'URL Embed Google Maps'],
            ],
            'news' => [
                'hero_image'          => ['image', 'Gambar Background Hero Berita'],
                'hero_title'          => ['text',  'Judul Hero (fallback tanpa berita featured)'],
                'hero_subtitle'       => ['text',  'Subjudul Hero (fallback)'],
                'newsletter_title'    => ['text',  'Judul Seksi Newsletter'],
                'newsletter_subtitle' => ['text',  'Subjudul Seksi Newsletter'],
            ],
            'emails' => [
                'reply_eyebrow'       => ['text', 'Balasan — Label Eyebrow'],
                'reply_hero_title'    => ['text', 'Balasan — Judul Hero'],
                'reply_hero_subtitle' => ['text', 'Balasan — Subjudul Hero'],
                'reply_greeting'      => ['text', 'Balasan — Sapaan (sebelum nama penerima)'],
                'reply_intro'         => ['text', 'Balasan — Paragraf Pembuka'],
                'reset_eyebrow'       => ['text', 'Reset Password — Label Eyebrow'],
                'reset_hero_title'    => ['text', 'Reset Password — Judul Hero'],
                'reset_hero_subtitle' => ['text', 'Reset Password — Subjudul Hero'],
                'reset_expiry'        => ['text', 'Reset Password — Teks Peringatan Kedaluwarsa'],
                'reset_button'        => ['text', 'Reset Password — Teks Tombol'],
                'reset_security'      => ['text', 'Reset Password — Catatan Keamanan'],
            ],
        ];
    }

    public function index()
    {
        $schema = $this->pageSchema();
        $allContents = PageContent::whereIn('page', array_keys($schema))->get()->groupBy('page');
        $pages = collect(array_keys($schema))->map(function ($page) use ($allContents) {
            $item = new \stdClass();
            $item->page = $page;
            $item->contents = $allContents->get($page, collect());
            return $item;
        });

        return view('admin.page-content.index', compact('pages'));
    }

    public function edit(string $page)
    {
        $schema = $this->pageSchema();
        $pageSchema = $schema[$page] ?? [];

        $existing = PageContent::where('page', $page)->get()->keyBy('key');

        $missing = array_filter(array_keys($pageSchema), fn ($k) => ! $existing->has($k));
        foreach ($missing as $key) {
            [$type, $label] = $pageSchema[$key];
            PageContent::create(['page' => $page, 'key' => $key, 'type' => $type, 'label' => $label, 'value' => null]);
        }

        if (! empty($missing)) {
            $existing = PageContent::where('page', $page)->get()->keyBy('key');
        }

        $schemaKeys = array_keys($pageSchema);

        $ordered = array_filter(
            array_map(fn ($k) => $existing->get($k), $schemaKeys),
        );

        $extra = $existing->filter(fn ($row) => ! in_array($row->key, $schemaKeys, true))->values();

        $contents = collect(array_merge(array_values($ordered), $extra->all()));

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
            if (! $record || $record->page !== $page) {
                continue;
            }

            if ($record->type === 'image') {
                $fileKey = "file_{$record->id}";
                if ($request->hasFile($fileKey)) {
                    $request->validate([$fileKey => 'file|mimes:jpeg,png,jpg,webp,gif|max:5120']);
                    $file = $request->file($fileKey);
                    $record->value = ImageHelper::saveAsWebP($file, public_path('images'));
                } else {
                    $record->value = $item['value'] ?? $record->value;
                }
            } else {
                $record->value = $item['value'] ?? null;
            }

            $record->save();
        }

        Log::info('Page content updated', ['page' => $page, 'by' => auth()->user()->name]);

        return redirect()->route('admin.page-content.edit', $page)
            ->with('success', 'Konten halaman berhasil diperbarui.');
    }
}
