@php
$pageMeta = [
    'home'     => ['label' => 'Beranda',      'route' => '/',            'icon' => 'fas fa-home'],
    'about'    => ['label' => 'Tentang Kami', 'route' => '/tentang-kami','icon' => 'fas fa-building'],
    'services' => ['label' => 'Layanan',      'route' => '/layanan',     'icon' => 'fas fa-briefcase'],
    'contact'  => ['label' => 'Hubungi Kami', 'route' => '/hubungi-kami','icon' => 'fas fa-envelope'],
    'footer'   => ['label' => 'Footer',       'route' => null,           'icon' => 'fas fa-layer-group'],
];
$meta = $pageMeta[$page] ?? ['label' => ucfirst($page), 'route' => null, 'icon' => 'fas fa-file-alt'];

$sectionDefs = [
    'hero' => [
        'label' => 'Hero Banner',
        'icon'  => 'fas fa-image',
        'color' => 'text-msp-blue',
        'bg'    => 'bg-msp-blue/10',
        'keys'  => ['hero_title', 'hero_subtitle', 'hero_image'],
    ],
    'stats' => [
        'label' => 'Statistik',
        'icon'  => 'fas fa-chart-bar',
        'color' => 'text-emerald-600',
        'bg'    => 'bg-emerald-50',
        'keys'  => ['stat_1_value','stat_1_label','stat_2_value','stat_2_label','stat_3_value','stat_3_label'],
    ],
    'about_section' => [
        'label' => 'Seksi Tentang',
        'icon'  => 'fas fa-building',
        'color' => 'text-violet-600',
        'bg'    => 'bg-violet-50',
        'keys'  => ['about_title','about_description','about_description_2','about_image','about_metric_1','about_metric_1_label','about_metric_2','about_metric_2_label','about_metric_3','about_metric_3_label'],
    ],
    'news_section' => [
        'label' => 'Seksi Berita',
        'icon'  => 'fas fa-newspaper',
        'color' => 'text-cyan-600',
        'bg'    => 'bg-cyan-50',
        'keys'  => ['news_section_title','news_section_subtitle'],
    ],
    'innovation_section' => [
        'label' => 'Seksi Inovasi',
        'icon'  => 'fas fa-lightbulb',
        'color' => 'text-orange-500',
        'bg'    => 'bg-orange-50',
        'keys'  => ['innovation_title','innovation_body_1','innovation_body_2'],
    ],
    'services_grid' => [
        'label' => 'Grid Layanan',
        'icon'  => 'fas fa-th-large',
        'color' => 'text-indigo-600',
        'bg'    => 'bg-indigo-50',
        'keys'  => ['services_grid_title','services_grid_subtitle'],
    ],
    'map_section' => [
        'label' => 'Peta Lokasi',
        'icon'  => 'fas fa-map-marked-alt',
        'color' => 'text-teal-600',
        'bg'    => 'bg-teal-50',
        'keys'  => ['map_embed_url'],
    ],
    'story' => [
        'label' => 'Cerita Perusahaan',
        'icon'  => 'fas fa-book-open',
        'color' => 'text-amber-600',
        'bg'    => 'bg-amber-50',
        'keys'  => ['story','story_image'],
    ],
    'history_section' => [
        'label' => 'Seksi Sejarah',
        'icon'  => 'fas fa-history',
        'color' => 'text-yellow-600',
        'bg'    => 'bg-yellow-50',
        'keys'  => ['history_section_title'],
    ],
    'team_section' => [
        'label' => 'Seksi Tim',
        'icon'  => 'fas fa-users',
        'color' => 'text-purple-600',
        'bg'    => 'bg-purple-50',
        'keys'  => ['team_section_title','team_section_subtitle'],
    ],
    'cta_section' => [
        'label' => 'CTA',
        'icon'  => 'fas fa-bullhorn',
        'color' => 'text-msp-gold',
        'bg'    => 'bg-msp-gold/10',
        'keys'  => ['cta_title','cta_subtitle'],
    ],
    'quality_section' => [
        'label' => 'Kualitas & CTA',
        'icon'  => 'fas fa-medal',
        'color' => 'text-green-600',
        'bg'    => 'bg-green-50',
        'keys'  => ['main_services_title','quality_image','quality_title','quality_body'],
    ],
];

$grouped = [];
foreach ($contents as $content) {
    $assigned = false;
    foreach ($sectionDefs as $sk => $sec) {
        if (in_array($content->key, $sec['keys'])) {
            $grouped[$sk][] = $content;
            $assigned = true;
            break;
        }
    }
    if (!$assigned) $grouped['other'][] = $content;
}
$grouped = array_filter($grouped);

$textareaKeys = [
    'hero_subtitle','about_description','company_description','description','story','address',
    'innovation_title','innovation_body_1','innovation_body_2',
    'quality_body','cta_subtitle','team_section_subtitle','map_embed_url',
];
$firstSection = array_key_first($grouped) ?? 'hero';
@endphp

@section('title', 'Edit ' . $meta['label'])

<x-admin-dashboard-layout>

{{-- Full-bleed editor: override main padding with negative margins --}}
<div class="flex -m-6 lg:-m-8 min-h-[calc(100vh-60px)]"
     x-data="{ activeSection: '{{ $firstSection }}' }">

    {{-- ============================================================
         LEFT: Section Navigator
    ============================================================ --}}
    <aside class="w-[220px] shrink-0 flex flex-col border-r border-msp-border bg-[#F4F5FA]"
           style="position: sticky; top: 0; height: calc(100vh - 60px); overflow-y: auto;">

        {{-- Page identity --}}
        <div class="px-4 py-4 border-b border-msp-border bg-white">
            <div class="flex items-center gap-2.5 mb-3">
                <div class="w-8 h-8 rounded-lg bg-msp-navy flex items-center justify-center shrink-0">
                    <i class="{{ $meta['icon'] }} text-white text-[12px]"></i>
                </div>
                <div class="min-w-0">
                    <div class="font-hanken font-bold text-[13px] text-[#191C1E] leading-tight truncate">{{ $meta['label'] }}</div>
                    @if($meta['route'])
                        <div class="font-mono text-[10px] text-msp-gray-light truncate">{{ $meta['route'] }}</div>
                    @endif
                </div>
            </div>
            @if($meta['route'])
                <a href="{{ url($meta['route']) }}" target="_blank" rel="noopener noreferrer"
                   class="flex items-center justify-center gap-1.5 h-7 w-full rounded-lg border border-msp-border bg-msp-bg font-inter text-[11px] text-msp-gray hover:text-msp-navy hover:border-msp-navy/20 transition">
                    <i class="fas fa-external-link-alt text-[10px]"></i>
                    Lihat Halaman
                </a>
            @endif
        </div>

        {{-- Section list --}}
        <div class="flex-1 py-3 px-2 space-y-0.5">
            <p class="px-2 pb-1.5 font-hanken font-semibold text-[9.5px] text-[#9AA5BE] uppercase tracking-[0.12em]">Seksi Halaman</p>

            @foreach ($grouped as $sectionKey => $sectionContents)
                @php $sec = $sectionDefs[$sectionKey] ?? ['label'=>'Lainnya','icon'=>'fas fa-ellipsis-h','color'=>'text-gray-500','bg'=>'bg-gray-100']; @endphp
                <button type="button"
                        @click="activeSection = '{{ $sectionKey }}'"
                        class="group w-full flex items-center gap-2.5 px-2.5 py-2 rounded-xl text-left transition-all duration-150"
                        :class="activeSection === '{{ $sectionKey }}'
                            ? 'bg-white shadow-sm border border-msp-border text-msp-navy'
                            : 'text-msp-gray hover:bg-white/70 hover:text-[#191C1E] border border-transparent'">
                    <span class="w-7 h-7 rounded-lg flex items-center justify-center shrink-0 text-[11px] {{ $sec['color'] }} {{ $sec['bg'] }}">
                        <i class="{{ $sec['icon'] }}"></i>
                    </span>
                    <span class="flex-1 font-hanken font-semibold text-[12.5px] leading-none">{{ $sec['label'] }}</span>
                    <span class="font-inter text-[10px] opacity-60">{{ count($sectionContents) }}</span>
                </button>
            @endforeach
        </div>

        {{-- Bottom: save + back --}}
        <div class="p-3 border-t border-msp-border bg-white space-y-2">
            <button type="submit" form="contentForm"
                    class="w-full h-9 rounded-xl font-hanken font-bold text-[13px] text-[#071B3B] flex items-center justify-center gap-2 hover:brightness-95 transition"
                    style="background: linear-gradient(135deg, #F2A71B 0%, #FBC34C 100%)">
                <i class="fas fa-save text-[11px]"></i>
                Simpan
            </button>
            <a href="{{ route('admin.page-content.index') }}"
               class="w-full h-8 rounded-xl border border-msp-border font-inter text-[12px] text-msp-gray flex items-center justify-center hover:bg-msp-bg-alt transition">
                ← Kembali
            </a>
        </div>
    </aside>

    {{-- ============================================================
         RIGHT: Editor Panel
    ============================================================ --}}
    <div class="flex-1 flex flex-col min-w-0 overflow-y-auto bg-[#F0F2F8]">

        {{-- Top bar --}}
        <div class="sticky top-0 z-10 bg-white border-b border-msp-border px-6 py-3 flex items-center justify-between shadow-[0_1px_0_rgba(11,30,62,0.06)]">
            <div class="flex items-center gap-3">
                @foreach ($grouped as $sectionKey => $_)
                    @php $sec = $sectionDefs[$sectionKey] ?? ['label'=>'Lainnya','icon'=>'fas fa-file-alt','color'=>'text-gray-500','bg'=>'bg-gray-100']; @endphp
                    <div x-show="activeSection === '{{ $sectionKey }}'" x-cloak class="flex items-center gap-2">
                        <span class="w-7 h-7 rounded-lg flex items-center justify-center text-[11px] {{ $sec['color'] }} {{ $sec['bg'] }}">
                            <i class="{{ $sec['icon'] }}"></i>
                        </span>
                        <span class="font-hanken font-bold text-[15px] text-[#191C1E]">{{ $sec['label'] }}</span>
                    </div>
                @endforeach
            </div>
            <div class="flex items-center gap-2">
                @if(session('success'))
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-green-50 border border-green-200 text-green-700 rounded-full text-[12px] font-inter">
                        <i class="fas fa-check-circle text-[11px]"></i> Tersimpan
                    </span>
                @endif
                <button type="submit" form="contentForm"
                        class="h-9 px-5 rounded-xl font-hanken font-bold text-[13px] text-[#071B3B] flex items-center gap-2 hover:brightness-95 transition shadow-sm"
                        style="background: linear-gradient(135deg, #F2A71B 0%, #FBC34C 100%)">
                    <i class="fas fa-save text-[11px]"></i>
                    Simpan Perubahan
                </button>
            </div>
        </div>

        {{-- Error banner --}}
        @if($errors->any())
            <div class="mx-6 mt-4 px-4 py-3 bg-red-50 border border-red-200 rounded-xl">
                <ul class="text-[13px] text-red-700 font-inter space-y-0.5">
                    @foreach($errors->all() as $error)
                        <li><i class="fas fa-exclamation-circle mr-1 text-[11px]"></i>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form --}}
        <form id="contentForm"
              action="{{ route('admin.page-content.update', $page) }}"
              method="POST"
              enctype="multipart/form-data"
              class="flex-1 p-6">
            @csrf
            @method('PUT')

            @php $globalIndex = 0; @endphp

            @foreach ($grouped as $sectionKey => $sectionContents)
                @php $sec = $sectionDefs[$sectionKey] ?? ['label'=>'Lainnya','icon'=>'fas fa-file-alt','color'=>'text-gray-500','bg'=>'bg-gray-100']; @endphp

                <div x-show="activeSection === '{{ $sectionKey }}'" x-cloak>

                    {{-- ===== HERO SECTION ===== --}}
                    @if($sectionKey === 'hero')
                        @php
                            $heroImg   = collect($sectionContents)->firstWhere('key', 'hero_image');
                            $heroTitle = collect($sectionContents)->firstWhere('key', 'hero_title');
                            $heroSub   = collect($sectionContents)->firstWhere('key', 'hero_subtitle');
                        @endphp

                        <div class="space-y-4 max-w-[760px]">

                            {{-- Image upload card --}}
                            @if($heroImg)
                                @php
                                    $idx = $globalIndex++;
                                    $imgVal = $heroImg->value;
                                    $imgUrl = $imgVal ? (str_starts_with($imgVal,'images/') ? asset($imgVal) : asset('images/'.$imgVal)) : null;
                                @endphp
                                <input type="hidden" name="contents[{{ $idx }}][id]" value="{{ $heroImg->id }}">
                                <input type="hidden" name="contents[{{ $idx }}][value]" value="{{ $heroImg->value }}">

                                <div class="bg-white rounded-2xl border border-msp-border overflow-hidden shadow-sm"
                                     x-data="{
                                        previewUrl: {{ $imgUrl ? json_encode($imgUrl) : "''" }},
                                        fileName: {{ $imgUrl ? json_encode(basename((string)$imgVal)) : "''" }},
                                        handleFile(e) { const f=e.target.files[0]; if(!f) return; this.previewUrl=URL.createObjectURL(f); this.fileName=f.name; },
                                        clearImage() { this.previewUrl=''; this.fileName=''; this.$refs.fi1.value=''; }
                                     }">
                                    <div class="px-5 py-3.5 border-b border-msp-border flex items-center gap-2">
                                        <i class="fas fa-image text-msp-blue text-[13px]"></i>
                                        <span class="font-hanken font-bold text-[13px] text-[#191C1E]">Gambar Background Hero</span>
                                        <span class="font-inter text-[11px] text-msp-gray-light ml-auto">1920×1080px disarankan</span>
                                    </div>
                                    <div class="p-5">
                                        <div x-show="previewUrl" x-cloak class="relative rounded-xl overflow-hidden mb-3 border border-msp-border">
                                            <img :src="previewUrl" alt="" class="w-full h-52 object-cover">
                                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent pointer-events-none"></div>
                                            <div class="absolute bottom-3 left-4 flex items-center gap-2">
                                                <i class="fas fa-check-circle text-green-400 text-[13px]"></i>
                                                <span class="font-inter text-[12px] text-white/90 truncate max-w-[280px]" x-text="fileName"></span>
                                            </div>
                                            <button type="button" @click="clearImage()"
                                                    class="absolute top-3 right-3 w-8 h-8 rounded-lg bg-black/50 flex items-center justify-center text-white hover:bg-msp-danger transition">
                                                <i class="fas fa-times text-[12px]"></i>
                                            </button>
                                        </div>
                                        <div x-show="!previewUrl"
                                             class="h-40 rounded-xl border-2 border-dashed border-msp-border bg-msp-bg flex flex-col items-center justify-center gap-2 mb-3 cursor-pointer hover:border-msp-gold/50 transition"
                                             @click="$refs.fi1.click()">
                                            <i class="fas fa-cloud-upload-alt text-3xl text-msp-border"></i>
                                            <span class="font-inter text-[13px] text-msp-gray-light">Klik untuk pilih gambar</span>
                                        </div>
                                        <label class="cursor-pointer inline-flex items-center gap-2 h-9 px-4 bg-msp-bg border border-msp-border rounded-xl font-inter font-medium text-[13px] text-msp-gray hover:border-msp-gold hover:text-msp-gold transition">
                                            <i class="fas fa-upload text-[11px]"></i> Pilih Gambar
                                            <input name="file_{{ $heroImg->id }}" type="file" accept="image/*" class="hidden" x-ref="fi1" @change="handleFile($event)">
                                        </label>
                                    </div>
                                </div>
                            @endif

                            {{-- Title + Subtitle --}}
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                                @if($heroTitle)
                                    @php $idx = $globalIndex++; @endphp
                                    <input type="hidden" name="contents[{{ $idx }}][id]" value="{{ $heroTitle->id }}">
                                    <div class="bg-white rounded-2xl border border-msp-border p-5 shadow-sm">
                                        <label for="field_{{ $heroTitle->id }}" class="flex items-center gap-2 mb-3">
                                            <i class="fas fa-heading text-msp-blue text-[12px]"></i>
                                            <span class="font-hanken font-bold text-[12px] text-msp-gray uppercase tracking-wider">Judul Hero</span>
                                        </label>
                                        <input id="field_{{ $heroTitle->id }}"
                                               name="contents[{{ $idx }}][value]"
                                               type="text"
                                               value="{{ old('contents.'.$idx.'.value', $heroTitle->value) }}"
                                               class="w-full h-11 px-4 bg-msp-bg rounded-xl font-inter text-[14px] text-[#191C1E] border border-msp-border focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20 focus:outline-none transition"
                                               placeholder="Judul banner...">
                                    </div>
                                @endif
                                @if($heroSub)
                                    @php $idx = $globalIndex++; @endphp
                                    <input type="hidden" name="contents[{{ $idx }}][id]" value="{{ $heroSub->id }}">
                                    <div class="bg-white rounded-2xl border border-msp-border p-5 shadow-sm">
                                        <label for="field_{{ $heroSub->id }}" class="flex items-center gap-2 mb-3">
                                            <i class="fas fa-align-left text-msp-blue text-[12px]"></i>
                                            <span class="font-hanken font-bold text-[12px] text-msp-gray uppercase tracking-wider">Subjudul</span>
                                        </label>
                                        <textarea id="field_{{ $heroSub->id }}"
                                                  name="contents[{{ $idx }}][value]"
                                                  rows="3"
                                                  class="w-full px-4 py-3 bg-msp-bg rounded-xl font-inter text-[14px] text-[#191C1E] border border-msp-border focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20 focus:outline-none transition resize-none"
                                                  placeholder="Deskripsi singkat...">{{ old('contents.'.$idx.'.value', $heroSub->value) }}</textarea>
                                    </div>
                                @endif
                            </div>

                            {{-- Live preview mockup --}}
                            <div class="bg-white rounded-2xl border border-msp-border overflow-hidden shadow-sm">
                                <div class="px-5 py-3 border-b border-msp-border">
                                    <span class="font-hanken font-bold text-[12px] text-msp-gray uppercase tracking-wider">
                                        <i class="fas fa-eye mr-1.5 text-[11px]"></i>Pratinjau Layout
                                    </span>
                                </div>
                                <div class="relative h-36 overflow-hidden"
                                     style="background: linear-gradient(160deg, #0B2145 0%, #2A3F9E 100%)">
                                    @if($heroImg && $heroImg->value)
                                        @php $pImgUrl = str_starts_with($heroImg->value,'images/') ? asset($heroImg->value) : asset('images/'.$heroImg->value); @endphp
                                        <img src="{{ $pImgUrl }}" alt="" class="absolute inset-0 w-full h-full object-cover opacity-30">
                                    @endif
                                    <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-8">
                                        <p class="font-space font-bold text-[18px] text-white leading-tight mb-1">{{ $heroTitle->value ?? 'Judul Hero' }}</p>
                                        <p class="font-inter text-[12px] text-white/70 line-clamp-2">{{ $heroSub->value ?? 'Subjudul hero banner...' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    {{-- ===== STATS SECTION ===== --}}
                    @elseif($sectionKey === 'stats')
                        @php
                            $statGroups = [
                                ['val' => collect($sectionContents)->firstWhere('key','stat_1_value'), 'lbl' => collect($sectionContents)->firstWhere('key','stat_1_label'), 'num' => 1],
                                ['val' => collect($sectionContents)->firstWhere('key','stat_2_value'), 'lbl' => collect($sectionContents)->firstWhere('key','stat_2_label'), 'num' => 2],
                                ['val' => collect($sectionContents)->firstWhere('key','stat_3_value'), 'lbl' => collect($sectionContents)->firstWhere('key','stat_3_label'), 'num' => 3],
                            ];
                        @endphp

                        <div class="max-w-[760px] space-y-4">
                            <div class="bg-white rounded-2xl border border-msp-border p-4 shadow-sm">
                                <p class="font-inter text-[13px] text-msp-gray-light">
                                    <i class="fas fa-info-circle text-msp-blue mr-1.5"></i>
                                    Ditampilkan sebagai angka besar + keterangan di halaman beranda.
                                </p>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                @foreach($statGroups as $sg)
                                    <div class="bg-white rounded-2xl border border-msp-border overflow-hidden shadow-sm">
                                        <div class="px-4 py-3 border-b border-msp-border bg-emerald-50">
                                            <span class="font-hanken font-bold text-[11px] text-emerald-700 uppercase tracking-wider">Statistik {{ $sg['num'] }}</span>
                                        </div>
                                        <div class="p-4 space-y-3">
                                            @if($sg['val'])
                                                @php $idx = $globalIndex++; @endphp
                                                <input type="hidden" name="contents[{{ $idx }}][id]" value="{{ $sg['val']->id }}">
                                                <div>
                                                    <label class="block font-hanken font-bold text-[10px] text-msp-gray uppercase tracking-wider mb-1.5">Angka / Nilai</label>
                                                    <input name="contents[{{ $idx }}][value]"
                                                           type="text"
                                                           value="{{ old('contents.'.$idx.'.value', $sg['val']->value) }}"
                                                           class="w-full h-11 px-4 bg-msp-bg rounded-xl font-space font-bold text-[20px] text-emerald-700 text-center border border-msp-border focus:border-emerald-400 focus:ring-2 focus:ring-emerald-200 focus:outline-none transition"
                                                           placeholder="500+">
                                                </div>
                                            @endif
                                            @if($sg['lbl'])
                                                @php $idx = $globalIndex++; @endphp
                                                <input type="hidden" name="contents[{{ $idx }}][id]" value="{{ $sg['lbl']->id }}">
                                                <div>
                                                    <label class="block font-hanken font-bold text-[10px] text-msp-gray uppercase tracking-wider mb-1.5">Label Keterangan</label>
                                                    <input name="contents[{{ $idx }}][value]"
                                                           type="text"
                                                           value="{{ old('contents.'.$idx.'.value', $sg['lbl']->value) }}"
                                                           class="w-full h-9 px-3 bg-msp-bg rounded-lg font-inter text-[13px] text-center border border-msp-border focus:border-emerald-400 focus:ring-2 focus:ring-emerald-200 focus:outline-none transition"
                                                           placeholder="Klien Aktif">
                                                </div>
                                            @endif
                                        </div>
                                        @if($sg['val'] || $sg['lbl'])
                                            <div class="mx-4 mb-4 p-3 bg-msp-bg rounded-xl text-center border border-msp-border">
                                                <div class="font-space font-bold text-[22px] text-msp-gold">{{ $sg['val']->value ?? '—' }}</div>
                                                <div class="font-inter text-[11px] text-msp-gray-light mt-0.5">{{ $sg['lbl']->value ?? '—' }}</div>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    {{-- ===== ABOUT SECTION ===== --}}
                    @elseif($sectionKey === 'about_section')
                        @php
                            $aTitle  = collect($sectionContents)->firstWhere('key','about_title');
                            $aDesc   = collect($sectionContents)->firstWhere('key','about_description');
                            $aDesc2  = collect($sectionContents)->firstWhere('key','about_description_2');
                            $aImg    = collect($sectionContents)->firstWhere('key','about_image');
                            $metrics = [
                                [collect($sectionContents)->firstWhere('key','about_metric_1'), collect($sectionContents)->firstWhere('key','about_metric_1_label'), 1],
                                [collect($sectionContents)->firstWhere('key','about_metric_2'), collect($sectionContents)->firstWhere('key','about_metric_2_label'), 2],
                                [collect($sectionContents)->firstWhere('key','about_metric_3'), collect($sectionContents)->firstWhere('key','about_metric_3_label'), 3],
                            ];
                        @endphp
                        <div class="max-w-[760px] space-y-4">
                            @if($aTitle)
                                @php $idx = $globalIndex++; @endphp
                                <input type="hidden" name="contents[{{ $idx }}][id]" value="{{ $aTitle->id }}">
                                <div class="bg-white rounded-2xl border border-msp-border p-5 shadow-sm">
                                    <label for="field_{{ $aTitle->id }}" class="flex items-center gap-2 mb-3">
                                        <i class="fas fa-heading text-violet-500 text-[12px]"></i>
                                        <span class="font-hanken font-bold text-[12px] text-msp-gray uppercase tracking-wider">Judul Seksi Tentang</span>
                                    </label>
                                    <input id="field_{{ $aTitle->id }}"
                                           name="contents[{{ $idx }}][value]"
                                           type="text"
                                           value="{{ old('contents.'.$idx.'.value', $aTitle->value) }}"
                                           class="w-full h-11 px-4 bg-msp-bg rounded-xl font-inter text-[14px] text-[#191C1E] border border-msp-border focus:border-violet-400 focus:ring-2 focus:ring-violet-200 focus:outline-none transition"
                                           placeholder="Tentang PT MSP...">
                                </div>
                            @endif

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                                @if($aImg)
                                    @php
                                        $idx = $globalIndex++;
                                        $imgVal = $aImg->value;
                                        $imgUrl = $imgVal ? (str_starts_with($imgVal,'images/') ? asset($imgVal) : asset('images/'.$imgVal)) : null;
                                    @endphp
                                    <input type="hidden" name="contents[{{ $idx }}][id]" value="{{ $aImg->id }}">
                                    <input type="hidden" name="contents[{{ $idx }}][value]" value="{{ $aImg->value }}">
                                    <div class="bg-white rounded-2xl border border-msp-border overflow-hidden shadow-sm"
                                         x-data="{
                                            previewUrl: {{ $imgUrl ? json_encode($imgUrl) : "''" }},
                                            fileName: {{ $imgUrl ? json_encode(basename((string)$imgVal)) : "''" }},
                                            handleFile(e) { const f=e.target.files[0]; if(!f) return; this.previewUrl=URL.createObjectURL(f); this.fileName=f.name; },
                                            clearImage() { this.previewUrl=''; this.fileName=''; this.$refs.fi2.value=''; }
                                         }">
                                        <div class="px-4 py-3 border-b border-msp-border flex items-center gap-2">
                                            <i class="fas fa-image text-violet-500 text-[12px]"></i>
                                            <span class="font-hanken font-bold text-[12px] text-msp-gray uppercase tracking-wider">Foto Seksi Tentang</span>
                                        </div>
                                        <div class="p-4">
                                            <div x-show="previewUrl" x-cloak class="relative rounded-xl overflow-hidden mb-3 border border-msp-border">
                                                <img :src="previewUrl" alt="" class="w-full h-36 object-cover">
                                                <button type="button" @click="clearImage()" class="absolute top-2 right-2 w-7 h-7 rounded-lg bg-black/50 flex items-center justify-center text-white hover:bg-msp-danger transition">
                                                    <i class="fas fa-times text-[11px]"></i>
                                                </button>
                                            </div>
                                            <div x-show="!previewUrl" class="h-28 rounded-xl border-2 border-dashed border-msp-border bg-msp-bg flex flex-col items-center justify-center gap-1.5 mb-3 cursor-pointer hover:border-violet-300 transition" @click="$refs.fi2.click()">
                                                <i class="fas fa-image text-2xl text-msp-border"></i>
                                                <span class="font-inter text-[12px] text-msp-gray-light">Klik untuk upload</span>
                                            </div>
                                            <label class="cursor-pointer inline-flex items-center gap-2 h-8 px-3 bg-msp-bg border border-msp-border rounded-lg font-inter text-[12px] text-msp-gray hover:border-violet-400 transition">
                                                <i class="fas fa-upload text-[10px]"></i> Pilih Gambar
                                                <input name="file_{{ $aImg->id }}" type="file" accept="image/*" class="hidden" x-ref="fi2" @change="handleFile($event)">
                                            </label>
                                        </div>
                                    </div>
                                @endif

                                @if($aDesc)
                                    @php $idx = $globalIndex++; @endphp
                                    <input type="hidden" name="contents[{{ $idx }}][id]" value="{{ $aDesc->id }}">
                                    <div class="bg-white rounded-2xl border border-msp-border overflow-hidden shadow-sm flex flex-col">
                                        <div class="px-4 py-3 border-b border-msp-border flex items-center gap-2">
                                            <i class="fas fa-align-left text-violet-500 text-[12px]"></i>
                                            <span class="font-hanken font-bold text-[12px] text-msp-gray uppercase tracking-wider">Deskripsi (Paragraf 1)</span>
                                        </div>
                                        <div class="p-4 flex-1">
                                            <textarea name="contents[{{ $idx }}][value]"
                                                      rows="7"
                                                      class="w-full px-4 py-3 bg-msp-bg rounded-xl font-inter text-[13px] text-[#191C1E] border border-msp-border focus:border-violet-400 focus:ring-2 focus:ring-violet-200 focus:outline-none transition resize-none"
                                                      placeholder="Deskripsi perusahaan paragraf pertama...">{{ old('contents.'.$idx.'.value', $aDesc->value) }}</textarea>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            @if($aDesc2)
                                @php $idx = $globalIndex++; @endphp
                                <input type="hidden" name="contents[{{ $idx }}][id]" value="{{ $aDesc2->id }}">
                                <div class="bg-white rounded-2xl border border-msp-border overflow-hidden shadow-sm">
                                    <div class="px-5 py-3.5 border-b border-msp-border flex items-center gap-2">
                                        <i class="fas fa-align-left text-violet-500 text-[12px]"></i>
                                        <span class="font-hanken font-bold text-[13px] text-[#191C1E]">Deskripsi (Paragraf 2)</span>
                                    </div>
                                    <div class="p-5">
                                        <textarea name="contents[{{ $idx }}][value]"
                                                  rows="4"
                                                  class="w-full px-4 py-3 bg-msp-bg rounded-xl font-inter text-[13px] text-[#191C1E] border border-msp-border focus:border-violet-400 focus:ring-2 focus:ring-violet-200 focus:outline-none transition resize-y"
                                                  placeholder="Deskripsi perusahaan paragraf kedua...">{{ old('contents.'.$idx.'.value', $aDesc2->value) }}</textarea>
                                    </div>
                                </div>
                            @endif

                            <div class="bg-white rounded-2xl border border-msp-border overflow-hidden shadow-sm">
                                <div class="px-5 py-3.5 border-b border-msp-border">
                                    <span class="font-hanken font-bold text-[13px] text-[#191C1E]">
                                        <i class="fas fa-trophy text-violet-500 mr-1.5 text-[12px]"></i>Metrik Perusahaan
                                    </span>
                                </div>
                                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                                    @foreach($metrics as [$mVal, $mLbl, $mNum])
                                        <div class="bg-msp-bg rounded-xl p-4 border border-msp-border">
                                            <p class="font-hanken font-bold text-[10px] text-msp-gray-light uppercase tracking-wider mb-3 text-center">Metrik {{ $mNum }}</p>
                                            @if($mVal)
                                                @php $idx = $globalIndex++; @endphp
                                                <input type="hidden" name="contents[{{ $idx }}][id]" value="{{ $mVal->id }}">
                                                <input name="contents[{{ $idx }}][value]"
                                                       type="text"
                                                       value="{{ old('contents.'.$idx.'.value', $mVal->value) }}"
                                                       class="w-full h-10 px-3 bg-white rounded-lg font-space font-bold text-[18px] text-violet-700 text-center border border-msp-border focus:border-violet-400 focus:outline-none transition mb-2"
                                                       placeholder="10+">
                                            @endif
                                            @if($mLbl)
                                                @php $idx = $globalIndex++; @endphp
                                                <input type="hidden" name="contents[{{ $idx }}][id]" value="{{ $mLbl->id }}">
                                                <input name="contents[{{ $idx }}][value]"
                                                       type="text"
                                                       value="{{ old('contents.'.$idx.'.value', $mLbl->value) }}"
                                                       class="w-full h-8 px-3 bg-white rounded-lg font-inter text-[12px] text-center border border-msp-border focus:border-violet-400 focus:outline-none transition"
                                                       placeholder="Tahun Pengalaman">
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    {{-- ===== GENERIC SECTIONS (contact_info, story, other) ===== --}}
                    @else
                        <div class="max-w-[760px] space-y-4">
                            @foreach($sectionContents as $content)
                                @php $idx = $globalIndex++; @endphp
                                <input type="hidden" name="contents[{{ $idx }}][id]" value="{{ $content->id }}">

                                @if($content->type === 'image')
                                    @php
                                        $imgVal = $content->value;
                                        $imgUrl = $imgVal ? (str_starts_with($imgVal,'images/') ? asset($imgVal) : asset('images/'.$imgVal)) : null;
                                    @endphp
                                    <input type="hidden" name="contents[{{ $idx }}][value]" value="{{ $content->value }}">

                                    <div class="bg-white rounded-2xl border border-msp-border overflow-hidden shadow-sm"
                                         x-data="{
                                            previewUrl: {{ $imgUrl ? json_encode($imgUrl) : "''" }},
                                            fileName: {{ $imgUrl ? json_encode(basename((string)$imgVal)) : "''" }},
                                            handleFile(e) { const f=e.target.files[0]; if(!f) return; this.previewUrl=URL.createObjectURL(f); this.fileName=f.name; },
                                            clearImage() { this.previewUrl=''; this.fileName=''; this.$refs.fiG.value=''; }
                                         }">
                                        <div class="px-5 py-3.5 border-b border-msp-border flex items-center gap-2">
                                            <i class="fas fa-image text-msp-gray text-[13px]"></i>
                                            <span class="font-hanken font-bold text-[13px] text-[#191C1E]">{{ $content->label ?? $content->key }}</span>
                                        </div>
                                        <div class="p-5">
                                            <div x-show="previewUrl" x-cloak class="relative rounded-xl overflow-hidden mb-3 border border-msp-border">
                                                <img :src="previewUrl" alt="" class="w-full h-44 object-cover">
                                                <button type="button" @click="clearImage()" class="absolute top-2.5 right-2.5 w-7 h-7 rounded-lg bg-black/50 flex items-center justify-center text-white hover:bg-msp-danger transition">
                                                    <i class="fas fa-times text-[11px]"></i>
                                                </button>
                                            </div>
                                            <div x-show="!previewUrl" class="h-32 rounded-xl border-2 border-dashed border-msp-border bg-msp-bg flex flex-col items-center justify-center gap-1.5 mb-3 cursor-pointer hover:border-msp-gold/50 transition" @click="$refs.fiG.click()">
                                                <i class="fas fa-cloud-upload-alt text-2xl text-msp-border"></i>
                                                <span class="font-inter text-[12px] text-msp-gray-light">Klik untuk upload</span>
                                            </div>
                                            <label class="cursor-pointer inline-flex items-center gap-2 h-9 px-4 bg-msp-bg border border-msp-border rounded-xl font-inter text-[13px] text-msp-gray hover:border-msp-gold hover:text-msp-gold transition">
                                                <i class="fas fa-upload text-[11px]"></i> Pilih Gambar
                                                <input name="file_{{ $content->id }}" type="file" accept="image/*" class="hidden" x-ref="fiG" @change="handleFile($event)">
                                            </label>
                                        </div>
                                    </div>

                                @else
                                    @php
                                        $fieldIconMap = [
                                            'footer_company_name'  => 'fas fa-building text-slate-600',
                                            'social_linkedin'      => 'fab fa-linkedin text-blue-700',
                                            'social_facebook'      => 'fab fa-facebook text-blue-600',
                                            'social_instagram'     => 'fab fa-instagram text-pink-500',
                                            'social_x'             => 'fab fa-x-twitter text-gray-800',
                                            'phone'                => 'fas fa-phone text-emerald-600',
                                            'email'                => 'fas fa-envelope text-rose-500',
                                            'address'              => 'fas fa-map-marker-alt text-rose-500',
                                            'office_hours'         => 'fas fa-clock text-rose-400',
                                            'story'                => 'fas fa-book-open text-amber-600',
                                            'company_description'  => 'fas fa-building text-slate-500',
                                            'news_section_title'   => 'fas fa-newspaper text-cyan-600',
                                            'news_section_subtitle'=> 'fas fa-align-left text-cyan-500',
                                            'innovation_title'     => 'fas fa-lightbulb text-orange-500',
                                            'innovation_body_1'    => 'fas fa-align-left text-orange-400',
                                            'innovation_body_2'    => 'fas fa-align-left text-orange-400',
                                            'services_grid_title'  => 'fas fa-th-large text-indigo-600',
                                            'services_grid_subtitle'=> 'fas fa-align-left text-indigo-400',
                                            'history_section_title'=> 'fas fa-history text-yellow-600',
                                            'team_section_title'   => 'fas fa-users text-purple-600',
                                            'team_section_subtitle'=> 'fas fa-align-left text-purple-400',
                                            'cta_title'            => 'fas fa-bullhorn text-msp-gold',
                                            'cta_subtitle'         => 'fas fa-align-left text-amber-400',
                                            'main_services_title'  => 'fas fa-medal text-green-600',
                                            'quality_title'        => 'fas fa-star text-green-500',
                                            'quality_body'         => 'fas fa-align-left text-green-400',
                                            'map_embed_url'        => 'fas fa-map-marked-alt text-teal-600',
                                        ];
                                        $fieldIcon = $fieldIconMap[$content->key]
                                            ?? (in_array($content->key, $textareaKeys) ? 'fas fa-align-left text-msp-gray' : 'fas fa-font text-msp-gray');
                                    @endphp
                                    <div class="bg-white rounded-2xl border border-msp-border overflow-hidden shadow-sm">
                                        <div class="px-5 py-3.5 border-b border-msp-border flex items-center gap-2">
                                            <i class="{{ $fieldIcon }} text-[13px]"></i>
                                            <span class="font-hanken font-bold text-[13px] text-[#191C1E]">{{ $content->label ?? $content->key }}</span>
                                        </div>
                                        <div class="p-5">
                                            @if(in_array($content->key, $textareaKeys))
                                                <textarea name="contents[{{ $idx }}][value]"
                                                          rows="{{ in_array($content->key, ['story','about_description','address']) ? 6 : 3 }}"
                                                          class="w-full px-4 py-3 bg-msp-bg rounded-xl font-inter text-[14px] text-[#191C1E] border border-msp-border focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20 focus:outline-none transition resize-y"
                                                          placeholder="{{ $content->label ?? $content->key }}...">{{ old('contents.'.$idx.'.value', $content->value) }}</textarea>
                                            @else
                                                <input name="contents[{{ $idx }}][value]"
                                                       type="text"
                                                       value="{{ old('contents.'.$idx.'.value', $content->value) }}"
                                                       class="w-full h-11 px-4 bg-msp-bg rounded-xl font-inter text-[14px] text-[#191C1E] border border-msp-border focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20 focus:outline-none transition"
                                                       placeholder="{{ $content->label ?? $content->key }}...">
                                            @endif
                                            @error('contents.'.$idx.'.value')
                                                <p class="mt-1.5 text-[12px] text-msp-danger font-inter">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif

                </div>
            @endforeach

        </form>
    </div>
</div>

</x-admin-dashboard-layout>
