@section('title', 'Anggota Tim')

<x-admin-dashboard-layout>
<div class="max-w-[900px]">

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="font-space font-bold text-[24px] text-[#191C1E] leading-tight">Anggota Tim</h1>
            <p class="font-inter text-[14px] text-msp-gray mt-0.5">Kelola anggota tim yang ditampilkan di halaman perusahaan.</p>
        </div>
        <a href="{{ route('admin.team-members.create') }}"
           class="shrink-0 h-10 px-5 rounded-xl font-hanken font-bold text-[14px] text-[#071B3B] inline-flex items-center gap-2 hover:brightness-95 transition shadow-[0_2px_8px_rgba(242,167,27,0.2)]"
           style="background: var(--gradient-gold)">
            <i class="fas fa-plus text-[11px]"></i>
            Tambah Anggota
        </a>
    </div>

    @if($teamMembers->isEmpty())
        <div class="py-20 text-center bg-white rounded-2xl border border-msp-border">
            <div class="w-16 h-16 rounded-2xl bg-msp-bg-alt flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-users text-3xl text-msp-border"></i>
            </div>
            <p class="font-hanken font-semibold text-[15px] text-[#191C1E] mb-1">Belum ada anggota tim</p>
            <p class="font-inter text-[13px] text-msp-gray-light mb-4">Tambahkan profil anggota tim untuk ditampilkan di halaman perusahaan.</p>
            <a href="{{ route('admin.team-members.create') }}"
               class="inline-flex items-center gap-2 h-9 px-5 rounded-lg font-hanken font-bold text-[13px] text-[#071B3B]"
               style="background: var(--gradient-gold)">
                <i class="fas fa-plus text-[10px]"></i> Tambah Anggota Pertama
            </a>
        </div>
    @else
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($teamMembers as $member)
                <div class="bg-white rounded-2xl border border-msp-border overflow-hidden hover:shadow-md hover:border-msp-gold/30 transition duration-200 group flex flex-col">

                    {{-- Photo area --}}
                    <div class="relative aspect-square bg-msp-bg-alt overflow-hidden">
                        @if ($member->photo)
                            <img src="{{ asset('images/' . $member->photo) }}"
                                 alt="{{ $member->name }}"
                                 class="w-full h-full object-cover object-top group-hover:-translate-y-0.5 transition duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center"
                                 style="background: var(--gradient-sidebar)">
                                <span class="font-space font-bold text-[40px] text-white/80 select-none">
                                    {{ strtoupper(substr($member->name, 0, 1)) }}
                                </span>
                            </div>
                        @endif

                        {{-- Order badge --}}
                        @if($member->order !== null)
                            <div class="absolute top-2 right-2">
                                <span class="w-6 h-6 rounded-lg bg-black/50 backdrop-blur-sm flex items-center justify-center font-hanken font-bold text-[11px] text-white">
                                    {{ $member->order }}
                                </span>
                            </div>
                        @endif
                    </div>

                    {{-- Info --}}
                    <div class="p-3.5 flex flex-col flex-1">
                        <div class="flex-1">
                            <h3 class="font-hanken font-bold text-[14px] text-[#191C1E] leading-tight line-clamp-1">{{ $member->name }}</h3>
                            <p class="font-inter text-[12px] text-msp-gray-light mt-0.5 line-clamp-2">{{ $member->position }}</p>
                        </div>

                        {{-- Actions --}}
                        <div class="flex items-center gap-1.5 mt-3 pt-3 border-t border-msp-border">
                            <a href="{{ route('admin.team-members.edit', $member) }}"
                               class="flex-1 h-8 rounded-lg bg-msp-bg-alt flex items-center justify-center gap-1.5 text-msp-gray-light hover:text-msp-gold hover:bg-msp-gold/10 transition text-[11px] font-inter font-medium"
                               title="Edit anggota">
                                <i class="fas fa-pen text-[10px]"></i> Edit
                            </a>
                            <div class="relative" x-data="{ open: false }">
                                <button @click="open = !open"
                                        class="w-8 h-8 rounded-lg bg-msp-bg-alt flex items-center justify-center text-msp-gray-light hover:text-msp-danger hover:bg-red-50 transition"
                                        title="Hapus anggota">
                                    <i class="fas fa-trash text-[11px]"></i>
                                </button>
                                <div x-show="open" @click.away="open = false" x-cloak
                                     class="absolute right-0 bottom-full mb-2 w-44 bg-white rounded-xl shadow-lg border border-msp-border py-2 px-3 z-20">
                                    <p class="font-inter text-[12px] text-msp-gray mb-2.5">Hapus <strong>{{ $member->name }}</strong> dari tim?</p>
                                    <form action="{{ route('admin.team-members.destroy', $member) }}" method="POST">
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
            @endforeach
        </div>
    @endif

    <x-admin-pagination :paginator="$teamMembers" />
</div>
</x-admin-dashboard-layout>
