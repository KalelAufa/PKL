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
$stat1Value = $pageContents['stat_1_value']->value ?? '15+';
$stat2Value = $pageContents['stat_2_value']->value ?? '200+';
$stat3Value = $pageContents['stat_3_value']->value ?? '5000+';
$stat1Num = preg_replace('/\D/', '', $stat1Value);
$stat2Num = preg_replace('/\D/', '', $stat2Value);
$stat3Num = preg_replace('/\D/', '', $stat3Value);
$stat1Suffix = preg_replace('/[0-9]/', '', $stat1Value) ?: '+';
$stat2Suffix = preg_replace('/[0-9]/', '', $stat2Value) ?: '+';
$stat3Suffix = preg_replace('/[0-9]/', '', $stat3Value) ?: '+';

$perizinan = $services->firstWhere('slug', 'perizinan-lingkungan');
$pestControl = $services->firstWhere('slug', 'pest-control');
@endphp

@section('content')

    {{-- Hero --}}
    <section class="pt-16 bg-msp-bg">
        <div class="mx-3 md:mx-5 lg:mx-8">
            <div class="relative overflow-hidden rounded-3xl min-h-[400px] md:min-h-[520px] lg:min-h-[640px]" data-aos="fade" data-aos-duration="1000">
                <img src="{{ asset('images/' . ($pageContents['hero_image']->value ?? 'hero-bg.png')) }}"
                     alt="" class="absolute inset-0 w-full h-full object-cover">
                {{-- Soft two-layer overlay: dark bottom, slightly lighter top --}}
                <div class="absolute inset-0 bg-gradient-to-t from-[#0B2145] via-[rgba(11,33,69,0.75)] to-[rgba(11,33,69,0.45)]"></div>

                <div class="absolute bottom-0 left-0 right-0 flex flex-col px-7 py-10 md:px-12 md:py-14 lg:px-16 lg:py-16">
                    <h1 class="font-space text-white text-3xl sm:text-4xl md:text-5xl lg:text-[56px] leading-tight font-bold max-w-3xl mb-5 md:mb-6">
                        {{ $pageContents['hero_title']->value ?? 'Outsourcing, Lingkungan, dan Pest Control — Satu Mitra, Satu Standar.' }}
                    </h1>

                    <p class="text-[rgba(211,218,234,0.9)] text-base md:text-lg leading-relaxed max-w-xl mb-8 md:mb-10">
                        {{ $pageContents['hero_subtitle']->value ?? 'Memberikan solusi terpadu dan efisien untuk kebutuhan bisnis Anda dengan standar kepatuhan tertinggi.' }}
                    </p>

                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('contact') }}"
                           class="inline-flex items-center gap-2 px-6 py-3 bg-msp-gold text-msp-navy font-semibold text-sm rounded-xl transition duration-200 hover:brightness-110 hover:shadow-lg hover:shadow-[rgba(242,167,27,0.3)]">
                            Mulai Konsultasi
                            <i class="fas fa-arrow-right text-xs"></i>
                        </a>
                        <a href="{{ route('services') }}"
                           class="inline-flex items-center gap-2 px-6 py-3 border border-[rgba(255,255,255,0.35)] text-white font-medium text-sm rounded-xl transition duration-200 hover:bg-[rgba(255,255,255,0.1)] hover:border-white">
                            Lihat Layanan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Stats Strip --}}
    <section class="bg-msp-bg py-10 md:py-12" data-aos="fade-up" data-aos-duration="600">
        <div class="max-w-5xl mx-auto px-6">
            <div class="grid grid-cols-3 gap-0 divide-x divide-msp-border" data-counter-section>
                <div class="flex flex-col gap-1 px-4 md:px-8 first:pl-0">
                    <span data-counter="{{ $stat1Num }}" data-suffix="{{ $stat1Suffix }}"
                          class="font-space text-msp-navy text-2xl md:text-4xl font-bold tracking-tight">{{ $stat1Value }}</span>
                    <span class="text-msp-gray text-xs md:text-sm leading-5">{{ $pageContents['stat_1_label']->value ?? 'Tahun Pengalaman' }}</span>
                </div>
                <div class="flex flex-col gap-1 px-4 md:px-8">
                    <span data-counter="{{ $stat2Num }}" data-suffix="{{ $stat2Suffix }}"
                          class="font-space text-msp-navy text-2xl md:text-4xl font-bold tracking-tight">{{ $stat2Value }}</span>
                    <span class="text-msp-gray text-xs md:text-sm leading-5">{{ $pageContents['stat_2_label']->value ?? 'Klien Korporat' }}</span>
                </div>
                <div class="flex flex-col gap-1 px-4 md:px-8">
                    <span data-counter="{{ $stat3Num }}" data-suffix="{{ $stat3Suffix }}"
                          class="font-space text-msp-navy text-2xl md:text-4xl font-bold tracking-tight">{{ $stat3Value }}</span>
                    <span class="text-msp-gray text-xs md:text-sm leading-5">{{ $pageContents['stat_3_label']->value ?? 'Tenaga Kerja Tersalurkan' }}</span>
                </div>
            </div>
        </div>
    </section>

    {{-- About --}}
    <section class="py-20 md:py-28 bg-white" data-aos="fade-up" data-aos-duration="700">
        <div class="max-w-[1302px] mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-20 items-center">
            {{-- Image --}}
            <div class="relative">
                <div class="rounded-2xl overflow-hidden">
                    <img src="{{ asset('images/' . ($pageContents['about_image']->value ?? 'about-team.png')) }}"
                        alt="Tim PT MSP" loading="lazy"
                        class="w-full h-[300px] sm:h-[400px] lg:h-[480px] object-cover">
                </div>
            </div>

            {{-- Text --}}
            <div class="flex flex-col gap-6 pt-6 md:pt-0">
                <h2 class="font-space text-msp-navy text-2xl md:text-3xl lg:text-[38px] leading-snug font-bold">
                    {{ $pageContents['about_title']->value ?? 'Dedikasi untuk Keamanan dan Kelancaran Bisnis Anda' }}
                </h2>
                <p class="text-msp-gray text-base leading-7">
                    {{ $pageContents['about_description']->value ?? 'PT Mentari Satya Perkasa (MSP) hadir sebagai mitra strategis yang mengintegrasikan layanan outsourcing tenaga kerja, pengelolaan lingkungan, dan pengendalian hama secara profesional.' }}
                </p>
                <p class="text-msp-gray text-base leading-7">
                    {{ $pageContents['about_description_2']->value ?? 'Kami percaya bahwa operasional yang efisien dimulai dari fondasi sumber daya yang andal dan lingkungan kerja yang aman.' }}
                </p>

                <div class="flex gap-8 pt-2">
                    <div>
                        <span class="font-space text-msp-blue text-xl font-bold block">{{ $pageContents['about_metric_2']->value ?? '24/7' }}</span>
                        <span class="text-msp-gray text-sm">{{ $pageContents['about_metric_2_label']->value ?? 'Support Tim' }}</span>
                    </div>
                    <div>
                        <span class="font-space text-msp-blue text-xl font-bold block">{{ $pageContents['about_metric_3']->value ?? '100%' }}</span>
                        <span class="text-msp-gray text-sm">{{ $pageContents['about_metric_3_label']->value ?? 'Compliance' }}</span>
                    </div>
                </div>

                <a href="{{ route('about') }}"
                   class="inline-flex items-center gap-2 text-msp-navy font-semibold text-sm border-b-2 border-msp-gold pb-0.5 w-fit transition-colors duration-200 hover:text-msp-gold">
                    Kenali Lebih Lanjut
                    <i class="fas fa-arrow-right text-xs"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- News --}}
    <section class="py-20 md:py-28 bg-[#F9F9FF]" data-aos="fade-up" data-aos-duration="700">
        <div class="max-w-[1302px] mx-auto px-6">
            <div class="flex flex-wrap items-end justify-between gap-4 mb-12">
                <div>
                    <h2 class="font-space text-msp-navy text-2xl md:text-3xl font-bold leading-snug">
                        {{ $pageContents['news_section_title']->value ?? 'Apa Kabar MSP?' }}
                    </h2>
                </div>
                <a href="{{ route('news.index') }}"
                   class="inline-flex items-center gap-2 text-msp-navy font-semibold text-sm border-b-2 border-msp-gold pb-0.5 transition-colors duration-200 hover:text-msp-gold">
                    Semua Berita <i class="fas fa-arrow-right text-xs"></i>
                </a>
            </div>

            <div class="news-swiper swiper w-full overflow-hidden">
                <div class="swiper-wrapper">
                    @forelse ($news as $item)
                        <div class="swiper-slide h-auto">
                            <a href="{{ route('news.show', $item->slug) }}" class="group block h-full">
                                <article class="flex flex-col bg-white border border-msp-border rounded-2xl overflow-hidden shadow-sm transition duration-300 hover:shadow-md hover:-translate-y-1 h-full">
                                    <div class="overflow-hidden">
                                        <img src="{{ $item->thumbnail_url }}" alt="{{ $item->title }}"
                                             loading="lazy"
                                             class="w-full h-48 object-cover transition-transform duration-500 group-hover:-translate-y-0.5">
                                    </div>
                                    <div class="flex flex-col gap-2 p-5 md:p-6 flex-1">
                                        <span class="font-mono text-msp-gold text-xs tracking-wide uppercase">
                                            {{ strtoupper($item->published_at->locale('id')->isoFormat('DD MMM YYYY')) }}
                                        </span>
                                        <h3 class="font-space text-msp-navy text-base font-bold leading-snug">{{ $item->title }}</h3>
                                        <p class="text-msp-gray text-sm leading-6 flex-1">{{ $item->excerpt }}</p>
                                    </div>
                                </article>
                            </a>
                        </div>
                    @empty
                        <div class="swiper-slide">
                            <p class="text-msp-gray text-sm text-center py-12">Belum ada berita terbaru.</p>
                        </div>
                    @endforelse
                </div>
                <div class="swiper-pagination !relative !bottom-auto mt-8"></div>
            </div>
        </div>
    </section>

    {{-- Innovation / Image Feature --}}
    <section class="py-20 md:py-28 bg-white" data-aos="fade-up" data-aos-duration="700">
        <div class="max-w-[1302px] mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-20 items-center">
            <div class="flex flex-col gap-6 order-2 md:order-1">
                <h2 class="font-space text-msp-navy text-2xl md:text-3xl lg:text-[38px] leading-snug font-bold">
                    {{ $pageContents['innovation_title']->value ?? 'Inovasi Berkelanjutan untuk Kepuasan Klien' }}
                </h2>
                <p class="text-msp-gray text-base leading-7">
                    {{ $pageContents['innovation_body_1']->value ?? 'Kami pastikan rangkaian layanan kami bisa memberi solusi dan layanan terbaik, sesuai tuntutan zaman. Melalui ekosistem proteksi terpadu, kami menawarkan solusi masa depan menggunakan teknologi ramah lingkungan dan sistem manajemen yang efisien.' }}
                </p>
                <p class="text-msp-gray text-base leading-7">
                    {{ $pageContents['innovation_body_2']->value ?? 'Komitmen kami juga menjamin kenyamanan bagi pelanggan di mana pun berada.' }}
                </p>
            </div>
            <div class="relative aspect-[4/3] order-1 md:order-2">
                <div class="absolute top-0 left-0 w-[78%] h-[78%] rounded-2xl overflow-hidden shadow-md">
                    <img src="{{ asset('images/' . ($pageContents['innovation_image_1']->value ?? 'landscaping.png')) }}"
                         alt="" loading="lazy" class="w-full h-full object-cover">
                </div>
                <div class="absolute bottom-0 right-0 w-[55%] h-[55%] rounded-2xl overflow-hidden shadow-lg border-[6px] border-white" style="transform: rotate(-3deg)">
                    <img src="{{ asset('images/' . ($pageContents['innovation_image_2']->value ?? 'parking-mgmt.png')) }}"
                         alt="" loading="lazy" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </section>

    {{-- Services Grid --}}
    <section class="py-20 md:py-28 bg-msp-bg" data-aos="fade-up" data-aos-duration="700">
        <div class="max-w-[1302px] mx-auto px-6">
            <div class="max-w-xl mb-12 md:mb-16">
                <h2 class="font-space text-msp-navy text-2xl md:text-3xl lg:text-[38px] leading-snug font-bold mb-4">
                    {{ $pageContents['services_grid_title']->value ?? 'Jasa Outsourcing MSP' }}
                </h2>
                <p class="text-msp-gray text-base leading-7">
                    {{ $pageContents['services_grid_subtitle']->value ?? 'Menyediakan tenaga ahli dan terlatih untuk mendukung kelancaran operasional bisnis Anda di berbagai sektor.' }}
                </p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 md:gap-6">
                @foreach ($outsourcingSubServices as $card)
                    <a href="{{ route('service.detail', $card->slug) }}"
                       class="group relative flex flex-col bg-msp-bg rounded-2xl overflow-hidden shadow-sm transition duration-300 hover:shadow-lg hover:-translate-y-1 min-h-90">
                        <div class="overflow-hidden h-52 shrink-0">
                            @if($card->hero_image)
                                <img src="{{ asset('images/' . $card->hero_image) }}"
                                     alt="{{ $card->title }}" loading="lazy"
                                     class="w-full h-full object-cover transition-transform duration-500 group-hover:-translate-y-0.5">
                            @else
                                <div class="w-full h-full bg-linear-to-br from-msp-bg to-msp-bg-alt flex items-center justify-center">
                                    <i class="{{ $card->icon ?? 'fas fa-cogs' }} text-4xl text-msp-border"></i>
                                </div>
                            @endif
                        </div>
                        <div class="flex flex-col gap-2 p-6 flex-1">
                            <h3 class="font-space text-msp-navy text-lg font-bold leading-snug">{{ $card->title }}</h3>
                            <p class="text-black/65 text-sm leading-6 flex-1">{{ $card->excerpt }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="text-center mt-10">
                <a href="{{ route('services') }}"
                   class="inline-flex items-center gap-2 px-7 py-3 bg-msp-navy text-white font-semibold text-sm rounded-xl transition duration-200 hover:bg-msp-blue">
                    Semua Layanan <i class="fas fa-arrow-right text-xs"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- Secondary Services --}}
    <section class="py-20 md:py-28 bg-white" data-aos="fade-up" data-aos-duration="700">
        <div class="max-w-[1302px] mx-auto px-6">
            <div class="max-w-xl mb-12">
                <h2 class="font-space text-msp-navy text-2xl md:text-3xl font-bold leading-snug">
                    Solusi Lingkungan & Pengendalian Hama
                </h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-6 mb-5">
                @if ($perizinan)
                    <a href="{{ route('service.detail', $perizinan->slug) }}"
                       class="group flex flex-col gap-4 p-7 bg-white rounded-2xl border border-msp-border shadow-sm transition duration-300 hover:shadow-md hover:-translate-y-1">
                        <div class="w-12 h-12 flex items-center justify-center bg-[rgba(11,33,69,0.06)] rounded-xl group-hover:bg-[rgba(242,167,27,0.12)] transition-colors duration-200">
                            <i class="fas fa-stamp text-msp-navy text-base group-hover:text-msp-gold transition-colors duration-200"></i>
                        </div>
                        <div>
                            <h3 class="font-space text-msp-navy text-xl font-bold mb-2">{{ $perizinan->title }}</h3>
                            <p class="text-msp-gray text-sm leading-6">{{ $perizinan->excerpt }}</p>
                        </div>
                        <span class="inline-flex items-center gap-1.5 text-msp-blue text-sm font-semibold group-hover:gap-2.5 transition duration-200">
                            Pelajari Lebih Lanjut <i class="fas fa-arrow-right text-xs"></i>
                        </span>
                    </a>
                @endif
                @if ($pestControl)
                    <a href="{{ route('service.detail', $pestControl->slug) }}"
                       class="group flex flex-col gap-4 p-7 bg-white rounded-2xl border border-msp-border shadow-sm transition duration-300 hover:shadow-md hover:-translate-y-1">
                        <div class="w-12 h-12 flex items-center justify-center bg-[rgba(11,33,69,0.06)] rounded-xl group-hover:bg-[rgba(242,167,27,0.12)] transition-colors duration-200">
                            <i class="fas fa-bug text-msp-navy text-base group-hover:text-msp-gold transition-colors duration-200"></i>
                        </div>
                        <div>
                            <h3 class="font-space text-msp-navy text-xl font-bold mb-2">{{ $pestControl->title }}</h3>
                            <p class="text-msp-gray text-sm leading-6">{{ $pestControl->excerpt }}</p>
                        </div>
                        <span class="inline-flex items-center gap-1.5 text-msp-blue text-sm font-semibold group-hover:gap-2.5 transition duration-200">
                            Pelajari Lebih Lanjut <i class="fas fa-arrow-right text-xs"></i>
                        </span>
                    </a>
                @endif
            </div>
            <p class="text-center text-msp-gray text-xs leading-5">
                Beberapa layanan terspesialisasi mungkin dikelola di bawah naungan entitas afiliasi kami, PT TNS, dengan standar mutu yang sama.
            </p>
        </div>
    </section>

    {{-- CTA Banner --}}
    <section class="py-16 md:py-20 bg-msp-navy" data-aos="fade-up" data-aos-duration="700">
        <div class="max-w-[1302px] mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="flex flex-col gap-3 max-w-xl">
                <h2 class="font-space text-white text-2xl md:text-3xl font-bold leading-snug">
                    Siap bermitra dengan kami?
                </h2>
                <p class="text-[rgba(211,218,234,0.85)] text-base leading-7">
                    Konsultasikan kebutuhan bisnis Anda bersama tim ahli kami — tanpa komitmen awal.
                </p>
            </div>
            <a href="{{ route('contact') }}"
               class="shrink-0 inline-flex items-center gap-2 px-8 py-3.5 bg-msp-gold text-msp-navy font-semibold text-sm rounded-xl transition duration-200 hover:brightness-110 hover:shadow-lg whitespace-nowrap">
                Hubungi Kami
                <i class="fas fa-arrow-right text-xs"></i>
            </a>
        </div>
    </section>

@endsection
