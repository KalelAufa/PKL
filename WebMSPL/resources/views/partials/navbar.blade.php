<nav class="fixed top-0 left-0 right-0 z-50 bg-[rgba(249,249,255,0.9)] backdrop-blur-sm border-b border-msp-border animate-[fadeIn_0.5s_ease-out] transition-shadow duration-300">
    <div class="max-w-[1302px] mx-auto px-6 h-16 flex items-center justify-between">
        <a href="{{ url('/') }}" class="flex items-center gap-2.5">
            <img src="{{ !empty($footerContent['company_logo']->value) ? asset('images/' . $footerContent['company_logo']->value) : asset('images/logo.png') }}" alt="PT MSP" class="h-8 w-auto object-contain">
            <span class="font-space text-lg leading-6 font-bold text-msp-dark">PT Mentari Satya Perkasa</span>
        </a>

        {{-- Desktop Nav --}}
        <div class="hidden lg:flex items-center gap-8">
            <a href="{{ url('/') }}"
               class="@if(request()->is('/')) text-msp-gold font-semibold border-b-2 border-msp-gold pb-0.5 @else text-msp-gray relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 after:bg-msp-gold after:transition-all after:duration-300 hover:after:w-full @endif text-base transition-all duration-300 hover:text-msp-navy">
                Beranda
            </a>
            <a href="{{ url('/tentang-kami') }}"
               class="@if(request()->is('tentang-kami')) text-msp-gold font-semibold border-b-2 border-msp-gold pb-0.5 @else text-msp-gray relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 after:bg-msp-gold after:transition-all after:duration-300 hover:after:w-full @endif text-base transition-all duration-300 hover:text-msp-navy">
                Tentang Kami
            </a>
            <a href="{{ url('/layanan') }}"
               class="@if(request()->is('layanan') || request()->is('layanan/*')) text-msp-gold font-semibold border-b-2 border-msp-gold pb-0.5 @else text-msp-gray relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 after:bg-msp-gold after:transition-all after:duration-300 hover:after:w-full @endif text-base transition-all duration-300 hover:text-msp-navy">
                Layanan
            </a>
            <a href="{{ url('/berita') }}"
               class="@if(request()->is('berita') || request()->is('berita/*')) text-msp-gold font-semibold border-b-2 border-msp-gold pb-0.5 @else text-msp-gray relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 after:bg-msp-gold after:transition-all after:duration-300 hover:after:w-full @endif text-base transition-all duration-300 hover:text-msp-navy">
                Berita
            </a>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ url('/hubungi-kami') }}"
               class="hidden md:flex items-center px-6 py-2 @if(request()->is('hubungi-kami')) bg-msp-navy text-white @else bg-gradient-to-br from-[#F2A71B] to-[#FBC34C] text-msp-navy @endif rounded-xl font-semibold text-base transition-all duration-300 hover:scale-105 hover:shadow-lg">
                Hubungi Kami
            </a>
            <button id="mobile-menu-btn" class="lg:hidden flex items-center justify-center w-10 h-10 text-msp-navy transition-transform duration-300 hover:scale-110" aria-label="Buka menu" aria-expanded="false" aria-controls="mobile-menu">
                <i class="fas fa-bars text-2xl menu-icon"></i>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobile-menu" class="fixed inset-0 z-40 translate-x-full transition-transform duration-300 ease-in-out lg:hidden" role="dialog" aria-modal="true" aria-label="Menu navigasi">
        <div class="absolute inset-0 bg-black/40" id="mobile-overlay"></div>
        <div class="absolute right-0 top-0 h-full w-72 bg-white shadow-2xl pt-6 pb-8 px-6 flex flex-col gap-4">
            <div class="flex justify-end">
                <button id="mobile-menu-close" class="w-9 h-9 flex items-center justify-center rounded-lg text-msp-navy hover:bg-msp-bg-alt transition" aria-label="Tutup menu">
                    <i class="fas fa-xmark text-xl"></i>
                </button>
            </div>
            <a href="{{ url('/') }}" class="text-msp-navy text-lg font-semibold py-3 border-b border-msp-border transition-all duration-300 hover:text-msp-gold">Beranda</a>
            <a href="{{ url('/tentang-kami') }}" class="text-msp-navy text-lg font-semibold py-3 border-b border-msp-border transition-all duration-300 hover:text-msp-gold">Tentang Kami</a>
            <a href="{{ url('/layanan') }}" class="text-msp-navy text-lg font-semibold py-3 border-b border-msp-border transition-all duration-300 hover:text-msp-gold">Layanan</a>
            <a href="{{ url('/berita') }}" class="text-msp-navy text-lg font-semibold py-3 border-b border-msp-border transition-all duration-300 hover:text-msp-gold">Berita</a>
            <a href="{{ url('/hubungi-kami') }}" class="mt-4 flex items-center justify-center px-6 py-3 bg-gradient-to-br from-[#F2A71B] to-[#FBC34C] rounded-xl text-msp-navy font-semibold text-base transition-all duration-300 hover:scale-105 hover:shadow-lg">Hubungi Kami</a>
        </div>
    </div>
</nav>
