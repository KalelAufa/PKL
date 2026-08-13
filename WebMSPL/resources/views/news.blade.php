@extends('layouts.app')

@section('title', 'Berita - PT Mentari Satya Perkasa')

@push('meta')
<meta name="description" content="Berita, artikel, dan pengumuman terbaru dari PT Mentari Satya Perkasa seputar layanan outsourcing, lingkungan, dan pengendalian hama.">
<meta property="og:title" content="Berita - PT Mentari Satya Perkasa">
<meta property="og:description" content="Informasi terbaru seputar layanan dan kegiatan PT Mentari Satya Perkasa.">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url('/berita') }}">
<link rel="canonical" href="{{ url('/berita') }}">
@endpush

@section('content')

{{-- Hero Section --}}
<section class="pt-16 px-4 pb-0 bg-msp-bg">
    <div class="mx-2 md:mx-4 lg:mx-6 relative overflow-hidden rounded-3xl min-h-[360px] md:min-h-[440px]">
        @if($featuredNews?->thumbnail)
            <img src="{{ $featuredNews->thumbnail_url }}" alt="{{ $featuredNews->title }}"
                class="absolute inset-0 w-full h-full object-cover object-center">
        @elseif(!empty($pageContents['hero_image']->value))
            <img src="{{ asset('images/' . $pageContents['hero_image']->value) }}" alt=""
                class="absolute inset-0 w-full h-full object-cover object-center">
        @else
            <div class="absolute inset-0 bg-msp-navy"></div>
        @endif
        <div class="absolute inset-0 bg-gradient-to-t from-[#0B2145] via-[rgba(11,33,69,0.75)] to-[rgba(11,33,69,0.45)]"></div>
        <div class="absolute bottom-0 left-0 right-0 flex flex-col px-8 pb-12 md:px-12">
            <div class="max-w-[720px] flex flex-col gap-4 md:gap-5">
                @if($featuredNews)
                    <h1 class="font-space text-white text-3xl sm:text-4xl md:text-5xl font-bold leading-tight">{{ $featuredNews->title }}</h1>
                    <p class="text-msp-light text-base md:text-lg leading-7 max-w-[600px]">{{ $featuredNews->excerpt }}</p>
                    <a href="{{ route('news.show', $featuredNews->slug) }}"
                        class="inline-flex items-center gap-2 px-6 py-3 bg-msp-gold text-msp-navy font-bold text-sm rounded-xl w-fit transition duration-300 hover:brightness-110 hover:shadow-lg">
                        Baca Selengkapnya
                        <i class="fas fa-arrow-right"></i>
                    </a>
                @else
                    <h1 class="font-space text-white text-3xl sm:text-4xl md:text-5xl font-bold leading-tight">{{ $pageContents['hero_title']->value ?? 'Berita & Artikel Terbaru' }}</h1>
                    <p class="text-msp-light text-base md:text-lg leading-7 max-w-[600px]">{{ $pageContents['hero_subtitle']->value ?? 'Informasi terbaru seputar layanan, kegiatan, dan pengumuman penting dari PT Mentari Satya Perkasa.' }}</p>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- Filter Bar --}}
<section class="bg-white border-b border-msp-border sticky top-16 z-40">
    <div class="max-w-[1280px] mx-auto px-6">
        <div class="flex flex-wrap items-center gap-1 py-3 overflow-x-auto">
            <a href="{{ route('news.index') }}"
                class="px-4 py-2 rounded-lg text-sm font-medium transition-colors whitespace-nowrap {{ !request('category') ? 'bg-msp-navy text-white' : 'text-msp-gray hover:text-msp-navy hover:bg-msp-bg' }}">Semua</a>
            @foreach($categories as $category)
                <a href="{{ route('news.index', ['category' => $category->slug]) }}"
                    class="px-4 py-2 rounded-lg text-sm font-medium transition-colors whitespace-nowrap {{ request('category') === $category->slug ? 'bg-msp-navy text-white' : 'text-msp-gray hover:text-msp-navy hover:bg-msp-bg' }}">{{ $category->name }}</a>
            @endforeach
        </div>
    </div>
</section>

{{-- Article List --}}
<section class="py-12 md:py-20 bg-msp-bg">
    <div class="max-w-[1280px] mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            @forelse($news as $item)
                <article class="bg-white border border-msp-border rounded-2xl overflow-hidden flex flex-col shadow-sm hover:shadow-md hover:-translate-y-1 transition duration-300">
                    <div class="overflow-hidden relative h-52 shrink-0 bg-[#E8EDF5]">
                        @if($item->thumbnail)
                            <img src="{{ $item->thumbnail_url }}" alt="{{ $item->title }}"
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 hover:-translate-y-0.5">
                        @else
                            <div class="absolute inset-0 flex items-center justify-center">
                                <i class="fas fa-image text-4xl text-[#7686AC]"></i>
                            </div>
                        @endif
                    </div>
                    <div class="flex flex-col gap-3 p-6 flex-1">
                        <div class="flex items-center justify-between">
                            <span class="font-mono text-msp-gold text-[10px] tracking-widest uppercase font-medium">{{ $item->category?->name ?? 'Uncategorized' }}</span>
                            <span class="text-msp-gray text-[10px] leading-4">{{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('d M Y') }}</span>
                        </div>
                        <h3 class="font-space font-semibold text-msp-navy text-lg leading-snug">{{ $item->title }}</h3>
                        <p class="text-msp-gray text-sm leading-relaxed flex-1">{{ $item->excerpt }}</p>
                        <a href="{{ route('news.show', $item->slug) }}"
                            class="inline-flex items-center gap-1.5 text-msp-navy font-bold text-sm transition duration-300 hover:gap-2.5 group mt-auto">
                            Baca Selengkapnya
                            <i class="fas fa-arrow-right text-xs transition-transform duration-300 group-hover:translate-x-1"></i>
                        </a>
                    </div>
                </article>
            @empty
                <div class="col-span-full text-center py-16">
                    <p class="text-msp-gray text-lg">Belum ada berita.</p>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="flex justify-center pt-12">
            {{ $news->links() }}
        </div>
    </div>
</section>

{{-- Newsletter Section --}}
<section class="bg-msp-navy py-16 md:py-20">
    <div class="max-w-[1280px] mx-auto px-6">
        <div class="flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="flex flex-col gap-3 md:max-w-[520px]">
                <h2 class="font-space font-bold text-white text-2xl leading-snug">{{ $pageContents['newsletter_title']->value ?? 'Tetap Terhubung dengan MSP' }}</h2>
                <p class="text-msp-light/80 text-sm md:text-base leading-relaxed">{{ $pageContents['newsletter_subtitle']->value ?? 'Dapatkan informasi terbaru seputar layanan, artikel, dan pengumuman penting dari PT Mentari Satya Perkasa langsung di email Anda.' }}</p>
            </div>
            <div class="w-full md:w-auto shrink-0" x-data="{ status: '', msg: '', loading: false }">
                <div x-show="status === 'success'" class="mb-3 px-4 py-2.5 bg-green-500/20 text-green-200 text-sm rounded-xl" x-text="msg"></div>
                <div x-show="status === 'error'" class="mb-3 px-4 py-2.5 bg-red-500/20 text-red-200 text-sm rounded-xl" x-text="msg"></div>
                <form method="POST" action="{{ route('news.subscribe') }}"
                      class="flex flex-col sm:flex-row gap-3" aria-label="Langganan newsletter"
                      @submit.prevent="
                        loading = true; status = ''; msg = '';
                        fetch($el.action, {method: 'POST', headers: {'X-CSRF-TOKEN': $el.querySelector('[name=_token]').value, 'Content-Type': 'application/x-www-form-urlencoded'}, body: new URLSearchParams(new FormData($el))})
                          .then(r => r.json())
                          .then(d => { status = d.success !== false ? 'success' : 'error'; msg = d.message; if (status === 'success') $el.reset(); })
                          .catch(() => { status = 'error'; msg = 'Terjadi kesalahan. Coba lagi.'; })
                          .finally(() => loading = false)
                      ">
                    @csrf
                    <label for="newsletter-email" class="sr-only">Alamat email</label>
                    <input id="newsletter-email" type="email" name="email" placeholder="Masukkan email Anda" required
                        class="px-5 py-3 bg-white rounded-xl text-msp-navy text-sm placeholder-msp-gray outline-none focus:ring-2 focus:ring-msp-gold transition w-full sm:w-80">
                    <button type="submit" :disabled="loading"
                        class="px-6 py-3 bg-msp-gold text-msp-navy font-bold text-sm rounded-xl whitespace-nowrap transition duration-300 hover:brightness-110 hover:shadow-lg disabled:opacity-60 disabled:cursor-not-allowed"
                        x-text="loading ? 'Mendaftar...' : 'Langganan'">Langganan</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
