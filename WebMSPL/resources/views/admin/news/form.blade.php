@section('title', isset($news) ? 'Edit Berita' : 'Tambah Berita')

<x-admin-dashboard-layout>
<div class="max-w-[960px]">

    {{-- Page header --}}
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.news.index') }}"
           class="w-9 h-9 rounded-xl bg-white border border-msp-border flex items-center justify-center text-msp-gray-light hover:text-msp-navy hover:border-msp-navy/20 transition shadow-sm">
            <i class="fas fa-arrow-left text-[13px]"></i>
        </a>
        <div>
            <h1 class="font-space font-bold text-[22px] text-[#191C1E] leading-tight">
                {{ isset($news) ? 'Edit Berita' : 'Tambah Berita Baru' }}
            </h1>
            @isset($news)
                <p class="font-inter text-[12px] text-msp-gray-light mt-0.5">ID: {{ $news->id }} &bull; Terakhir diubah {{ $news->updated_at->diffForHumans() }}</p>
            @endisset
        </div>
    </div>

    @if ($errors->any())
        <div class="mb-5 px-4 py-3 bg-red-50 border border-red-200 rounded-xl text-[13px] font-inter">
            <div class="flex items-start gap-2">
                <i class="fas fa-exclamation-circle text-red-500 mt-0.5"></i>
                <ul class="text-red-700 space-y-0.5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <form action="{{ isset($news) ? route('admin.news.update', $news) : route('admin.news.store') }}"
          method="POST" enctype="multipart/form-data"
          x-data="{ submitting: false }" @submit="submitting = true">
        @csrf
        @isset($news)
            @method('PUT')
        @endisset

        <div class="flex gap-6 items-start">

            {{-- ============ MAIN COLUMN ============ --}}
            <div class="flex-1 min-w-0 space-y-5">

                {{-- Title + slug --}}
                <div class="bg-white rounded-2xl border border-msp-border p-6 space-y-5">

                    <div>
                        <label for="title" class="block font-hanken font-bold text-[12px] text-msp-gray uppercase tracking-wider mb-2">
                            Judul Berita <span class="text-msp-danger">*</span>
                        </label>
                        <input id="title" name="title" type="text"
                               value="{{ old('title', $news->title ?? '') }}" required
                               placeholder="Masukkan judul berita yang menarik..."
                               class="w-full h-11 px-4 bg-msp-bg rounded-xl font-inter text-[15px] text-[#191C1E] placeholder:text-msp-gray-light border border-msp-border focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20 focus:outline-none transition">
                    </div>

                    <div>
                        <label for="slug" class="block font-hanken font-bold text-[12px] text-msp-gray uppercase tracking-wider mb-2">Slug URL</label>
                        <input id="slug" name="slug" type="text"
                               value="{{ old('slug', $news->slug ?? '') }}" required
                               placeholder="judul-berita-anda"
                               class="w-full h-11 px-4 bg-msp-bg rounded-xl font-inter text-[14px] text-[#191C1E] placeholder:text-msp-gray-light border border-msp-border focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20 focus:outline-none transition font-mono">
                        <div class="mt-1.5 flex items-center gap-1 text-[12px] font-inter text-msp-gray-light">
                            <i class="fas fa-link text-[10px]"></i>
                            ptmsp.co.id/berita/<span id="slug-preview" class="text-msp-gold font-medium">{{ old('slug', $news->slug ?? 'judul-berita-anda') }}</span>
                        </div>
                    </div>

                    <div>
                        <label for="excerpt" class="block font-hanken font-bold text-[12px] text-msp-gray uppercase tracking-wider mb-2">
                            Ringkasan (Excerpt) <span class="text-msp-danger">*</span>
                        </label>
                        <textarea id="excerpt" name="excerpt" rows="3" required
                                  placeholder="Tulis ringkasan singkat yang muncul di daftar berita (maks. 200 karakter)..."
                                  class="w-full px-4 py-3 bg-msp-bg rounded-xl font-inter text-[14px] text-[#191C1E] placeholder:text-msp-gray-light border border-msp-border focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20 focus:outline-none transition resize-none">{{ old('excerpt', $news->excerpt ?? '') }}</textarea>
                    </div>
                </div>

                {{-- Rich text editor --}}
                <div class="bg-white rounded-2xl border border-msp-border overflow-hidden">
                    <div class="px-5 py-3.5 border-b border-msp-border bg-msp-bg/40">
                        <span class="font-hanken font-bold text-[12px] text-msp-gray uppercase tracking-wider">Konten Berita</span>
                    </div>
                    <div id="editor" class="min-h-[300px] bg-white"></div>
                    <textarea id="content-hidden" name="content" class="hidden">{{ old('content', $news->content ?? '') }}</textarea>
                </div>

                {{-- Thumbnail --}}
                <div class="bg-white rounded-2xl border border-msp-border p-6">
                    <label class="block font-hanken font-bold text-[12px] text-msp-gray uppercase tracking-wider mb-3">Thumbnail Gambar</label>
                    <label for="thumbnail" class="block cursor-pointer">
                        <div id="thumbnail-placeholder"
                             class="border-2 border-dashed border-msp-border rounded-xl p-8 text-center hover:border-msp-gold/50 transition group {{ (isset($news) && $news->thumbnail) ? 'hidden' : '' }}">
                            <div class="w-14 h-14 mx-auto mb-3 rounded-2xl bg-msp-bg-alt flex items-center justify-center group-hover:bg-msp-gold/10 transition">
                                <i class="fas fa-cloud-upload-alt text-2xl text-msp-gray-light group-hover:text-msp-gold transition"></i>
                            </div>
                            <div class="font-inter font-medium text-[14px] text-[#44474E]">Klik untuk upload gambar</div>
                            <div class="font-inter text-[12px] text-msp-gray-light mt-1">PNG, JPG — Maks. 2MB (Rasio 16:9 disarankan)</div>
                        </div>
                        <div id="thumbnail-preview" class="{{ (isset($news) && $news->thumbnail) ? '' : 'hidden' }} relative rounded-xl overflow-hidden">
                            <img id="thumbnail-img"
                                 src="{{ isset($news) && $news->thumbnail ? $news->thumbnail_url : '' }}"
                                 alt="Preview" class="w-full h-52 object-cover rounded-xl">
                            <button type="button" id="reset-thumb-btn"
                                    class="absolute top-3 right-3 w-8 h-8 bg-white/90 backdrop-blur rounded-full flex items-center justify-center shadow-md hover:bg-white transition">
                                <i class="fas fa-times text-msp-danger text-[11px]"></i>
                            </button>
                        </div>
                        <input id="thumbnail" name="thumbnail" type="file" accept="image/png,image/jpeg" class="hidden">
                    </label>
                </div>
            </div>

            {{-- ============ SIDEBAR COLUMN ============ --}}
            <div class="w-[268px] shrink-0 space-y-5 sticky top-6">

                {{-- Publish settings --}}
                <div class="bg-white rounded-2xl border border-msp-border overflow-hidden">
                    <div class="px-5 py-3.5 border-b border-msp-border bg-msp-bg/40">
                        <span class="font-hanken font-bold text-[12px] text-msp-gray uppercase tracking-wider">Pengaturan Publikasi</span>
                    </div>
                    <div class="p-5 space-y-5">

                        {{-- Status --}}
                        <div>
                            <label class="block font-hanken font-bold text-[11px] text-msp-gray uppercase tracking-wider mb-2">Status</label>
                            <div class="grid grid-cols-2 gap-2">
                                <label class="cursor-pointer">
                                    <input type="radio" name="status" value="draft" class="hidden peer"
                                           {{ old('status', $news->status ?? '') == 'draft' ? 'checked' : '' }}>
                                    <div class="text-center px-3 py-2.5 rounded-xl border-2 border-msp-border text-msp-gray font-inter text-[13px] font-medium peer-checked:border-msp-gray peer-checked:bg-msp-bg-alt peer-checked:text-[#191C1E] transition cursor-pointer">
                                        <i class="fas fa-pencil-alt text-[10px] block mx-auto mb-1 opacity-60"></i>
                                        Draft
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="status" value="published" class="hidden peer"
                                           {{ old('status', $news->status ?? '') == 'published' ? 'checked' : '' }}>
                                    <div class="text-center px-3 py-2.5 rounded-xl border-2 border-msp-border text-msp-gray font-inter text-[13px] font-medium peer-checked:border-green-400 peer-checked:bg-green-50 peer-checked:text-green-700 transition cursor-pointer">
                                        <i class="fas fa-globe text-[10px] block mx-auto mb-1 opacity-60"></i>
                                        Live
                                    </div>
                                </label>
                            </div>
                        </div>

                        {{-- Category --}}
                        <div>
                            <label for="category_id" class="block font-hanken font-bold text-[11px] text-msp-gray uppercase tracking-wider mb-2">
                                Kategori <span class="text-msp-danger">*</span>
                            </label>
                            <select id="category_id" name="category_id" required
                                    class="w-full h-10 px-3 bg-msp-bg rounded-xl font-inter text-[13px] text-[#191C1E] border border-msp-border focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20 focus:outline-none transition appearance-none cursor-pointer">
                                <option value="">Pilih Kategori</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}" @selected(old('category_id', $news->category_id ?? '') == $cat->id)>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Author role --}}
                        <div>
                            <label for="author_role" class="block font-hanken font-bold text-[11px] text-msp-gray uppercase tracking-wider mb-2">Jabatan Penulis</label>
                            <input id="author_role" name="author_role" type="text"
                                   value="{{ old('author_role', $news->author_role ?? '') }}"
                                   placeholder="cth. Redaksi MSP"
                                   class="w-full h-10 px-3 bg-msp-bg rounded-xl font-inter text-[13px] text-[#191C1E] placeholder:text-msp-gray-light border border-msp-border focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20 focus:outline-none transition">
                        </div>

                        {{-- Featured toggle --}}
                        <label class="flex items-center gap-3 cursor-pointer py-1">
                            <div class="relative">
                                <input type="checkbox" name="is_featured" value="1" class="hidden peer"
                                       {{ old('is_featured', $news->is_featured ?? false) ? 'checked' : '' }}>
                                <div class="w-10 h-6 bg-msp-border rounded-full peer-checked:bg-msp-gold transition-colors after:content-[''] after:absolute after:top-0.5 after:left-0.5 after:w-5 after:h-5 after:bg-white after:rounded-full after:shadow after:transition-transform peer-checked:after:translate-x-4"></div>
                            </div>
                            <div>
                                <span class="font-inter font-medium text-[13px] text-[#44474E]">Tampilkan di Beranda</span>
                                <p class="font-inter text-[11px] text-msp-gray-light mt-0.5">Featured di halaman depan</p>
                            </div>
                        </label>
                    </div>
                </div>

                {{-- Action buttons --}}
                <div class="space-y-2.5">
                    <button type="submit" :disabled="submitting"
                            class="w-full h-11 rounded-xl font-hanken font-bold text-[14px] text-[#071B3B] inline-flex items-center justify-center gap-2 hover:brightness-95 transition disabled:opacity-60 shadow-[0_2px_8px_rgba(242,167,27,0.2)]"
                            style="background: linear-gradient(135deg, #F2A71B 0%, #FBC34C 100%)">
                        <i class="fas fa-save text-[12px]"></i>
                        <span x-text="submitting ? 'Menyimpan...' : '{{ isset($news) ? 'Simpan Perubahan' : 'Publikasikan' }}'">
                            {{ isset($news) ? 'Simpan Perubahan' : 'Publikasikan' }}
                        </span>
                    </button>
                    <a href="{{ route('admin.news.index') }}"
                       class="w-full h-10 rounded-xl font-inter font-medium text-[13px] text-msp-gray border border-msp-border bg-white inline-flex items-center justify-center hover:bg-msp-bg-alt transition">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
<style>
.ql-container { font-family: 'Inter', sans-serif; font-size: 14px; min-height: 300px; border: none !important; }
.ql-editor { min-height: 300px; padding: 16px 20px; }
.ql-toolbar { border: none !important; border-bottom: 1px solid #DCE2F3 !important; background: #F9F9FF; padding: 10px 16px; }
.ql-editor.ql-blank::before { color: #75777F; font-style: normal; }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.min.js"></script>
<script>
(function () {
    const toolbarOptions = [
        [{ 'header': [1, 2, 3, false] }],
        ['bold', 'italic', 'underline', 'strike'],
        [{ 'list': 'ordered' }, { 'list': 'bullet' }],
        [{ 'align': [] }],
        ['link', 'image', 'blockquote'],
        ['clean']
    ];

    const quill = new Quill('#editor', {
        theme: 'snow',
        modules: { toolbar: toolbarOptions },
        placeholder: 'Tulis isi berita di sini...'
    });

    const hiddenContent = document.getElementById('content-hidden');

    if (hiddenContent.value.trim()) {
        quill.clipboard.dangerouslyPasteHTML(hiddenContent.value);
    }

    quill.on('text-change', function () {
        hiddenContent.value = quill.root.innerHTML;
    });

    document.querySelector('form').addEventListener('submit', function () {
        hiddenContent.value = quill.root.innerHTML;
    });

    // Slug generation
    const isEdit = {{ isset($news) ? 'true' : 'false' }};
    const titleInput = document.getElementById('title');
    const slugInput = document.getElementById('slug');
    const slugPreview = document.getElementById('slug-preview');

    function slugify(str) {
        return str.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
    }

    if (!isEdit) {
        titleInput.addEventListener('input', function () {
            const s = slugify(this.value);
            slugInput.value = s;
            slugPreview.textContent = s || 'judul-berita-anda';
        });
    }

    slugInput.addEventListener('input', function () {
        slugPreview.textContent = this.value || 'judul-berita-anda';
    });

    // Thumbnail preview
    const thumbnailInput = document.getElementById('thumbnail');
    const placeholder = document.getElementById('thumbnail-placeholder');
    const previewBox = document.getElementById('thumbnail-preview');
    const previewImg = document.getElementById('thumbnail-img');
    const resetBtn = document.getElementById('reset-thumb-btn');

    thumbnailInput.addEventListener('change', function () {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                previewImg.src = e.target.result;
                placeholder.classList.add('hidden');
                previewBox.classList.remove('hidden');
            };
            reader.readAsDataURL(this.files[0]);
        }
    });

    resetBtn.addEventListener('click', function () {
        thumbnailInput.value = '';
        previewBox.classList.add('hidden');
        previewImg.src = '';
        placeholder.classList.remove('hidden');
    });
})();
</script>
@endpush

</x-admin-dashboard-layout>
