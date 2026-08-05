<nav class="fixed top-0 left-0 right-0 z-50 bg-[rgba(249,249,255,0.92)] backdrop-blur-md border-b border-msp-border transition-shadow duration-300">
    <div class="max-w-[1302px] mx-auto px-4 sm:px-6 h-16 flex items-center justify-between gap-3">

        {{-- Logo --}}
        <a href="{{ url('/') }}" class="flex items-center gap-2.5 shrink-0">
            <img src="{{ !empty($footerContent['company_logo']->value) ? asset('images/' . $footerContent['company_logo']->value) : asset('images/logo.png') }}"
                 alt="PT MSP" class="h-8 w-8 object-contain shrink-0">
            <span class="font-space text-[15px] sm:text-[17px] leading-tight font-bold text-msp-dark block truncate max-w-[140px] sm:max-w-[220px] md:max-w-none">
                {{ $footerContent['company_name']->value ?? 'PT Mentari Satya Perkasa' }}
            </span>
        </a>

        {{-- Desktop Nav --}}
        <div class="hidden lg:flex items-center gap-8">
            @php
                $navLinks = [
                    ['/', 'Beranda', '/'],
                    ['/tentang-kami', 'Tentang Kami', 'tentang-kami'],
                    ['/layanan', 'Layanan', 'layanan*'],
                    ['/berita', 'Berita', 'berita*'],
                ];
            @endphp
            @foreach($navLinks as [$href, $label, $match])
                @php $active = request()->is(ltrim($href, '/') ?: '/') || ($match !== '/' && request()->is($match)); @endphp
                <a href="{{ url($href) }}"
                   class="{{ $active ? 'text-msp-gold font-semibold border-b-2 border-msp-gold pb-0.5' : 'text-msp-gray relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 after:bg-msp-gold after:transition-all after:duration-300 hover:after:w-full' }} text-[15px] transition-colors duration-200 hover:text-msp-navy">
                    {{ $label }}
                </a>
            @endforeach
        </div>

        <div class="flex items-center gap-2 sm:gap-3">
            {{-- CTA desktop --}}
            <a href="{{ url('/hubungi-kami') }}"
               class="hidden md:inline-flex items-center px-5 py-2 {{ request()->is('hubungi-kami') ? 'bg-msp-navy text-white' : 'bg-gradient-to-br from-[#F2A71B] to-[#FBC34C] text-msp-navy' }} rounded-xl font-semibold text-[14px] transition-all duration-200 hover:scale-105 hover:shadow-md whitespace-nowrap">
                Hubungi Kami
            </a>

            {{-- Hamburger --}}
            <button id="mobile-menu-btn"
                    class="lg:hidden flex items-center justify-center w-10 h-10 rounded-lg text-msp-navy hover:bg-msp-bg transition-colors duration-200"
                    aria-label="Buka menu" aria-expanded="false" aria-controls="mobile-menu">
                <svg id="icon-bars" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg id="icon-close" class="w-5 h-5 hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>
</nav>

{{-- Mobile Drawer — di luar <nav> agar backdrop-filter nav tidak block overlay blur --}}
<div id="mobile-menu"
     class="fixed inset-0 invisible lg:hidden"
     style="z-index:9999"
     role="dialog" aria-modal="true" aria-label="Menu navigasi">

    {{-- Backdrop dengan blur --}}
    <div id="mobile-overlay"
         class="absolute inset-0 z-0 opacity-0 transition-opacity duration-300"
         style="background:rgba(11,33,69,0.6);backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px)"></div>

    {{-- Panel --}}
    <div id="mobile-panel"
         class="absolute right-0 top-0 z-10 w-[280px] sm:w-80 bg-white shadow-2xl flex flex-col overflow-y-auto translate-x-full transition-transform duration-300 ease-in-out"
         style="height:100vh">

        {{-- Header --}}
        <div class="flex items-center justify-between px-5 py-4 border-b border-msp-border">
            <div class="flex items-center gap-2.5">
                <img src="{{ !empty($footerContent['company_logo']->value) ? asset('images/' . $footerContent['company_logo']->value) : asset('images/logo.png') }}"
                     alt="PT MSP" class="h-7 w-7 object-contain">
                <span class="font-space font-bold text-[14px] text-msp-navy leading-tight">PT Mentari Satya Perkasa</span>
            </div>
            <button id="mobile-menu-close"
                    class="w-8 h-8 flex items-center justify-center rounded-lg text-msp-gray hover:bg-msp-bg hover:text-msp-navy transition-colors"
                    aria-label="Tutup menu">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Links --}}
        <nav class="flex flex-col px-3 py-4 gap-1 flex-1">
            @php
                $mobileLinks = [
                    ['/', 'Beranda', '/'],
                    ['/tentang-kami', 'Tentang Kami', 'tentang-kami'],
                    ['/layanan', 'Layanan', 'layanan*'],
                    ['/berita', 'Berita', 'berita*'],
                    ['/hubungi-kami', 'Hubungi Kami', 'hubungi-kami'],
                ];
            @endphp
            @foreach($mobileLinks as [$href, $label, $match])
                @php $active = request()->is(ltrim($href, '/') ?: '/') || ($match !== '/' && request()->is($match)); @endphp
                <a href="{{ url($href) }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold text-[15px] transition-colors duration-150
                          {{ $active ? 'bg-msp-navy text-white' : 'text-msp-navy hover:bg-msp-bg hover:text-msp-gold' }}">
                    {{ $label }}
                    @if($active)
                        <span class="ml-auto w-1.5 h-1.5 rounded-full bg-msp-gold"></span>
                    @endif
                </a>
            @endforeach
        </nav>

        {{-- Footer --}}
        <div class="px-5 py-4 border-t border-msp-border">
            <p class="text-[11px] text-msp-gray text-center">PT Mentari Satya Perkasa</p>
        </div>
    </div>
</div>
