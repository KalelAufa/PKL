@extends('layouts.app')

@section('title', $news->title . ' - PT Mentari Satya Perkasa')

@push('meta')
<meta name="description" content="{{ Str::limit(strip_tags($news->excerpt ?? $news->content), 160) }}">
<meta property="og:title" content="{{ $news->title }} - PT Mentari Satya Perkasa">
<meta property="og:description" content="{{ Str::limit(strip_tags($news->excerpt ?? $news->content), 160) }}">
<meta property="og:type" content="article">
<meta property="og:url" content="{{ url('/berita/' . $news->slug) }}">
@if($news->thumbnail)
<meta property="og:image" content="{{ $news->thumbnail_url }}">
@endif
<link rel="canonical" href="{{ url('/berita/' . $news->slug) }}">
@endpush

@section('body_class', 'bg-msp-bg font-inter antialiased overflow-x-hidden')

@section('content')
    {{-- Article Detail --}}
    <section class="mt-16 md:mt-20 bg-white">
        <div class="max-w-[800px] mx-auto px-6 pt-10 md:pt-16 pb-20 flex flex-col gap-8">

            {{-- Breadcrumb --}}
            <nav aria-label="Breadcrumb" class="flex items-center gap-2 text-sm text-msp-gray">
                <a href="{{ route('news.index') }}"
                    class="inline-flex items-center gap-1.5 text-msp-blue font-medium hover:text-msp-navy transition-colors">
                    <i class="fas fa-arrow-left text-xs"></i>
                    Kembali ke Berita
                </a>
                <span class="text-msp-gray/40">/</span>
                <span class="text-msp-gray truncate min-w-0 flex-1">{{ Str::limit($news->title, 50) }}</span>
            </nav>

            {{-- Article Header --}}
            <div class="flex flex-col gap-3">
                <span class="font-mono text-msp-gold text-xs tracking-widest uppercase">{{ $news->category?->name ?? 'Uncategorized' }} &bull; {{ \Carbon\Carbon::parse($news->published_at)->translatedFormat('d M Y') }}</span>
                <h1 class="font-space font-bold text-msp-dark text-3xl sm:text-4xl md:text-5xl leading-tight tracking-tight">{{ $news->title }}</h1>
                @if($news->excerpt)
                    <p class="text-msp-gray text-base md:text-lg leading-relaxed max-w-[640px] pt-1">{{ $news->excerpt }}</p>
                @endif
            </div>

            {{-- Feature Image --}}
            <div class="overflow-hidden rounded-2xl shadow-sm">
                <img src="{{ $news->thumbnail_url }}" alt="{{ $news->title }}"
                    class="w-full h-[320px] md:h-[460px] object-cover">
            </div>

            {{-- Article Body --}}
            <div class="text-msp-dark text-base leading-relaxed article-content">
                {!! clean($news->content) !!}
            </div>

            {{-- Author Info --}}
            <div class="border-t border-msp-border pt-5 flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-msp-bg flex items-center justify-center shrink-0 overflow-hidden">
                    <i class="fas fa-user text-2xl text-msp-gray"></i>
                </div>
                <div>
                    <p class="font-space font-bold text-msp-dark text-base">{{ $news->author?->name ?? 'Tim Redaksi MSP' }}</p>
                    @if($news->author_role)
                        <p class="font-mono text-msp-gold text-xs tracking-widest uppercase mt-0.5">{{ $news->author_role }}</p>
                    @endif
                </div>
            </div>

        </div>
    </section>

    {{-- Related News --}}
    @if($relatedNews->isNotEmpty())
    <section class="bg-msp-bg py-16 md:py-20">
        <div class="max-w-[1280px] mx-auto px-6">
            <div class="flex flex-col gap-2 mb-10">
                <span class="font-mono text-msp-gold text-xs tracking-widest uppercase">Baca Juga</span>
                <h2 class="font-space font-semibold text-msp-dark text-2xl md:text-3xl">Berita Terkait</h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach($relatedNews as $item)
                <article class="bg-white border border-msp-border rounded-2xl overflow-hidden flex flex-col shadow-sm hover:shadow-md hover:-translate-y-1 transition duration-300">
                    <div class="overflow-hidden relative h-52 shrink-0">
                        <img src="{{ $item->thumbnail_url }}" alt="{{ $item->title }}"
                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 hover:-translate-y-0.5">
                    </div>
                    <div class="flex flex-col gap-2 p-6 flex-1">
                        <span class="font-mono text-msp-gold text-[10px] tracking-widest uppercase font-medium">{{ $item->category?->name ?? 'Uncategorized' }} &bull; {{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('d M Y') }}</span>
                        <h3 class="font-space font-semibold text-msp-dark text-xl leading-snug">{{ $item->title }}</h3>
                        <p class="text-msp-gray text-sm leading-relaxed flex-1">{{ $item->excerpt }}</p>
                        <a href="{{ route('news.show', $item->slug) }}"
                            class="inline-flex items-center gap-1.5 text-msp-navy font-bold text-sm transition duration-300 hover:gap-2.5 group mt-auto">
                            Baca Selengkapnya
                            <i class="fas fa-arrow-right text-xs transition-transform duration-300 group-hover:translate-x-1"></i>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif
@endsection
