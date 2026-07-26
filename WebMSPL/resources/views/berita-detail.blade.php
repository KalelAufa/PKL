@extends('layouts.app')

@section('title', $news->title . ' - PT Mentari Satya Perkasa')

@push('meta')
<meta name="description" content="{{ Str::limit(strip_tags($news->excerpt ?? $news->content), 160) }}">
<meta property="og:title" content="{{ $news->title }} - PT Mentari Satya Perkasa">
<meta property="og:description" content="{{ Str::limit(strip_tags($news->excerpt ?? $news->content), 160) }}">
<meta property="og:type" content="article">
<meta property="og:url" content="{{ url('/berita/' . $news->slug) }}">
@if($news->thumbnail)
<meta property="og:image" content="{{ asset('storage/' . $news->thumbnail) }}">
@endif
<link rel="canonical" href="{{ url('/berita/' . $news->slug) }}">
@endpush

@section('body_class', 'bg-msp-bg font-inter antialiased overflow-x-hidden')

@section('content')
    {{-- Article Detail --}}
    <section class="mt-16 md:mt-20">
        <div class="max-w-[896px] mx-auto px-6 pt-10 md:pt-16 pb-20 flex flex-col gap-8">

            {{-- Breadcrumb --}}
            <nav aria-label="Breadcrumb" class="flex items-center gap-2 text-sm text-msp-gray">
                <a href="{{ route('news.index') }}" class="flex items-center gap-1.5 text-msp-blue hover:underline font-medium">
                    <i class="fas fa-arrow-left text-xs"></i>
                    Kembali ke Berita
                </a>
                <span class="text-msp-gray-light">/</span>
                <span class="text-msp-gray truncate max-w-[300px]">{{ Str::limit($news->title, 50) }}</span>
            </nav>

            {{-- Article Header --}}
            <div class="flex flex-col items-center gap-2" data-aos="fade-down">
                <span class="font-mono font-bold text-msp-gold-dark text-[12px] leading-[14px] tracking-[1.2px] uppercase text-center">{{ $news->category?->name ?? 'Uncategorized' }} &bull; {{ \Carbon\Carbon::parse($news->published_at)->translatedFormat('d M Y') }}</span>
                <h1 class="font-space font-bold text-msp-dark text-3xl sm:text-4xl md:text-5xl leading-[36px] sm:leading-[48px] md:leading-[62px] tracking-[-1.12px] text-center">{{ $news->title }}</h1>
                @if($news->excerpt)
                    <p class="text-msp-gray text-[16px] md:text-[18px] leading-[26px] md:leading-[29px] text-center max-w-[672px] pt-2">{{ $news->excerpt }}</p>
                @endif
            </div>

            {{-- Feature Image --}}
            <div class="overflow-hidden rounded-2xl" data-aos="zoom-in" data-aos-delay="100">
                <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="{{ $news->title }}"
                    class="w-full h-[340px] md:h-[480px] object-cover">
            </div>

            {{-- Article Body --}}
            <div class="flex flex-col gap-6">
                <div class="text-[#191c1d] text-[16px] leading-[26px] article-content" data-aos="fade-up" data-aos-delay="200">
                    {!! clean($news->content) !!}
                </div>
            </div>

            {{-- Author Info --}}
            <div class="border-t border-[#C5C6CF] pt-[18px] flex items-center gap-4" data-aos="fade-up" data-aos-delay="900">
                <div class="w-[48px] h-[48px] rounded-xl bg-[#EDEEEF] flex items-center justify-center shrink-0 overflow-hidden">
                    <i class="fas fa-user text-2xl text-[#44474E]"></i>
                </div>
                <div>
                    <p class="font-bold text-msp-dark text-[16px] leading-[24px]">{{ $news->author?->name ?? 'Tim Redaksi MSP' }}</p>
                    @if($news->author_role)
                        <p class="font-bold text-msp-gray text-[12px] leading-[14px] tracking-[0.6px]">{{ $news->author_role }}</p>
                    @endif
                </div>
            </div>

        </div>
    </section>

    {{-- Related News --}}
    @if($relatedNews->isNotEmpty())
    <section class="bg-[#F3F4F5] py-20">
        <div class="max-w-[1200px] mx-auto px-6">
            <h2 class="font-space font-semibold text-msp-dark text-2xl md:text-3xl leading-[36px] md:leading-[42px] mb-[32px]">Berita Terkait</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedNews as $item)
                <article class="bg-[#F8F9FA] border border-[#C5C6CF] rounded-2xl overflow-hidden flex flex-col">
                    <div class="overflow-hidden relative h-[206px] shrink-0">
                        <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}"
                            class="absolute w-full h-full left-0 top-0 max-w-none object-cover">
                    </div>
                    <div class="flex flex-col gap-2 p-6 flex-1">
                        <span class="font-mono font-bold text-msp-gold-dark text-[12px] leading-[14px] tracking-[1.2px] uppercase">{{ $item->category?->name ?? 'Uncategorized' }} &bull; {{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('d M Y') }}</span>
                        <h3 class="font-space font-semibold text-msp-dark text-xl md:text-2xl leading-[28px] md:leading-[34px]">{{ $item->title }}</h3>
                        <p class="text-msp-gray text-[16px] leading-[26px] flex-1">{{ $item->excerpt }}</p>
                        <a href="{{ route('news.show', $item->slug) }}" class="flex items-center gap-1 text-msp-navy font-bold text-sm leading-6 transition-all duration-300 hover:gap-2 group mt-auto">
                            Baca Selengkapnya
                            <i class="fas fa-arrow-right transition-transform duration-300 group-hover:translate-x-1"></i>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif
@endsection
