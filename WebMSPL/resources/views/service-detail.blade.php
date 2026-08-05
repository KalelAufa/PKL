@php
    $title = $service->title ?? 'Layanan';
    $breadcrumb = $service->category->title ?? ($service->category ?? 'Layanan');
@endphp

@extends('layouts.app')

@section('title', $title . ' — PT Mentari Satya Perkasa')

@push('meta')
<meta name="description" content="{{ Str::limit(strip_tags($service->description ?? $title . ' - layanan profesional PT Mentari Satya Perkasa.'), 160) }}">
<meta property="og:title" content="{{ $title }} — PT Mentari Satya Perkasa">
<meta property="og:description" content="{{ Str::limit(strip_tags($service->description ?? ''), 160) }}">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<link rel="canonical" href="{{ url()->current() }}">
@endpush

@section('content')
{{-- Hero --}}
<section class="pt-16 px-4 pb-0 bg-msp-bg">
    <div class="mx-2 md:mx-4 lg:mx-6 relative overflow-hidden rounded-3xl min-h-[280px] md:min-h-[380px] lg:min-h-[460px]">
        @if($service && $service->hero_image)
            <img src="{{ asset('images/' . $service->hero_image) }}" alt="{{ $service->title }}"
                class="absolute inset-0 w-full h-full object-cover">
        @else
            <img src="{{ asset('images/layanan-hero.png') }}" alt="Layanan"
                class="absolute inset-0 w-full h-full object-cover">
        @endif
        <div class="absolute inset-0 bg-gradient-to-t from-[#0B2145] via-[rgba(11,33,69,0.75)] to-[rgba(11,33,69,0.45)]"></div>
        <div class="absolute bottom-0 left-0 right-0 flex flex-col px-8 pb-10 md:px-12">
            <div class="flex flex-col gap-3">
                {{-- Breadcrumb --}}
                <nav class="flex items-center gap-2 text-sm" aria-label="Breadcrumb">
                    <a href="{{ route('home') }}" class="text-white/60 hover:text-msp-gold transition-colors">Beranda</a>
                    <span class="text-white/30">›</span>
                    <a href="{{ route('services') }}" class="text-white/60 hover:text-msp-gold transition-colors">{{ $breadcrumb }}</a>
                    <span class="text-white/30">›</span>
                    <span class="text-msp-gold font-medium">{{ $title }}</span>
                </nav>
                <h1 class="font-space text-white text-3xl md:text-5xl lg:text-6xl font-bold leading-tight">{{ $title }}</h1>
            </div>
        </div>
    </div>
</section>

{{-- Content + Sidebar --}}
<section class="py-10 md:py-16 lg:py-20 bg-white">
    <div class="max-w-[1280px] mx-auto px-6">
        <div class="flex flex-col lg:flex-row gap-8 lg:gap-12">
            <main class="flex-1 flex flex-col gap-6 md:gap-10 lg:gap-14 min-w-0">
                @switch($slug)
                    @case('outsourcing')
                        @include('services.partials.outsourcing')
                        @break

                    @case('perizinan-lingkungan')
                        @include('services.partials.perizinan')
                        @break

                    @case('pest-control')
                        @include('services.partials.pest')
                        @break

                    @default
                        <div class="flex flex-col gap-4">
                            <h2 class="font-space font-semibold text-msp-dark text-2xl md:text-3xl">{{ $service->title }}</h2>
                            <div class="text-msp-gray text-base leading-relaxed article-content">{!! clean($service->description) !!}</div>
                        </div>
                @endswitch
            </main>

            @include('partials.service-sidebar')
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-16 md:py-24 px-4 bg-msp-bg">
    <div class="mx-2 md:mx-4 lg:mx-6 py-14 md:py-18 bg-msp-navy rounded-3xl">
        <div class="max-w-[1280px] mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-8">
            <div class="flex flex-col gap-3">
                <span class="font-mono text-msp-gold text-xs tracking-widest uppercase">Konsultasi Gratis</span>
                <h2 class="font-space text-white text-2xl md:text-3xl lg:text-4xl font-bold leading-snug">Butuh Konsultasi?</h2>
                <p class="text-msp-light text-base md:text-lg leading-relaxed max-w-[480px]">Konsultasi gratis dengan tim ahli kami untuk kebutuhan bisnis Anda.</p>
            </div>
            <a href="{{ route('contact') }}"
                class="shrink-0 inline-flex items-center gap-2 px-8 py-3.5 bg-msp-gold text-msp-navy font-bold text-sm rounded-xl transition-all duration-300 hover:brightness-110 hover:shadow-lg whitespace-nowrap">
                Hubungi Kami
                <i class="fas fa-arrow-right text-xs"></i>
            </a>
        </div>
    </div>
</section>
@endsection
