<footer class="pt-16 lg:pt-20 bg-msp-navy border-t border-msp-white-alpha">
    <div class="max-w-[1302px] mx-auto px-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-8 lg:gap-12">

            {{-- Brand + Sosmed --}}
            <div class="sm:col-span-2 lg:col-span-4 flex flex-col gap-6">
                <div class="flex items-center gap-2.5">
                    <img src="{{ !empty($footerContent['company_logo']->value) ? asset('images/' . $footerContent['company_logo']->value) : asset('images/logo.png') }}" alt="PT MSP" class="h-8 w-auto object-contain">
                    <span class="font-space text-xl leading-7 font-bold text-white">{{ $footerContent['company_name']->value ?? 'PT Mentari Satya Perkasa' }}</span>
                </div>
                <p class="text-[rgba(220,226,243,0.8)] text-sm md:text-base leading-[26px]">{{ $footerContent['company_description']->value ?? 'PT Mentari Satya Perkasa adalah perusahaan penyedia jasa alih daya terpercaya di Indonesia.' }}</p>
                <div class="flex gap-3 pt-2">
                    <a href="{{ $footerContent['social_linkedin']->value ?? '#' }}"
                       @if(!empty($footerContent['social_linkedin']->value)) target="_blank" rel="noopener noreferrer" @endif
                       class="w-10 h-10 flex items-center justify-center bg-msp-white-alpha rounded-xl transition duration-300 hover:bg-msp-gold hover:-translate-y-0.5" aria-label="LinkedIn">
                        <i class="fab fa-linkedin text-white text-base"></i>
                    </a>
                    <a href="{{ $footerContent['social_instagram']->value ?? '#' }}"
                       @if(!empty($footerContent['social_instagram']->value)) target="_blank" rel="noopener noreferrer" @endif
                       class="w-10 h-10 flex items-center justify-center bg-msp-white-alpha rounded-xl transition duration-300 hover:bg-msp-gold hover:-translate-y-0.5" aria-label="Instagram">
                        <i class="fab fa-instagram text-white text-base"></i>
                    </a>
                    <a href="{{ $footerContent['social_facebook']->value ?? '#' }}"
                       @if(!empty($footerContent['social_facebook']->value)) target="_blank" rel="noopener noreferrer" @endif
                       class="w-10 h-10 flex items-center justify-center bg-msp-white-alpha rounded-xl transition duration-300 hover:bg-msp-gold hover:-translate-y-0.5" aria-label="Facebook">
                        <i class="fab fa-facebook-f text-white text-base"></i>
                    </a>
                    <a href="{{ $footerContent['social_x']->value ?? '#' }}"
                       @if(!empty($footerContent['social_x']->value)) target="_blank" rel="noopener noreferrer" @endif
                       class="w-10 h-10 flex items-center justify-center bg-msp-white-alpha rounded-xl transition duration-300 hover:bg-msp-gold hover:-translate-y-0.5" aria-label="X">
                        <i class="fab fa-x-twitter text-white text-base"></i>
                    </a>
                </div>
            </div>

            {{-- Navigasi (sama dengan navbar minus Hubungi Kami) --}}
            <div class="lg:col-span-2 flex flex-col gap-6">
                <h4 class="font-space text-msp-gold text-lg leading-7 font-bold">Navigasi</h4>
                <ul class="flex flex-col gap-3 md:gap-4">
                    <li><a href="{{ url('/') }}" class="text-[rgba(220,226,243,0.8)] text-sm md:text-base transition duration-300 hover:text-white hover:translate-x-1 inline-block">Beranda</a></li>
                    <li><a href="{{ url('/tentang-kami') }}" class="text-[rgba(220,226,243,0.8)] text-sm md:text-base transition duration-300 hover:text-white hover:translate-x-1 inline-block">Tentang Kami</a></li>
                    <li><a href="{{ url('/layanan') }}" class="text-[rgba(220,226,243,0.8)] text-sm md:text-base transition duration-300 hover:text-white hover:translate-x-1 inline-block">Layanan</a></li>
                    <li><a href="{{ url('/berita') }}" class="text-[rgba(220,226,243,0.8)] text-sm md:text-base transition duration-300 hover:text-white hover:translate-x-1 inline-block">Berita</a></li>
                </ul>
            </div>

            {{-- Layanan --}}
            <div class="lg:col-span-3 flex flex-col gap-6">
                <h4 class="font-space text-msp-gold text-lg leading-7 font-bold">Layanan</h4>
                <ul class="flex flex-col gap-3 md:gap-4">
                    <li><a href="{{ route('service.detail', 'outsourcing') }}" class="text-[rgba(220,226,243,0.8)] text-sm md:text-base transition duration-300 hover:text-white hover:translate-x-1 inline-block">Jasa Outsourcing</a></li>
                    <li><a href="{{ route('service.detail', 'perizinan-lingkungan') }}" class="text-[rgba(220,226,243,0.8)] text-sm md:text-base transition duration-300 hover:text-white hover:translate-x-1 inline-block">Perizinan Lingkungan</a></li>
                    <li><a href="{{ route('service.detail', 'pest-control') }}" class="text-[rgba(220,226,243,0.8)] text-sm md:text-base transition duration-300 hover:text-white hover:translate-x-1 inline-block">Pest Control</a></li>
                    <li><a href="https://tns.co.id" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 text-[rgba(220,226,243,0.8)] text-sm md:text-base transition duration-300 hover:text-white hover:translate-x-1">Pengadaan Barang (PT TNS) <i class="fas fa-external-link-alt text-[10px]"></i></a></li>
                </ul>
            </div>

            {{-- Hubungi Kami — data dari page contact via FooterComposer --}}
            <div class="sm:col-span-2 lg:col-span-3 flex flex-col gap-6">
                <h4 class="font-space text-msp-gold text-lg leading-7 font-bold">Hubungi Kami</h4>
                <ul class="flex flex-col gap-3 md:gap-4">
                    <li class="flex items-start gap-3 transition duration-300 hover:translate-x-1">
                        <i class="fas fa-map-marker-alt text-msp-gold mt-1 shrink-0 w-4 text-center"></i>
                        <span class="text-[rgba(220,226,243,0.8)] text-sm md:text-base">{{ $footerContent['address']->value ?? 'Jakarta, Indonesia' }}</span>
                    </li>
                    <li class="flex items-center gap-3 transition duration-300 hover:translate-x-1">
                        <i class="fas fa-phone text-msp-gold shrink-0 w-4 text-center"></i>
                        <a href="tel:{{ preg_replace('/\s+/', '', $footerContent['phone']->value ?? '+622112345678') }}" class="text-[rgba(220,226,243,0.8)] text-sm md:text-base hover:text-white transition-colors">{{ $footerContent['phone']->value ?? '+62 21 1234 5678' }}</a>
                    </li>
                    <li class="flex items-center gap-3 transition duration-300 hover:translate-x-1">
                        <i class="fas fa-envelope text-msp-gold shrink-0 w-4 text-center"></i>
                        <a href="mailto:{{ $footerContent['email']->value ?? 'info@ptmsp.co.id' }}" class="text-[rgba(220,226,243,0.8)] text-sm md:text-base hover:text-white transition-colors">{{ $footerContent['email']->value ?? 'info@ptmsp.co.id' }}</a>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-clock text-msp-gold shrink-0 w-4 text-center"></i>
                        <span class="text-[rgba(220,226,243,0.8)] text-sm md:text-base">{{ $footerContent['office_hours']->value ?? 'Senin - Jumat, 08:00 - 17:00 WIB' }}</span>
                    </li>
                </ul>
            </div>

        </div>
    </div>
    <div class="flex flex-col border-t border-msp-white-alpha mt-10 lg:mt-16">
        <div class="max-w-[1302px] mx-auto w-full px-6 py-6 md:py-8 flex flex-wrap justify-between items-center gap-4">
            <span class="text-[rgba(220,226,243,0.6)] text-xs md:text-sm">&copy; {{ date('Y') }} PT Mentari Satya Perkasa. Hak cipta dilindungi.</span>
            <div class="flex gap-4 md:gap-6">
                <a href="{{ url('/kebijakan-privasi') }}" class="text-[rgba(220,226,243,0.6)] text-xs md:text-sm transition duration-300 hover:text-white">Kebijakan Privasi</a>
            </div>
        </div>
    </div>
</footer>
