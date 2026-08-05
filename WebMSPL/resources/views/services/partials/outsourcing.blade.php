{{-- Intro: image stack + description (same pattern as landing innovation section) --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-20 items-center">
    <div class="flex flex-col gap-6 order-2 md:order-1">
        <p class="font-mono text-msp-gold text-xs tracking-widest uppercase">Tentang Layanan</p>
        <h2 class="font-space text-msp-navy text-2xl md:text-3xl lg:text-[38px] leading-snug font-bold">
            Pendekatan MSP dalam Outsourcing Tenaga Kerja
        </h2>
        <p class="text-msp-gray text-base leading-7">{{ $service->description }}</p>
        <a href="{{ route('contact') }}"
           class="inline-flex items-center gap-2 text-msp-navy font-semibold text-sm border-b-2 border-msp-gold pb-0.5 w-fit transition-colors duration-200 hover:text-msp-gold">
            Konsultasi Gratis
            <i class="fas fa-arrow-right text-xs"></i>
        </a>
    </div>
    <div class="relative order-1 md:order-2" style="aspect-ratio: 4/3; min-height: 280px;">
        <div class="absolute top-0 left-0 w-[78%] h-[78%] rounded-2xl overflow-hidden shadow-md">
            <img src="{{ $service->gallery_image_1 ? asset('images/' . $service->gallery_image_1) : asset('images/cleaning.png') }}"
                 alt="{{ $service->title }}" loading="lazy" class="w-full h-full object-cover">
        </div>
        <div class="absolute bottom-0 right-0 w-[55%] h-[55%] rounded-2xl overflow-hidden shadow-lg border-[6px] border-white" style="transform: rotate(-3deg)">
            <img src="{{ $service->gallery_image_2 ? asset('images/' . $service->gallery_image_2) : asset('images/security.png') }}"
                 alt="{{ $service->title }}" loading="lazy" class="w-full h-full object-cover">
        </div>
    </div>
</div>

{{-- Sub-services grid — sourced from DB via $allServices (admin-manageable) --}}
@php
$subServices = $allServices->where('category', 'outsourcing')->values();
@endphp

@if($subServices->count())
<div>
    <div class="max-w-xl mb-12">
        <p class="font-mono text-msp-gold text-xs tracking-widest uppercase mb-3">Sub-Layanan</p>
        <h2 class="font-space text-msp-navy text-2xl md:text-3xl lg:text-[38px] leading-snug font-bold mb-4">
            Jasa Outsourcing MSP
        </h2>
        <p class="text-msp-gray text-base leading-7">
            Menyediakan tenaga ahli dan terlatih untuk mendukung kelancaran operasional bisnis Anda di berbagai sektor.
        </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 md:gap-6">
        @foreach($subServices as $sub)
        <a href="{{ route('service.detail', $sub->slug) }}"
           class="group flex flex-col bg-msp-bg rounded-2xl overflow-hidden border border-msp-border shadow-sm transition-all duration-300 hover:shadow-md hover:-translate-y-1 min-h-80">
            <div class="overflow-hidden h-48 shrink-0">
                @if($sub->hero_image)
                    <img src="{{ asset('images/' . $sub->hero_image) }}"
                         alt="{{ $sub->title }}" loading="lazy"
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                @else
                    <div class="w-full h-full bg-linear-to-br from-msp-bg to-msp-bg-alt flex items-center justify-center">
                        <i class="{{ $sub->icon ?? 'fas fa-cogs' }} text-4xl text-msp-border"></i>
                    </div>
                @endif
            </div>
            <div class="flex flex-col gap-2 p-6 flex-1">
                <h3 class="font-space text-msp-navy text-lg font-bold leading-snug">{{ $sub->title }}</h3>
                <p class="text-msp-gray text-sm leading-6 flex-1">{{ $sub->excerpt }}</p>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endif

{{-- Features --}}
@if($service->features && $service->features->count())
<div class="rounded-3xl overflow-hidden" style="background-color: #0B2145;">
    <div class="p-8 md:p-10 lg:p-12">
        <div class="mb-10">
            <p class="font-mono text-xs tracking-widest uppercase mb-3" style="color: #F2A71B;">Keunggulan</p>
            <h2 class="font-space text-white text-2xl md:text-3xl font-bold leading-snug">Mengapa MSP?</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-px" style="background-color: rgba(255,255,255,0.08);">
            @foreach($service->features as $feat)
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

{{-- Process steps --}}
@if($service->processSteps && $service->processSteps->count())
@php $steps = $service->processSteps->sortBy('order')->values(); @endphp
<div>
    <div class="mb-10">
        <p class="font-mono text-msp-gold text-xs tracking-widest uppercase mb-3">Alur Kerja</p>
        <h2 class="font-space text-msp-navy text-2xl md:text-3xl font-bold leading-snug">Proses Layanan</h2>
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
@endif
