{{-- Intro Images --}}
<div class="flex flex-col gap-6" data-aos="fade-up">
    <div class="flex flex-col md:flex-row gap-6">
        <div class="flex-1 h-[200px] md:h-[256px] border border-[#e5e7eb] overflow-hidden relative rounded-2xl" data-aos="zoom-in">
            <img src="{{ $service->gallery_image_1 ? asset('images/' . $service->gallery_image_1) : asset('images/pest-1.jpg') }}" alt="{{ $service->title }}" loading="lazy" class="absolute w-[105.81%] h-full left-[-2.9%] top-0 max-w-none object-cover">
        </div>
        <div class="flex-1 h-[200px] md:h-[256px] border border-[#e5e7eb] overflow-hidden relative rounded-2xl" data-aos="zoom-in" data-aos-delay="100">
            <img src="{{ $service->gallery_image_2 ? asset('images/' . $service->gallery_image_2) : asset('images/pest-2.jpg') }}" alt="{{ $service->title }}" loading="lazy" class="absolute w-[103.22%] h-full left-[-1.61%] top-0 max-w-none object-cover">
        </div>
    </div>
    <div class="pt-2">
        <h2 class="font-space font-bold text-msp-dark text-3xl md:text-5xl leading-[40px] md:leading-[56px] tracking-[-0.96px]">Solusi Pengendalian Hama</h2>
    </div>
    <div class="flex flex-col gap-4">
        <div class="text-msp-gray text-sm md:text-base leading-6 md:leading-6">{{ $service->description }}</div>
    </div>
</div>

{{-- Layanan Spesifik --}}
<div class="flex flex-col gap-6" data-aos="fade-up">
    <h2 class="font-space font-semibold text-msp-dark text-2xl md:text-3xl leading-[36px] md:leading-[40px] tracking-[-0.32px]">Layanan Spesifik</h2>
    <div class="flex flex-col lg:flex-row gap-4">
        <div class="flex-1 bg-[#f9f9ff] border border-msp-border p-6 flex flex-col gap-3 rounded-2xl" data-aos="zoom-in">
            <h3 class="font-space font-semibold text-msp-dark text-xl md:text-2xl leading-[30px] md:leading-[32px]">Solusi Komersial & Industri</h3>
            <p class="text-msp-gray text-sm leading-5">Layanan khusus untuk perkantoran, pabrik, pergudangan, dan fasilitas makanan/minuman yang membutuhkan standar kepatuhan tinggi (HACCP, ISO).</p>
            <div class="flex flex-col gap-[3.5px] pt-1">
                <span class="text-msp-gray text-sm leading-5">Inspeksi & Audit berkala</span>
                <span class="text-msp-gray text-sm leading-5">Pengendalian Rodent (Tikus)</span>
                <span class="text-msp-gray text-sm leading-5">Manajemen Serangga Terbang & Merayap</span>
            </div>
        </div>
        <div class="flex-1 bg-[#f9f9ff] border border-msp-border p-6 flex flex-col gap-3 rounded-2xl" data-aos="zoom-in" data-aos-delay="100">
            <h3 class="font-space font-semibold text-msp-dark text-xl md:text-2xl leading-[30px] md:leading-[32px]">Solusi Residensial & Real Estate</h3>
            <p class="text-msp-gray text-sm leading-5">Perlindungan menyeluruh untuk perumahan, apartemen, dan kawasan pemukiman untuk menjaga kenyamanan dan kesehatan penghuni.</p>
            <div class="flex flex-col gap-[3.5px] pt-1">
                <span class="text-msp-gray text-sm leading-5">Termite Control (Anti Rayap)</span>
                <span class="text-msp-gray text-sm leading-5">General Pest Control</span>
                <span class="text-msp-gray text-sm leading-5">Fumigasi Terarah</span>
            </div>
        </div>
    </div>
</div>

{{-- Metodologi --}}
<div class="flex flex-col gap-6" data-aos="fade-up">
    <h2 class="font-space font-semibold text-msp-dark text-2xl md:text-3xl leading-[36px] md:leading-[40px] tracking-[-0.32px]">Metodologi Kami</h2>
    <div class="border border-msp-border divide-y divide-msp-border">
        @forelse($processSteps as $step)
            <div class="flex items-center justify-between px-4 py-[16px] bg-white">
                <span class="font-medium text-msp-dark text-sm md:text-base leading-6">{{ $loop->iteration }}. {{ $step->title }}</span>
                <i class="fas fa-chevron-right text-msp-gold-dark"></i>
            </div>
        @empty
            @foreach(['Inspeksi Menyeluruh (Assessment)', 'Identifikasi & Perencanaan Solusi', 'Eksekusi Tindakan (Treatment)', 'Pemantauan & Evaluasi Lanjutan'] as $i => $title)
                <div class="flex items-center justify-between px-4 py-[16px] bg-white">
                    <span class="font-medium text-msp-dark text-sm md:text-base leading-6">{{ $i + 1 }}. {{ $title }}</span>
                    <i class="fas fa-chevron-right text-msp-gold-dark"></i>
                </div>
            @endforeach
        @endforelse
    </div>
</div>

{{-- Brosur --}}
<div class="bg-[#f6f7fb] border border-msp-border p-6 flex gap-4 items-start rounded-2xl" data-aos="fade-up">
    <div class="w-10 h-[50px] bg-[rgba(0,11,35,0.1)] rounded-xl flex items-center justify-center shrink-0 mt-1">
        <i class="fas fa-file-pdf text-xl text-[#000b23]"></i>
    </div>
    <div class="flex flex-col gap-1 pb-px">
        <h3 class="font-space font-semibold text-msp-dark text-xl md:text-2xl leading-[30px] md:leading-[32px]">Brosur Layanan Pest Control</h3>
        <p class="text-msp-gray text-sm leading-5">Unduh brosur lengkap untuk detail metodologi, bahan yang digunakan, dan studi kasus pelayanan kami.</p>
        <a href="{{ $service->brochure_pdf ? asset('images/' . $service->brochure_pdf) : '#' }}" target="{{ $service->brochure_pdf ? '_blank' : '_self' }}" class="inline-flex items-center gap-2 text-msp-dark font-medium text-sm leading-5 pt-2.5 transition-all duration-300 hover:gap-3 group">
            Unduh Dokumen (PDF)
            <i class="fas fa-arrow-right transition-transform duration-300 group-hover:translate-x-0.5"></i>
        </a>
    </div>
</div>
