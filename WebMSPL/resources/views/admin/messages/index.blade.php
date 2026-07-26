@section('title', 'Pesan Masuk')

<x-admin-dashboard-layout>
<div class="flex gap-6 h-full" x-data="messagesApp()">

    {{-- ============ LEFT: Message list ============ --}}
    <div class="flex-1 min-w-0">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
            <div>
                <h1 class="font-space font-bold text-[24px] text-[#191C1E] leading-tight">Pesan Masuk</h1>
                <p class="font-inter text-[14px] text-msp-gray mt-0.5">Inquiry dan komunikasi dari klien potensial.</p>
            </div>
        </div>

        @if (session('success'))
            <div class="mb-5 flex items-center gap-3 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-xl text-[13px] font-inter">
                <i class="fas fa-check-circle text-green-500"></i>
                {{ session('success') }}
            </div>
        @endif

        {{-- Filter tabs --}}
        <div class="flex items-center gap-1.5 mb-5 bg-white border border-msp-border rounded-xl p-1 w-fit">
            <a href="{{ route('admin.messages.index') }}"
               class="h-8 px-4 rounded-lg font-inter font-medium text-[13px] transition inline-flex items-center
                {{ $filter === 'all' ? 'bg-msp-navy text-white shadow-sm' : 'text-msp-gray hover:bg-msp-bg-alt' }}">
                Semua
            </a>
            <a href="{{ route('admin.messages.index', ['filter' => 'unread']) }}"
               class="h-8 px-4 rounded-lg font-inter font-medium text-[13px] transition inline-flex items-center gap-2
                {{ $filter === 'unread' ? 'bg-msp-gold text-[#071B3B] shadow-sm' : 'text-msp-gray hover:bg-msp-bg-alt' }}">
                Belum Dibaca
                @php $unread = $messages->where('is_read', false)->count(); @endphp
                @if($unread > 0)
                    <span class="w-5 h-5 rounded-full {{ $filter === 'unread' ? 'bg-[#071B3B]/20' : 'bg-msp-gold text-[#071B3B]' }} text-[10px] font-bold flex items-center justify-center">{{ $unread }}</span>
                @endif
            </a>
            <a href="{{ route('admin.messages.index', ['filter' => 'read']) }}"
               class="h-8 px-4 rounded-lg font-inter font-medium text-[13px] transition inline-flex items-center
                {{ $filter === 'read' ? 'bg-msp-navy text-white shadow-sm' : 'text-msp-gray hover:bg-msp-bg-alt' }}">
                Sudah Dibaca
            </a>
        </div>

        {{-- Table --}}
        <div class="bg-white rounded-2xl border border-msp-border overflow-hidden shadow-[0_1px_4px_rgba(11,30,62,0.04)]">
            <table class="w-full">
                <caption class="sr-only">Daftar pesan masuk</caption>
                <thead>
                    <tr class="border-b border-msp-border bg-msp-bg/60">
                        <th scope="col" class="text-left font-hanken font-bold text-[11px] text-msp-gray-light uppercase tracking-wider px-5 py-3.5">Pengirim</th>
                        <th scope="col" class="text-left font-hanken font-bold text-[11px] text-msp-gray-light uppercase tracking-wider px-5 py-3.5 hidden md:table-cell">Perusahaan</th>
                        <th scope="col" class="text-left font-hanken font-bold text-[11px] text-msp-gray-light uppercase tracking-wider px-5 py-3.5 hidden lg:table-cell">Layanan</th>
                        <th scope="col" class="text-left font-hanken font-bold text-[11px] text-msp-gray-light uppercase tracking-wider px-5 py-3.5 w-24">Status</th>
                        <th scope="col" class="text-left font-hanken font-bold text-[11px] text-msp-gray-light uppercase tracking-wider px-5 py-3.5 w-32 hidden xl:table-cell">Tanggal</th>
                        <th scope="col" class="text-right font-hanken font-bold text-[11px] text-msp-gray-light uppercase tracking-wider px-5 py-3.5 w-20">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($messages as $message)
                        <tr class="border-b border-msp-border hover:bg-msp-bg/50 transition cursor-pointer {{ !$message->is_read ? 'bg-msp-gold/3' : '' }}"
                            @click="openDetail({{ $message->id }})"
                            tabindex="0" @keydown.enter="openDetail({{ $message->id }})"
                            role="button" aria-label="Buka pesan dari {{ $message->name }}">
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-full bg-msp-sidebar flex items-center justify-center text-white font-hanken font-semibold text-[13px] shrink-0">
                                        {{ strtoupper(substr($message->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="font-inter text-[14px] text-[#191C1E] {{ !$message->is_read ? 'font-bold' : 'font-medium' }}">
                                            {{ $message->name }}
                                        </div>
                                        <div class="font-inter text-[11px] text-msp-gray-light">{{ $message->email }}</div>
                                    </div>
                                    @if(!$message->is_read)
                                        <span class="ml-1 w-2 h-2 rounded-full bg-msp-gold shrink-0"></span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-5 py-4 font-inter text-[13px] text-msp-gray hidden md:table-cell">
                                {{ $message->company ?? '—' }}
                            </td>
                            <td class="px-5 py-4 font-inter text-[13px] text-msp-gray hidden lg:table-cell">
                                {{ $message->service ?? '—' }}
                            </td>
                            <td class="px-5 py-4">
                                @if ($message->is_read)
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[11px] font-inter font-semibold bg-green-50 text-green-700 border border-green-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Dibaca
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[11px] font-inter font-semibold bg-msp-gold/10 text-msp-gold border border-msp-gold/20">
                                        <span class="w-1.5 h-1.5 rounded-full bg-msp-gold"></span> Baru
                                    </span>
                                @endif
                            </td>
                            <td class="px-5 py-4 font-inter text-[12px] text-msp-gray-light whitespace-nowrap hidden xl:table-cell">
                                {{ $message->created_at->format('d M Y, H:i') }}
                            </td>
                            <td class="px-5 py-4 text-right">
                                <div class="flex items-center justify-end gap-1.5">
                                    <button @click.stop="openDetail({{ $message->id }})"
                                            class="w-8 h-8 rounded-lg bg-msp-bg-alt flex items-center justify-center text-msp-gray-light hover:text-msp-gold hover:bg-msp-gold/10 transition"
                                            title="Lihat detail">
                                        <i class="fas fa-eye text-[11px]"></i>
                                    </button>
                                    <div class="relative" x-data="{ open: false }">
                                        <button @click.stop="open = !open"
                                                class="w-8 h-8 rounded-lg bg-msp-bg-alt flex items-center justify-center text-msp-gray-light hover:text-msp-danger hover:bg-red-50 transition"
                                                title="Hapus pesan">
                                            <i class="fas fa-trash text-[11px]"></i>
                                        </button>
                                        <div x-show="open" @click.away="open = false" x-cloak
                                             class="absolute right-0 top-full mt-2 w-44 bg-white rounded-xl shadow-lg border border-msp-border py-2 px-3 z-20">
                                            <p class="font-inter text-[12px] text-msp-gray mb-2.5">Hapus pesan dari <strong>{{ $message->name }}</strong>?</p>
                                            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST">
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
                                    <i class="fas fa-inbox text-3xl text-msp-border"></i>
                                </div>
                                <p class="font-hanken font-semibold text-[15px] text-[#191C1E] mb-1">Tidak ada pesan</p>
                                <p class="font-inter text-[13px] text-msp-gray-light">
                                    {{ $filter !== 'all' ? 'Tidak ada pesan dengan filter ini.' : 'Belum ada pesan masuk dari klien.' }}
                                </p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <x-admin-pagination :paginator="$messages" />
    </div>

    {{-- ============ RIGHT: Detail panel ============ --}}
    <div x-show="selectedId !== null" x-cloak
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 translate-x-4"
         x-transition:enter-end="opacity-100 translate-x-0"
         class="w-[400px] shrink-0 hidden xl:block">
        <div class="bg-white border border-msp-border rounded-2xl overflow-hidden sticky top-6 shadow-[0_4px_24px_rgba(11,30,62,0.08)]">
            @foreach ($messages as $message)
                <div x-show="selectedId === {{ $message->id }}">

                    {{-- Header --}}
                    <div class="px-5 py-4 border-b border-msp-border flex items-center justify-between bg-msp-bg/40">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-envelope text-msp-gray-light text-[13px]"></i>
                            <span class="font-hanken font-bold text-[15px] text-[#191C1E]">Detail Pesan</span>
                        </div>
                        <button @click="closeDetail()"
                                class="w-8 h-8 rounded-lg bg-msp-bg-alt flex items-center justify-center text-msp-gray-light hover:text-msp-navy transition">
                            <i class="fas fa-times text-[12px]"></i>
                        </button>
                    </div>

                    {{-- Scrollable body --}}
                    <div class="p-5 space-y-5 max-h-[calc(100vh-300px)] overflow-y-auto">

                        {{-- Sender info --}}
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-full bg-msp-sidebar flex items-center justify-center text-white text-[18px] font-hanken font-semibold shrink-0 shadow-sm">
                                {{ strtoupper(substr($message->name, 0, 1)) }}
                            </div>
                            <div>
                                <h4 class="font-hanken font-bold text-[16px] text-[#191C1E]">{{ $message->name }}</h4>
                                <p class="font-inter text-[12px] text-msp-gray-light">{{ $message->company ?? 'Tidak ada perusahaan' }}</p>
                            </div>
                            @if(!$message->is_read)
                                <span class="ml-auto px-2 py-0.5 rounded-full bg-msp-gold/10 text-msp-gold text-[10px] font-bold border border-msp-gold/20">BARU</span>
                            @endif
                        </div>

                        {{-- Contact info --}}
                        <div class="bg-msp-bg rounded-xl p-4 space-y-2.5">
                            <div class="flex items-center gap-2.5 text-[13px]">
                                <div class="w-6 h-6 rounded-lg bg-msp-blue/10 flex items-center justify-center shrink-0">
                                    <i class="fas fa-envelope text-msp-blue text-[10px]"></i>
                                </div>
                                <a href="mailto:{{ $message->email }}" class="font-inter text-msp-blue hover:underline truncate">{{ $message->email }}</a>
                            </div>
                            @if($message->phone)
                            @php
                                $waNumber = preg_replace('/[^0-9]/', '', $message->phone);
                                if (str_starts_with($waNumber, '0')) {
                                    $waNumber = '62' . substr($waNumber, 1);
                                }
                                $waLink = 'https://wa.me/' . $waNumber;
                            @endphp
                            <div class="flex items-center gap-2.5 text-[13px]">
                                <div class="w-6 h-6 rounded-lg bg-green-100 flex items-center justify-center shrink-0">
                                    <i class="fab fa-whatsapp text-green-600 text-[11px]"></i>
                                </div>
                                <a href="{{ $waLink }}" target="_blank" rel="noopener noreferrer"
                                   class="font-inter text-green-600 hover:underline">{{ $message->phone }}</a>
                            </div>
                            @endif
                        </div>

                        {{-- Meta --}}
                        <div class="grid grid-cols-2 gap-3">
                            <div class="bg-msp-bg rounded-xl p-3">
                                <p class="font-hanken font-bold text-[10px] text-msp-gray-light uppercase tracking-wider mb-1">Layanan</p>
                                <p class="font-inter font-medium text-[13px] text-[#191C1E]">{{ $message->service ?? '—' }}</p>
                            </div>
                            <div class="bg-msp-bg rounded-xl p-3">
                                <p class="font-hanken font-bold text-[10px] text-msp-gray-light uppercase tracking-wider mb-1">Tanggal</p>
                                <p class="font-inter font-medium text-[13px] text-[#191C1E]">{{ $message->created_at->format('d M Y') }}</p>
                            </div>
                        </div>

                        {{-- Message body --}}
                        <div>
                            <p class="font-hanken font-bold text-[11px] text-msp-gray-light uppercase tracking-wider mb-2">Isi Pesan</p>
                            <div class="bg-white border border-msp-border rounded-xl p-4">
                                <p class="font-inter text-[13px] text-[#191C1E] whitespace-pre-wrap leading-relaxed">{{ $message->message }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Footer actions --}}
                    <div class="px-5 py-4 border-t border-msp-border" x-data="{ confirmDelete: false }">
                        <div x-show="!confirmDelete">
                            @php
                                $waNum = preg_replace('/[^0-9]/', '', $message->phone ?? '');
                                if (str_starts_with($waNum, '0')) $waNum = '62' . substr($waNum, 1);
                                $waUrl = $message->phone ? 'https://wa.me/' . $waNum : null;
                            @endphp
                            @php
                                $subject = rawurlencode('Re: Inquiry dari ' . $message->name . ($message->company ? ' (' . $message->company . ')' : ''));
                                $body = rawurlencode(
                                    "Yth. " . $message->name . ",\n\n" .
                                    "Terima kasih telah menghubungi PT Mentari Satya Perkasa.\n\n" .
                                    "---\n" .
                                    "Pesan Anda:\n" . $message->message . "\n---\n\n" .
                                    "Hormat kami,\nTim PT Mentari Satya Perkasa"
                                );
                                $mailtoUrl = 'https://mail.google.com/mail/?view=cm&fs=1&to=' . rawurlencode($message->email) . '&su=' . $subject . '&body=' . $body;
                            @endphp
                            <div class="flex flex-col gap-2">
                                <div class="grid grid-cols-2 gap-2">
                                    <a href="{{ $mailtoUrl }}" target="_blank" rel="noopener noreferrer"
                                       class="h-9 rounded-xl font-inter font-medium text-[13px] text-msp-navy border border-msp-border bg-white inline-flex items-center justify-center gap-1.5 hover:bg-msp-bg-alt transition">
                                        <i class="fas fa-envelope text-[11px]"></i> Email
                                    </a>
                                    @if($waUrl)
                                    <a href="{{ $waUrl }}" target="_blank" rel="noopener noreferrer"
                                       class="h-9 rounded-xl font-inter font-medium text-[13px] text-green-700 border border-green-200 bg-green-50 inline-flex items-center justify-center gap-1.5 hover:bg-green-100 transition">
                                        <i class="fab fa-whatsapp text-[13px]"></i> WhatsApp
                                    </a>
                                    @else
                                    <span class="h-9 rounded-xl font-inter text-[12px] text-msp-gray-light border border-msp-border bg-msp-bg inline-flex items-center justify-center gap-1.5 opacity-50 cursor-not-allowed">
                                        <i class="fab fa-whatsapp text-[13px]"></i> WhatsApp
                                    </span>
                                    @endif
                                </div>
                                <button @click="confirmDelete = true"
                                        class="w-full h-9 rounded-xl font-inter font-medium text-[13px] text-msp-danger border border-msp-danger/30 bg-red-50 inline-flex items-center justify-center gap-2 hover:bg-red-100 transition">
                                    <i class="fas fa-trash text-[11px]"></i> Hapus
                                </button>
                            </div>
                        </div>
                        <div x-show="confirmDelete" x-cloak class="space-y-2">
                            <p class="font-inter text-[12px] text-msp-gray text-center">Konfirmasi hapus pesan ini?</p>
                            <div class="grid grid-cols-2 gap-2">
                                <form action="{{ route('admin.messages.destroy', $message) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="w-full h-9 rounded-xl bg-msp-danger text-white font-inter font-semibold text-[13px] hover:brightness-95 transition">
                                        Ya, Hapus
                                    </button>
                                </form>
                                <button @click="confirmDelete = false"
                                        class="h-9 rounded-xl border border-msp-border text-msp-gray font-inter font-medium text-[13px] hover:bg-msp-bg-alt transition">
                                    Batal
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@push('scripts')
<script>
function messagesApp() {
    return {
        selectedId: null,
        openDetail(id) {
            this.selectedId = id;
            fetch('{{ url("/admin/messages") }}/' + id + '/read', {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
            });
        },
        closeDetail() {
            this.selectedId = null;
        }
    };
}
</script>
@endpush

</x-admin-dashboard-layout>
