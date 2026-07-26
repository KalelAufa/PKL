@section('title', 'Pengaturan Perusahaan')

<x-admin-dashboard-layout>
<div class="max-w-[760px]">

    {{-- Page header --}}
    <div class="flex items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="font-space font-bold text-[24px] text-[#191C1E] leading-tight">Pengaturan Perusahaan</h1>
            <p class="font-inter text-[14px] text-msp-gray mt-0.5">Identitas, kontak, dan media sosial perusahaan.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-5 flex items-center gap-3 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-xl text-[13px] font-inter">
            <i class="fas fa-check-circle text-green-500"></i>
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.company-settings.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @php $idx = 0; @endphp

        {{-- ── IDENTITAS DASAR ── --}}
        <div class="bg-white rounded-2xl border border-msp-border overflow-hidden shadow-[0_1px_4px_rgba(11,30,62,0.04)] mb-5">
            <div class="px-6 py-4 border-b border-msp-border flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-msp-navy/10 flex items-center justify-center shrink-0">
                    <i class="fas fa-building text-msp-navy text-[13px]"></i>
                </div>
                <div>
                    <h3 class="font-space font-bold text-[15px] text-[#191C1E]">Identitas Dasar</h3>
                    <p class="text-[11px] text-msp-gray mt-0.5">Tampil di navbar, footer, dan meta site</p>
                </div>
            </div>
            <div class="p-6 flex flex-col gap-5">

                @php $row = $settings['company_name'] ?? null; @endphp
                @if($row)
                    <input type="hidden" name="settings[{{ $idx }}][id]" value="{{ $row->id }}">
                    <div>
                        <label class="block text-[11px] font-bold text-msp-gray uppercase tracking-wider mb-2">
                            <i class="fas fa-font mr-1.5 text-msp-gray-light"></i>Nama Perusahaan
                        </label>
                        <input type="text" name="settings[{{ $idx }}][value]"
                               value="{{ old('settings.'.$idx.'.value', $row->value) }}"
                               placeholder="PT Mentari Satya Perkasa"
                               class="w-full h-11 px-4 bg-msp-bg border border-msp-border rounded-xl text-[14px] text-[#191C1E] focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20 focus:outline-none transition">
                    </div>
                    @php $idx++; @endphp
                @endif

                @php $row = $settings['company_description'] ?? null; @endphp
                @if($row)
                    <input type="hidden" name="settings[{{ $idx }}][id]" value="{{ $row->id }}">
                    <div>
                        <label class="block text-[11px] font-bold text-msp-gray uppercase tracking-wider mb-2">
                            <i class="fas fa-align-left mr-1.5 text-msp-gray-light"></i>Deskripsi Singkat
                            <span class="ml-2 text-msp-gray-light normal-case font-normal">Tampil di footer</span>
                        </label>
                        <textarea name="settings[{{ $idx }}][value]"
                                  rows="3"
                                  placeholder="Deskripsi singkat perusahaan..."
                                  class="w-full px-4 py-3 bg-msp-bg border border-msp-border rounded-xl text-[13px] text-[#191C1E] focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20 focus:outline-none transition resize-y">{{ old('settings.'.$idx.'.value', $row->value) }}</textarea>
                    </div>
                    @php $idx++; @endphp
                @endif

                @php $row = $settings['company_logo'] ?? null; @endphp
                @if($row)
                    @php
                        $logoVal = $row->value;
                        $logoUrl = $logoVal ? asset('images/' . $logoVal) : null;
                    @endphp
                    <input type="hidden" name="settings[{{ $idx }}][id]" value="{{ $row->id }}">
                    <input type="hidden" name="settings[{{ $idx }}][value]" value="{{ $row->value }}">
                    <div x-data="{
                        previewUrl: {{ $logoUrl ? json_encode($logoUrl) : "''" }},
                        handleFile(e) { const f=e.target.files[0]; if(!f) return; this.previewUrl=URL.createObjectURL(f); }
                    }">
                        <label class="block text-[11px] font-bold text-msp-gray uppercase tracking-wider mb-2">
                            <i class="fas fa-image mr-1.5 text-msp-gray-light"></i>Logo Perusahaan
                        </label>
                        <div class="flex items-center gap-4">
                            <div x-show="previewUrl" class="w-20 h-20 rounded-xl border border-msp-border overflow-hidden shrink-0">
                                <img :src="previewUrl" class="w-full h-full object-contain p-2">
                            </div>
                            <div x-show="!previewUrl" class="w-20 h-20 rounded-xl border-2 border-dashed border-msp-border flex items-center justify-center shrink-0">
                                <i class="fas fa-image text-2xl text-msp-gray-light"></i>
                            </div>
                            <label class="cursor-pointer inline-flex items-center gap-2 px-4 py-2 bg-msp-bg border border-msp-border rounded-xl text-[13px] text-msp-gray hover:border-msp-gold hover:text-msp-gold transition">
                                <i class="fas fa-upload text-[11px]"></i>Upload Logo
                                <input type="file" name="file_{{ $row->id }}" accept="image/*" class="sr-only" @change="handleFile($event)">
                            </label>
                        </div>
                    </div>
                    @php $idx++; @endphp
                @endif

            </div>
        </div>

        {{-- ── KONTAK ── --}}
        <div class="bg-white rounded-2xl border border-msp-border overflow-hidden shadow-[0_1px_4px_rgba(11,30,62,0.04)] mb-5">
            <div class="px-6 py-4 border-b border-msp-border flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-rose-50 flex items-center justify-center shrink-0">
                    <i class="fas fa-address-book text-rose-500 text-[13px]"></i>
                </div>
                <div>
                    <h3 class="font-space font-bold text-[15px] text-[#191C1E]">Informasi Kontak</h3>
                    <p class="text-[11px] text-msp-gray mt-0.5">Tampil di footer dan halaman Hubungi Kami</p>
                </div>
            </div>
            <div class="p-6 flex flex-col gap-5">

                @foreach([
                    ['key'=>'address',      'icon'=>'fas fa-map-marker-alt','color'=>'text-rose-400',   'label'=>'Alamat Kantor',   'type'=>'textarea','placeholder'=>"Jl. Raya ..."],
                    ['key'=>'phone',        'icon'=>'fas fa-phone',         'color'=>'text-emerald-500','label'=>'Nomor Telepon',   'type'=>'text',    'placeholder'=>'+62 21 ...'],
                    ['key'=>'email',        'icon'=>'fas fa-envelope',      'color'=>'text-sky-500',    'label'=>'Alamat Email',    'type'=>'email',   'placeholder'=>'info@ptmsp.co.id'],
                    ['key'=>'office_hours', 'icon'=>'fas fa-clock',         'color'=>'text-amber-500',  'label'=>'Jam Operasional', 'type'=>'text',    'placeholder'=>'Senin - Jumat, 08:00 - 17:00 WIB'],
                ] as $field)
                    @php $row = $settings[$field['key']] ?? null; @endphp
                    @if($row)
                        <input type="hidden" name="settings[{{ $idx }}][id]" value="{{ $row->id }}">
                        <div>
                            <label class="flex items-center gap-1.5 text-[11px] font-bold text-msp-gray uppercase tracking-wider mb-2">
                                <i class="{{ $field['icon'] }} {{ $field['color'] }} text-[11px]"></i>{{ $field['label'] }}
                            </label>
                            @if($field['type'] === 'textarea')
                                <textarea name="settings[{{ $idx }}][value]"
                                          rows="2"
                                          placeholder="{{ $field['placeholder'] }}"
                                          class="w-full px-4 py-3 bg-msp-bg border border-msp-border rounded-xl text-[13px] text-[#191C1E] focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20 focus:outline-none transition resize-y">{{ old('settings.'.$idx.'.value', $row->value) }}</textarea>
                            @else
                                <input type="{{ $field['type'] }}" name="settings[{{ $idx }}][value]"
                                       value="{{ old('settings.'.$idx.'.value', $row->value) }}"
                                       placeholder="{{ $field['placeholder'] }}"
                                       class="w-full h-11 px-4 bg-msp-bg border border-msp-border rounded-xl text-[13px] text-[#191C1E] focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20 focus:outline-none transition">
                            @endif
                        </div>
                        @php $idx++; @endphp
                    @endif
                @endforeach

            </div>
        </div>

        {{-- ── MEDIA SOSIAL ── --}}
        <div class="bg-white rounded-2xl border border-msp-border overflow-hidden shadow-[0_1px_4px_rgba(11,30,62,0.04)] mb-6">
            <div class="px-6 py-4 border-b border-msp-border flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-sky-50 flex items-center justify-center shrink-0">
                    <i class="fas fa-share-alt text-sky-500 text-[13px]"></i>
                </div>
                <div>
                    <h3 class="font-space font-bold text-[15px] text-[#191C1E]">Media Sosial</h3>
                    <p class="text-[11px] text-msp-gray mt-0.5">Tampil di footer dan halaman Hubungi Kami</p>
                </div>
            </div>
            <div class="p-6 flex flex-col gap-4">

                @foreach([
                    ['key'=>'social_linkedin', 'icon'=>'fab fa-linkedin',  'color'=>'text-blue-700', 'label'=>'LinkedIn',    'placeholder'=>'https://linkedin.com/company/...'],
                    ['key'=>'social_instagram','icon'=>'fab fa-instagram', 'color'=>'text-pink-500', 'label'=>'Instagram',   'placeholder'=>'https://instagram.com/...'],
                    ['key'=>'social_facebook', 'icon'=>'fab fa-facebook',  'color'=>'text-blue-600', 'label'=>'Facebook',    'placeholder'=>'https://facebook.com/...'],
                    ['key'=>'social_x',        'icon'=>'fab fa-x-twitter', 'color'=>'text-gray-800', 'label'=>'X (Twitter)', 'placeholder'=>'https://x.com/...'],
                ] as $field)
                    @php $row = $settings[$field['key']] ?? null; @endphp
                    @if($row)
                        <input type="hidden" name="settings[{{ $idx }}][id]" value="{{ $row->id }}">
                        <div class="flex items-center gap-4">
                            <i class="{{ $field['icon'] }} {{ $field['color'] }} text-[20px] w-6 text-center shrink-0"></i>
                            <div class="flex-1">
                                <label class="block text-[11px] font-bold text-msp-gray uppercase tracking-wider mb-1.5">{{ $field['label'] }}</label>
                                <input type="url" name="settings[{{ $idx }}][value]"
                                       value="{{ old('settings.'.$idx.'.value', $row->value) }}"
                                       placeholder="{{ $field['placeholder'] }}"
                                       class="w-full h-10 px-3 bg-msp-bg border border-msp-border rounded-xl text-[13px] text-[#191C1E] focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20 focus:outline-none transition">
                            </div>
                        </div>
                        @php $idx++; @endphp
                    @endif
                @endforeach

            </div>
        </div>

        {{-- Save --}}
        <div class="flex justify-end">
            <button type="submit"
                    class="h-10 px-6 rounded-xl font-hanken font-bold text-[14px] text-[#071B3B] inline-flex items-center gap-2 hover:brightness-95 transition shadow-[0_2px_8px_rgba(242,167,27,0.2)]"
                    style="background: linear-gradient(135deg, #F2A71B 0%, #FBC34C 100%)">
                <i class="fas fa-save text-[12px]"></i>
                Simpan Pengaturan
            </button>
        </div>

    </form>
</div>
</x-admin-dashboard-layout>
