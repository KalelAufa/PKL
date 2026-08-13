@section('title', isset($teamMember) ? 'Edit Anggota Tim' : 'Tambah Anggota Tim')

<x-admin-dashboard-layout>
@php $isEdit = isset($teamMember); @endphp
<div class="max-w-[600px]">

    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.team-members.index') }}"
           class="w-9 h-9 rounded-xl bg-white border border-msp-border flex items-center justify-center text-msp-gray-light hover:text-msp-navy hover:border-msp-navy/20 transition shadow-sm">
            <i class="fas fa-arrow-left text-[13px]"></i>
        </a>
        <div>
            <h1 class="font-space font-bold text-[22px] text-[#191C1E] leading-tight">
                {{ $isEdit ? 'Edit Anggota Tim' : 'Tambah Anggota Tim' }}
            </h1>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-msp-border shadow-[0_1px_4px_rgba(11,30,62,0.04)] overflow-hidden">
        <div class="px-6 py-4 border-b border-msp-border bg-msp-bg/40">
            <span class="font-hanken font-bold text-[12px] text-msp-gray uppercase tracking-wider">Profil Anggota</span>
        </div>
        <div class="p-6">
            <form action="{{ $isEdit ? route('admin.team-members.update', $teamMember) : route('admin.team-members.store') }}"
                  method="POST" enctype="multipart/form-data"
                  x-data="{ submitting: false }" @submit="submitting = true">
                @csrf
                @if ($isEdit) @method('PUT') @endif

                <div class="space-y-5">

                    {{-- Photo upload --}}
                    <div class="flex items-center gap-5">
                        <div class="relative">
                            <img id="photo-preview"
                                 src="{{ $isEdit && $teamMember->photo ? asset('images/' . $teamMember->photo) : '' }}"
                                 alt="Preview foto"
                                 class="w-20 h-20 rounded-full object-cover border-2 border-msp-border {{ ($isEdit && $teamMember->photo) ? '' : 'hidden' }}">
                            <div id="photo-placeholder"
                                 class="w-20 h-20 rounded-full bg-msp-sidebar flex items-center justify-center text-white text-[28px] font-hanken font-bold {{ ($isEdit && $teamMember->photo) ? 'hidden' : '' }}">
                                <i class="fas fa-user text-[22px] opacity-60"></i>
                            </div>
                        </div>
                        <div>
                            <label class="block font-hanken font-bold text-[12px] text-msp-gray uppercase tracking-wider mb-2">Foto Profil</label>
                            <input id="tm-photo" name="photo" type="file" accept="image/*"
                                   class="block text-[13px] text-msp-gray-light font-inter file:mr-3 file:h-8 file:px-4 file:rounded-lg file:border-0 file:text-[12px] file:font-hanken file:font-bold file:bg-msp-gold/10 file:text-msp-gold hover:file:bg-msp-gold/20 transition cursor-pointer">
                            <p class="font-inter text-[11px] text-msp-gray-light mt-1">JPG, PNG — Disarankan foto wajah persegi</p>
                            @error('photo')
                                <p class="mt-1 text-[12px] text-msp-danger font-inter">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="tm-name" class="block font-hanken font-bold text-[12px] text-msp-gray uppercase tracking-wider mb-2">
                            Nama Lengkap <span class="text-msp-danger">*</span>
                        </label>
                        <input id="tm-name" name="name" type="text"
                               value="{{ old('name', $teamMember->name ?? '') }}" required
                               class="w-full h-11 px-4 bg-msp-bg rounded-xl font-inter text-[14px] text-[#191C1E] placeholder:text-msp-gray-light border border-msp-border focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20 focus:outline-none transition"
                               placeholder="Nama lengkap anggota tim">
                        @error('name')
                            <p class="mt-1.5 text-[12px] text-msp-danger font-inter">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="tm-position" class="block font-hanken font-bold text-[12px] text-msp-gray uppercase tracking-wider mb-2">
                            Jabatan <span class="text-msp-danger">*</span>
                        </label>
                        <input id="tm-position" name="position" type="text"
                               value="{{ old('position', $teamMember->position ?? '') }}" required
                               class="w-full h-11 px-4 bg-msp-bg rounded-xl font-inter text-[14px] text-[#191C1E] placeholder:text-msp-gray-light border border-msp-border focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20 focus:outline-none transition"
                               placeholder="Contoh: Direktur Utama, Manager SDM, Staff Operasional">
                        @error('position')
                            <p class="mt-1.5 text-[12px] text-msp-danger font-inter">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="tm-order" class="block font-hanken font-bold text-[12px] text-msp-gray uppercase tracking-wider mb-2">Urutan Tampil</label>
                        <input id="tm-order" name="order" type="number" min="0"
                               value="{{ old('order', $teamMember->order ?? '') }}"
                               class="w-32 h-11 px-4 bg-msp-bg rounded-xl font-inter text-[14px] text-[#191C1E] border border-msp-border focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20 focus:outline-none transition"
                               placeholder="1">
                        <p class="font-inter text-[12px] text-msp-gray-light mt-1">Angka lebih kecil = tampil lebih awal</p>
                        @error('order')
                            <p class="mt-1.5 text-[12px] text-msp-danger font-inter">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center gap-3 pt-3 border-t border-msp-border">
                        <button type="submit" :disabled="submitting"
                                class="h-10 px-6 rounded-xl font-hanken font-bold text-[14px] text-[#071B3B] inline-flex items-center gap-2 hover:brightness-95 transition disabled:opacity-60"
                                style="background: var(--gradient-gold)">
                            <i class="fas fa-save text-[11px]"></i>
                            {{ $isEdit ? 'Simpan Perubahan' : 'Tambah Anggota' }}
                        </button>
                        <a href="{{ route('admin.team-members.index') }}"
                           class="h-10 px-5 border border-msp-border text-msp-gray font-inter font-medium text-[13px] rounded-xl inline-flex items-center justify-center hover:bg-msp-bg-alt transition">
                            Batal
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
(function () {
    const photoInput = document.getElementById('tm-photo');
    const photoPreview = document.getElementById('photo-preview');
    const photoPlaceholder = document.getElementById('photo-placeholder');

    photoInput.addEventListener('change', function () {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                photoPreview.src = e.target.result;
                photoPreview.classList.remove('hidden');
                photoPlaceholder.classList.add('hidden');
            };
            reader.readAsDataURL(this.files[0]);
        }
    });
})();
</script>
@endpush

</x-admin-dashboard-layout>
