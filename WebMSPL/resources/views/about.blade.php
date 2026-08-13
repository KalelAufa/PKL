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
    <section class="pt-16 px-4 pb-0 bg-msp-bg">
        <div class="mx-2 md:mx-4 lg:mx-6 relative overflow-hidden rounded-3xl min-h-[360px] md:min-h-[460px]">
            <img src="{{ asset('images/' . ($pageContents['hero_image']->value ?? 'tentang-hero.png')) }}" alt=""
                class="absolute inset-0 w-full h-full object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-t from-[#0B2145] via-[rgba(11,33,69,0.75)] to-[rgba(11,33,69,0.45)]"></div>
            <div class="absolute bottom-0 left-0 right-0 flex flex-col px-8 pb-12 md:px-12">
                <div class="max-w-[768px] flex flex-col gap-4 md:gap-5">
                    <span class="w-fit font-mono text-msp-gold text-xs tracking-widest uppercase">{{ $pageContents['hero_badge']->value ?? 'Mitra Solusi Proteksi' }}</span>
                    <h1 class="font-space text-white text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold leading-tight">{{ $pageContents['hero_title']->value ?? 'Tentang Kami' }}</h1>
                    <p class="text-msp-light text-base md:text-lg leading-7 max-w-[600px]">{{ $pageContents['hero_subtitle']->value ?? 'Membangun fondasi kepercayaan melalui layanan outsourcing dan kepatuhan lingkungan yang presisi untuk industri modern di Indonesia.' }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Sejarah Section --}}
    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-[1280px] mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
            {{-- Left: image + heading --}}
            <div class="lg:col-span-4 flex flex-col gap-6">
                <h2 class="font-space text-msp-navy text-2xl md:text-3xl font-bold leading-snug">{{ $pageContents['history_section_title']->value ?? 'Rekam Jejak & Dedikasi Kami' }}</h2>
                <div class="rounded-2xl overflow-hidden shadow-sm">
                    <img src="{{ asset('images/' . ($pageContents['story_image']->value ?? 'about-team.png')) }}"
                        alt="PT Mentari Satya Perkasa" loading="lazy" class="w-full h-auto object-cover">
                </div>
            </div>

            {{-- Right: story + milestones --}}
            <div class="lg:col-span-8 flex flex-col gap-8">
                <p class="text-msp-gray text-base md:text-lg leading-relaxed">{!! clean($pageContents['story']->value ?? 'Berdiri dengan visi untuk menjadi pilar pendukung utama bagi operasional industri, PT Mentari Satya Perkasa (MSP) telah berkembang dari sebuah entitas konsultasi menjadi mitra strategis yang komprehensif. Perjalanan kami didorong oleh satu prinsip utama: Integritas Tanpa Kompromi.') !!}</p>

                @if($milestones->count())
                <div class="flex flex-col gap-8 pl-6 border-l-2 border-msp-border">
                    @foreach($milestones as $index => $milestone)
                    <div class="relative pl-6">
                        <div class="absolute -left-[29px] top-1.5 w-3.5 h-3.5 rounded-full bg-msp-gold border-4 border-white shadow-sm"></div>
                        <span class="font-mono text-msp-gold text-xs tracking-widest uppercase">{{ $milestone->label }}</span>
                        <h3 class="font-space text-msp-navy text-xl font-bold mt-1.5">{{ $milestone->title }}</h3>
                        <p class="text-msp-gray text-sm md:text-base leading-relaxed mt-1.5">{{ $milestone->description }}</p>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </section>

    {{-- Tim Kami Section --}}
    <section class="py-16 md:py-24 bg-msp-bg">
        <div class="max-w-[1280px] mx-auto px-6 flex flex-col gap-12">
            <div class="flex flex-col items-center gap-3 text-center">
                <span class="font-mono text-msp-gold text-xs tracking-widest uppercase">Pencapaian</span>
                <h2 class="font-space text-msp-navy text-2xl md:text-3xl font-bold leading-snug">{{ $pageContents['team_section_title']->value ?? 'Tim Kepemimpinan' }}</h2>
                <p class="text-msp-gray text-sm md:text-base leading-relaxed max-w-[600px]">{{ $pageContents['team_section_subtitle']->value ?? 'Dipimpin oleh para profesional berpengalaman yang mengutamakan stabilitas institusional dan inovasi dalam setiap layanan.' }}</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($teamMembers as $index => $member)
                <div class="flex flex-col bg-white rounded-2xl border border-msp-border overflow-hidden shadow-sm hover:shadow-md hover:-translate-y-1 transition duration-300">
                    <div class="bg-[#F0F3FF] flex items-center justify-center h-[280px] md:h-[300px] overflow-hidden">
                        <img src="{{ $member->photo ? asset('images/' . $member->photo) : asset('images/placeholder-person.png') }}"
                            alt="{{ $member->name }}" loading="lazy"
                            class="w-full h-full object-cover object-center transition-transform duration-500 hover:-translate-y-0.5">
                    </div>
                    <div class="flex flex-col gap-1 p-5 md:p-6">
                        <h3 class="font-space text-msp-navy text-lg font-bold">{{ $member->name }}</h3>
                        <span class="font-mono text-msp-gold text-xs tracking-widest uppercase">{{ $member->position }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-16 md:py-24 px-4 bg-msp-bg">
        <div class="mx-2 md:mx-4 lg:mx-6 py-16 md:py-20 bg-msp-navy rounded-3xl">
            <div class="max-w-[1280px] mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-8">
                <div class="flex flex-col gap-3 max-w-xl">
                    <h2 class="font-space text-white text-3xl md:text-4xl lg:text-5xl font-bold leading-snug tracking-tight">{{ $pageContents['cta_title']->value ?? 'Siap Menjadi Mitra Anda' }}</h2>
                    <p class="text-msp-light text-base md:text-lg leading-7 opacity-90">{{ $pageContents['cta_subtitle']->value ?? 'Hubungi kami hari ini untuk konsultasi mengenai solusi proteksi dan operasional bisnis Anda.' }}</p>
                </div>
                <div class="flex flex-wrap gap-4 shrink-0">
                    <a href="{{ route('contact') }}"
                        class="px-8 py-3.5 bg-msp-gold text-msp-navy font-bold text-sm rounded-xl transition duration-300 hover:brightness-110 hover:shadow-lg whitespace-nowrap">{{ $pageContents['cta_button_primary']->value ?? 'Hubungi Kami Sekarang' }}</a>
                    <a href="{{ route('services') }}"
                        class="px-8 py-3.5 border border-white/30 text-white font-semibold text-sm rounded-xl transition duration-300 hover:bg-white/10 whitespace-nowrap">{{ $pageContents['cta_button_secondary']->value ?? 'Lihat Layanan Kami' }}</a>
                </div>
            </div>
        </div>
    </section>
@endsection
