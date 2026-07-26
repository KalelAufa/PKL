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
<section class="w-full bg-msp-navy overflow-hidden">
    <div class="relative w-full h-[260px] md:h-[340px] lg:h-[440px] flex items-center justify-center">
        <div class="absolute inset-0">
            @if($service && $service->hero_image)
                <img src="{{ asset('images/' . $service->hero_image) }}" alt="{{ $service->title }}" class="w-full h-full object-cover">
            @else
                <img src="{{ asset('images/layanan-hero.png') }}" alt="Layanan" class="w-full h-full object-cover">
            @endif
            <div class="absolute inset-0 bg-gradient-to-r from-[rgba(11,33,69,0.9)] to-[rgba(11,33,69,0.6)]"></div>
        </div>
        <div class="relative z-10 flex flex-col gap-2 md:gap-4 items-center">
            <h1 class="font-space text-white text-center text-3xl md:text-5xl lg:text-6xl font-bold leading-tight">
                {{ $title }}
            </h1>
            <div class="flex items-center gap-2 text-sm md:text-base">
                <a href="{{ route('home') }}" class="text-white/70 hover:text-msp-gold transition-colors">Beranda</a>
                <span class="text-white/40">›</span>
                @if(isset($breadcrumb))
                    <a href="{{ route('services') }}" class="text-white/70 hover:text-msp-gold transition-colors">{{ $breadcrumb }}</a>
                    <span class="text-white/40">›</span>
                @endif
                <span class="text-msp-gold font-medium">{{ $title }}</span>
            </div>
        </div>
    </div>
</section>

{{-- Content + Sidebar --}}
<section class="w-full bg-msp-bg py-10 md:py-16 lg:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-8 lg:gap-12">
            <main class="flex-1 flex flex-col gap-6 md:gap-10 lg:gap-14 max-w-full lg:max-w-[calc(100%-276px-48px)]">
                @switch($slug)
                    @case('outsourcing')
                        @include('services.partials._outsourcing')
                        @break

                    @case('perizinan-lingkungan')
                        @include('services.partials._perizinan')
                        @break

                    @case('pest-control')
                        @include('services.partials._pest')
                        @break

                    @default
                        <div class="flex flex-col gap-4" data-aos="fade-up">
                            <h2 class="font-space font-semibold text-msp-dark text-2xl md:text-3xl">{{ $service->title }}</h2>
                            <div class="text-msp-gray text-base leading-7 article-content">{!! clean($service->description) !!}</div>
                        </div>
                @endswitch
            </main>

            @include('partials.service-sidebar')
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="w-full bg-msp-navy py-12 md:py-16 lg:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-center gap-6 md:gap-10" data-aos="fade-up">
            <div class="flex flex-col gap-2 md:gap-4">
                <h2 class="font-space text-white text-2xl md:text-3xl lg:text-4xl font-bold leading-snug lg:leading-[44px]">Butuh Konsultasi?</h2>
                <p class="text-msp-light text-base md:text-lg leading-6 md:leading-[29.25px]">Konsultasi gratis dengan tim ahli kami untuk kebutuhan bisnis Anda.</p>
            </div>
            <a href="{{ route('contact') }}" class="bg-msp-gold text-msp-dark px-8 py-4 font-bold text-sm leading-[14px] tracking-[0.6px] uppercase rounded-xl transition-all duration-500 hover:bg-msp-gold/90 hover:shadow-xl hover:shadow-[rgba(242,167,27,0.25)] whitespace-nowrap">Hubungi Kami</a>
        </div>
    </div>
</section>
@endsection
