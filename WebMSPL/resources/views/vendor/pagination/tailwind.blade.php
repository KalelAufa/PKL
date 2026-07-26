@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex justify-center">

        <div class="flex items-center gap-1.5">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-xl text-msp-border bg-white border border-msp-border cursor-not-allowed">
                    <i class="fas fa-chevron-left"></i>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="inline-flex items-center justify-center w-10 h-10 rounded-xl text-msp-gray bg-white border border-msp-border hover:bg-msp-bg hover:text-msp-navy hover:border-msp-gold transition-all duration-200">
                    <i class="fas fa-chevron-left"></i>
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-xl text-msp-gray bg-white border border-msp-border cursor-default text-sm font-medium">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span aria-current="page" class="inline-flex items-center justify-center w-10 h-10 rounded-xl text-white bg-msp-navy border border-msp-navy text-sm font-bold cursor-default">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="inline-flex items-center justify-center w-10 h-10 rounded-xl text-msp-gray bg-white border border-msp-border hover:bg-msp-navy hover:text-white hover:border-msp-navy transition-all duration-200 text-sm font-medium" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="inline-flex items-center justify-center w-10 h-10 rounded-xl text-msp-gray bg-white border border-msp-border hover:bg-msp-bg hover:text-msp-navy hover:border-msp-gold transition-all duration-200">
                    <i class="fas fa-chevron-right"></i>
                </a>
            @else
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-xl text-msp-border bg-white border border-msp-border cursor-not-allowed">
                    <i class="fas fa-chevron-right"></i>
                </span>
            @endif
        </div>
    </nav>
@endif
