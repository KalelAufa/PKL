{{-- Intro: image stack + description --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-20 items-center">
    <div class="flex flex-col gap-6 order-2 md:order-1">
        <p class="font-mono text-msp-gold text-xs tracking-widest uppercase">Tentang Layanan</p>
        <h2 class="font-space text-msp-navy text-2xl md:text-3xl lg:text-[38px] leading-snug font-bold">
            Solusi Perizinan Lingkungan Terintegrasi
        </h2>
        <p class="text-msp-gray text-base leading-7">{{ $service->description }}</p>
        <a href="{{ route('contact') }}"
           class="inline-flex items-center gap-2 text-msp-navy font-semibold text-sm border-b-2 border-msp-gold pb-0.5 w-fit transition-colors duration-200 hover:text-msp-gold">
            Konsultasi Gratis <i class="fas fa-arrow-right text-xs"></i>
        </a>
    </div>
    <div class="relative order-1 md:order-2" style="aspect-ratio: 4/3; min-height: 280px;">
        <div class="absolute top-0 left-0 w-[78%] h-[78%] rounded-2xl overflow-hidden shadow-md">
            <img src="{{ $service->gallery_image_1 ? asset('images/' . $service->gallery_image_1) : asset('images/perizinan-1.jpg') }}"
                 alt="{{ $service->title }}" loading="lazy" class="w-full h-full object-cover">
        </div>
        <div class="absolute bottom-0 right-0 w-[55%] h-[55%] rounded-2xl overflow-hidden shadow-lg border-[6px] border-white" style="transform: rotate(-3deg)">
            <img src="{{ $service->gallery_image_2 ? asset('images/' . $service->gallery_image_2) : asset('images/perizinan-2.jpg') }}"
                 alt="{{ $service->title }}" loading="lazy" class="w-full h-full object-cover">
        </div>
    </div>
</div>

{{-- Layanan Spesifik --}}
@php $specificFeatures = $features->where('group', 'layanan_spesifik'); @endphp
@if($specificFeatures->count())
<div>
    <div class="max-w-xl mb-10">
        <p class="font-mono text-msp-gold text-xs tracking-widest uppercase mb-3">Solusi Kami</p>
        <h2 class="font-space text-msp-navy text-2xl md:text-3xl font-bold leading-snug">Layanan Spesifik</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($specificFeatures as $feat)
        <div class="flex flex-col gap-4 p-7 bg-msp-bg rounded-2xl border border-msp-border">
            <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0" style="background-color: rgba(11,33,69,0.06);">
                <i class="fas fa-leaf text-msp-navy text-sm"></i>
            </div>
            <div class="flex flex-col gap-2">
                <h3 class="font-space text-msp-navy text-lg font-bold leading-snug">{{ $feat->title }}</h3>
                <p class="text-msp-gray text-sm leading-6">{{ $feat->description }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif

{{-- Keunggulan --}}
@php $coreFeatures = $features->filter(fn($f) => empty($f->group))->values(); @endphp
@if($coreFeatures->count())
<div class="rounded-3xl overflow-hidden" style="background-color: #0B2145;">
    <div class="p-8 md:p-10 lg:p-12">
        <div class="mb-10">
            <p class="font-mono text-xs tracking-widest uppercase mb-3" style="color: #F2A71B;">Keunggulan</p>
            <h2 class="font-space text-white text-2xl md:text-3xl font-bold leading-snug">Mengapa MSP?</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-px" style="background-color: rgba(255,255,255,0.08);">
            @foreach($coreFeatures as $feat)
            <div class="flex flex-col gap-3 p-7" style="background-color: #0B2145;">
                <div class="flex items-center gap-3">
                    <span class="font-space font-bold text-3xl leading-none" style="color: rgba(242,167,27,0.35);">{{ str_pad($loop->index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                    <div class="h-px flex-1" style="background-color: rgba(255,255,255,0.1);"></div>
                </div>
                <h4 class="font-space text-white text-base font-bold leading-snug">{{ $feat->title }}</h4>
                @if($feat->description)
                    <p class="text-sm leading-relaxed" style="color: rgba(211,218,234,0.65);">{{ $feat->description }}</p>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

{{-- Proses Kerja --}}
@if($processSteps && $processSteps->count())
@php $steps = $processSteps->sortBy('order')->values(); @endphp
<div>
    <div class="mb-10">
        <p class="font-mono text-msp-gold text-xs tracking-widest uppercase mb-3">Alur Kerja</p>
        <h2 class="font-space text-msp-navy text-2xl md:text-3xl font-bold leading-snug">Proses Kerja Kami</h2>
    </div>
    <div class="grid gap-0" style="grid-template-columns: repeat({{ $steps->count() }}, 1fr);">
        @foreach($steps as $step)
        <div class="flex flex-col items-center text-center px-4 relative">
            @if(!$loop->last)
                <div class="absolute top-5 left-1/2 right-0 h-px" style="background-color: #DCE2F3;"></div>
            @endif
            <div class="w-10 h-10 rounded-full border-2 flex items-center justify-center shrink-0 relative z-10 mb-4"
                 style="border-color: #F2A71B; background-color: #fff;">
                <span class="font-space text-msp-navy text-xs font-bold">{{ $loop->index + 1 }}</span>
            </div>
            <h4 class="font-space text-msp-navy text-sm font-bold mb-1.5">{{ $step->title }}</h4>
            @if($step->description)
                <p class="text-msp-gray text-xs leading-5">{{ $step->description }}</p>
            @endif
        </div>
        @endforeach
    </div>
</div>
@else
@php
$defaultSteps = [
    ['title' => 'Konsultasi Awal', 'desc' => 'Analisis jenis usaha, skala, dan lokasi untuk menentukan dokumen yang wajib dipenuhi.'],
    ['title' => 'Pengumpulan Data', 'desc' => 'Pengumpulan data teknis dan koordinasi dengan instansi terkait.'],
    ['title' => 'Penyusunan Dokumen', 'desc' => 'Penyusunan AMDAL, UKL-UPL, atau SPPL sesuai standar KLHK dan peraturan daerah.'],
    ['title' => 'Sidang & Persetujuan', 'desc' => 'Pendampingan sidang komisi penilai hingga dokumen persetujuan lingkungan terbit.'],
];
@endphp
<div>
    <div class="mb-10">
        <p class="font-mono text-msp-gold text-xs tracking-widest uppercase mb-3">Alur Kerja</p>
        <h2 class="font-space text-msp-navy text-2xl md:text-3xl font-bold leading-snug">Proses Kerja Kami</h2>
    </div>
    <div class="grid gap-0" style="grid-template-columns: repeat(4, 1fr);">
        @foreach($defaultSteps as $i => $step)
        <div class="flex flex-col items-center text-center px-4 relative">
            @if($i < 3)
                <div class="absolute top-5 left-1/2 right-0 h-px" style="background-color: #DCE2F3;"></div>
            @endif
            <div class="w-10 h-10 rounded-full border-2 flex items-center justify-center shrink-0 relative z-10 mb-4"
                 style="border-color: #F2A71B; background-color: #fff;">
                <span class="font-space text-msp-navy text-xs font-bold">{{ $i + 1 }}</span>
            </div>
            <h4 class="font-space text-msp-navy text-sm font-bold mb-1.5">{{ $step['title'] }}</h4>
            <p class="text-msp-gray text-xs leading-5">{{ $step['desc'] }}</p>
        </div>
        @endforeach
    </div>
</div>
@endif

{{-- Brosur --}}
<div class="flex items-start gap-5 p-7 bg-msp-bg rounded-2xl border border-msp-border">
    <div class="w-12 h-12 rounded-xl flex items-center justify-center shrink-0" style="background-color: rgba(11,33,69,0.06);">
        <i class="fas fa-file-pdf text-xl text-msp-navy"></i>
    </div>
    <div class="flex flex-col gap-1.5">
        <h3 class="font-space text-msp-navy text-lg font-bold leading-snug">Brosur Layanan Perizinan Lingkungan</h3>
        <p class="text-msp-gray text-sm leading-6">Detail metodologi dan studi kasus pelayanan perizinan lingkungan kami.</p>
        <a href="{{ $service->brochure_pdf ? asset('images/' . $service->brochure_pdf) : '#' }}"
           target="{{ $service->brochure_pdf ? '_blank' : '_self' }}"
           class="inline-flex items-center gap-2 text-msp-navy font-semibold text-sm border-b-2 border-msp-gold pb-0.5 w-fit transition-colors duration-200 hover:text-msp-gold mt-1">
            Unduh Dokumen (PDF) <i class="fas fa-arrow-right text-xs"></i>
        </a>
    </div>
</div>
