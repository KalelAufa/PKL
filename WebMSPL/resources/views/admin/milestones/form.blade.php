@section('title', isset($milestone) ? 'Edit Pencapaian' : 'Tambah Pencapaian')

<x-admin-dashboard-layout>
@php $isEdit = isset($milestone); @endphp
<div class="max-w-[600px]">

    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.milestones.index') }}"
           class="w-9 h-9 rounded-xl bg-white border border-msp-border flex items-center justify-center text-msp-gray-light hover:text-msp-navy hover:border-msp-navy/20 transition shadow-sm">
            <i class="fas fa-arrow-left text-[13px]"></i>
        </a>
        <div>
            <h1 class="font-space font-bold text-[22px] text-[#191C1E] leading-tight">
                {{ $isEdit ? 'Edit Pencapaian' : 'Tambah Pencapaian Baru' }}
            </h1>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-msp-border shadow-[0_1px_4px_rgba(11,30,62,0.04)] overflow-hidden">
        <div class="px-6 py-4 border-b border-msp-border bg-msp-bg/40">
            <span class="font-hanken font-bold text-[12px] text-msp-gray uppercase tracking-wider">Detail Pencapaian</span>
        </div>
        <div class="p-6">
            <form action="{{ $isEdit ? route('admin.milestones.update', $milestone) : route('admin.milestones.store') }}"
                  method="POST"
                  x-data="{ submitting: false }" @submit="submitting = true">
                @csrf
                @if ($isEdit) @method('PUT') @endif

                <div class="space-y-5">

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="ms-label" class="block font-hanken font-bold text-[12px] text-msp-gray uppercase tracking-wider mb-2">
                                Label <span class="text-msp-danger">*</span>
                            </label>
                            <input id="ms-label" name="label" type="text"
                                   value="{{ old('label', $milestone->label ?? '') }}" required
                                   class="w-full h-11 px-4 bg-msp-bg rounded-xl font-inter text-[14px] text-[#191C1E] placeholder:text-msp-gray-light border border-msp-border focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20 focus:outline-none transition"
                                   placeholder="Contoh: 2024">
                            @error('label')
                                <p class="mt-1.5 text-[12px] text-msp-danger font-inter">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="ms-order" class="block font-hanken font-bold text-[12px] text-msp-gray uppercase tracking-wider mb-2">Urutan Tampil</label>
                            <input id="ms-order" name="order" type="number" min="0"
                                   value="{{ old('order', $milestone->order ?? '') }}"
                                   class="w-full h-11 px-4 bg-msp-bg rounded-xl font-inter text-[14px] text-[#191C1E] border border-msp-border focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20 focus:outline-none transition"
                                   placeholder="1">
                            @error('order')
                                <p class="mt-1.5 text-[12px] text-msp-danger font-inter">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="ms-title" class="block font-hanken font-bold text-[12px] text-msp-gray uppercase tracking-wider mb-2">
                            Judul Pencapaian <span class="text-msp-danger">*</span>
                        </label>
                        <input id="ms-title" name="title" type="text"
                               value="{{ old('title', $milestone->title ?? '') }}" required
                               class="w-full h-11 px-4 bg-msp-bg rounded-xl font-inter text-[14px] text-[#191C1E] placeholder:text-msp-gray-light border border-msp-border focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20 focus:outline-none transition"
                               placeholder="Judul singkat pencapaian">
                        @error('title')
                            <p class="mt-1.5 text-[12px] text-msp-danger font-inter">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="ms-description" class="block font-hanken font-bold text-[12px] text-msp-gray uppercase tracking-wider mb-2">Deskripsi</label>
                        <textarea id="ms-description" name="description" rows="4"
                                  class="w-full px-4 py-3 bg-msp-bg rounded-xl font-inter text-[14px] text-[#191C1E] placeholder:text-msp-gray-light border border-msp-border focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20 focus:outline-none transition resize-none"
                                  placeholder="Deskripsikan pencapaian ini secara singkat...">{{ old('description', $milestone->description ?? '') }}</textarea>
                        @error('description')
                            <p class="mt-1.5 text-[12px] text-msp-danger font-inter">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center gap-3 pt-3 border-t border-msp-border">
                        <button type="submit" :disabled="submitting"
                                class="h-10 px-6 rounded-xl font-hanken font-bold text-[14px] text-[#071B3B] inline-flex items-center gap-2 hover:brightness-95 transition disabled:opacity-60"
                                style="background: linear-gradient(135deg, #F2A71B 0%, #FBC34C 100%)">
                            <i class="fas fa-save text-[11px]"></i>
                            {{ $isEdit ? 'Simpan Perubahan' : 'Tambah Pencapaian' }}
                        </button>
                        <a href="{{ route('admin.milestones.index') }}"
                           class="h-10 px-5 border border-msp-border text-msp-gray font-inter font-medium text-[13px] rounded-xl inline-flex items-center justify-center hover:bg-msp-bg-alt transition">
                            Batal
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</x-admin-dashboard-layout>
