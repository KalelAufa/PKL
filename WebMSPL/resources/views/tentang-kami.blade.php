@extends('layouts.app')

@section('title', 'Tentang Kami - PT Mentari Satya Perkasa')

@push('meta')
<meta name="description" content="Kenali PT Mentari Satya Perkasa lebih dekat — visi, misi, sejarah, dan tim kepemimpinan yang menggerakkan layanan outsourcing dan kepatuhan lingkungan kami.">
<meta property="og:title" content="Tentang Kami - PT Mentari Satya Perkasa">
<meta property="og:description" content="Kenali PT Mentari Satya Perkasa lebih dekat — visi, misi, dan tim kepemimpinan kami.">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url('/tentang-kami') }}">
<link rel="canonical" href="{{ url('/tentang-kami') }}">
@endpush

@section('content')
    {{-- Hero Section --}}
    <section class="pt-16 px-4 pb-0 bg-msp-bg" data-aos="fade" data-aos-duration="800">
        <div class="mx-2 md:mx-4 lg:mx-6 relative overflow-hidden rounded-2xl min-h-[300px] md:min-h-[400px]">
            <img src="{{ asset('images/' . ($pageContents['hero_image']->value ?? 'tentang-hero.png')) }}" alt="" class="absolute inset-0 w-full h-full object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-br from-[rgba(11,33,69,0.9)] to-[rgba(11,33,69,0.7)]"></div>
            <div class="absolute inset-0 flex flex-col justify-end px-6 pb-12">
                <div class="max-w-full lg:max-w-[768px] flex flex-col gap-4 md:gap-6 text-left">
                    <span class="w-fit px-3 py-1 bg-msp-gold-dark/10 text-msp-gold-dark font-mono text-xs leading-4 tracking-[0.05em] font-medium uppercase">Mitra Solusi Proteksi</span>
                    <h1 class="font-space text-white text-3xl sm:text-4xl md:text-5xl lg:text-6xl leading-snug md:leading-[60px] font-bold">{{ $pageContents['hero_title']->value ?? 'Tentang Kami' }}</h1>
                    <div class="max-w-full lg:max-w-[672px]">
                        <p class="text-msp-light text-base md:text-lg leading-6 md:leading-7">{{ $pageContents['hero_subtitle']->value ?? 'Membangun fondasi kepercayaan melalui layanan outsourcing dan kepatuhan lingkungan yang presisi untuk industri modern di Indonesia.' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Sejarah Section --}}
    <section class="py-16 md:py-20 bg-white" data-aos="fade-up">
        <div class="max-w-[1302px] mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-16">
            <div class="lg:col-span-4 flex flex-col gap-6">
                <h2 class="font-space text-msp-navy text-2xl md:text-3xl lg:text-3xl leading-10 tracking-[-0.01em] font-bold">{{ $pageContents['history_section_title']->value ?? 'Rekam Jejak & Dedikasi Kami' }}</h2>
                <div class="rounded-2xl overflow-hidden">
                    <img src="{{ asset('images/' . ($pageContents['story_image']->value ?? 'about-team.png')) }}" alt="PT Mentari Satya Perkasa" loading="lazy" class="w-full h-auto object-cover">
                </div>
            </div>
            <div class="lg:col-span-8 flex flex-col gap-8 lg:gap-12">
                <p class="text-msp-gray text-base md:text-lg leading-6 md:leading-[29.25px]">{{ $pageContents['story']->value ?? 'Berdiri dengan visi untuk menjadi pilar pendukung utama bagi operasional industri, PT Mentari Satya Perkasa (MSP) telah berkembang dari sebuah entitas konsultasi menjadi mitra strategis yang komprehensif. Perjalanan kami didorong oleh satu prinsip utama: Integritas Tanpa Kompromi.' }}</p>
                @if($milestones->count())
                <div class="flex flex-col gap-8 lg:gap-12 pl-6 lg:pl-8 border-l border-msp-border">
                    @foreach($milestones as $index => $milestone)
                    <div class="relative pl-6" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                        <div class="absolute -left-[25px] top-1.5 w-3 h-3 rounded-full bg-msp-gold-dark border-4 border-white shadow-sm"></div>
                        <span class="font-mono text-msp-gold-dark text-xs leading-4 tracking-[0.05em] font-medium uppercase">{{ $milestone->label }}</span>
                        <h3 class="font-space text-msp-navy text-xl md:text-2xl leading-8 font-bold mt-2">{{ $milestone->title }}</h3>
                        <p class="text-msp-gray text-sm md:text-base leading-6 mt-2">{{ $milestone->description }}</p>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </section>

    {{-- Tim Kami Section --}}
    <section class="py-16 md:py-20 bg-[#F6F7FB]" data-aos="fade-up">
        <div class="max-w-[1302px] mx-auto px-6 flex flex-col gap-12 lg:gap-16">
            <div class="flex flex-col items-center gap-4 text-center" data-aos="fade-up">
                <h2 class="font-space text-msp-navy text-2xl md:text-3xl lg:text-3xl leading-10 tracking-[-0.01em] font-bold">{{ $pageContents['team_section_title']->value ?? 'Tim Kepemimpinan' }}</h2>
                <p class="text-msp-gray text-sm md:text-base leading-6 max-w-[672px]">{{ $pageContents['team_section_subtitle']->value ?? 'Dipimpin oleh para profesional berpengalaman yang mengutamakan stabilitas institusional dan inovasi dalam setiap layanan.' }}</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($teamMembers as $index => $member)
                <div class="flex flex-col bg-white rounded-2xl border border-msp-border overflow-hidden transition-all duration-500 hover:shadow-xl hover:-translate-y-2" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                    <div class="bg-[#F0F3FF] flex items-center justify-center h-[280px] md:h-[300px] lg:h-[324px] overflow-hidden">
                        <img src="{{ $member->photo ? asset('images/' . $member->photo) : asset('images/placeholder-person.png') }}" alt="{{ $member->name }}" loading="lazy" class="w-full h-full object-cover object-center transition-transform duration-700 hover:scale-110">
                    </div>
                    <div class="flex flex-col gap-1 p-5 md:p-6 lg:p-8">
                        <h3 class="font-space text-msp-navy text-xl md:text-2xl leading-8 font-bold">{{ $member->name }}</h3>
                        <span class="font-mono text-msp-gold-dark text-xs leading-4 tracking-[-0.025em] font-medium uppercase">{{ $member->position }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="pt-16 md:pt-20 pb-0 px-4 bg-msp-bg" data-aos="fade-up">
        <div class="mx-2 md:mx-4 lg:mx-6 py-16 md:py-20 bg-gradient-to-r from-[#F2A71B] to-[#FBC34C] rounded-2xl">
            <div class="max-w-[1302px] mx-auto px-6 flex flex-col items-center gap-6 text-center">
                <h2 class="font-space text-msp-navy text-3xl md:text-4xl lg:text-5xl leading-snug lg:leading-[56px] tracking-[-0.02em] font-bold">{{ $pageContents['cta_title']->value ?? 'Siap Menjadi Mitra Anda' }}</h2>
                <p class="text-msp-navy text-base md:text-lg leading-7 max-w-[576px] opacity-90">{{ $pageContents['cta_subtitle']->value ?? 'Hubungi kami hari ini untuk konsultasi mengenai solusi proteksi dan operasional bisnis Anda.' }}</p>
                <div class="flex flex-wrap gap-4 pt-2 justify-center">
                    <a href="{{ route('contact') }}" class="px-8 md:px-10 py-4 bg-msp-navy text-white font-semibold text-base rounded-xl transition-all duration-300 hover:scale-105 hover:shadow-xl shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)]">Hubungi Kami Sekarang</a>
                    <a href="{{ route('services') }}" class="px-8 md:px-10 py-4 border border-[rgba(0,11,35,0.3)] text-msp-navy font-semibold text-base rounded-xl transition-all duration-300 hover:bg-msp-navy hover:text-white hover:scale-105">Lihat Layanan Kami</a>
                </div>
            </div>
        </div>
    </section>
@endsection
