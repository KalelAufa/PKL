@section('title', 'Dashboard')

<x-admin-dashboard-layout>

    {{-- Page header --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="font-space font-bold text-[26px] text-[#191C1E] leading-tight">Dashboard</h1>
            <p class="font-inter text-[14px] text-msp-gray mt-1">Selamat datang, <span class="font-semibold text-msp-navy">{{ Auth::user()->name }}</span>. Berikut ringkasan terbaru operasional.</p>
        </div>
        <div class="flex items-center gap-2 shrink-0">
            <a href="{{ route('admin.messages.index', ['filter' => 'unread']) }}"
               class="h-9 px-4 border border-msp-border rounded-lg font-inter text-[13px] text-msp-gray flex items-center gap-2 hover:bg-msp-bg-alt transition">
                <i class="fas fa-envelope text-[12px]"></i>
                Pesan Masuk
                @if($pesanBaru > 0)
                    <span class="px-1.5 py-0.5 bg-msp-gold text-[#071B3B] rounded text-[10px] font-bold">{{ $pesanBaru }}</span>
                @endif
            </a>
            <a href="{{ route('admin.news.create') }}"
               class="h-9 px-5 rounded-lg font-hanken font-bold text-[14px] text-[#071B3B] inline-flex items-center gap-2 hover:brightness-95 transition shadow-[0_2px_8px_rgba(242,167,27,0.25)]"
               style="background: linear-gradient(135deg, #F2A71B 0%, #FBC34C 100%)">
                <i class="fas fa-plus text-[11px]"></i>
                Tambah Berita
            </a>
        </div>
    </div>

    {{-- Stat cards --}}
    <div class="grid grid-cols-2 xl:grid-cols-4 gap-4 mb-8">

        {{-- Total Berita --}}
        <a href="{{ route('admin.news.index') }}"
           class="group relative bg-white rounded-2xl border border-msp-border overflow-hidden hover:shadow-lg hover:border-msp-blue/30 transition duration-200 flex flex-col">
            <div class="absolute top-0 left-0 right-0 h-1 rounded-t-2xl" style="background: linear-gradient(90deg, #2A3F9E 0%, #5470d4 100%)"></div>
            <div class="p-5 pt-6 flex flex-col flex-1">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-11 h-11 rounded-xl bg-msp-blue/10 flex items-center justify-center shadow-sm">
                        <i class="fas fa-newspaper text-msp-blue text-[16px]"></i>
                    </div>
                    <div class="w-7 h-7 rounded-lg bg-msp-bg flex items-center justify-center text-msp-gray-light group-hover:text-msp-blue group-hover:bg-msp-blue/10 transition">
                        <i class="fas fa-arrow-right text-[10px]"></i>
                    </div>
                </div>
                <div class="font-hanken font-bold text-[32px] text-[#191C1E] leading-none tracking-tight">{{ $totalBerita }}</div>
                <div class="font-hanken font-semibold text-[12px] text-msp-gray uppercase tracking-wider mt-2">Total Berita</div>
            </div>
        </a>

        {{-- Total Layanan --}}
        <a href="{{ route('admin.services.index') }}"
           class="group relative bg-white rounded-2xl border border-msp-border overflow-hidden hover:shadow-lg hover:border-msp-gold/30 transition duration-200 flex flex-col">
            <div class="absolute top-0 left-0 right-0 h-1 rounded-t-2xl" style="background: linear-gradient(90deg, #F2A71B 0%, #FBC34C 100%)"></div>
            <div class="p-5 pt-6 flex flex-col flex-1">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-11 h-11 rounded-xl bg-msp-gold/10 flex items-center justify-center shadow-sm">
                        <i class="fas fa-cogs text-msp-gold text-[16px]"></i>
                    </div>
                    <div class="w-7 h-7 rounded-lg bg-msp-bg flex items-center justify-center text-msp-gray-light group-hover:text-msp-gold group-hover:bg-msp-gold/10 transition">
                        <i class="fas fa-arrow-right text-[10px]"></i>
                    </div>
                </div>
                <div class="font-hanken font-bold text-[32px] text-[#191C1E] leading-none tracking-tight">{{ $totalLayanan }}</div>
                <div class="font-hanken font-semibold text-[12px] text-msp-gray uppercase tracking-wider mt-2">Total Layanan</div>
            </div>
        </a>

        {{-- Pesan Baru --}}
        <a href="{{ route('admin.messages.index') }}"
           class="group relative bg-white rounded-2xl border overflow-hidden hover:shadow-lg transition duration-200 flex flex-col
               {{ $pesanBaru > 0 ? 'border-amber-200 ring-1 ring-amber-100' : 'border-msp-border hover:border-green-200' }}">
            <div class="absolute top-0 left-0 right-0 h-1 rounded-t-2xl {{ $pesanBaru > 0 ? '' : '' }}"
                 style="background: {{ $pesanBaru > 0 ? 'linear-gradient(90deg,#F2A71B 0%,#FBC34C 100%)' : 'linear-gradient(90deg,#22c55e 0%,#4ade80 100%)' }}"></div>
            <div class="p-5 pt-6 flex flex-col flex-1">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-11 h-11 rounded-xl flex items-center justify-center shadow-sm {{ $pesanBaru > 0 ? 'bg-amber-50' : 'bg-green-50' }}">
                        <i class="fas fa-envelope text-[16px] {{ $pesanBaru > 0 ? 'text-amber-500' : 'text-green-500' }}"></i>
                    </div>
                    @if($pesanBaru > 0)
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-hanken font-bold bg-amber-50 text-amber-600 border border-amber-200">
                            Baru
                        </span>
                    @else
                        <div class="w-7 h-7 rounded-lg bg-msp-bg flex items-center justify-center text-msp-gray-light group-hover:text-green-500 group-hover:bg-green-50 transition">
                            <i class="fas fa-check text-[10px]"></i>
                        </div>
                    @endif
                </div>
                <div class="font-hanken font-bold text-[32px] text-[#191C1E] leading-none tracking-tight">{{ $pesanBaru }}</div>
                <div class="font-hanken font-semibold text-[12px] uppercase tracking-wider mt-2 {{ $pesanBaru > 0 ? 'text-amber-500' : 'text-msp-gray' }}">
                    {{ $pesanBaru > 0 ? 'Belum Dibaca' : 'Semua Dibaca' }}
                </div>
            </div>
        </a>

        {{-- Total Tim --}}
        <a href="{{ route('admin.team-members.index') }}"
           class="group relative bg-white rounded-2xl border border-msp-border overflow-hidden hover:shadow-lg hover:border-msp-navy/20 transition duration-200 flex flex-col">
            <div class="absolute top-0 left-0 right-0 h-1 rounded-t-2xl" style="background: linear-gradient(90deg, #0B2145 0%, #2A3F9E 100%)"></div>
            <div class="p-5 pt-6 flex flex-col flex-1">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-11 h-11 rounded-xl bg-msp-navy/8 flex items-center justify-center shadow-sm">
                        <i class="fas fa-user-tie text-msp-navy text-[16px]"></i>
                    </div>
                    <div class="w-7 h-7 rounded-lg bg-msp-bg flex items-center justify-center text-msp-gray-light group-hover:text-msp-navy group-hover:bg-msp-navy/10 transition">
                        <i class="fas fa-arrow-right text-[10px]"></i>
                    </div>
                </div>
                <div class="font-hanken font-bold text-[32px] text-[#191C1E] leading-none tracking-tight">{{ $totalTim }}</div>
                <div class="font-hanken font-semibold text-[12px] text-msp-gray uppercase tracking-wider mt-2">Anggota Tim</div>
            </div>
        </a>
    </div>

    {{-- Main content grid --}}
    <div class="grid grid-cols-1 xl:grid-cols-[1fr_360px] gap-6">

        {{-- Recent news table --}}
        <div class="bg-white rounded-2xl border border-msp-border overflow-hidden">
            <div class="flex items-center justify-between px-6 py-4 border-b border-msp-border">
                <div>
                    <h2 class="font-hanken font-bold text-[16px] text-[#191C1E]">Berita Terbaru</h2>
                    <p class="font-inter text-[12px] text-msp-gray-light mt-0.5">Artikel yang baru ditambahkan</p>
                </div>
                <a href="{{ route('admin.news.index') }}"
                   class="font-inter font-semibold text-[13px] text-msp-gold hover:text-msp-navy transition flex items-center gap-1.5">
                    Lihat Semua <i class="fas fa-arrow-right text-[10px]"></i>
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-msp-bg border-b border-msp-border">
                            <th scope="col" class="text-left px-5 py-3 font-hanken font-bold text-[11px] text-msp-gray-light uppercase tracking-wider w-14">Thumb</th>
                            <th scope="col" class="text-left px-5 py-3 font-hanken font-bold text-[11px] text-msp-gray-light uppercase tracking-wider">Judul</th>
                            <th scope="col" class="text-left px-5 py-3 font-hanken font-bold text-[11px] text-msp-gray-light uppercase tracking-wider w-24 hidden sm:table-cell">Tanggal</th>
                            <th scope="col" class="text-left px-5 py-3 font-hanken font-bold text-[11px] text-msp-gray-light uppercase tracking-wider w-24">Status</th>
                            <th scope="col" class="text-left px-5 py-3 font-hanken font-bold text-[11px] text-msp-gray-light uppercase tracking-wider w-16">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentNews as $news)
                            <tr class="border-b border-msp-border hover:bg-msp-bg/50 transition">
                                <td class="px-5 py-3.5">
                                    <div class="w-11 h-11 rounded-lg bg-msp-light overflow-hidden shrink-0">
                                        @if($news->thumbnail)
                                            <img src="{{ $news->thumbnail_url }}" alt="" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center">
                                                <i class="fas fa-image text-[#7686AC] text-sm"></i>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-5 py-3.5">
                                    <div class="font-inter font-medium text-[13px] text-[#191C1E] max-w-[220px] truncate">{{ $news->title }}</div>
                                    @if($news->category)
                                        <div class="font-inter text-[11px] text-msp-gray-light mt-0.5">{{ $news->category->name }}</div>
                                    @endif
                                </td>
                                <td class="px-5 py-3.5 hidden sm:table-cell">
                                    <div class="font-inter text-[12px] text-msp-gray-light">{{ $news->published_at?->format('d M Y') ?? $news->created_at->format('d M Y') }}</div>
                                </td>
                                <td class="px-5 py-3.5">
                                    @php $isPublished = $news->status === 'published'; @endphp
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[11px] font-inter font-semibold
                                        {{ $isPublished ? 'bg-green-50 text-green-700' : 'bg-msp-bg-alt text-msp-gray border border-msp-border' }}">
                                        <span class="w-1.5 h-1.5 rounded-full {{ $isPublished ? 'bg-green-500' : 'bg-msp-gray-light' }}"></span>
                                        {{ $isPublished ? 'Live' : 'Draft' }}
                                    </span>
                                </td>
                                <td class="px-5 py-3.5">
                                    <a href="{{ route('admin.news.edit', $news) }}"
                                       class="w-7 h-7 rounded-lg bg-msp-bg-alt flex items-center justify-center text-msp-gray-light hover:text-msp-gold hover:bg-msp-gold/10 transition">
                                        <i class="fas fa-pen text-[11px]"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-5 py-12 text-center">
                                    <i class="fas fa-newspaper text-4xl text-msp-border block mx-auto mb-3"></i>
                                    <p class="font-inter text-[14px] text-msp-gray-light">Belum ada berita.</p>
                                    <a href="{{ route('admin.news.create') }}" class="mt-2 inline-flex items-center gap-1 font-inter text-[13px] text-msp-gold hover:underline">
                                        Tambah berita pertama <i class="fas fa-arrow-right text-[10px]"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Recent messages --}}
        <div class="bg-white rounded-2xl border border-msp-border overflow-hidden">
            <div class="flex items-center justify-between px-5 py-4 border-b border-msp-border">
                <div>
                    <h2 class="font-hanken font-bold text-[16px] text-[#191C1E]">Pesan Masuk</h2>
                    <p class="font-inter text-[12px] text-msp-gray-light mt-0.5">Pesan terbaru dari klien</p>
                </div>
                @if($pesanBaru > 0)
                    <span class="px-2 py-0.5 rounded-full font-inter font-bold text-[11px] text-[#071B3B] bg-msp-gold">
                        {{ $pesanBaru }} baru
                    </span>
                @endif
            </div>

            <div class="divide-y divide-msp-border">
                @forelse($recentMessages as $msg)
                    <a href="{{ route('admin.messages.index') }}"
                       class="flex items-start gap-3 px-5 py-4 hover:bg-msp-bg/60 transition {{ !$msg->is_read ? 'bg-msp-gold/5' : '' }}">
                        <div class="w-9 h-9 rounded-full bg-msp-sidebar flex items-center justify-center text-white text-[13px] font-semibold shrink-0">
                            {{ strtoupper(substr($msg->name, 0, 1)) }}
                        </div>
                        <div class="min-w-0 flex-1">
                            <div class="flex items-center justify-between gap-2">
                                <span class="font-hanken font-semibold text-[14px] text-[#191C1E] truncate {{ !$msg->is_read ? 'font-bold' : '' }}">
                                    {{ $msg->name }}
                                </span>
                                <span class="font-inter text-[11px] text-msp-gray-light shrink-0">{{ $msg->created_at->diffForHumans(null, true) }}</span>
                            </div>
                            <div class="font-inter text-[12px] text-msp-gray-light truncate mt-0.5">{{ $msg->email }}</div>
                            @if($msg->service)
                                <div class="inline-flex items-center gap-1 mt-1.5 px-2 py-0.5 bg-msp-bg-alt rounded-full">
                                    <i class="fas fa-cogs text-[9px] text-msp-gray-light"></i>
                                    <span class="font-inter text-[11px] text-msp-gray truncate max-w-[160px]">{{ $msg->service }}</span>
                                </div>
                            @endif
                        </div>
                        @if(!$msg->is_read)
                            <div class="w-2 h-2 rounded-full bg-msp-gold shrink-0 mt-1.5"></div>
                        @endif
                    </a>
                @empty
                    <div class="px-5 py-12 text-center">
                        <i class="fas fa-inbox text-4xl text-msp-border block mx-auto mb-3"></i>
                        <p class="font-inter text-[14px] text-msp-gray-light">Belum ada pesan.</p>
                    </div>
                @endforelse
            </div>

            @if($recentMessages->count() > 0)
                <div class="px-5 py-3.5 border-t border-msp-border bg-msp-bg/40">
                    <a href="{{ route('admin.messages.index') }}"
                       class="block w-full py-2 text-center font-hanken font-semibold text-[13px] text-msp-navy border border-msp-border rounded-xl hover:bg-white hover:border-msp-navy/20 transition">
                        Buka Kotak Masuk
                    </a>
                </div>
            @endif
        </div>
    </div>

</x-admin-dashboard-layout>
