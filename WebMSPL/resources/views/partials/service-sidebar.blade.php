<aside class="w-full lg:w-[276px] shrink-0" data-aos="fade-right">
    <div class="flex flex-col gap-8">
        <div class="bg-[#F8F9FA] border border-[rgba(197,198,207,0.3)] p-6 rounded-2xl flex flex-col gap-4">
            <h3 class="font-space font-semibold text-msp-dark text-2xl leading-[34px] pb-2">Layanan</h3>
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
        <div class="bg-[#F8F9FA] border border-msp-border p-6 rounded-2xl flex flex-col gap-2" data-aos="fade-up">
            <h3 class="font-space font-semibold text-msp-dark text-2xl leading-[34px]">Butuh Bantuan?</h3>
            <p class="text-msp-gray text-sm leading-5 pb-4">Tim ahli kami siap membantu memberikan solusi terbaik untuk bisnis Anda.</p>
            <a href="{{ route('contact') }}" class="block bg-msp-dark text-white font-bold text-base leading-6 text-center py-3 uppercase transition-all duration-300 hover:opacity-90">HUBUNGI KAMI</a>
        </div>
    </div>
</aside>
