@section('title', 'Berita')

<x-admin-dashboard-layout>
<div class="max-w-[960px]">

    {{-- Page header --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="font-space font-bold text-[24px] text-[#191C1E] leading-tight">Berita</h1>
            <p class="font-inter text-[14px] text-msp-gray mt-0.5">Kelola artikel, pengumuman, dan berita perusahaan.</p>
        </div>
        <a href="{{ route('admin.news.create') }}"
           class="shrink-0 h-10 px-5 rounded-xl font-hanken font-bold text-[14px] text-[#071B3B] inline-flex items-center gap-2 hover:brightness-95 transition shadow-[0_2px_8px_rgba(242,167,27,0.2)]"
           style="background: linear-gradient(135deg, #F2A71B 0%, #FBC34C 100%)">
            <i class="fas fa-plus text-[11px]"></i>
            Tambah Berita
        </a>
    </div>

    @if (session('success'))
        <div class="mb-5 flex items-center gap-3 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-xl text-[13px] font-inter">
            <i class="fas fa-check-circle text-green-500"></i>
            {{ session('success') }}
        </div>
    @endif

    {{-- Table card --}}
    <div class="bg-white rounded-2xl border border-msp-border overflow-hidden shadow-[0_1px_4px_rgba(11,30,62,0.04)]">

        {{-- Filter bar --}}
        <form method="GET" action="{{ route('admin.news.index') }}"
              class="px-5 py-3.5 border-b border-msp-border flex items-center gap-3 flex-wrap bg-msp-bg/40">
            <div class="relative flex-1 min-w-[180px] max-w-xs">
                <i class="fas fa-search absolute left-3.5 top-1/2 -translate-y-1/2 text-msp-gray-light text-[12px]"></i>
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Cari judul berita..."
                       class="pl-9 pr-3 h-9 w-full bg-white rounded-lg font-inter text-[13px] text-[#44474E] placeholder:text-msp-gray-light border border-msp-border focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20 focus:outline-none transition">
            </div>

            <select name="category" onchange="this.form.submit()"
                    class="h-9 px-3 pr-8 bg-white rounded-lg font-inter text-[13px] text-[#44474E] border border-msp-border focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20 focus:outline-none transition appearance-none cursor-pointer">
                <option value="">Semua Kategori</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
            </select>

            <select name="status" onchange="this.form.submit()"
                    class="h-9 px-3 pr-8 bg-white rounded-lg font-inter text-[13px] text-[#44474E] border border-msp-border focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20 focus:outline-none transition appearance-none cursor-pointer">
                <option value="">Semua Status</option>
                <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
            </select>

            @if(request()->hasAny(['search','category','status']))
                <a href="{{ route('admin.news.index') }}"
                   class="h-9 px-3 rounded-lg font-inter text-[13px] text-msp-gray-light border border-msp-border bg-white hover:bg-msp-bg-alt transition flex items-center gap-1.5">
                    <i class="fas fa-times text-[11px]"></i> Reset
                </a>
            @endif
        </form>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="w-full">
                <caption class="sr-only">Daftar berita dan artikel</caption>
                <thead>
                    <tr class="border-b border-msp-border">
                        <th scope="col" class="text-left px-5 py-3.5 font-hanken font-bold text-[11px] text-msp-gray-light uppercase tracking-wider w-16">Thumb</th>
                        <th scope="col" class="text-left px-5 py-3.5 font-hanken font-bold text-[11px] text-msp-gray-light uppercase tracking-wider">Judul Artikel</th>
                        <th scope="col" class="text-left px-5 py-3.5 font-hanken font-bold text-[11px] text-msp-gray-light uppercase tracking-wider w-28 hidden md:table-cell">Kategori</th>
                        <th scope="col" class="text-left px-5 py-3.5 font-hanken font-bold text-[11px] text-msp-gray-light uppercase tracking-wider w-24">Status</th>
                        <th scope="col" class="text-left px-5 py-3.5 font-hanken font-bold text-[11px] text-msp-gray-light uppercase tracking-wider w-28 hidden lg:table-cell">Tanggal</th>
                        <th scope="col" class="text-right px-5 py-3.5 font-hanken font-bold text-[11px] text-msp-gray-light uppercase tracking-wider w-24">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($news as $item)
                        <tr class="border-b border-msp-border hover:bg-msp-bg/50 transition group">
                            <td class="px-5 py-4">
                                <div class="w-12 h-12 rounded-xl bg-msp-light overflow-hidden shrink-0">
                                    @if($item->thumbnail)
                                        <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <i class="fas fa-image text-[#7686AC] text-sm"></i>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td class="px-5 py-4">
                                <div class="font-inter font-medium text-[14px] text-[#191C1E] max-w-[280px]">
                                    <span class="line-clamp-2">{{ $item->title }}</span>
                                </div>
                                @if($item->is_featured)
                                    <span class="inline-flex items-center gap-1 mt-1 px-1.5 py-0.5 rounded text-[10px] font-inter font-bold bg-msp-gold/10 text-msp-gold">
                                        <i class="fas fa-star text-[8px]"></i> Featured
                                    </span>
                                @endif
                            </td>
                            <td class="px-5 py-4 hidden md:table-cell">
                                @if($item->category)
                                    <span class="inline-block px-2.5 py-1 rounded-lg text-[11px] font-inter font-semibold bg-msp-bg-alt text-msp-gray border border-msp-border">
                                        {{ $item->category->name }}
                                    </span>
                                @else
                                    <span class="text-[12px] text-msp-gray-light">—</span>
                                @endif
                            </td>
                            <td class="px-5 py-4">
                                @php $isPublished = $item->status === 'published'; @endphp
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-inter font-semibold
                                    {{ $isPublished ? 'bg-green-50 text-green-700 border border-green-200' : 'bg-msp-bg-alt text-msp-gray border border-msp-border' }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $isPublished ? 'bg-green-500' : 'bg-msp-gray-light' }}"></span>
                                    {{ $isPublished ? 'Live' : 'Draft' }}
                                </span>
                            </td>
                            <td class="px-5 py-4 hidden lg:table-cell">
                                <div class="font-inter text-[13px] text-msp-gray-light">
                                    {{ $item->published_at?->format('d M Y') ?? $item->created_at->format('d M Y') }}
                                </div>
                            </td>
                            <td class="px-5 py-4">
                                <div class="flex items-center justify-end gap-1.5">
                                    <a href="{{ route('admin.news.edit', $item) }}"
                                       class="w-8 h-8 rounded-lg bg-msp-bg-alt flex items-center justify-center text-msp-gray-light hover:text-msp-gold hover:bg-msp-gold/10 transition"
                                       title="Edit berita">
                                        <i class="fas fa-pen text-[11px]"></i>
                                    </a>
                                    <div class="relative" x-data="{ open: false }">
                                        <button @click="open = !open" type="button"
                                                class="w-8 h-8 rounded-lg bg-msp-bg-alt flex items-center justify-center text-msp-gray-light hover:text-msp-danger hover:bg-red-50 transition"
                                                title="Hapus berita">
                                            <i class="fas fa-trash text-[11px]"></i>
                                        </button>
                                        <div x-show="open" @click.away="open = false" x-cloak
                                             class="absolute right-0 top-full mt-2 w-44 bg-white rounded-xl shadow-lg border border-msp-border py-2 px-3 z-20">
                                            <p class="font-inter text-[12px] text-msp-gray mb-2.5">Hapus berita ini? Tindakan tidak dapat dibatalkan.</p>
                                            <form action="{{ route('admin.news.destroy', $item) }}" method="POST">
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
                            <td colspan="6" class="px-5 py-16 text-center">
                                <div class="w-16 h-16 rounded-2xl bg-msp-bg-alt flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-newspaper text-3xl text-msp-border"></i>
                                </div>
                                <p class="font-hanken font-semibold text-[15px] text-[#191C1E] mb-1">Belum ada berita</p>
                                <p class="font-inter text-[13px] text-msp-gray-light mb-4">Mulai dengan menambahkan artikel pertama Anda.</p>
                                <a href="{{ route('admin.news.create') }}"
                                   class="inline-flex items-center gap-2 h-9 px-5 rounded-lg font-hanken font-bold text-[13px] text-[#071B3B]"
                                   style="background: linear-gradient(135deg, #F2A71B 0%, #FBC34C 100%)">
                                    <i class="fas fa-plus text-[10px]"></i> Tambah Berita Pertama
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <x-admin-pagination :paginator="$news" />
    </div>
</div>
</x-admin-dashboard-layout>
