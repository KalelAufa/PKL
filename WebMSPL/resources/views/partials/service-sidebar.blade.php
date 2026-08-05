<aside class="w-full lg:w-[276px] shrink-0" data-aos="fade-right">
    <div class="flex flex-col gap-6 lg:gap-8">
        <div class="bg-[#F8F9FA] border border-[rgba(197,198,207,0.3)] rounded-2xl overflow-hidden"
             x-data="{ open: false }">
            <button type="button"
                    @click="open = !open"
                    class="w-full flex items-center justify-between p-6 lg:cursor-default">
                <h3 class="font-space font-semibold text-msp-dark text-2xl leading-[34px]">Layanan</h3>
                <i class="fas fa-chevron-down text-msp-gray text-sm transition-transform duration-300 lg:hidden"
                   :class="{ 'rotate-180': open }"></i>
            </button>
            <div :class="open ? '' : 'hidden lg:block'"
                 class="px-6 pb-6 -mt-2">
                <div class="flex flex-col gap-4">
                    @foreach($sidebarServices ?? $allServices as $item)
                        @if(isset($service) && $service->slug === $item->slug)
                            <span class="text-msp-gold-dark text-base leading-6 font-bold border-l-2 border-msp-gold-dark pl-3">{{ $item->title }}</span>
                        @else
                            <a href="{{ route('service.detail', $item->slug) }}" class="text-msp-gray text-base leading-6 transition-colors duration-300 hover:text-msp-navy">{{ $item->title }}</a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="bg-[#F8F9FA] border border-msp-border p-6 rounded-2xl flex flex-col gap-2" data-aos="fade-up">
            <h3 class="font-space font-semibold text-msp-dark text-2xl leading-[34px]">Butuh Bantuan?</h3>
            <p class="text-msp-gray text-sm leading-5 pb-4">Tim ahli kami siap membantu memberikan solusi terbaik untuk bisnis Anda.</p>
            <a href="{{ route('contact') }}" class="block bg-msp-dark text-white font-bold text-base leading-6 text-center py-3 uppercase transition-all duration-300 hover:opacity-90">HUBUNGI KAMI</a>
        </div>
    </div>
</aside>
