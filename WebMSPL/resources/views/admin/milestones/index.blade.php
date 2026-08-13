@section('title', 'Pencapaian')

<x-admin-dashboard-layout>
<div class="max-w-[800px]">

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="font-space font-bold text-[24px] text-[#191C1E] leading-tight">Pencapaian Perusahaan</h1>
            <p class="font-inter text-[14px] text-msp-gray mt-0.5">Kelola tonggak sejarah dan pencapaian PT MSP.</p>
        </div>
        <a href="{{ route('admin.milestones.create') }}"
           class="shrink-0 h-10 px-5 rounded-xl font-hanken font-bold text-[14px] text-[#071B3B] inline-flex items-center gap-2 hover:brightness-95 transition shadow-[0_2px_8px_rgba(242,167,27,0.2)]"
           style="background: var(--gradient-gold)">
            <i class="fas fa-plus text-[11px]"></i>
            Tambah Pencapaian
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-msp-border overflow-hidden shadow-[0_1px_4px_rgba(11,30,62,0.04)]">
        <table class="w-full">
            <caption class="sr-only">Daftar pencapaian perusahaan</caption>
            <thead>
                <tr class="border-b border-msp-border bg-msp-bg/60">
                    <th scope="col" class="text-left font-hanken font-bold text-[11px] text-msp-gray-light uppercase tracking-wider px-5 py-3.5 w-24">Label</th>
                    <th scope="col" class="text-left font-hanken font-bold text-[11px] text-msp-gray-light uppercase tracking-wider px-5 py-3.5">Judul</th>
                    <th scope="col" class="text-left font-hanken font-bold text-[11px] text-msp-gray-light uppercase tracking-wider px-5 py-3.5 hidden md:table-cell">Deskripsi</th>
                    <th scope="col" class="text-left font-hanken font-bold text-[11px] text-msp-gray-light uppercase tracking-wider px-5 py-3.5 w-16 hidden lg:table-cell">Urutan</th>
                    <th scope="col" class="text-right font-hanken font-bold text-[11px] text-msp-gray-light uppercase tracking-wider px-5 py-3.5 w-24">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($milestones as $milestone)
                    <tr class="border-b border-msp-border hover:bg-msp-bg/50 transition">
                        <td class="px-5 py-4">
                            <span class="inline-flex items-center justify-center px-3 py-1 rounded-xl font-hanken font-bold text-[13px] bg-msp-gold/10 text-msp-gold border border-msp-gold/20">
                                {{ $milestone->label }}
                            </span>
                        </td>
                        <td class="px-5 py-4">
                            <div class="font-inter font-semibold text-[14px] text-[#191C1E]">{{ $milestone->title }}</div>
                        </td>
                        <td class="px-5 py-4 hidden md:table-cell">
                            <div class="font-inter text-[13px] text-msp-gray-light max-w-[260px] truncate">{{ $milestone->description ?? '—' }}</div>
                        </td>
                        <td class="px-5 py-4 hidden lg:table-cell">
                            <span class="w-7 h-7 rounded-lg bg-msp-bg-alt border border-msp-border flex items-center justify-center font-hanken font-bold text-[13px] text-msp-gray">
                                {{ $milestone->order ?? '—' }}
                            </span>
                        </td>
                        <td class="px-5 py-4 text-right">
                            <div class="flex items-center justify-end gap-1.5">
                                <a href="{{ route('admin.milestones.edit', $milestone) }}"
                                   class="w-8 h-8 rounded-lg bg-msp-bg-alt flex items-center justify-center text-msp-gray-light hover:text-msp-gold hover:bg-msp-gold/10 transition"
                                   title="Edit pencapaian">
                                    <i class="fas fa-pen text-[11px]"></i>
                                </a>
                                <div class="relative" x-data="{ open: false }">
                                    <button @click="open = !open"
                                            class="w-8 h-8 rounded-lg bg-msp-bg-alt flex items-center justify-center text-msp-gray-light hover:text-msp-danger hover:bg-red-50 transition"
                                            title="Hapus pencapaian">
                                        <i class="fas fa-trash text-[11px]"></i>
                                    </button>
                                    <div x-show="open" @click.away="open = false" x-cloak
                                         class="absolute right-0 top-full mt-2 w-44 bg-white rounded-xl shadow-lg border border-msp-border py-2 px-3 z-20">
                                        <p class="font-inter text-[12px] text-msp-gray mb-2.5">Hapus pencapaian <strong>{{ $milestone->label }}</strong>?</p>
                                        <form action="{{ route('admin.milestones.destroy', $milestone) }}" method="POST">
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
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-5 py-16 text-center">
                            <div class="w-16 h-16 rounded-2xl bg-msp-bg-alt flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-trophy text-3xl text-msp-border"></i>
                            </div>
                            <p class="font-hanken font-semibold text-[15px] text-[#191C1E] mb-1">Belum ada pencapaian</p>
                            <p class="font-inter text-[13px] text-msp-gray-light mb-4">Dokumentasikan tonggak sejarah dan pencapaian penting perusahaan.</p>
                            <a href="{{ route('admin.milestones.create') }}"
                               class="inline-flex items-center gap-2 h-9 px-5 rounded-lg font-hanken font-bold text-[13px] text-[#071B3B]"
                               style="background: var(--gradient-gold)">
                                <i class="fas fa-plus text-[10px]"></i> Tambah Pencapaian Pertama
                            </a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <x-admin-pagination :paginator="$milestones" />
</div>
</x-admin-dashboard-layout>
