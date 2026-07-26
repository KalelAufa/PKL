@section('title', 'Konten Halaman')

<x-admin-dashboard-layout>
<div class="max-w-[900px]">

    <div class="mb-7">
        <h1 class="font-space font-bold text-[24px] text-[#191C1E] leading-tight">Konten Halaman</h1>
        <p class="font-inter text-[14px] text-msp-gray mt-0.5">Edit teks, gambar, dan informasi untuk setiap halaman publik website.</p>
    </div>

    @if (session('success'))
        <div class="mb-5 flex items-center gap-3 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-xl text-[13px] font-inter">
            <i class="fas fa-check-circle text-green-500"></i>
            {{ session('success') }}
        </div>
    @endif

    @php
        $pageMeta = [
            'home'     => [
                'label'    => 'Beranda',
                'subtitle' => 'Hero, statistik, tentang, dan gambar utama',
                'route'    => '/',
                'icon'     => 'fas fa-home',
                'color'    => 'from-msp-blue to-msp-navy',
                'iconBg'   => 'bg-msp-blue/10 text-msp-blue',
            ],
            'about'    => [
                'label'    => 'Tentang Kami',
                'subtitle' => 'Profil perusahaan, visi, misi, dan cerita',
                'route'    => '/tentang-kami',
                'icon'     => 'fas fa-building',
                'color'    => 'from-msp-gold to-amber-500',
                'iconBg'   => 'bg-msp-gold/10 text-msp-gold',
            ],
            'services' => [
                'label'    => 'Layanan',
                'subtitle' => 'Header halaman daftar layanan',
                'route'    => '/layanan',
                'icon'     => 'fas fa-briefcase',
                'color'    => 'from-emerald-500 to-teal-600',
                'iconBg'   => 'bg-emerald-50 text-emerald-600',
            ],
            'contact'  => [
                'label'    => 'Hubungi Kami',
                'subtitle' => 'Alamat, telepon, email, dan hero kontak',
                'route'    => '/hubungi-kami',
                'icon'     => 'fas fa-envelope',
                'color'    => 'from-violet-500 to-purple-600',
                'iconBg'   => 'bg-violet-50 text-violet-600',
            ],
            'footer'   => [
                'label'    => 'Footer',
                'subtitle' => 'Deskripsi perusahaan di bagian bawah',
                'route'    => null,
                'icon'     => 'fas fa-layer-group',
                'color'    => 'from-slate-500 to-slate-700',
                'iconBg'   => 'bg-slate-100 text-slate-500',
            ],
        ];
    @endphp

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($pages as $item)
            @php
                $page         = $item->page;
                $meta         = $pageMeta[$page] ?? [
                    'label'    => ucfirst($page),
                    'subtitle' => '',
                    'route'    => null,
                    'icon'     => 'fas fa-file-alt',
                    'color'    => 'from-gray-400 to-gray-600',
                    'iconBg'   => 'bg-gray-100 text-gray-500',
                ];
                $contentCount = $item->contents->count();
                $heroImage    = $item->contents->firstWhere('key', 'hero_image');
                $heroUrl      = $heroImage && $heroImage->value
                    ? (str_starts_with($heroImage->value, 'images/') ? asset($heroImage->value) : asset('images/' . $heroImage->value))
                    : null;
                $heroTitle    = optional($item->contents->firstWhere('key', 'hero_title'))->value;
            @endphp

            <a href="{{ route('admin.page-content.edit', $page) }}"
               class="group bg-white rounded-2xl border border-msp-border overflow-hidden hover:shadow-lg hover:border-msp-gold/30 transition-all duration-200 flex flex-col">

                {{-- Top banner --}}
                <div class="h-28 relative overflow-hidden">
                    @if($heroUrl)
                        <img src="{{ $heroUrl }}" alt="" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/50"></div>
                    @else
                        <div class="w-full h-full bg-gradient-to-br {{ $meta['color'] }} opacity-90"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <i class="{{ $meta['icon'] }} text-4xl text-white/20"></i>
                        </div>
                    @endif

                    {{-- Page icon --}}
                    <div class="absolute bottom-3 left-4">
                        <div class="w-10 h-10 rounded-xl bg-white/90 backdrop-blur-sm flex items-center justify-center shadow-md {{ $meta['iconBg'] }}">
                            <i class="{{ $meta['icon'] }} text-base"></i>
                        </div>
                    </div>

                    {{-- Content count badge --}}
                    <div class="absolute top-3 right-3">
                        <span class="px-2 py-0.5 rounded-md text-[10px] font-inter font-bold bg-black/40 backdrop-blur-sm text-white">
                            {{ $contentCount }} field
                        </span>
                    </div>
                </div>

                {{-- Card body --}}
                <div class="p-4 flex flex-col flex-1">
                    <div class="flex-1">
                        <h3 class="font-hanken font-bold text-[16px] text-[#191C1E] leading-tight">{{ $meta['label'] }}</h3>
                        <p class="font-inter text-[12px] text-msp-gray-light mt-1 line-clamp-2">{{ $meta['subtitle'] }}</p>

                        @if($heroTitle)
                            <p class="font-inter text-[11px] text-msp-gray italic mt-1.5 line-clamp-1">"{{ $heroTitle }}"</p>
                        @endif

                        @if($meta['route'])
                            <p class="font-mono text-[10px] text-msp-gray-light/60 mt-2 truncate">{{ $meta['route'] }}</p>
                        @endif
                    </div>

                    {{-- Footer --}}
                    <div class="flex items-center justify-between mt-3 pt-3 border-t border-msp-border">
                        <span class="font-inter text-[11px] text-msp-gray-light">
                            <i class="fas fa-database text-[9px] mr-1"></i>{{ $contentCount }} blok konten
                        </span>
                        <div class="flex items-center gap-1.5">
                            @if($meta['route'])
                                <span class="w-7 h-7 rounded-lg bg-msp-bg-alt border border-msp-border flex items-center justify-center text-msp-gray-light hover:text-msp-navy transition text-[10px]"
                                      onclick="event.preventDefault(); window.open('{{ url($meta['route']) }}', '_blank')"
                                      title="Lihat halaman">
                                    <i class="fas fa-external-link-alt"></i>
                                </span>
                            @endif
                            <span class="h-7 px-3 rounded-lg font-hanken font-bold text-[12px] text-[#071B3B] inline-flex items-center gap-1.5 group-hover:brightness-95 transition"
                                  style="background: linear-gradient(135deg, #F2A71B 0%, #FBC34C 100%)">
                                <i class="fas fa-pen text-[9px]"></i> Edit
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>

</x-admin-dashboard-layout>
