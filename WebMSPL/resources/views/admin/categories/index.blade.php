@section('title', 'Kategori')

<x-admin-dashboard-layout>
<div class="max-w-[720px]">

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="font-space font-bold text-[24px] text-[#191C1E] leading-tight">Kategori</h1>
            <p class="font-inter text-[14px] text-msp-gray mt-0.5">Kelola kategori untuk berita dan konten.</p>
        </div>
        <a href="{{ route('admin.categories.create') }}"
           class="shrink-0 h-10 px-5 rounded-xl font-hanken font-bold text-[14px] text-[#071B3B] inline-flex items-center gap-2 hover:brightness-95 transition shadow-[0_2px_8px_rgba(242,167,27,0.2)]"
           style="background: linear-gradient(135deg, #F2A71B 0%, #FBC34C 100%)">
            <i class="fas fa-plus text-[11px]"></i>
            Tambah Kategori
        </a>
    </div>

    @if (session('success'))
        <div class="mb-5 flex items-center gap-3 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-xl text-[13px] font-inter">
            <i class="fas fa-check-circle text-green-500"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl border border-msp-border overflow-hidden shadow-[0_1px_4px_rgba(11,30,62,0.04)]">
        <table class="w-full">
            <caption class="sr-only">Daftar kategori</caption>
            <thead>
                <tr class="border-b border-msp-border bg-msp-bg/60">
                    <th scope="col" class="text-left font-hanken font-bold text-[11px] text-msp-gray-light uppercase tracking-wider px-5 py-3.5 w-10">#</th>
                    <th scope="col" class="text-left font-hanken font-bold text-[11px] text-msp-gray-light uppercase tracking-wider px-5 py-3.5">Nama Kategori</th>
                    <th scope="col" class="text-left font-hanken font-bold text-[11px] text-msp-gray-light uppercase tracking-wider px-5 py-3.5">Slug URL</th>
                    <th scope="col" class="text-right font-hanken font-bold text-[11px] text-msp-gray-light uppercase tracking-wider px-5 py-3.5 w-24">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr class="border-b border-msp-border hover:bg-msp-bg/50 transition group">
                        <td class="px-5 py-4 font-inter text-[13px] text-msp-gray-light">{{ $loop->iteration }}</td>
                        <td class="px-5 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-msp-blue/10 flex items-center justify-center shrink-0">
                                    <i class="fas fa-tag text-msp-blue text-[11px]"></i>
                                </div>
                                <span class="font-inter font-semibold text-[14px] text-[#191C1E]">{{ $category->name }}</span>
                            </div>
                        </td>
                        <td class="px-5 py-4">
                            <span class="font-mono text-[12px] text-msp-gray-light bg-msp-bg-alt px-2 py-1 rounded-lg border border-msp-border">{{ $category->slug }}</span>
                        </td>
                        <td class="px-5 py-4 text-right">
                            <div class="flex items-center justify-end gap-1.5">
                                <a href="{{ route('admin.categories.edit', $category) }}"
                                   class="w-8 h-8 rounded-lg bg-msp-bg-alt flex items-center justify-center text-msp-gray-light hover:text-msp-gold hover:bg-msp-gold/10 transition"
                                   title="Edit kategori">
                                    <i class="fas fa-pen text-[11px]"></i>
                                </a>
                                <div class="relative" x-data="{ open: false }">
                                    <button @click="open = !open"
                                            class="w-8 h-8 rounded-lg bg-msp-bg-alt flex items-center justify-center text-msp-gray-light hover:text-msp-danger hover:bg-red-50 transition"
                                            title="Hapus kategori">
                                        <i class="fas fa-trash text-[11px]"></i>
                                    </button>
                                    <div x-show="open" @click.away="open = false" x-cloak
                                         class="absolute right-0 top-full mt-2 w-44 bg-white rounded-xl shadow-lg border border-msp-border py-2 px-3 z-20">
                                        <p class="font-inter text-[12px] text-msp-gray mb-2.5">Hapus <strong>{{ $category->name }}</strong>? Berita terkait tidak akan terhapus.</p>
                                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
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
                        <td colspan="4" class="px-5 py-16 text-center">
                            <div class="w-16 h-16 rounded-2xl bg-msp-bg-alt flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-tags text-3xl text-msp-border"></i>
                            </div>
                            <p class="font-hanken font-semibold text-[15px] text-[#191C1E] mb-1">Belum ada kategori</p>
                            <p class="font-inter text-[13px] text-msp-gray-light mb-4">Buat kategori untuk mengorganisir konten berita.</p>
                            <a href="{{ route('admin.categories.create') }}"
                               class="inline-flex items-center gap-2 h-9 px-5 rounded-lg font-hanken font-bold text-[13px] text-[#071B3B]"
                               style="background: linear-gradient(135deg, #F2A71B 0%, #FBC34C 100%)">
                                <i class="fas fa-plus text-[10px]"></i> Tambah Kategori Pertama
                            </a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <x-admin-pagination :paginator="$categories" />
</div>
</x-admin-dashboard-layout>
