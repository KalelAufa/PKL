{{-- Pendekatan MSP --}}
<div class="flex flex-col gap-8 md:gap-12" data-aos="fade-up">
    <div class="flex flex-col md:flex-row items-center gap-6 md:gap-12 lg:gap-16">
        <div class="w-full md:w-1/2 md:aspect-[595/500]" data-aos="fade-up" data-aos-delay="100">
            <div class="relative w-full h-full min-h-[280px]">
                <div class="absolute top-0 left-0 w-[80%] h-[80%] rounded-2xl overflow-hidden shadow-[0px_4px_6px_-4px_rgba(0,0,0,0.1),0px_10px_15px_-3px_rgba(0,0,0,0.1)] transition-all duration-500 hover:shadow-2xl">
                    <img src="{{ $service->gallery_image_1 ? asset('images/' . $service->gallery_image_1) : asset('images/landscaping.png') }}" alt="{{ $service->title }}" loading="lazy" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110">
                </div>
                <div class="absolute bottom-0 right-0 w-[60%] h-[55%] rounded-2xl overflow-hidden shadow-[0px_25px_50px_-12px_rgba(0,0,0,0.25)] border-4 md:border-8 border-white transition-all duration-500 hover:shadow-2xl hover:scale-105">
                    <img src="{{ $service->gallery_image_2 ? asset('images/' . $service->gallery_image_2) : asset('images/parking-mgmt.png') }}" alt="{{ $service->title }}" loading="lazy" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110">
                </div>
            </div>
        </div>
        <div class="w-full md:w-1/2 flex flex-col items-start gap-4 md:gap-6 text-left" data-aos="fade-up" data-aos-delay="300">
            <h2 class="font-space text-msp-navy text-2xl md:text-3xl lg:text-4xl leading-snug lg:leading-10 font-bold">Pendekatan MSP terhadap inovasi dan solusi yang dititikberatkan pada prinsip keberlanjutan dan kemudahan klien.</h2>
            <div class="text-msp-gray text-base md:text-lg leading-6 md:leading-[29.25px]">{{ $service->description }}</div>
        </div>
    </div>
</div>

{{-- Jasa Outsourcing --}}
<div class="p-6 md:p-8 rounded-2xl bg-msp-dark" data-aos="fade-up">
    <div class="flex flex-col gap-8 md:gap-10">
        <div class="flex flex-col items-center gap-4">
            <h2 class="font-space text-white text-center text-2xl md:text-3xl leading-snug font-bold">Jasa Outsourcing MSP</h2>
            <div class="max-w-full md:max-w-[560px] text-center">
                <p class="text-msp-light text-sm md:text-base leading-6">Menyediakan tenaga ahli dan terlatih untuk mendukung kelancaran operasional bisnis Anda di berbagai sektor.</p>
            </div>
        </div>
        @if($features->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                @foreach($features as $feature)
                    <div class="flex flex-col rounded-2xl border border-[rgba(42,63,158,0.3)] p-5 md:p-6 transition-all duration-500 hover:border-msp-gold hover:shadow-xl hover:shadow-[rgba(242,167,27,0.1)] hover:-translate-y-1" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="flex flex-col gap-3">
                            <h3 class="font-space text-white text-lg md:text-xl leading-7 font-bold">{{ $feature->title }}</h3>
                            <p class="text-[rgba(220,226,243,0.8)] text-sm leading-[22.75px]">{{ $feature->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                <div class="flex flex-col rounded-2xl border border-[rgba(42,63,158,0.3)] overflow-hidden transition-all duration-500 hover:border-msp-gold hover:shadow-xl hover:shadow-[rgba(242,167,27,0.1)] hover:-translate-y-1" data-aos="fade-up" data-aos-delay="100">
                    <div class="overflow-hidden"><img src="{{ asset('images/cleaning.png') }}" alt="Cleaning Service" loading="lazy" class="w-full h-36 md:h-40 object-cover transition-transform duration-700 hover:scale-110"></div>
                    <div class="flex flex-col gap-3 p-5 md:p-6">
                        <h3 class="font-space text-white text-lg md:text-xl leading-7 font-bold">Cleaning Service</h3>
                        <p class="text-[rgba(220,226,243,0.8)] text-sm leading-[22.75px]">Solusi kebersihan profesional untuk gedung perkantoran, area industri, dan komersial dengan standar sanitasi tinggi.</p>
                    </div>
                </div>
                <div class="flex flex-col rounded-2xl border border-[rgba(42,63,158,0.3)] overflow-hidden transition-all duration-500 hover:border-msp-gold hover:shadow-xl hover:shadow-[rgba(242,167,27,0.1)] hover:-translate-y-1" data-aos="fade-up" data-aos-delay="200">
                    <div class="overflow-hidden"><img src="{{ asset('images/security.png') }}" alt="Security" loading="lazy" class="w-full h-36 md:h-40 object-cover transition-transform duration-700 hover:scale-110"></div>
                    <div class="flex flex-col gap-3 p-5 md:p-6">
                        <h3 class="font-space text-white text-lg md:text-xl leading-7 font-bold">Security</h3>
                        <p class="text-[rgba(220,226,243,0.8)] text-sm leading-[22.75px]">Layanan keamanan terpadu dengan personel terlatih dan bersertifikasi untuk menjamin aset serta keselamatan area bisnis Anda.</p>
                    </div>
                </div>
                <div class="flex flex-col rounded-2xl border border-[rgba(42,63,158,0.3)] overflow-hidden transition-all duration-500 hover:border-msp-gold hover:shadow-xl hover:shadow-[rgba(242,167,27,0.1)] hover:-translate-y-1" data-aos="fade-up" data-aos-delay="300">
                    <div class="overflow-hidden"><img src="{{ asset('images/office-support.png') }}" alt="Office Support" loading="lazy" class="w-full h-36 md:h-40 object-cover transition-transform duration-700 hover:scale-110"></div>
                    <div class="flex flex-col gap-3 p-5 md:p-6">
                        <h3 class="font-space text-white text-lg md:text-xl leading-7 font-bold">Office Support</h3>
                        <p class="text-[rgba(220,226,243,0.8)] text-sm leading-[22.75px]">Tenaga administrasi dan operasional kantor yang andal untuk mendukung efisiensi alur kerja harian perusahaan Anda.</p>
                    </div>
                </div>
                <div class="flex flex-col rounded-2xl border border-[rgba(42,63,158,0.3)] overflow-hidden transition-all duration-500 hover:border-msp-gold hover:shadow-xl hover:shadow-[rgba(242,167,27,0.1)] hover:-translate-y-1" data-aos="fade-up" data-aos-delay="100">
                    <div class="overflow-hidden"><img src="{{ asset('images/driver.png') }}" alt="Driver" loading="lazy" class="w-full h-36 md:h-40 object-cover transition-transform duration-700 hover:scale-110"></div>
                    <div class="flex flex-col gap-3 p-5 md:p-6">
                        <h3 class="font-space text-white text-lg md:text-xl leading-7 font-bold">Driver</h3>
                        <p class="text-[rgba(220,226,243,0.8)] text-sm leading-[22.75px]">Pengemudi profesional yang menjamin keamanan, ketepatan waktu, dan kenyamanan dalam mobilitas operasional perusahaan.</p>
                    </div>
                </div>
                <div class="flex flex-col rounded-2xl border border-[rgba(42,63,158,0.3)] overflow-hidden transition-all duration-500 hover:border-msp-gold hover:shadow-xl hover:shadow-[rgba(242,167,27,0.1)] hover:-translate-y-1" data-aos="fade-up" data-aos-delay="200">
                    <div class="overflow-hidden"><img src="{{ asset('images/parking-card.png') }}" alt="Parking Management" loading="lazy" class="w-full h-36 md:h-40 object-cover transition-transform duration-700 hover:scale-110"></div>
                    <div class="flex flex-col gap-3 p-5 md:p-6">
                        <h3 class="font-space text-white text-lg md:text-xl leading-7 font-bold">Parking Management</h3>
                        <p class="text-[rgba(220,226,243,0.8)] text-sm leading-[22.75px]">Sistem pengelolaan parkir yang efisien dan aman guna memberikan kenyamanan maksimal bagi pengunjung dan karyawan.</p>
                    </div>
                </div>
                <div class="flex flex-col rounded-2xl border border-[rgba(42,63,158,0.3)] overflow-hidden transition-all duration-500 hover:border-msp-gold hover:shadow-xl hover:shadow-[rgba(242,167,27,0.1)] hover:-translate-y-1" data-aos="fade-up" data-aos-delay="300">
                    <div class="overflow-hidden"><img src="{{ asset('images/landscaping-card.png') }}" alt="Landscaping" loading="lazy" class="w-full h-36 md:h-40 object-cover transition-transform duration-700 hover:scale-110"></div>
                    <div class="flex flex-col gap-3 p-5 md:p-6">
                        <h3 class="font-space text-white text-lg md:text-xl leading-7 font-bold">Landscaping</h3>
                        <p class="text-[rgba(220,226,243,0.8)] text-sm leading-[22.75px]">Perawatan dan penataan area hijau yang estetis untuk menciptakan lingkungan kerja yang segar, asri, dan representatif.</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
