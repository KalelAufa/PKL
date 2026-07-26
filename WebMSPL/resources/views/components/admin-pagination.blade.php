@if ($paginator->hasPages())
    <div class="px-5 py-4 border-t border-msp-border flex items-center justify-between">
        <div class="text-sm text-[#6B7280]">
            Menampilkan {{ $paginator->firstItem() }}–{{ $paginator->lastItem() }} dari {{ $paginator->total() }}
        </div>
        <nav class="flex items-center gap-1">
            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <span class="px-3 py-1.5 text-sm text-[#9CA3AF] bg-[#F9FAFB] rounded-md cursor-default">Sebelumnya</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-1.5 text-sm text-[#374151] bg-white border border-[#D1D5DB] rounded-md hover:bg-[#F3F4F6] transition">Sebelumnya</a>
            @endif

            @php
                $start = max($paginator->currentPage() - 2, 1);
                $end = min($paginator->currentPage() + 2, $paginator->lastPage());
                if ($start > 1) echo '<span class="px-2 text-sm text-[#6B7280]">...</span>';
            @endphp

            @for ($i = $start; $i <= $end; $i++)
                @if ($i === $paginator->currentPage())
                    <span class="px-3 py-1.5 text-sm font-semibold text-white bg-msp-navy rounded-md">{{ $i }}</span>
                @else
                    <a href="{{ $paginator->url($i) }}" class="px-3 py-1.5 text-sm text-[#374151] bg-white border border-[#D1D5DB] rounded-md hover:bg-[#F3F4F6] transition">{{ $i }}</a>
                @endif
            @endfor

            @php if ($end < $paginator->lastPage()) echo '<span class="px-2 text-sm text-[#6B7280]">...</span>'; @endphp

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-1.5 text-sm text-[#374151] bg-white border border-[#D1D5DB] rounded-md hover:bg-[#F3F4F6] transition">Selanjutnya</a>
            @else
                <span class="px-3 py-1.5 text-sm text-[#9CA3AF] bg-[#F9FAFB] rounded-md cursor-default">Selanjutnya</span>
            @endif
        </nav>
    </div>
@endif
