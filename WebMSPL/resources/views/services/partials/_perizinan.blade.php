{{-- Intro Images --}}
<div class="flex flex-col md:flex-row gap-6" data-aos="fade-up">
    <div class="flex-1 h-[200px] md:h-[256px] overflow-hidden relative rounded-2xl" data-aos="zoom-in">
        <img src="{{ $service->gallery_image_1 ? asset('images/' . $service->gallery_image_1) : asset('images/perizinan-1.jpg') }}" alt="{{ $service->title }}" loading="lazy" class="absolute w-full h-[157%] left-0 top-[-28.5%] max-w-none object-cover">
    </div>
    <div class="flex-1 h-[200px] md:h-[256px] overflow-hidden relative rounded-2xl" data-aos="zoom-in" data-aos-delay="100">
        <img src="{{ $service->gallery_image_2 ? asset('images/' . $service->gallery_image_2) : asset('images/perizinan-2.jpg') }}" alt="{{ $service->title }}" loading="lazy" class="absolute w-full h-[157%] left-0 top-[-28.5%] max-w-none object-cover">
    </div>
</div>

{{-- Title & Description --}}
<div class="flex flex-col gap-4" data-aos="fade-up">
    <h2 class="font-space font-semibold text-msp-dark text-2xl md:text-3xl leading-[36px] md:leading-[42px]">Solusi Perizinan Lingkungan</h2>
    <div class="text-msp-gray text-sm md:text-base leading-6 md:leading-[26px]">{{ $service->description }}</div>
</div>

{{-- Layanan Spesifik --}}
<div class="flex flex-col gap-6" data-aos="fade-up">
    <h3 class="font-space font-semibold text-msp-dark text-2xl leading-[34px]">Layanan Spesifik</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-[#F8F9FA] border border-msp-border p-6 rounded-2xl flex flex-col gap-2" data-aos="zoom-in">
            <h4 class="font-space font-semibold text-msp-dark text-xl md:text-2xl leading-[30px] md:leading-[34px]">AMDAL</h4>
            <p class="text-msp-gray text-sm md:text-base leading-5 md:leading-[26px]">Analisis Mengenai Dampak Lingkungan untuk usaha atau kegiatan yang berdampak penting terhadap lingkungan.</p>
        </div>
        <div class="bg-[#F8F9FA] border border-msp-border p-6 rounded-2xl flex flex-col gap-2" data-aos="zoom-in" data-aos-delay="100">
            <h4 class="font-space font-semibold text-msp-dark text-xl md:text-2xl leading-[30px] md:leading-[34px]">UKL-UPL</h4>
            <p class="text-msp-gray text-sm md:text-base leading-5 md:leading-[26px]">Upaya Pengelolaan Lingkungan dan Upaya Pemantauan Lingkungan untuk kegiatan yang tidak berdampak penting.</p>
        </div>
        <div class="bg-[#F8F9FA] border border-msp-border p-6 rounded-2xl flex flex-col gap-2" data-aos="zoom-in" data-aos-delay="200">
            <h4 class="font-space font-semibold text-msp-dark text-xl md:text-2xl leading-[30px] md:leading-[34px]">SPPL</h4>
            <p class="text-msp-gray text-sm md:text-base leading-5 md:leading-[26px]">Surat Pernyataan Kesanggupan Pengelolaan dan Pemantauan Lingkungan Hidup.</p>
        </div>
        <div class="bg-[#F8F9FA] border border-msp-border p-6 rounded-2xl flex flex-col gap-2" data-aos="zoom-in" data-aos-delay="300">
            <h4 class="font-space font-semibold text-msp-dark text-xl md:text-2xl leading-[30px] md:leading-[34px]">Audit Lingkungan</h4>
            <p class="text-msp-gray text-sm md:text-base leading-5 md:leading-[26px]">Evaluasi berkala terhadap kinerja pengelolaan lingkungan hidup perusahaan.</p>
        </div>
    </div>
</div>

{{-- Proses Kerja --}}
<div class="flex flex-col gap-6" data-aos="fade-up">
    <h3 class="font-space font-semibold text-msp-dark text-2xl leading-[34px]">Proses Kerja Kami</h3>
    <div class="border border-msp-border divide-y divide-msp-border">
        @forelse($processSteps as $step)
            <div class="flex items-center justify-between px-4 py-[16px] bg-white">
                <span class="font-medium text-msp-dark text-sm md:text-base leading-6">{{ $loop->iteration }}. {{ $step->title }}</span>
                <i class="fas fa-chevron-right text-msp-gold-dark"></i>
            </div>
        @empty
            @foreach(['Konsultasi Awal (Assessment)', 'Pengumpulan Data & Perencanaan', 'Penyusunan Dokumen', 'Sidang, Persetujuan & Pemantauan'] as $i => $title)
                <div class="flex items-center justify-between px-4 py-[16px] bg-white">
                    <span class="font-medium text-msp-dark text-sm md:text-base leading-6">{{ $i + 1 }}. {{ $title }}</span>
                    <i class="fas fa-chevron-right text-msp-gold-dark"></i>
                </div>
            @endforeach
        @endforelse
    </div>
</div>

{{-- Brosur --}}
<div class="bg-[#F8F9FA] border border-msp-border p-6 flex gap-4 md:gap-6 items-start rounded-2xl" data-aos="fade-up">
    <div class="w-12 h-12 bg-[#F8F9FA] rounded-2xl flex items-center justify-center shrink-0 mt-1 border border-msp-border">
        <i class="fas fa-file-pdf text-2xl text-[#000411]"></i>
    </div>
    <div class="flex flex-col gap-1">
        <h4 class="font-space font-semibold text-msp-dark text-xl md:text-2xl leading-[30px] md:leading-[34px]">Brosur Layanan Perizinan Lingkungan</h4>
        <p class="text-msp-gray text-sm md:text-base leading-5 md:leading-[26px]">Unduh brosur lengkap untuk detail metodologi dan studi kasus pelayanan kami.</p>
        <a href="{{ $service->brochure_pdf ? asset('images/' . $service->brochure_pdf) : '#' }}" target="{{ $service->brochure_pdf ? '_blank' : '_self' }}" class="inline-flex items-center gap-2 text-msp-dark font-bold text-[11px] md:text-[12px] leading-[14px] tracking-[0.6px] pt-2.5 transition-all duration-300 hover:gap-3 group">
            Unduh Dokumen (PDF)
            <i class="fas fa-arrow-right transition-transform duration-300 group-hover:translate-x-0.5"></i>
        </a>
    </div>
</div>
