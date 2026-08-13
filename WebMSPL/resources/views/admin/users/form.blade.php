@section('title', isset($user) ? 'Edit Pengguna' : 'Tambah Pengguna')

<x-admin-dashboard-layout>
@php
    $isEdit = isset($user);
    $isSuperadmin = $isEdit && $user->id === 1;
@endphp
<div class="max-w-[600px]">

    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.users.index') }}"
           class="w-9 h-9 rounded-xl bg-white border border-msp-border flex items-center justify-center text-msp-gray-light hover:text-msp-navy hover:border-msp-navy/20 transition shadow-sm">
            <i class="fas fa-arrow-left text-[13px]"></i>
        </a>
        <div>
            <h1 class="font-space font-bold text-[22px] text-[#191C1E] leading-tight">
                {{ $isEdit ? 'Edit Pengguna' : 'Tambah Pengguna Baru' }}
            </h1>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-msp-border shadow-[0_1px_4px_rgba(11,30,62,0.04)] overflow-hidden">
        <div class="px-6 py-4 border-b border-msp-border bg-msp-bg/40">
            <span class="font-hanken font-bold text-[12px] text-msp-gray uppercase tracking-wider">Informasi Pengguna</span>
        </div>
        <div class="p-6">
            <form action="{{ $isEdit ? route('admin.users.update', $user) : route('admin.users.store') }}"
                  method="POST"
                  x-data="{ submitting: false }" @submit="submitting = true">
                @csrf
                @if ($isEdit) @method('PUT') @endif

                <div class="space-y-5">
                    @if($isSuperadmin)
                    <div class="flex items-center gap-3 p-4 bg-amber-50 border border-amber-200 rounded-xl">
                        <i class="fas fa-shield-alt text-amber-500 text-sm shrink-0"></i>
                        <p class="font-inter text-[13px] text-amber-700">Akun superadmin — hanya password yang dapat diubah.</p>
                    </div>
                    @endif

                    @if(!$isSuperadmin)
                    <div>
                        <label for="user-name" class="block font-hanken font-bold text-[12px] text-msp-gray uppercase tracking-wider mb-2">
                            Nama Lengkap <span class="text-msp-danger">*</span>
                        </label>
                        <input id="user-name" name="name" type="text"
                               value="{{ old('name', $user->name ?? '') }}" required
                               class="w-full h-11 px-4 bg-msp-bg rounded-xl font-inter text-[14px] text-[#191C1E] placeholder:text-msp-gray-light border border-msp-border focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20 focus:outline-none transition"
                               placeholder="Nama pengguna">
                        @error('name')
                            <p class="mt-1.5 text-[12px] text-msp-danger font-inter flex items-center gap-1">
                                <i class="fas fa-exclamation-circle text-[10px]"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label for="user-email" class="block font-hanken font-bold text-[12px] text-msp-gray uppercase tracking-wider mb-2">
                            Email <span class="text-msp-danger">*</span>
                        </label>
                        <input id="user-email" name="email" type="email"
                               value="{{ old('email', $user->email ?? '') }}" required
                               class="w-full h-11 px-4 bg-msp-bg rounded-xl font-inter text-[14px] text-[#191C1E] placeholder:text-msp-gray-light border border-msp-border focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20 focus:outline-none transition"
                               placeholder="email@perusahaan.co.id">
                        @error('email')
                            <p class="mt-1.5 text-[12px] text-msp-danger font-inter flex items-center gap-1">
                                <i class="fas fa-exclamation-circle text-[10px]"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>
                    @endif

                    <div>
                        <label for="user-password" class="block font-hanken font-bold text-[12px] text-msp-gray uppercase tracking-wider mb-2">
                            {{ $isEdit ? 'Password Baru' : 'Password' }}
                            @if(!$isEdit) <span class="text-msp-danger">*</span> @endif
                        </label>
                        @if($isEdit)
                            <p class="font-inter text-[12px] text-msp-gray-light mb-2">Kosongkan jika tidak ingin mengubah password.</p>
                        @endif
                        <div class="relative" x-data="{ show: false }">
                            <input id="user-password" :type="show ? 'text' : 'password'" name="password"
                                   {{ $isEdit ? '' : 'required' }}
                                   class="w-full h-11 px-4 pr-11 bg-msp-bg rounded-xl font-inter text-[14px] text-[#191C1E] placeholder:text-msp-gray-light border border-msp-border focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20 focus:outline-none transition"
                                   placeholder="{{ $isEdit ? 'Biarkan kosong jika tidak diubah' : 'Minimal 8 karakter' }}">
                            <button type="button" @click="show = !show"
                                    class="absolute right-3.5 top-1/2 -translate-y-1/2 w-6 h-6 flex items-center justify-center text-msp-gray-light hover:text-msp-navy transition"
                                    aria-label="Tampilkan atau sembunyikan password">
                                <i x-show="!show" class="fas fa-eye text-[13px]"></i>
                                <i x-show="show" class="fas fa-eye-slash text-[13px]" x-cloak></i>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-1.5 text-[12px] text-msp-danger font-inter flex items-center gap-1">
                                <i class="fas fa-exclamation-circle text-[10px]"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label for="user-password-confirm" class="block font-hanken font-bold text-[12px] text-msp-gray uppercase tracking-wider mb-2">
                            Konfirmasi Password
                            @if(!$isEdit) <span class="text-msp-danger">*</span> @endif
                        </label>
                        <input id="user-password-confirm" type="password" name="password_confirmation"
                               {{ $isEdit ? '' : 'required' }}
                               class="w-full h-11 px-4 bg-msp-bg rounded-xl font-inter text-[14px] text-[#191C1E] placeholder:text-msp-gray-light border border-msp-border focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20 focus:outline-none transition"
                               placeholder="{{ $isEdit ? 'Biarkan kosong jika tidak diubah' : 'Ulangi password' }}">
                    </div>

                    @if(!$isSuperadmin)
                    <div>
                        <label for="user-role" class="block font-hanken font-bold text-[12px] text-msp-gray uppercase tracking-wider mb-2">
                            Role <span class="text-msp-danger">*</span>
                        </label>
                        <select id="user-role" name="role" required
                                class="w-full h-11 px-4 bg-msp-bg rounded-xl font-inter text-[14px] text-[#191C1E] border border-msp-border focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20 focus:outline-none transition appearance-none cursor-pointer">
                            <option value="" disabled {{ !$isEdit ? 'selected' : '' }}>Pilih role pengguna</option>
                            <option value="admin" {{ old('role', $user->role ?? '') === 'admin' ? 'selected' : '' }}>Superadmin — Akses penuh</option>
                            <option value="editor" {{ old('role', $user->role ?? '') === 'editor' ? 'selected' : '' }}>Editor — Kelola konten</option>
                        </select>
                        @error('role')
                            <p class="mt-1.5 text-[12px] text-msp-danger font-inter flex items-center gap-1">
                                <i class="fas fa-exclamation-circle text-[10px]"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>
                    @endif

                    <div class="flex items-center gap-3 pt-3 border-t border-msp-border">
                        <button type="submit" :disabled="submitting"
                                class="h-10 px-6 rounded-xl font-hanken font-bold text-[14px] text-[#071B3B] inline-flex items-center gap-2 hover:brightness-95 transition disabled:opacity-60"
                                style="background: var(--gradient-gold)">
                            <i class="fas fa-save text-[11px]"></i>
                            {{ $isEdit ? 'Simpan Perubahan' : 'Buat Pengguna' }}
                        </button>
                        <a href="{{ route('admin.users.index') }}"
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
