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

@php
    $mainServices      = $services->where('is_affiliate', false)->values();
    $affiliateServices = $services->where('is_affiliate', true)->values();
@endphp

@section('content')
{{-- Hero --}}
<section class="pt-16 px-4 pb-0 bg-msp-bg">
    <div class="mx-2 md:mx-4 lg:mx-6 relative overflow-hidden rounded-3xl min-h-[400px] md:min-h-[520px]">
        <img src="{{ asset('images/' . ($pageContents['hero_image']->value ?? 'layanan-hero.png')) }}" alt=""
            class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-[#0B2145] via-[rgba(11,33,69,0.75)] to-[rgba(11,33,69,0.45)]"></div>
        <div class="absolute bottom-0 left-0 right-0 flex flex-col px-8 pb-12 md:px-12">
            <div class="max-w-[672px] flex flex-col gap-4 md:gap-5">
                <span class="w-fit font-mono text-msp-gold text-xs tracking-widest uppercase">Layanan Kami</span>
                <h1 class="font-space text-white text-3xl sm:text-4xl md:text-5xl font-bold leading-tight">
                    {{ $pageContents['hero_title']->value ?? 'Layanan Kami' }}
                </h1>
                <p class="text-msp-light text-base md:text-lg leading-7">
                    {{ $pageContents['hero_subtitle']->value ?? 'Solusi terintegrasi untuk kebutuhan proteksi dan operasional bisnis Anda.' }}
                </p>
            </div>
        </div>
    </div>
</section>

{{-- Services --}}
<section class="py-16 md:py-24 bg-white">
    <div class="max-w-[1280px] mx-auto px-6 flex flex-col gap-10">
        <div class="flex flex-col gap-2">
            <span class="font-mono text-msp-gold text-xs tracking-widest uppercase">Solusi Utama</span>
            <h2 class="font-space text-msp-navy text-2xl md:text-3xl lg:text-4xl font-bold leading-snug">
                {{ $pageContents['main_services_title']->value ?? 'Solusi Utama' }}
            </h2>
        </div>

        @php
            $svcCount   = $mainServices->count();
            $needsFiller = $svcCount % 2 !== 0;
            if ($needsFiller) {
                $lastIsWide = ($svcCount % 4 === 1 || $svcCount % 4 === 0);
                $fillerSpan = $lastIsWide ? 4 : 8;
            }
        @endphp

        {{-- Alternating grid: odd = span-8 with image, even = span-4 no image --}}
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-stretch">
            @foreach($mainServices as $service)
                @if($loop->iteration % 4 === 1 || $loop->iteration % 4 === 0)
                {{-- Wide card WITH image --}}
                <div class="md:col-span-8 bg-white rounded-2xl overflow-hidden border border-msp-border shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 flex flex-col sm:flex-row">
                    <div class="w-full sm:w-[42%] h-52 sm:h-auto overflow-hidden shrink-0">
                        @if($service->hero_image)
                            <img src="{{ asset('images/' . $service->hero_image) }}"
                                alt="{{ $service->title }}"
                                class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                        @else
                            <div class="w-full h-full min-h-[200px] bg-msp-navy flex items-center justify-center">
                                <i class="{{ $service->icon ?? 'fas fa-briefcase' }} text-5xl text-white/20"></i>
                            </div>
                        @endif
                    </div>
                    <div class="flex flex-col justify-center gap-4 p-7 lg:p-8 flex-1">
                        @if($service->icon)
                        <div class="w-10 h-10 bg-msp-bg rounded-xl flex items-center justify-center">
                            <i class="{{ $service->icon }} text-msp-blue text-lg"></i>
                        </div>
                        @endif
                        <div class="flex flex-col gap-1.5">
                            <h3 class="font-space text-msp-navy text-xl md:text-2xl font-bold leading-snug">{{ $service->title }}</h3>
                            <p class="text-msp-gray text-sm md:text-base leading-relaxed">{{ $service->excerpt }}</p>
                        </div>
                        <a href="{{ route('service.detail', $service->slug) }}"
                            class="inline-flex items-center gap-2 px-5 py-2.5 bg-msp-gold text-msp-navy font-bold text-sm rounded-xl w-fit transition-all duration-300 hover:brightness-110 hover:shadow-md">
                            Pelajari Lebih Lanjut
                            <i class="fas fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>
                @else
                {{-- Narrow card WITHOUT image --}}
                <div class="md:col-span-4 bg-white border border-msp-border rounded-2xl shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 flex flex-col p-7 lg:p-8 gap-5">
                    <div class="w-10 h-10 bg-msp-bg rounded-xl flex items-center justify-center shrink-0">
                        <i class="{{ $service->icon ?? 'fas fa-cogs' }} text-msp-blue text-lg"></i>
                    </div>
                    <div class="flex flex-col gap-2 flex-1">
                        <h3 class="font-space text-msp-navy text-xl font-bold leading-snug">{{ $service->title }}</h3>
                        <p class="text-msp-gray text-sm leading-relaxed flex-1">{{ $service->excerpt }}</p>
                    </div>
                    <a href="{{ route('service.detail', $service->slug) }}"
                        class="inline-flex items-center gap-1.5 text-msp-navy font-bold text-sm transition-all duration-300 hover:gap-2.5 group mt-auto">
                        Detail Layanan
                        <i class="fas fa-arrow-right text-xs transition-transform duration-300 group-hover:translate-x-1"></i>
                    </a>
                </div>
                @endif
            @endforeach

            {{-- Quality image filler: only when service count is odd --}}
            @if($needsFiller && !empty($pageContents['quality_image']->value))
                @php $colClass = $fillerSpan === 8 ? 'md:col-span-8' : 'md:col-span-4'; @endphp
                <div class="{{ $colClass }} relative rounded-2xl overflow-hidden min-h-[240px] shadow-sm">
                    <img src="{{ asset('images/' . $pageContents['quality_image']->value) }}"
                        alt="{{ $pageContents['quality_title']->value ?? '' }}"
                        class="absolute inset-0 w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0B2145] via-[rgba(11,33,69,0.5)] to-transparent"></div>
                    @if(!empty($pageContents['quality_title']->value) || !empty($pageContents['quality_body']->value))
                    <div class="absolute bottom-0 left-0 right-0 p-7 flex flex-col gap-2">
                        @if(!empty($pageContents['quality_title']->value))
                            <h3 class="font-space text-white text-xl font-bold leading-snug">{{ $pageContents['quality_title']->value }}</h3>
                        @endif
                        @if(!empty($pageContents['quality_body']->value))
                            <p class="text-white/75 text-sm leading-relaxed">{{ $pageContents['quality_body']->value }}</p>
                        @endif
                    </div>
                    @endif
                </div>
            @elseif($needsFiller)
                {{-- No image set yet: show placeholder --}}
                @php $colClass = $fillerSpan === 8 ? 'md:col-span-8' : 'md:col-span-4'; @endphp
                <div class="{{ $colClass }} rounded-2xl min-h-[240px] bg-msp-bg border border-dashed border-msp-border flex items-center justify-center">
                    <p class="text-msp-gray/40 text-sm font-mono">quality_image</p>
                </div>
            @endif
        </div>
    </div>
</section>

{{-- Sister Company / Affiliate --}}
@if($affiliateServices->count())
<section class="py-16 md:py-20 bg-msp-bg">
    <div class="max-w-[1280px] mx-auto px-6">
        <div class="bg-white rounded-2xl border border-msp-border shadow-sm p-6 md:p-10 lg:p-12 flex flex-col gap-8">
            <div class="flex flex-col gap-2">
                <span class="font-mono text-msp-gold text-xs tracking-widest uppercase">{{ $pageContents['sister_badge']->value ?? 'Layanan Afiliasi' }}</span>
                <h2 class="font-space text-msp-navy text-xl md:text-2xl font-bold">{!! clean($pageContents['sister_title']->value ?? 'Pengadaan Barang &amp; IT Support') !!}</h2>
                <p class="text-msp-gray text-base leading-relaxed max-w-[680px]">{{ $pageContents['sister_description']->value ?? 'Untuk kebutuhan pengadaan peralatan kantor, infrastruktur IT, dan dukungan teknis, layanan ini disediakan secara khusus oleh sister company kami.' }}</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($affiliateServices as $aff)
                <div class="flex flex-col gap-3 p-6 bg-msp-bg rounded-2xl border border-msp-border hover:shadow-sm transition-all duration-300">
                    <div class="w-10 h-10 flex items-center justify-center bg-white rounded-xl border border-msp-border">
                        @if($aff->icon)
                            <i class="{{ $aff->icon }} text-msp-blue"></i>
                        @else
                            <i class="fas fa-link text-msp-blue"></i>
                        @endif
                    </div>
                    <h3 class="font-space text-msp-navy text-base font-bold">{{ $aff->title }}</h3>
                    @if($aff->excerpt)
                    <p class="text-msp-gray text-sm leading-relaxed flex-1">{{ $aff->excerpt }}</p>
                    @endif
                </div>
                @endforeach
            </div>
            <div>
                <a href="{{ $pageContents['sister_url']->value ?? 'https://tns.co.id' }}" target="_blank" rel="noopener noreferrer"
                    class="inline-flex items-center gap-2 px-6 py-3 rounded-xl border border-msp-blue text-msp-blue font-semibold text-sm transition-all duration-300 hover:bg-msp-blue hover:text-white">
                    {{ $pageContents['sister_cta_label']->value ?? 'Kunjungi Website PT TNS' }}
                    <i class="fas fa-external-link-alt text-[13px]"></i>
                </a>
            </div>
        </div>
    </div>
</section>
@else
{{-- Fallback sister panel (no affiliate services in DB) --}}
<section class="py-16 md:py-20 bg-msp-bg">
    <div class="max-w-[1280px] mx-auto px-6">
        <div class="bg-white rounded-2xl border border-msp-border shadow-sm p-6 md:p-10 lg:p-12 flex flex-col lg:flex-row items-center justify-between gap-8">
            <div class="max-w-[680px] flex flex-col gap-3">
                <span class="font-mono text-msp-gold text-xs tracking-widest uppercase">{{ $pageContents['sister_badge']->value ?? 'Layanan Afiliasi' }}</span>
                <h2 class="font-space text-msp-navy text-xl md:text-2xl font-bold">{!! clean($pageContents['sister_title']->value ?? 'Pengadaan Barang &amp; IT Support') !!}</h2>
                <p class="text-msp-gray text-base leading-relaxed">{{ $pageContents['sister_description']->value ?? 'Untuk kebutuhan pengadaan peralatan kantor, infrastruktur IT, dan dukungan teknis, layanan ini disediakan secara khusus oleh sister company kami, PT TNS.' }}</p>
            </div>
            <div class="shrink-0">
                <a href="{{ $pageContents['sister_url']->value ?? 'https://tns.co.id' }}" target="_blank" rel="noopener noreferrer"
                    class="inline-flex items-center gap-2 px-6 py-3 rounded-xl border border-msp-blue text-msp-blue font-semibold text-sm transition-all duration-300 hover:bg-msp-blue hover:text-white">
                    {{ $pageContents['sister_cta_label']->value ?? 'Kunjungi Website PT TNS' }}
                    <i class="fas fa-external-link-alt text-[13px]"></i>
                </a>
            </div>
        </div>
    </div>
</section>
@endif

{{-- CTA --}}
<section class="py-16 md:py-24 px-4 bg-msp-bg">
    <div class="mx-2 md:mx-4 lg:mx-6 py-16 md:py-20 bg-msp-navy rounded-3xl">
        <div class="max-w-[1280px] mx-auto px-6 flex flex-col items-center gap-6 text-center">
            <span class="font-mono text-msp-gold text-xs tracking-widest uppercase">Konsultasi Gratis</span>
            <h2 class="font-space text-white text-3xl md:text-4xl lg:text-5xl font-bold leading-snug tracking-tight">{{ $pageContents['cta_title']->value ?? 'Siap Meningkatkan Standar Operasional Anda?' }}</h2>
            <p class="text-msp-light text-base md:text-lg leading-7 max-w-[520px] opacity-90">{{ $pageContents['cta_subtitle']->value ?? 'Diskusikan kebutuhan perusahaan Anda dengan tim ahli kami untuk mendapatkan solusi yang tepat sasaran.' }}</p>
            <div class="flex flex-wrap gap-4 pt-2 justify-center">
                <a href="{{ route('contact') }}"
                    class="px-8 py-3.5 bg-msp-gold text-msp-navy font-bold text-sm rounded-xl transition-all duration-300 hover:brightness-110 hover:shadow-lg">{{ $pageContents['cta_button_primary']->value ?? 'Jadwalkan Konsultasi' }}</a>
                <a href="{{ route('services') }}"
                    class="px-8 py-3.5 border border-white/30 text-white font-semibold text-sm rounded-xl transition-all duration-300 hover:bg-white/10">{{ $pageContents['cta_button_secondary']->value ?? 'Lihat Layanan Lainnya' }}</a>
            </div>
        </div>
    </div>
</section>
@endsection
