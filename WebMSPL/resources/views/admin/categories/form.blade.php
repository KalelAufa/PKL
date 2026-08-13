@section('title', isset($category) ? 'Edit Kategori' : 'Tambah Kategori')

<x-admin-dashboard-layout>
@php $isEdit = isset($category); @endphp
<div class="max-w-[600px]">

    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.categories.index') }}"
           class="w-9 h-9 rounded-xl bg-white border border-msp-border flex items-center justify-center text-msp-gray-light hover:text-msp-navy hover:border-msp-navy/20 transition shadow-sm">
            <i class="fas fa-arrow-left text-[13px]"></i>
        </a>
        <div>
            <h1 class="font-space font-bold text-[22px] text-[#191C1E] leading-tight">
                {{ $isEdit ? 'Edit Kategori' : 'Tambah Kategori Baru' }}
            </h1>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-msp-border shadow-[0_1px_4px_rgba(11,30,62,0.04)] overflow-hidden">
        <div class="px-6 py-4 border-b border-msp-border bg-msp-bg/40">
            <span class="font-hanken font-bold text-[12px] text-msp-gray uppercase tracking-wider">Detail Kategori</span>
        </div>
        <div class="p-6">
            <form action="{{ $isEdit ? route('admin.categories.update', $category) : route('admin.categories.store') }}"
                  method="POST"
                  x-data="{ submitting: false }" @submit="submitting = true">
                @csrf
                @if ($isEdit) @method('PUT') @endif

                <div class="space-y-5">

                    <div>
                        <label for="cat-name" class="block font-hanken font-bold text-[12px] text-msp-gray uppercase tracking-wider mb-2">
                            Nama Kategori <span class="text-msp-danger">*</span>
                        </label>
                        <input id="cat-name" name="name" type="text"
                               value="{{ old('name', $category->name ?? '') }}" required
                               class="w-full h-11 px-4 bg-msp-bg rounded-xl font-inter text-[14px] text-[#191C1E] placeholder:text-msp-gray-light border border-msp-border focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20 focus:outline-none transition"
                               placeholder="Contoh: Ketenagakerjaan, CSR, Kemitraan">
                        @error('name')
                            <p class="mt-1.5 text-[12px] text-msp-danger font-inter flex items-center gap-1">
                                <i class="fas fa-exclamation-circle text-[10px]"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label for="slug" class="block font-hanken font-bold text-[12px] text-msp-gray uppercase tracking-wider mb-2">Slug URL</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 font-inter text-[12px] text-msp-gray-light select-none">/berita/kategori/</span>
                            <input id="slug" name="slug" type="text"
                                   value="{{ old('slug', $category->slug ?? '') }}" required
                                   class="w-full h-11 pl-[122px] pr-4 bg-msp-bg rounded-xl font-inter font-mono text-[13px] text-[#191C1E] placeholder:text-msp-gray-light border border-msp-border focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20 focus:outline-none transition"
                                   placeholder="nama-kategori">
                        </div>
                        @error('slug')
                            <p class="mt-1.5 text-[12px] text-msp-danger font-inter flex items-center gap-1">
                                <i class="fas fa-exclamation-circle text-[10px]"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="flex items-center gap-3 pt-3 border-t border-msp-border">
                        <button type="submit" :disabled="submitting"
                                class="h-10 px-6 rounded-xl font-hanken font-bold text-[14px] text-[#071B3B] inline-flex items-center gap-2 hover:brightness-95 transition disabled:opacity-60"
                                style="background: var(--gradient-gold)">
                            <i class="fas fa-save text-[11px]"></i>
                            {{ $isEdit ? 'Simpan Perubahan' : 'Tambah Kategori' }}
                        </button>
                        <a href="{{ route('admin.categories.index') }}"
                           class="h-10 px-5 border border-msp-border text-msp-gray font-inter font-medium text-[13px] rounded-xl inline-flex items-center justify-center hover:bg-msp-bg-alt transition">
                            Batal
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@unless($isEdit)
@push('scripts')
<script>
document.getElementById('cat-name').addEventListener('input', function () {
    const s = this.value.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
    document.getElementById('slug').value = s;
});
</script>
@endpush
@endunless

</x-admin-dashboard-layout>
