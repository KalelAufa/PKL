@section('title', 'Layanan')

<x-admin-dashboard-layout>
<div class="max-w-[1000px]">

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="font-space font-bold text-[24px] text-[#191C1E] leading-tight">Layanan</h1>
            <p class="font-inter text-[14px] text-msp-gray mt-0.5">Kelola layanan dan penawaran afiliasi PT MSP.</p>
        </div>
        <a href="{{ route('admin.services.create') }}"
           class="shrink-0 h-10 px-5 rounded-xl font-hanken font-bold text-[14px] text-[#071B3B] inline-flex items-center gap-2 hover:brightness-95 transition shadow-[0_2px_8px_rgba(242,167,27,0.2)]"
           style="background: var(--gradient-gold)">
            <i class="fas fa-plus text-[11px]"></i>
            Tambah Layanan
        </a>
    </div>

    @php
    // icon field now stores FA classes directly (e.g. "fas fa-users")
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">
        @forelse ($services as $service)
            @php $faIcon = (str_starts_with($service->icon ?? '', 'fa') ? $service->icon : 'fas fa-cogs'); @endphp
            <div class="bg-white rounded-2xl border border-msp-border overflow-hidden hover:shadow-lg hover:border-msp-gold/30 transition duration-200 group flex flex-col">

                {{-- Hero image --}}
                <div class="h-36 bg-msp-bg-alt relative overflow-hidden shrink-0">
                    @if($service->hero_image)
                        <img src="{{ asset('images/' . $service->hero_image) }}" alt="{{ $service->title }}"
                             class="w-full h-full object-cover group-hover:-translate-y-0.5 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                    @else
                        <div class="w-full h-full flex flex-col items-center justify-center gap-1.5 bg-gradient-to-br from-msp-bg to-msp-bg-alt">
                            <i class="fas fa-image text-3xl text-msp-border"></i>
                            <span class="font-inter text-[11px] text-msp-gray-light/70">Belum ada gambar</span>
                        </div>
                    @endif

                    <div class="absolute top-2.5 left-2.5 flex gap-1.5">
                        <span class="px-2 py-0.5 rounded-md text-[10px] font-inter font-bold backdrop-blur-sm shadow-sm
                            {{ $service->is_affiliate ? 'bg-msp-blue/80 text-white' : 'bg-msp-navy/80 text-white' }}">
                            {{ $service->is_affiliate ? 'Afiliasi' : 'Utama' }}
                        </span>
                    </div>
                    <div class="absolute top-2.5 right-2.5">
                        @php $isActive = $service->status === 'published'; @endphp
                        <span class="px-2 py-0.5 rounded-md text-[10px] font-inter font-bold backdrop-blur-sm shadow-sm
                            {{ $isActive ? 'bg-green-500/80 text-white' : 'bg-black/50 text-white/70' }}">
                            {{ $isActive ? '● Aktif' : '○ Draft' }}
                        </span>
                    </div>
                </div>

                {{-- Card body --}}
                <div class="p-4 flex flex-col flex-1">
                    <div class="flex items-start gap-3 mb-3">
                        @if($service->icon_image)
                            <img src="{{ asset('images/' . $service->icon_image) }}" alt="Icon {{ $service->title }}"
                                 class="w-11 h-11 rounded-xl object-cover shrink-0 border border-msp-border shadow-sm">
                        @else
                            <div class="w-11 h-11 rounded-xl flex items-center justify-center shrink-0 shadow-sm
                                {{ $service->is_affiliate ? 'bg-msp-blue/10' : 'bg-msp-gold/10' }}">
                                <i class="{{ $faIcon }} text-base {{ $service->is_affiliate ? 'text-msp-blue' : 'text-msp-gold' }}"></i>
                            </div>
                        @endif

                        <div class="min-w-0 flex-1 pt-0.5">
                            <h3 class="font-hanken font-bold text-[15px] text-[#191C1E] leading-tight line-clamp-2">{{ $service->title }}</h3>
                            @if($service->excerpt)
                                <p class="font-inter text-[12px] text-msp-gray-light mt-1 line-clamp-2">{{ $service->excerpt }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="mt-auto flex items-center justify-between pt-3 border-t border-msp-border">
                        <div class="flex items-center gap-2">
                            <span class="font-hanken text-[11px] text-msp-gray-light">Urutan</span>
                            <span class="w-6 h-6 rounded-lg bg-msp-bg-alt border border-msp-border flex items-center justify-center font-hanken font-bold text-[12px] text-msp-gray">{{ $service->order }}</span>
                            <div class="flex gap-1">
                                <form action="{{ route('admin.services.reorder', [$service, 'direction' => 'up']) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit"
                                            class="w-6 h-6 rounded-lg bg-msp-bg-alt flex items-center justify-center text-msp-gray-light hover:text-msp-navy hover:bg-msp-border transition text-[9px]"
                                            title="Naikkan urutan">
                                        <i class="fas fa-chevron-up"></i>
                                    </button>
                                </form>
                                <form action="{{ route('admin.services.reorder', [$service, 'direction' => 'down']) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit"
                                            class="w-6 h-6 rounded-lg bg-msp-bg-alt flex items-center justify-center text-msp-gray-light hover:text-msp-navy hover:bg-msp-border transition text-[9px]"
                                            title="Turunkan urutan">
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="flex items-center gap-1.5">
                            <a href="{{ route('admin.services.edit', $service) }}"
                               class="w-8 h-8 rounded-lg bg-msp-bg-alt flex items-center justify-center text-msp-gray-light hover:text-msp-gold hover:bg-msp-gold/10 transition"
                               title="Edit layanan">
                                <i class="fas fa-pen text-[11px]"></i>
                            </a>
                            <div class="relative" x-data="{ open: false }">
                                <button @click="open = !open"
                                        class="w-8 h-8 rounded-lg bg-msp-bg-alt flex items-center justify-center text-msp-gray-light hover:text-msp-danger hover:bg-red-50 transition"
                                        title="Hapus layanan">
                                    <i class="fas fa-trash text-[11px]"></i>
                                </button>
                                <div x-show="open" @click.away="open = false" x-cloak
                                     class="absolute right-0 bottom-full mb-2 w-44 bg-white rounded-xl shadow-lg border border-msp-border py-2 px-3 z-20">
                                    <p class="font-inter text-[12px] text-msp-gray mb-2.5">Hapus <strong>{{ Str::limit($service->title, 25) }}</strong>?</p>
                                    <form action="{{ route('admin.services.destroy', $service) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="w-full h-8 rounded-lg bg-msp-danger text-white font-inter text-[12px] font-semibold hover:brightness-95 transition">
                                            Ya, Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-3 py-20 text-center">
                <div class="w-20 h-20 rounded-2xl bg-msp-bg-alt flex items-center justify-center mx-auto mb-5">
                    <i class="fas fa-briefcase text-4xl text-msp-border"></i>
                </div>
                <p class="font-hanken font-semibold text-[16px] text-[#191C1E] mb-1">Belum ada layanan</p>
                <p class="font-inter text-[14px] text-msp-gray-light mb-5">Tambahkan layanan yang ditawarkan PT MSP.</p>
                <a href="{{ route('admin.services.create') }}"
                   class="inline-flex items-center gap-2 h-10 px-6 rounded-xl font-hanken font-bold text-[14px] text-[#071B3B]"
                   style="background: var(--gradient-gold)">
                    <i class="fas fa-plus text-[11px]"></i> Tambah Layanan Pertama
                </a>
            </div>
        @endforelse
    </div>

    <x-admin-pagination :paginator="$services" />
</div>

</x-admin-dashboard-layout>
