@extends('layouts.app')

@section('title', 'PT Mentari Satya Perkasa')

@push('meta')
<meta name="description" content="PT Mentari Satya Perkasa — penyedia jasa outsourcing, perizinan lingkungan, dan pest control terpercaya di Indonesia dengan pengalaman lebih dari 15 tahun.">
<meta property="og:title" content="PT Mentari Satya Perkasa">
<meta property="og:description" content="Solusi outsourcing, perizinan lingkungan, dan pengendalian hama profesional untuk bisnis Anda.">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url('/') }}">
<link rel="canonical" href="{{ url('/') }}">
@endpush

@php
// Extract stat values for counter animation
$stat1Value = $pageContents['stat_1_value']->value ?? '15+';
$stat2Value = $pageContents['stat_2_value']->value ?? '200+';
$stat3Value = $pageContents['stat_3_value']->value ?? '5000+';
$stat1Num = preg_replace('/\D/', '', $stat1Value);
$stat2Num = preg_replace('/\D/', '', $stat2Value);
$stat3Num = preg_replace('/\D/', '', $stat3Value);
$stat1Suffix = preg_replace('/[0-9]/', '', $stat1Value) ?: '+';
$stat2Suffix = preg_replace('/[0-9]/', '', $stat2Value) ?: '+';
$stat3Suffix = preg_replace('/[0-9]/', '', $stat3Value) ?: '+';

// Find secondary services by slug
$perizinan = $services->firstWhere('slug', 'perizinan-lingkungan');
$pestControl = $services->firstWhere('slug', 'pest-control');
@endphp

@section('content')
    {{-- Hero Section --}}
    <section class="pt-16 px-4 pb-0 bg-msp-bg" data-aos="fade" data-aos-duration="800">
        <div class="mx-2 md:mx-4 lg:mx-6 relative overflow-hidden rounded-2xl min-h-[350px] md:min-h-[500px] lg:min-h-[600px]">
            <img src="{{ asset('images/' . ($pageContents['hero_image']->value ?? 'hero-bg.png')) }}" alt="" class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-br from-[rgba(11,33,69,0.9)] to-[rgba(11,33,69,0.7)]"></div>
            <div class="relative px-6 py-14 md:pt-[60px] md:pb-6">
                <div class="max-w-full lg:max-w-[768px] flex flex-col gap-4 md:gap-6">
                    <h1 class="font-space text-white text-3xl sm:text-4xl md:text-5xl lg:text-6xl leading-snug md:leading-[60px] font-bold" data-aos="fade-up" data-aos-delay="200">
                        {{ $pageContents['hero_title']->value ?? 'Mitra Terpercaya untuk<br class="hidden sm:block"> Outsourcing, Lingkungan,<br class="hidden sm:block"> & Pest Control' }}
                    </h1>
                    <div class="max-w-full lg:max-w-[672px]" data-aos="fade-up" data-aos-delay="400">
                        <p class="text-msp-light text-base md:text-lg leading-6 md:leading-7">
                            {{ $pageContents['hero_subtitle']->value ?? 'Memberikan solusi terpadu dan efisien untuk kebutuhan bisnis Anda. Kami memastikan operasional perusahaan Anda berjalan lancar dengan standar kepatuhan tertinggi.' }}
                        </p>
                    </div>
                    <div class="flex flex-wrap gap-3 md:gap-4 pt-2 md:pt-4 pb-4 md:pb-6" data-aos="fade-up" data-aos-delay="600">
                        <a href="{{ route('contact') }}" class="flex items-center px-6 md:px-8 py-3 md:py-3.5 bg-gradient-to-br from-[#F2A71B] to-[#FBC34C] rounded-xl text-msp-navy font-semibold text-sm md:text-base transition-all duration-300 hover:scale-105 hover:shadow-xl">Mulai Konsultasi</a>
                        <a href="{{ route('services') }}" class="flex items-center px-6 md:px-8 py-3 md:py-3.5 border border-white rounded-xl text-white font-medium text-sm md:text-base transition-all duration-300 hover:bg-white hover:text-msp-navy hover:scale-105">Pelajari Layanan</a>
                    </div>
                    <div class="pt-4 md:pt-6 border-t border-[rgba(75,94,133,0.3)]" data-aos="fade-up" data-aos-delay="800">
                        <div class="flex flex-wrap gap-6 md:gap-8" data-counter-section>
                            <div class="flex flex-col gap-1 min-w-[120px] md:w-[234.66px] transition-all duration-500 hover:translate-y-[-4px]">
                                <span data-counter="{{ $stat1Num }}" data-suffix="{{ $stat1Suffix }}" class="font-space text-msp-gold text-2xl md:text-[30px] leading-8 md:leading-9 font-bold">{{ $stat1Value }}</span>
                                <span class="text-msp-light text-sm md:text-base">{{ $pageContents['stat_1_label']->value ?? 'Tahun Pengalaman' }}</span>
                            </div>
                            <div class="flex flex-col gap-1 min-w-[120px] md:w-[234.66px] transition-all duration-500 hover:translate-y-[-4px]">
                                <span data-counter="{{ $stat2Num }}" data-suffix="{{ $stat2Suffix }}" class="font-space text-msp-gold text-2xl md:text-[30px] leading-8 md:leading-9 font-bold">{{ $stat2Value }}</span>
                                <span class="text-msp-light text-sm md:text-base">{{ $pageContents['stat_2_label']->value ?? 'Klien Korporat' }}</span>
                            </div>
                            <div class="flex flex-col gap-1 min-w-[120px] md:w-[234.66px] transition-all duration-500 hover:translate-y-[-4px]">
                                <span data-counter="{{ $stat3Num }}" data-suffix="{{ $stat3Suffix }}" class="font-space text-msp-gold text-2xl md:text-[30px] leading-8 md:leading-9 font-bold">{{ $stat3Value }}</span>
                                <span class="text-msp-light text-sm md:text-base">{{ $pageContents['stat_3_label']->value ?? 'Tenaga Kerja Tersalurkan' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- About Section --}}
    <section class="py-16 md:py-20 bg-msp-bg" data-aos="fade-up">
        <div class="max-w-[1302px] mx-auto px-6 flex flex-col md:flex-row items-center gap-8 md:gap-12 lg:gap-16">
            <div class="w-full md:w-1/2" data-aos="fade-right" data-aos-delay="200">
                <div class="rounded-2xl overflow-hidden shadow-[0px_8px_10px_-6px_rgba(0,0,0,0.1),0px_20px_25px_-5px_rgba(0,0,0,0.1)] transition-all duration-500 hover:shadow-[0px_20px_40px_-12px_rgba(0,0,0,0.25)] hover:scale-[1.01]">
                    <img src="{{ asset('images/' . ($pageContents['about_image']->value ?? 'about-team.png')) }}" alt="Tim PT MSP" loading="lazy" class="w-full h-[280px] sm:h-[350px] lg:h-[500px] object-cover transition-transform duration-700 hover:scale-105">
                </div>
            </div>
            <div class="w-full md:w-1/2 flex flex-col gap-4 md:gap-5" data-aos="fade-left" data-aos-delay="400">
                <h2 class="font-space text-msp-navy text-2xl md:text-3xl lg:text-4xl leading-snug md:leading-10 font-bold">{{ $pageContents['about_title']->value ?? 'Dedikasi untuk Keamanan dan Kelancaran Bisnis Anda' }}</h2>
                <p class="text-msp-gray text-base md:text-lg leading-6 md:leading-[29.25px]">{{ $pageContents['about_description']->value ?? 'PT Mentari Satya Perkasa (MSP) hadir sebagai mitra strategis yang mengintegrasikan layanan outsourcing tenaga kerja, pengelolaan lingkungan, dan pengendalian hama secara profesional.' }}</p>
                <p class="text-msp-gray text-base md:text-lg leading-6 md:leading-[29.25px]">{{ $pageContents['about_description_2']->value ?? 'Kami percaya bahwa operasional yang efisien dimulai dari fondasi sumber daya yang andal dan lingkungan kerja yang aman.' }}</p>
                <div class="flex flex-wrap gap-x-8 gap-y-4 pt-2 md:pt-4">
                    <div class="flex flex-col gap-1 transition-all duration-300 hover:translate-y-[-4px]">
                        <span class="font-space text-msp-blue text-2xl leading-8 font-bold">{{ $pageContents['about_metric_1']->value ?? '98%' }}</span>
                        <span class="text-msp-gray text-sm leading-5">{{ $pageContents['about_metric_1_label']->value ?? 'Client Retention' }}</span>
                    </div>
                    <div class="flex flex-col gap-1 transition-all duration-300 hover:translate-y-[-4px]">
                        <span class="font-space text-msp-blue text-2xl leading-8 font-bold">{{ $pageContents['about_metric_2']->value ?? '24/7' }}</span>
                        <span class="text-msp-gray text-sm leading-5">{{ $pageContents['about_metric_2_label']->value ?? 'Support Tim' }}</span>
                    </div>
                    <div class="flex flex-col gap-1 transition-all duration-300 hover:translate-y-[-4px]">
                        <span class="font-space text-msp-blue text-2xl leading-8 font-bold">{{ $pageContents['about_metric_3']->value ?? '100%' }}</span>
                        <span class="text-msp-gray text-sm leading-5">{{ $pageContents['about_metric_3_label']->value ?? 'Compliance' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- News Section --}}
    <section class="py-16 md:py-20 bg-[#F9F9FF]" data-aos="fade-up">
        <div class="max-w-[1302px] mx-auto px-6 flex flex-col gap-8 md:gap-12">
            <div class="flex flex-wrap justify-between items-end gap-4">
                <div class="flex flex-col gap-2 md:gap-4">
                    <h2 class="font-space text-msp-navy text-2xl md:text-3xl lg:text-4xl leading-snug md:leading-10 font-bold" data-aos="fade-right">{{ $pageContents['news_section_title']->value ?? 'Apa Kabar MSP?' }}</h2>
                    <p class="text-msp-gray text-sm md:text-base" data-aos="fade-right" data-aos-delay="100">{{ $pageContents['news_section_subtitle']->value ?? 'Berita dan pembaruan terbaru dari aktivitas kami.' }}</p>
                </div>
                <a href="{{ route('news.index') }}" class="flex items-center gap-2 text-msp-blue font-semibold text-sm md:text-base transition-all duration-300 hover:gap-3 hover:text-msp-navy" data-aos="fade-left">
                    Semua Berita
                    <i class="fas fa-arrow-right text-sm transition-transform duration-300 group-hover:translate-x-1"></i>
                </a>
            </div>
            <div class="news-swiper swiper w-full overflow-hidden" data-aos="fade-up" data-aos-delay="200">
                <div class="swiper-wrapper">
                    @forelse ($news as $item)
                        <div class="swiper-slide h-auto">
                            <a href="{{ route('news.show', $item->slug) }}" class="group block h-full">
                                <article class="flex flex-col rounded-2xl bg-white border border-msp-border shadow-[0px_1px_2px_0px_rgba(0,0,0,0.05)] overflow-hidden transition-all duration-500 hover:shadow-xl hover:-translate-y-2 h-full">
                                    <div class="overflow-hidden">
                                        <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}" loading="lazy" class="w-full h-48 object-cover transition-transform duration-700 group-hover:scale-110">
                                    </div>
                                    <div class="flex flex-col gap-3 p-5 md:p-6">
                                        <span class="font-mono text-msp-blue text-xs leading-4 font-medium">{{ strtoupper($item->published_at->locale('id')->isoFormat('DD MMM YYYY')) }}</span>
                                        <h3 class="font-space text-msp-navy text-lg md:text-xl leading-6 md:leading-7 font-bold">{{ $item->title }}</h3>
                                        <p class="text-msp-gray text-sm leading-5">{{ $item->excerpt }}</p>
                                    </div>
                                </article>
                            </a>
                        </div>
                    @empty
                        <div class="swiper-slide h-auto">
                            <article class="flex flex-col rounded-2xl bg-white border border-msp-border shadow-[0px_1px_2px_0px_rgba(0,0,0,0.05)] p-6 items-center justify-center h-full">
                                <p class="text-msp-gray text-sm">Belum ada berita terbaru.</p>
                            </article>
                        </div>
                    @endforelse
                </div>
                <div class="swiper-pagination !relative !bottom-auto mt-8 md:mt-10"></div>
            </div>
        </div>
    </section>

    {{-- Main Services Section --}}
    <section class="py-16 md:py-20 px-6 bg-white" data-aos="fade-up">
        <div class="max-w-[1302px] mx-auto flex flex-col md:flex-row items-center gap-6 md:gap-12 lg:gap-16">
            <div class="w-full md:w-1/2 md:aspect-[595/500]" data-aos="fade-up" data-aos-delay="200">
                <div class="relative w-full h-full">
                    <div class="absolute top-0 left-0 w-[80%] h-[80%] rounded-2xl overflow-hidden shadow-[0px_4px_6px_-4px_rgba(0,0,0,0.1),0px_10px_15px_-3px_rgba(0,0,0,0.1)] transition-all duration-500 hover:shadow-2xl">
                        <img src="{{ asset('images/landscaping.png') }}" alt="Landscaping Team" loading="lazy" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110">
                    </div>
                    <div class="absolute bottom-0 right-0 w-[60%] h-[55%] rounded-2xl overflow-hidden shadow-[0px_25px_50px_-12px_rgba(0,0,0,0.25)] border-4 md:border-8 border-white transition-all duration-500 hover:shadow-2xl hover:scale-105">
                        <img src="{{ asset('images/parking-mgmt.png') }}" alt="Parking Management" loading="lazy" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110">
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 flex flex-col items-start gap-4 md:gap-6 text-left" data-aos="fade-up" data-aos-delay="400">
                <h2 class="font-space text-msp-navy text-2xl md:text-3xl lg:text-4xl leading-snug lg:leading-10 font-bold">{{ $pageContents['innovation_title']->value ?? 'Pendekatan MSP terhadap inovasi dan solusi yang dititikberatkan pada prinsip keberlanjutan dan kemudahan klien.' }}</h2>
                <p class="text-msp-gray text-base md:text-lg leading-6 md:leading-[29.25px]">{{ $pageContents['innovation_body_1']->value ?? 'Kami pastikan rangkaian layanan kami bisa memberi solusi dan layanan terbaik, sesuai tuntutan zaman. Melalui ekosistem proteksi terpadu, kami menawarkan solusi masa depan menggunakan teknologi ramah lingkungan dan sistem manajemen yang efisien.' }}</p>
                <p class="text-msp-gray text-base md:text-lg leading-6 md:leading-[29.25px]">{{ $pageContents['innovation_body_2']->value ?? 'Komitmen kami juga menjamin kenyamanan bagi pelanggan di mana pun berada.' }}</p>
            </div>
        </div>
    </section>

    {{-- Services Grid Section --}}
    <section class="py-16 md:py-20 bg-msp-dark" data-aos="fade-up">
        <div class="max-w-[1302px] mx-auto px-6 flex flex-col gap-10 md:gap-16">
            <div class="flex flex-col items-center gap-4">
                <h2 class="font-space text-white text-center text-2xl md:text-3xl lg:text-4xl leading-snug md:leading-10 font-bold" data-aos="fade-up">{{ $pageContents['services_grid_title']->value ?? 'Jasa Outsourcing MSP' }}</h2>
                <div class="max-w-full md:max-w-[672px] text-center px-4" data-aos="fade-up" data-aos-delay="100">
                    <p class="text-msp-light text-sm md:text-base leading-6">{{ $pageContents['services_grid_subtitle']->value ?? 'Menyediakan tenaga ahli dan terlatih untuk mendukung kelancaran operasional bisnis Anda di berbagai sektor.' }}</p>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                @foreach ($services->where('is_affiliate', false)->take(6) as $item)
                    <a href="{{ route('service.detail', $item->slug) }}" class="flex flex-col rounded-2xl border border-[rgba(42,63,158,0.3)] overflow-hidden transition-all duration-500 hover:border-msp-gold hover:shadow-2xl hover:shadow-[rgba(242,167,27,0.15)] hover:-translate-y-2" data-aos="fade-up" data-aos-delay="{{ (($loop->index % 3) * 100) + 200 }}">
                        <div class="overflow-hidden">
                            <img src="{{ asset('images/' . $item->hero_image) }}" alt="{{ $item->title }}" loading="lazy" class="w-full h-40 md:h-48 object-cover transition-transform duration-700 hover:scale-110">
                        </div>
                        <div class="flex flex-col gap-3 p-6 md:p-8">
                            <h3 class="font-space text-white text-lg md:text-xl leading-7 font-bold">{{ $item->title }}</h3>
                            <p class="text-[rgba(220,226,243,0.8)] text-sm leading-[22.75px]">{{ $item->excerpt }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Secondary Services Section --}}
    <section class="py-16 md:py-20 bg-msp-bg" data-aos="fade-up">
        <div class="max-w-[1302px] mx-auto px-6 flex flex-col gap-6 md:gap-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
                @if ($perizinan)
                    <div class="flex flex-col p-6 md:p-8 rounded-2xl bg-white border border-msp-border shadow-[0px_1px_2px_0px_rgba(0,0,0,0.05)] transition-all duration-500 hover:shadow-xl hover:-translate-y-2" data-aos="fade-right" data-aos-delay="200">
                        <div class="w-16 h-[88px] flex flex-col items-center pb-6">
                            <div class="w-16 h-16 flex items-center justify-center bg-[rgba(11,33,69,0.1)] rounded-xl transition-all duration-300 group-hover:bg-msp-gold">
                                <i class="fas fa-stamp text-msp-navy text-xl"></i>
                            </div>
                        </div>
                        <div class="pb-4">
                            <h3 class="font-space text-msp-navy text-xl md:text-2xl leading-8 font-bold">{{ $perizinan->title }}</h3>
                        </div>
                        <div class="pb-6 md:pr-[38.52px]">
                            <p class="text-msp-gray text-sm md:text-base">{{ $perizinan->excerpt }}</p>
                        </div>
                        <a href="{{ route('service.detail', $perizinan->slug) }}" class="flex items-center gap-2 text-msp-blue font-semibold text-sm md:text-base transition-all duration-300 hover:gap-3 hover:text-msp-navy">
                            Pelajari Lebih Lanjut
                            <i class="fas fa-arrow-right text-xs transition-transform duration-300 group-hover:translate-x-1"></i>
                        </a>
                    </div>
                @endif
                @if ($pestControl)
                    <div class="flex flex-col p-6 md:p-8 rounded-2xl bg-white border border-msp-border shadow-[0px_1px_2px_0px_rgba(0,0,0,0.05)] transition-all duration-500 hover:shadow-xl hover:-translate-y-2" data-aos="fade-left" data-aos-delay="400">
                        <div class="w-16 h-[88px] flex flex-col items-center pb-6">
                            <div class="w-16 h-16 flex items-center justify-center bg-[rgba(11,33,69,0.1)] rounded-xl">
                                <i class="fas fa-bug text-msp-navy text-xl"></i>
                            </div>
                        </div>
                        <div class="pb-4">
                            <h3 class="font-space text-msp-navy text-xl md:text-2xl leading-8 font-bold">{{ $pestControl->title }}</h3>
                        </div>
                        <div class="pb-6 md:pr-[33.53px]">
                            <p class="text-msp-gray text-sm md:text-base">{{ $pestControl->excerpt }}</p>
                        </div>
                        <a href="{{ route('service.detail', $pestControl->slug) }}" class="flex items-center gap-2 text-msp-blue font-semibold text-sm md:text-base transition-all duration-300 hover:gap-3 hover:text-msp-navy">
                            Pelajari Lebih Lanjut
                            <i class="fas fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                @endif
            </div>
            <div class="flex flex-col p-4 md:p-6 rounded-2xl border border-[rgba(220,226,243,0.8)] bg-[rgba(220,226,243,0.5)] transition-all duration-300 hover:shadow-md" data-aos="fade-up">
                <p class="text-center text-msp-navy text-xs md:text-sm leading-5 font-semibold">
                    Catatan: <span class="font-normal text-msp-gray">Beberapa layanan terspesialisasi mungkin dikelola di bawah naungan entitas afiliasi kami, PT TNS, dengan standar mutu yang sama.</span>
                </p>
            </div>
        </div>
    </section>
@endsection
