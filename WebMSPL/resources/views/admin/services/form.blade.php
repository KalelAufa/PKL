<x-admin-dashboard-layout>
    <div class="max-w-[904px]">
        <div class="mb-6">
            <a href="{{ route('admin.services.index') }}" class="inline-flex items-center gap-1.5 font-inter text-[14px] text-msp-gray-light hover:text-msp-gold transition mb-2">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Layanan
            </a>
            <h1 class="font-hanken font-bold text-2xl text-[#191C1E] leading-tight">{{ isset($service) ? 'Edit Layanan: ' . $service->title : 'Tambah Layanan' }}</h1>
        </div>

        @if ($errors->any())
            <div class="mb-4 px-4 py-3 bg-red-50 border border-red-200 text-red-700 rounded-lg text-sm font-inter">
                <ul class="list-disc pl-4 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ isset($service) ? route('admin.services.update', $service) : route('admin.services.store') }}" method="POST" enctype="multipart/form-data" x-data="{ submitting: false }" @submit="submitting = true">
            @csrf
            @isset($service)
                @method('PUT')
            @endisset

            <div class="flex gap-6 items-start">
                <div class="flex-1 space-y-6">
                    <div class="bg-msp-card-bg rounded-xl p-6 space-y-6">
                        <div>
                            <label for="title" class="block font-hanken font-bold text-[12px] text-[#44474E] uppercase tracking-wide mb-1.5">Judul Layanan</label>
                            <input id="title" name="title" type="text" value="{{ old('title', $service->title ?? '') }}" required
                                   placeholder="Cyber Security"
                                   oninput="document.getElementById('slug').value = this.value.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '')"
                                   class="w-full px-4 py-2.5 bg-msp-bg-alt rounded-lg text-sm text-[#191C1E] placeholder:text-[#6B7280] border-none outline-none focus:ring-2 focus:ring-msp-gold/30 transition">
                        </div>

                        <div>
                            <label for="slug" class="block font-hanken font-bold text-[12px] text-[#44474E] uppercase tracking-wide mb-1.5">URL Slug</label>
                            <input id="slug" name="slug" type="text" value="{{ old('slug', $service->slug ?? '') }}" required
                                   placeholder="cyber-security"
                                   class="w-full px-4 py-2.5 bg-msp-bg-alt rounded-lg text-sm text-[#191C1E] placeholder:text-[#6B7280] border-none outline-none focus:ring-2 focus:ring-msp-gold/30 transition">
                            <div class="mt-1 text-xs text-msp-gray-light font-inter">ptmsp.co.id/layanan/<span id="slug-preview" class="text-msp-gold">{{ old('slug', $service->slug ?? 'cyber-security') }}</span></div>
                        </div>

                        <div>
                            <label for="excerpt" class="block font-hanken font-bold text-[12px] text-[#44474E] uppercase tracking-wide mb-1.5">Deskripsi Singkat</label>
                            <textarea id="excerpt" name="excerpt" rows="2" maxlength="160" required
                                      placeholder="Deskripsi singkat tentang layanan ini..."
                                      oninput="document.getElementById('excerpt-count').textContent = this.value.length"
                                      class="w-full px-4 py-2.5 bg-msp-bg-alt rounded-lg text-sm text-[#191C1E] placeholder:text-[#6B7280] border-none outline-none focus:ring-2 focus:ring-msp-gold/30 transition resize-none">{{ old('excerpt', $service->excerpt ?? '') }}</textarea>
                            <div class="mt-1 text-xs text-msp-gray-light font-inter text-right"><span id="excerpt-count">{{ strlen(old('excerpt', $service->excerpt ?? '')) }}</span> / 160 characters</div>
                        </div>

                        <div>
                            <label for="description" class="block font-hanken font-bold text-[12px] text-[#44474E] uppercase tracking-wide mb-1.5">Deskripsi</label>
                            <textarea id="description" name="description" rows="4" required
                                      placeholder="Tulis deskripsi singkat layanan ini..."
                                      class="w-full px-4 py-2.5 bg-msp-bg-alt rounded-lg text-sm text-[#191C1E] placeholder:text-[#6B7280] border-none outline-none focus:ring-2 focus:ring-msp-gold/30 transition resize-none">{{ old('description', $service->description ?? '') }}</textarea>
                        </div>

                        <div>
                            <label for="editor" class="block font-hanken font-bold text-[12px] text-[#44474E] uppercase tracking-wide mb-1.5">Deskripsi Lengkap (Rich Text)</label>
                            <div class="bg-msp-bg-alt rounded-lg overflow-hidden">
                                <div id="editor" class="min-h-[250px] bg-white rounded-lg"></div>
                                <textarea id="full_description-hidden" class="hidden">{{ old('full_description', $service->full_description ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="bg-msp-card-bg rounded-xl p-6 space-y-6">
                        <h3 class="font-hanken font-bold text-[16px] text-msp-sidebar">Aset Media</h3>

                        <div>
                            <label for="icon" class="block font-hanken font-bold text-[12px] text-[#44474E] uppercase tracking-wide mb-1.5">Ikon (Material)</label>
                            <div class="flex gap-3">
                                <div class="flex-1 relative">
                                    <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-[#6B7280]"></i>
                                    <input id="icon" name="icon" type="text" value="{{ old('icon', $service->icon ?? '') }}"
                                           placeholder="search"
                                           class="w-full pl-9 pr-3 py-2.5 bg-msp-bg-alt rounded-lg text-sm text-[#191C1E] placeholder:text-[#6B7280] border-none outline-none focus:ring-2 focus:ring-msp-gold/30 transition">
                                </div>
                                <div class="w-10 h-10 rounded-lg bg-msp-bg-alt flex items-center justify-center shrink-0" title="Icon preview">
                                    <span class="material-symbols-outlined text-[#44474E] text-xl">{{ old('icon', $service->icon ?? '') ?: 'shield' }}</span>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block font-hanken font-bold text-[12px] text-[#44474E] uppercase tracking-wide mb-3">Main Icon (Card Display)</label>
                            <label for="main_icon" class="block cursor-pointer">
                                <div id="main-icon-placeholder" class="border-2 border-dashed border-msp-border rounded-xl p-6 text-center hover:border-msp-gold/50 transition group @if(isset($service) && $service->icon_image) hidden @endif">
                                    <div class="w-10 h-10 mx-auto mb-2 rounded-full bg-msp-bg-alt flex items-center justify-center group-hover:bg-msp-gold/10 transition">
                                        <i class="fas fa-image text-lg text-[#6B7280] group-hover:text-msp-gold transition"></i>
                                    </div>
                                    <div class="font-inter text-[13px] text-[#44474E]">Click or drag image to upload</div>
                                </div>
                                <div id="main-icon-preview" class="hidden relative rounded-xl overflow-hidden w-32 h-32">
                                    <img id="main-icon-img" src="" alt="Preview" class="w-full h-full object-cover rounded-xl">
                                    <button type="button" onclick="resetUpload('main-icon')" class="absolute top-1 right-1 w-6 h-6 bg-white/90 rounded-full flex items-center justify-center shadow hover:bg-white transition">
                                        <i class="fas fa-times text-msp-danger"></i>
                                    </button>
                                </div>
                                <input id="main_icon" name="icon_image" type="file" accept="image/*" class="hidden" onchange="previewUpload(this, 'main-icon')">
                            </label>
                            @if(isset($service) && $service->icon_image)
                                <div class="mt-2 relative inline-block rounded-xl overflow-hidden w-32 h-32">
                                    <img src="{{ asset('images/' . $service->icon_image) }}" alt="" class="w-full h-full object-cover">
                                </div>
                            @endif
                        </div>

                        <div>
                            <label class="block font-hanken font-bold text-[12px] text-[#44474E] uppercase tracking-wide mb-3">Hero Image</label>
                            <label for="hero_image" class="block cursor-pointer">
                                <div id="hero-placeholder" class="border-2 border-dashed border-msp-border rounded-xl p-8 text-center hover:border-msp-gold/50 transition group @if(isset($service) && $service->hero_image) hidden @endif">
                                    <div class="w-12 h-12 mx-auto mb-3 rounded-full bg-msp-bg-alt flex items-center justify-center group-hover:bg-msp-gold/10 transition">
                                        <i class="fas fa-image text-2xl text-[#6B7280] group-hover:text-msp-gold transition"></i>
                                    </div>
                                    <div class="font-inter text-[14px] text-[#44474E]">Click or drag image to replace</div>
                                    <div class="font-inter text-[12px] text-[#6B7280] mt-1">Recommended size: 1920x1080px (WebP/JPG)</div>
                                </div>
                                <div id="hero-preview" class="hidden relative rounded-xl overflow-hidden">
                                    <img id="hero-img" src="" alt="Preview" class="w-full h-48 object-cover rounded-xl">
                                    <button type="button" onclick="resetUpload('hero')" class="absolute top-2 right-2 w-8 h-8 bg-white/90 rounded-full flex items-center justify-center shadow hover:bg-white transition">
                                        <i class="fas fa-times text-msp-danger"></i>
                                    </button>
                                </div>
                                <input id="hero_image" name="hero_image" type="file" accept="image/*" class="hidden" onchange="previewUpload(this, 'hero')">
                            </label>
                            @if(isset($service) && $service->hero_image)
                                <div class="mt-2 relative rounded-xl overflow-hidden">
                                    <img src="{{ asset('images/' . $service->hero_image) }}" alt="" class="w-full h-48 object-cover rounded-xl">
                                </div>
                            @endif
                        </div>

                        <div>
                            <label class="block font-hanken font-bold text-[12px] text-[#44474E] uppercase tracking-wide mb-3">Gallery Images (Max 2)</label>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="gallery_1" class="block cursor-pointer">
                                        <div id="gallery1-placeholder" class="border-2 border-dashed border-msp-border rounded-xl p-6 text-center hover:border-msp-gold/50 transition group @if(isset($service) && $service->gallery_image_1) hidden @endif">
                                            <div class="w-8 h-8 mx-auto mb-2 rounded-full bg-msp-bg-alt flex items-center justify-center group-hover:bg-msp-gold/10 transition">
                                                <i class="fas fa-plus text-[#6B7280] group-hover:text-msp-gold transition"></i>
                                            </div>
                                            <div class="font-inter text-[12px] text-[#44474E]">Image 1</div>
                                        </div>
                                        <div id="gallery1-preview" class="hidden relative rounded-xl overflow-hidden h-32">
                                            <img id="gallery1-img" src="" alt="" class="w-full h-full object-cover">
                                            <button type="button" onclick="resetUpload('gallery1')" class="absolute top-1 right-1 w-6 h-6 bg-white/90 rounded-full flex items-center justify-center shadow"><i class="fas fa-times text-msp-danger"></i></button>
                                        </div>
                                        <input id="gallery_1" name="gallery_image_1" type="file" accept="image/*" class="hidden" onchange="previewUpload(this, 'gallery1')">
                                    </label>
                                    @if(isset($service) && $service->gallery_image_1)
                                        <div class="mt-1 rounded-xl overflow-hidden h-32">
                                            <img src="{{ asset('images/' . $service->gallery_image_1) }}" alt="" class="w-full h-full object-cover">
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <label for="gallery_2" class="block cursor-pointer">
                                        <div id="gallery2-placeholder" class="border-2 border-dashed border-msp-border rounded-xl p-6 text-center hover:border-msp-gold/50 transition group @if(isset($service) && $service->gallery_image_2) hidden @endif">
                                            <div class="w-8 h-8 mx-auto mb-2 rounded-full bg-msp-bg-alt flex items-center justify-center group-hover:bg-msp-gold/10 transition">
                                                <i class="fas fa-plus text-[#6B7280] group-hover:text-msp-gold transition"></i>
                                            </div>
                                            <div class="font-inter text-[12px] text-[#44474E]">Image 2</div>
                                        </div>
                                        <div id="gallery2-preview" class="hidden relative rounded-xl overflow-hidden h-32">
                                            <img id="gallery2-img" src="" alt="" class="w-full h-full object-cover">
                                            <button type="button" onclick="resetUpload('gallery2')" class="absolute top-1 right-1 w-6 h-6 bg-white/90 rounded-full flex items-center justify-center shadow"><i class="fas fa-times text-msp-danger"></i></button>
                                        </div>
                                        <input id="gallery_2" name="gallery_image_2" type="file" accept="image/*" class="hidden" onchange="previewUpload(this, 'gallery2')">
                                    </label>
                                    @if(isset($service) && $service->gallery_image_2)
                                        <div class="mt-1 rounded-xl overflow-hidden h-32">
                                            <img src="{{ asset('images/' . $service->gallery_image_2) }}" alt="" class="w-full h-full object-cover">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block font-hanken font-bold text-[12px] text-[#44474E] uppercase tracking-wide mb-3">Brochure (PDF)</label>
                            <label for="brochure_pdf" class="block cursor-pointer">
                                <div id="brochure-placeholder" class="border-2 border-dashed border-msp-border rounded-xl p-6 text-center hover:border-msp-gold/50 transition group @if(isset($service) && $service->brochure_pdf) hidden @endif">
                                    <div class="w-10 h-10 mx-auto mb-2 rounded-full bg-msp-bg-alt flex items-center justify-center group-hover:bg-msp-gold/10 transition">
                                        <i class="fas fa-file-pdf text-lg text-[#6B7280] group-hover:text-msp-gold transition"></i>
                                    </div>
                                    <div class="font-inter text-[13px] text-[#44474E]">Click to upload PDF</div>
                                </div>
                                <div id="brochure-file" class="hidden items-center gap-3 bg-msp-bg-alt rounded-xl p-4 cursor-pointer">
                                    <div class="w-10 h-10 rounded-lg bg-white flex items-center justify-center">
                                        <i class="fas fa-file-pdf text-lg text-msp-danger"></i>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div id="brochure-filename" class="font-inter text-[13px] text-msp-sidebar truncate"></div>
                                        <div id="brochure-size" class="font-inter text-[11px] text-msp-gray-light"></div>
                                    </div>
                                    <button type="button" onclick="resetUpload('brochure')" class="text-msp-danger hover:underline font-inter text-[12px]">Hapus</button>
                                </div>
                                <input id="brochure_pdf" name="brochure_pdf" type="file" accept=".pdf" class="hidden" onchange="previewBrochure(this)">
                            </label>
                            @if(isset($service) && $service->brochure_pdf)
                                <div class="mt-2 flex items-center gap-3 bg-msp-bg-alt rounded-xl p-4">
                                    <div class="w-10 h-10 rounded-lg bg-white flex items-center justify-center">
                                        <i class="fas fa-file-pdf text-lg text-msp-danger"></i>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="font-inter text-[13px] text-msp-sidebar truncate">{{ basename($service->brochure_pdf) }}</div>
                                    </div>
                                    <a href="{{ asset('images/' . $service->brochure_pdf) }}" target="_blank" class="text-msp-gold hover:underline font-inter text-[12px]">View</a>
                                </div>
                            @endif
                        </div>

                        <label class="flex items-center gap-3 cursor-pointer">
                            <div class="relative">
                                <input type="checkbox" name="is_affiliate" value="1" class="hidden peer"
                                       {{ old('is_affiliate', $service->is_affiliate ?? false) ? 'checked' : '' }}>
                                <div class="w-10 h-6 bg-[#E1E2E4] rounded-full peer-checked:bg-msp-gold transition after:content-[''] after:absolute after:top-0.5 after:left-0.5 after:w-5 after:h-5 after:bg-white after:rounded-full after:shadow after:transition peer-checked:after:translate-x-4"></div>
                            </div>
                            <span class="font-inter text-[13px] text-[#44474E]">Tampilkan di jaringan mitra</span>
                        </label>
                    </div>

                    <div class="bg-msp-card-bg rounded-xl p-6 space-y-4">
                        <div class="flex items-center justify-between">
                            <h3 class="font-hanken font-bold text-[16px] text-msp-sidebar">Layanan Spesifik (Sub-services)</h3>
                            <button type="button" onclick="addFeatureRow()"
                                    class="h-8 px-4 bg-msp-gold/20 text-msp-gold font-inter font-semibold text-[12px] rounded-lg inline-flex items-center gap-1 hover:bg-msp-gold/30 transition">
                                <i class="fas fa-plus"></i>
Tambah
                            </button>
                        </div>
                        <div id="features-container" class="space-y-3">
                            @php $featIdx = 0; @endphp
                            @forelse($service->features ?? [] as $feature)
                                <div class="feature-row bg-[#F8F9FB] rounded-xl p-4 relative">
                                    <button type="button" onclick="this.closest('.feature-row').remove()" class="absolute top-3 right-3 text-msp-gray-light hover:text-msp-danger transition">
                                        <i class="fas fa-trash text-msp-danger"></i>
                                    </button>
                                    <input type="hidden" name="features[{{ $featIdx }}][id]" value="{{ $feature->id }}">
                                    <div class="grid grid-cols-[1fr_2fr] gap-3 pr-8">
                                        <input name="features[{{ $featIdx }}][title]" value="{{ $feature->title }}"
placeholder="Judul"
                                                class="px-3 py-2 bg-white rounded-lg text-sm text-[#191C1E] border border-msp-border outline-none focus:ring-2 focus:ring-msp-gold/30 transition">
                                        <textarea name="features[{{ $featIdx }}][description]" rows="1"
                                                  placeholder="Deskripsi"
                                                  class="px-3 py-2 bg-white rounded-lg text-sm text-[#44474E] border border-msp-border outline-none focus:ring-2 focus:ring-msp-gold/30 transition resize-none">{{ $feature->description }}</textarea>
                                    </div>
                                </div>
                                @php $featIdx++; @endphp
                            @empty
                                <div class="text-center py-8 font-inter text-[14px] text-msp-gray-light">Belum ada sub-services. Klik "Tambah" untuk menambah.</div>
                            @endforelse
                        </div>
                    </div>

                    <div class="bg-msp-card-bg rounded-xl p-6 space-y-4">
                        <div class="flex items-center justify-between">
                            <h3 class="font-hanken font-bold text-[16px] text-msp-sidebar">Metodologi (Work Process)</h3>
                            <button type="button" onclick="addProcessStepRow()"
                                    class="h-8 px-4 bg-msp-gold/20 text-msp-gold font-inter font-semibold text-[12px] rounded-lg inline-flex items-center gap-1 hover:bg-msp-gold/30 transition">
                                <i class="fas fa-plus"></i>
Tambah
                            </button>
                        </div>
                        <div id="steps-container" class="space-y-3">
                            @php $stepIdx = 0; @endphp
                            @forelse($service->processSteps ?? [] as $step)
                                <div class="step-row bg-[#F8F9FB] rounded-xl p-4 relative">
                                    <button type="button" onclick="this.closest('.step-row').remove()" class="absolute top-3 right-3 text-msp-gray-light hover:text-msp-danger transition">
                                        <i class="fas fa-trash text-msp-danger"></i>
                                    </button>
                                    <input type="hidden" name="process_steps[{{ $stepIdx }}][id]" value="{{ $step->id }}">
                                    <div class="pr-8">
                                        <input name="process_steps[{{ $stepIdx }}][title]" value="{{ $step->title }}"
placeholder="Judul Langkah"
                                                         class="w-full px-3 py-2 bg-white rounded-lg text-sm text-[#191C1E] border border-msp-border outline-none focus:ring-2 focus:ring-msp-gold/30 transition">
                                        <div class="text-xs text-msp-gray-light font-inter mt-1">Step {{ $stepIdx + 1 }}</div>
                                    </div>
                                </div>
                                @php $stepIdx++; @endphp
                            @empty
                                <div class="text-center py-8 font-inter text-[14px] text-msp-gray-light">Belum ada metodologi. Klik "Tambah" untuk menambah.</div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="w-[280px] shrink-0 space-y-6">
                    <div class="bg-msp-card-bg rounded-xl p-5 space-y-5">
                        <h3 class="font-hanken font-bold text-[16px] text-msp-sidebar">Status</h3>

                        <div>
                            <label class="block font-hanken font-bold text-[11px] text-[#44474E] uppercase tracking-wide mb-2">STATUS</label>
                            <div class="flex gap-2">
                                <label class="flex-1 cursor-pointer">
                                    <input type="radio" name="status" value="draft" class="hidden peer"
                                           {{ old('status', $service->status ?? 'draft') == 'draft' ? 'checked' : '' }}>
                                    <div class="text-center px-3 py-2 rounded-lg border-2 border-[#C5C6CF] bg-white text-[#44474E] text-sm font-inter font-medium peer-checked:border-[#44474E] peer-checked:bg-msp-bg-alt transition">Draft</div>
                                </label>
                                <label class="flex-1 cursor-pointer">
                                    <input type="radio" name="status" value="published" class="hidden peer"
                                           {{ old('status', $service->status ?? '') == 'published' ? 'checked' : '' }}>
                                    <div class="text-center px-3 py-2 rounded-lg border-2 border-[#C5C6CF] bg-white text-[#44474E] text-sm font-inter font-medium peer-checked:border-[#15803D] peer-checked:bg-green-50 peer-checked:text-[#15803D] transition">Terbit</div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col gap-3">
                        <button type="submit"
                                class="w-full h-11 bg-msp-gold text-[#071B3B] font-inter font-bold text-[14px] rounded-lg inline-flex items-center justify-center hover:brightness-95 transition">
                            {{ isset($service) ? 'Terbitkan Perubahan' : 'Simpan Sebagai Draft' }}
                        </button>
                        <a href="{{ route('admin.services.index') }}"
                           class="w-full h-11 bg-white text-[#44474E] font-inter font-medium text-[14px] rounded-lg border border-msp-border inline-flex items-center justify-center hover:bg-msp-bg-alt transition">
                            Batalkan
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @push('styles')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
    @endpush

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.min.js"></script>
    <script>
    const quill = new Quill('#editor', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, 3, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'align': [] }],
                ['link', 'image', 'blockquote'],
                ['clean']
            ]
        }
    });

    const fullDescHidden = document.getElementById('full_description-hidden');
    if (fullDescHidden && fullDescHidden.value.trim()) {
        quill.clipboard.dangerouslyPasteHTML(fullDescHidden.value);
    }

    document.querySelector('form').addEventListener('submit', function() {
        const hidden = document.createElement('textarea');
        hidden.name = 'full_description';
        hidden.value = quill.root.innerHTML;
        hidden.style.display = 'none';
        this.appendChild(hidden);
    });

    document.getElementById('title').addEventListener('input', function() {
        const slug = this.value.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
        document.getElementById('slug').value = slug;
        document.getElementById('slug-preview').textContent = slug || 'cyber-security';
    });

    document.getElementById('slug').addEventListener('input', function() {
        document.getElementById('slug-preview').textContent = this.value || 'cyber-security';
    });

    let featureIdx = {{ $featIdx ?? 0 }};
    let stepIdx = {{ $stepIdx ?? 0 }};

    function addFeatureRow() {
        const container = document.getElementById('features-container');
        const empty = container.querySelector('.text-center.py-8');
        if (empty) empty.remove();

        const html = `
            <div class="feature-row bg-[#F8F9FB] rounded-xl p-4 relative">
                <button type="button" onclick="this.closest('.feature-row').remove()" class="absolute top-3 right-3 text-msp-gray-light hover:text-msp-danger transition">
                    <i class="fas fa-trash text-msp-danger"></i>
                </button>
                <div class="grid grid-cols-[1fr_2fr] gap-3 pr-8">
        <input name="features[${featureIdx}][title]" placeholder="Judul"
                               class="px-3 py-2 bg-white rounded-lg text-sm text-[#191C1E] border border-msp-border outline-none focus:ring-2 focus:ring-msp-gold/30 transition">
                       <textarea name="features[${featureIdx}][description]" rows="1" placeholder="Deskripsi"
                              class="px-3 py-2 bg-white rounded-lg text-sm text-[#44474E] border border-msp-border outline-none focus:ring-2 focus:ring-msp-gold/30 transition resize-none"></textarea>
                </div>
            </div>`;
        container.insertAdjacentHTML('beforeend', html);
        featureIdx++;
    }

    function addProcessStepRow() {
        const container = document.getElementById('steps-container');
        const empty = container.querySelector('.text-center.py-8');
        if (empty) empty.remove();

        const html = `
            <div class="step-row bg-[#F8F9FB] rounded-xl p-4 relative">
                <button type="button" onclick="this.closest('.step-row').remove()" class="absolute top-3 right-3 text-msp-gray-light hover:text-msp-danger transition">
                    <i class="fas fa-trash text-msp-danger"></i>
                </button>
                <div class="pr-8">
                    <input name="process_steps[${stepIdx}][title]" placeholder="Judul Langkah"
                           class="w-full px-3 py-2 bg-white rounded-lg text-sm text-[#191C1E] border border-msp-border outline-none focus:ring-2 focus:ring-msp-gold/30 transition">
                    <div class="text-xs text-msp-gray-light font-inter mt-1">Langkah ${stepIdx + 1}</div>
                </div>
            </div>`;
        container.insertAdjacentHTML('beforeend', html);
        stepIdx++;
    }

    function previewUpload(input, prefix) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById(prefix + '-placeholder').classList.add('hidden');
                document.getElementById(prefix + '-preview').classList.remove('hidden');
                document.getElementById(prefix + '-img').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function resetUpload(prefix) {
        const inputMap = { 'main-icon': 'main_icon', 'hero': 'hero_image', 'gallery1': 'gallery_1', 'gallery2': 'gallery_2', 'brochure': 'brochure_pdf' };
        const input = document.getElementById(inputMap[prefix] || prefix);
        if (input) input.value = '';
        document.getElementById(prefix + '-placeholder')?.classList.remove('hidden');
        document.getElementById(prefix + '-preview')?.classList.add('hidden');
        const fileEl = document.getElementById(prefix + '-file');
        if (fileEl) fileEl.classList.add('hidden');
    }

    function previewBrochure(input) {
        if (input.files && input.files[0]) {
            const file = input.files[0];
            document.getElementById('brochure-placeholder').classList.add('hidden');
            document.getElementById('brochure-file').classList.remove('hidden');
            document.getElementById('brochure-filename').textContent = file.name;
            document.getElementById('brochure-size').textContent = (file.size / 1048576).toFixed(1) + ' MB';
        }
    }
    </script>
    <style>
    .ql-container { font-family: 'Inter', sans-serif; font-size: 14px; min-height: 250px; }
    .ql-editor { min-height: 250px; }
    .ql-toolbar { border-top-left-radius: 8px; border-top-right-radius: 8px; background: #fff; }
    </style>
    @endpush
</x-admin-dashboard-layout>
