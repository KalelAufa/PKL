@extends('layouts.app')

@section('title', 'Layanan - PT Mentari Satya Perkasa')

@push('meta')
<meta name="description" content="Layanan PT Mentari Satya Perkasa: outsourcing, perizinan lingkungan, pest control, building maintenance, dan landscaping untuk kebutuhan operasional bisnis Anda.">
<meta property="og:title" content="Layanan - PT Mentari Satya Perkasa">
<meta property="og:description" content="Solusi terintegrasi untuk kebutuhan proteksi dan operasional bisnis Anda dari PT Mentari Satya Perkasa.">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url('/layanan') }}">
<link rel="canonical" href="{{ url('/layanan') }}">
@endpush

@section('content')
{{-- Hero --}}
<section class="pt-16 px-4 pb-0 bg-msp-bg">
    <div class="mx-2 md:mx-4 lg:mx-6 relative overflow-hidden rounded-2xl min-h-[400px] md:min-h-[550px]">
        <img src="{{ asset('images/' . ($pageContents['hero_image']->value ?? 'layanan-hero.png')) }}" alt=""
            class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-br from-[rgba(11,33,69,0.9)] to-[rgba(11,33,69,0.7)]"></div>
        <div class="absolute inset-0 flex items-end px-6 pb-12">
            <div class="max-w-[672px] flex flex-col gap-6 text-left items-start" data-aos="fade-up">
                <h1 class="font-space text-white text-3xl sm:text-4xl md:text-5xl leading-snug md:leading-[56px] font-bold">
                    {{ $pageContents['hero_title']->value ?? 'Layanan Kami' }}
                </h1>
                <p class="text-msp-light text-base md:text-lg leading-6 md:leading-7">
                    {{ $pageContents['hero_subtitle']->value ?? 'Solusi terintegrasi untuk kebutuhan proteksi dan operasional bisnis Anda. Kami menghadirkan standar layanan tertinggi untuk memastikan kelancaran dan kepatuhan perusahaan Anda.' }}
                </p>
            </div>
        </div>
    </div>
</section>

{{-- Main Services --}}
<section class="bg-[#F6F7FB] py-16">
    <div class="max-w-[1280px] mx-auto px-6 flex flex-col gap-10">
        <div class="flex flex-col gap-4">
            <h2 class="font-space text-msp-navy text-2xl md:text-3xl lg:text-4xl leading-snug md:leading-10 font-bold">{{ $pageContents['main_services_title']->value ?? 'Solusi Utama' }}</h2>
            <div class="w-16 h-1 bg-msp-gold"></div>
        </div>

        <div class="grid grid-cols-12 gap-x-6 gap-y-6 items-start">
            {{-- Outsourcing Profesional (Large Card) --}}
            <div class="col-span-12 lg:col-span-8 bg-white rounded-2xl overflow-hidden border border-[#E5E7EB] flex flex-col lg:flex-row">
                <div class="w-full lg:w-1/2 h-48 lg:h-auto overflow-hidden">
                    <img src="{{ asset('images/security.png') }}" alt="Outsourcing Profesional"
                        class="w-full h-full object-cover">
                </div>
                <div class="w-full lg:w-1/2 p-8 flex flex-col justify-center">
                    <div class="pb-2">
                        <span class="font-mono text-msp-gold-dark text-xs leading-4 font-medium tracking-[0.6px] uppercase">LAYANAN TENAGA KERJA</span>
                    </div>
                    <div class="pb-4">
                        <h3 class="font-space text-msp-navy text-xl md:text-2xl leading-8 font-bold">Outsourcing Profesional</h3>
                    </div>
                    <div class="pb-6">
                        <p class="text-msp-gray text-base md:text-lg leading-6 md:leading-[29.25px]">Penyediaan tenaga kerja tersertifikasi dan handal untuk mendukung operasional harian Anda. Dari keamanan hingga administrasi, kami memastikan kualitas SDM terbaik.</p>
                    </div>
                    <div class="pb-8">
                        <ul class="flex flex-col gap-[7.5px]">
                            <li class="flex items-center gap-2 text-[#151C27] text-sm leading-5">
                                <i class="fas fa-check text-msp-gold text-[13px] shrink-0"></i>
                                Security Services
                            </li>
                            <li class="flex items-center gap-2 text-[#151C27] text-sm leading-5">
                                <i class="fas fa-check text-msp-gold text-[13px] shrink-0"></i>
                                Cleaning Services
                            </li>
                            <li class="flex items-center gap-2 text-[#151C27] text-sm leading-5">
                                <i class="fas fa-check text-msp-gold text-[13px] shrink-0"></i>
                                Admin Support &amp; Reception
                            </li>
                        </ul>
                    </div>
                    <a href="{{ route('service.detail', 'outsourcing') }}" class="flex items-center gap-2 text-msp-blue font-semibold text-sm md:text-base transition-all duration-300 hover:gap-3 hover:text-msp-navy">
                        Pelajari Lebih Lanjut
                        <i class="fas fa-arrow-right text-[11px]"></i>
                    </a>
                </div>
            </div>

            {{-- Perizinan Lingkungan --}}
            <div class="col-span-12 md:col-span-6 lg:col-span-4 bg-white rounded-2xl border border-[#E5E7EB] p-8 flex flex-col justify-between">
                <div class="flex flex-col gap-4">
                    <div class="w-12 h-12 flex items-center justify-center bg-[#E2E8F8] rounded-xl">
                        <i class="fas fa-file-alt text-msp-blue text-lg"></i>
                    </div>
                    <div class="pt-2">
                        <h3 class="font-space text-msp-navy text-xl md:text-2xl leading-8 font-bold">Perizinan Lingkungan</h3>
                    </div>
                    <p class="text-msp-gray text-sm md:text-base">Layanan konsultasi dan pengurusan dokumen kepatuhan lingkungan hidup untuk memastikan bisnis Anda beroperasi sesuai regulasi pemerintah.</p>
                </div>
                <a href="{{ route('service.detail', 'perizinan-lingkungan') }}" class="flex items-center gap-2 text-msp-blue font-semibold text-sm md:text-base transition-all duration-300 hover:gap-3 hover:text-msp-navy mt-6">
                    Detail Layanan
                    <i class="fas fa-arrow-right text-[11px]"></i>
                </a>
            </div>

            {{-- Pest Control --}}
            <div class="col-span-12 md:col-span-6 lg:col-span-4 bg-white rounded-2xl border border-[#E5E7EB] p-8 flex flex-col justify-between">
                <div class="flex flex-col gap-4">
                    <div class="w-12 h-12 flex items-center justify-center bg-[#E2E8F8] rounded-xl">
                        <i class="fas fa-bug text-msp-blue text-lg"></i>
                    </div>
                    <div class="pt-2">
                        <h3 class="font-space text-msp-navy text-xl md:text-2xl leading-8 font-bold">Pest Control</h3>
                    </div>
                    <p class="text-msp-gray text-sm md:text-base">Manajemen higienitas dan pengendalian hama profesional untuk area komersial dan industrial, menjamin lingkungan kerja yang aman dan sehat.</p>
                </div>
                <a href="{{ route('service.detail', 'pest-control') }}" class="flex items-center gap-2 text-msp-blue font-semibold text-sm md:text-base transition-all duration-300 hover:gap-3 hover:text-msp-navy mt-6">
                    Detail Layanan
                    <i class="fas fa-arrow-right text-[11px]"></i>
                </a>
            </div>

            {{-- Secondary Image Highlight --}}
            <div class="col-span-12 lg:col-span-8 relative rounded-2xl overflow-hidden h-[300px] border border-[#E5E7EB]">
                <img src="{{ asset('images/' . ($pageContents['quality_image']->value ?? 'layanan-quality.jpg')) }}" alt=""
                    class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-msp-dark/90 to-transparent"></div>
                <div class="absolute p-8" style="top: 155px;">
                    <div class="max-w-[512px] flex flex-col gap-2">
                        <h3 class="font-space text-white text-xl md:text-2xl leading-8 font-bold">{{ $pageContents['quality_title']->value ?? 'Standar Kualitas Tinggi' }}</h3>
                        <p class="text-msp-light text-sm md:text-base">{{ $pageContents['quality_body']->value ?? 'Kami melatih setiap personel dengan standar operasional prosedur yang ketat untuk memberikan hasil kerja yang konsisten.' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Sister Company --}}
<section class="bg-white py-16">
    <div class="max-w-[1280px] mx-auto px-6">
        <div class="bg-[#F0F3FF] rounded-2xl border border-[#E5E7EB] p-12 flex flex-col lg:flex-row items-center justify-between gap-6">
            <div class="max-w-[756px] flex flex-col gap-2">
                <span class="font-mono text-msp-gray-light text-xs leading-4 font-medium tracking-[0.6px] uppercase">LAYANAN AFILIASI</span>
                <h2 class="font-space text-msp-navy text-xl md:text-2xl leading-8 font-bold">Pengadaan Barang &amp; IT Support</h2>
                <div class="pt-2">
                    <p class="text-msp-gray text-base md:text-lg leading-6 md:leading-[29.25px]">Untuk kebutuhan pengadaan peralatan kantor, infrastruktur IT, dan dukungan teknis, layanan ini disediakan secara khusus oleh sister company kami, PT TNS, untuk memberikan fokus dan keahlian yang lebih spesifik.</p>
                </div>
            </div>
            <div class="shrink-0">
                <a href="https://tns.co.id" target="_blank" rel="noopener noreferrer" class="flex items-center px-6 md:px-8 py-3 md:py-3.5 rounded-xl border border-msp-blue text-msp-blue font-semibold text-sm md:text-base transition-all duration-300 hover:bg-msp-blue hover:text-white hover:scale-105">
                    Kunjungi Website PT TNS
                    <i class="fas fa-external-link-alt ml-2 text-[13px]"></i>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-r from-[#F2A71B] to-[#FBC34C] py-12">
    <div class="max-w-[1280px] mx-auto px-6">
        <div class="flex flex-col items-center text-center gap-6">
            <h2 class="font-space text-msp-navy text-2xl md:text-3xl lg:text-4xl leading-snug md:leading-10 font-bold max-w-[672px]">{{ $pageContents['cta_title']->value ?? 'Siap Meningkatkan Standar Operasional Anda?' }}</h2>
            <p class="text-msp-gray text-base md:text-lg leading-6 md:leading-[29.25px] max-w-[672px]">{{ $pageContents['cta_subtitle']->value ?? 'Diskusikan kebutuhan perusahaan Anda dengan tim ahli kami untuk mendapatkan solusi yang tepat sasaran.' }}</p>
            <a href="{{ route('contact') }}" class="flex items-center px-6 md:px-8 py-3 md:py-3.5 bg-gradient-to-br from-[#F2A71B] to-[#FBC34C] rounded-xl text-msp-navy font-semibold text-sm md:text-base transition-all duration-300 hover:scale-105 hover:shadow-xl">
                Jadwalkan Konsultasi
            </a>
        </div>
    </div>
</section>
@endsection
