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
    <section class="pt-16 px-4 pb-0 bg-msp-bg" data-aos="fade" data-aos-duration="800">
        <div class="mx-2 md:mx-4 lg:mx-6 relative overflow-hidden rounded-2xl min-h-[350px] md:min-h-[420px]">
            <img src="{{ asset('images/berita-hero.png') }}" alt=""
                class="absolute inset-0 w-full h-full object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-br from-[rgba(11,33,69,0.9)] to-[rgba(11,33,69,0.7)]"></div>
            <div class="absolute inset-0 flex flex-col justify-end px-6 pb-12">
                <div class="max-w-full lg:max-w-[768px] flex flex-col gap-4 md:gap-6 text-left">
                    @if($featuredNews)
                        <span class="w-fit px-3 py-1 bg-[rgba(242,167,27,0.15)] text-msp-gold font-mono text-xs leading-4 tracking-[0.05em] font-medium uppercase">Featured Story</span>
                        <h1 class="font-space text-white text-3xl sm:text-4xl md:text-5xl lg:text-6xl leading-snug md:leading-[60px] font-bold">{{ $featuredNews->title }}</h1>
                        <div class="max-w-full lg:max-w-[672px]">
                            <p class="text-msp-light text-base md:text-lg leading-6 md:leading-7">{{ $featuredNews->excerpt }}</p>
                        </div>
                        <a href="{{ route('news.show', $featuredNews->slug) }}" class="inline-flex items-center gap-2 px-6 py-3 bg-msp-gold text-msp-navy font-bold text-sm rounded-2xl w-fit transition-all duration-300 hover:bg-[#fbc34c] hover:shadow-lg">
                            Baca Selengkapnya
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    @else
                        <h1 class="font-space text-white text-3xl sm:text-4xl md:text-5xl lg:text-6xl leading-snug md:leading-[60px] font-bold">Berita &amp; Artikel Terbaru</h1>
                        <div class="max-w-full lg:max-w-[672px]">
                            <p class="text-msp-light text-base md:text-lg leading-6 md:leading-7">Informasi terbaru seputar layanan, kegiatan, dan pengumuman penting dari PT Mentari Satya Perkasa.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- Filter Bar --}}
    <section class="bg-white border-b border-msp-border" data-aos="fade-up">
        <div class="max-w-[1302px] mx-auto px-6">
            <div class="flex flex-wrap items-center justify-between py-4 gap-4">
                <div class="flex flex-wrap items-center gap-6 md:gap-8">
                    <a href="{{ route('news.index') }}" class="text-sm leading-5 transition-colors {{ !request('category') ? 'text-msp-navy font-semibold border-b-2 border-msp-gold pb-1' : 'text-msp-gray hover:text-msp-navy' }}">Semua</a>
                    @foreach($categories as $category)
                        <a href="{{ route('news.index', ['category' => $category->slug]) }}" class="text-sm leading-5 transition-colors {{ request('category') === $category->slug ? 'text-msp-navy font-semibold border-b-2 border-msp-gold pb-1' : 'text-msp-gray hover:text-msp-navy' }}">{{ $category->name }}</a>
                    @endforeach
                </div>
                {{-- Sort removed — non-functional placeholder --}}
            </div>
        </div>
    </section>

    {{-- Article List --}}
    <section class="py-12 md:py-20">
        <div class="max-w-[1302px] mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-[40px] gap-y-[48px]">
                @forelse($news as $item)
                    <article data-category="{{ $item->category?->name ?? 'Uncategorized' }}" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" class="bg-white border border-msp-border rounded-2xl overflow-hidden flex flex-col">
                        <div class="overflow-hidden relative h-[200px] shrink-0 bg-[#E8EDF5]">
                            @if($item->thumbnail)
                                <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}"
                                    class="absolute w-full h-full left-0 top-0 max-w-none object-cover">
                            @else
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <i class="fas fa-image text-4xl text-[#7686AC]"></i>
                                </div>
                            @endif
                        </div>
                        <div class="flex flex-col gap-3 p-6 flex-1">
                            <div class="flex items-center justify-between">
                                <span class="font-mono font-medium text-msp-navy text-[10px] leading-4 tracking-[0.6px] uppercase">{{ $item->category?->name ?? 'Uncategorized' }}</span>
                                <span class="text-msp-gray text-[10px] leading-4">{{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('d M Y') }}</span>
                            </div>
                            <h3 class="font-space font-semibold text-msp-navy text-lg md:text-xl leading-[24px] md:leading-[26px]">{{ $item->title }}</h3>
                            <p class="text-msp-gray font-light text-sm leading-[22px] flex-1">{{ $item->excerpt }}</p>
                            <a href="{{ route('news.show', $item->slug) }}" class="flex items-center gap-1 text-msp-navy font-bold text-sm leading-6 transition-all duration-300 hover:gap-2 group mt-auto">
                                Baca Selengkapnya
                                <i class="fas fa-arrow-right transition-transform duration-300 group-hover:translate-x-1"></i>
                            </a>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full text-center py-12">
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
        <div class="max-w-[1302px] mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center justify-between gap-8">
                <div class="flex flex-col gap-4 md:max-w-[520px]">
                    <h2 class="font-space font-bold text-white text-2xl leading-[32px] md:leading-[36px]">Tetap Terhubung dengan MSP</h2>
                    <p class="text-[rgba(220,226,243,0.8)] text-sm md:text-base leading-6">Dapatkan informasi terbaru seputar layanan, artikel, dan pengumuman penting dari PT Mentari Satya Perkasa langsung di email Anda.</p>
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
                            class="px-5 py-3 bg-white rounded-2xl text-msp-navy text-sm leading-5 placeholder-msp-gray outline-none focus:ring-2 focus:ring-msp-gold transition-all w-full sm:w-[320px]">
                        <button type="submit" :disabled="loading"
                            class="px-6 py-3 bg-msp-gold text-msp-navy font-bold text-sm leading-5 rounded-2xl whitespace-nowrap transition-all duration-300 hover:bg-[#fbc34c] hover:shadow-lg disabled:opacity-60 disabled:cursor-not-allowed"
                            x-text="loading ? 'Mendaftar...' : 'Langganan'">Langganan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
