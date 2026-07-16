<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT Mentari Satya Perkasa</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@700&family=JetBrains+Mono:wght@500&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
</head>
<body class="bg-msp-bg font-inter antialiased">

    {{-- TopNavBar --}}
    <nav class="fixed top-0 left-0 right-0 z-50 bg-[rgba(249,249,255,0.9)] backdrop-blur-sm border-b border-msp-border">
        <div class="max-w-[1302px] mx-auto px-6 h-16 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <span class="font-space text-lg leading-6 font-bold text-msp-dark">PT Mentari Satya Perkasa</span>
            </div>
            <div class="hidden lg:flex items-center gap-8">
                <a href="#" class="text-msp-gold font-semibold text-base border-b-2 border-msp-gold pb-0.5">Beranda</a>
                <a href="#" class="text-msp-gray text-base">Tentang Kami</a>
                <a href="#" class="text-msp-gray text-base">Layanan</a>
                <a href="#" class="text-msp-gray text-base">Berita</a>
            </div>
            <div class="flex items-center gap-3">
                <a href="#" class="hidden md:flex items-center px-6 py-2 bg-gradient-to-br from-[#F2A71B] to-[#FBC34C] rounded-xl text-msp-navy font-semibold text-base">Hubungi Kami</a>
                <button class="lg:hidden flex items-center justify-center w-10 h-10 text-msp-navy">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
                </button>
            </div>
        </div>
    </nav>

    {{-- Hero Section --}}
    <section class="pt-20 px-4 pb-0 bg-msp-bg">
        <div class="mx-2 md:mx-4 lg:mx-6 relative overflow-hidden rounded-2xl min-h-[400px] md:min-h-[550px] lg:min-h-[692px]">
            <img src="{{ asset('images/hero-bg.png') }}" alt="" class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-br from-[rgba(11,33,69,0.9)] to-[rgba(11,33,69,0.7)]"></div>
            <div class="relative px-6 py-20 md:pt-[80px] md:pb-6">
                <div class="max-w-full lg:max-w-[768px] flex flex-col gap-4 md:gap-6">
                    <h1 class="font-space text-white text-3xl sm:text-4xl md:text-5xl lg:text-[60px] leading-snug md:leading-[60px] font-bold">
                        Mitra Terpercaya untuk<br class="hidden sm:block"> Outsourcing, Lingkungan,<br class="hidden sm:block"> & Pest Control
                    </h1>
                    <div class="max-w-full lg:max-w-[672px]">
                        <p class="text-msp-light text-base md:text-lg leading-6 md:leading-7">
                            Memberikan solusi terpadu dan efisien untuk kebutuhan bisnis Anda. Kami memastikan operasional perusahaan Anda berjalan lancar dengan standar kepatuhan tertinggi.
                        </p>
                    </div>
                    <div class="flex flex-wrap gap-3 md:gap-4 pt-2 md:pt-4 pb-4 md:pb-6">
                        <a href="#" class="flex items-center px-6 md:px-8 py-3 md:py-3.5 bg-gradient-to-br from-[#F2A71B] to-[#FBC34C] rounded-xl text-msp-navy font-semibold text-sm md:text-base">Mulai Konsultasi</a>
                        <a href="#" class="flex items-center px-6 md:px-8 py-3 md:py-3.5 border border-white rounded-xl text-white font-medium text-sm md:text-base">Pelajari Layanan</a>
                    </div>
                    <div class="pt-4 md:pt-6 border-t border-[rgba(75,94,133,0.3)]">
                        <div class="flex flex-wrap gap-6 md:gap-8">
                            <div class="flex flex-col gap-1 min-w-[120px] md:w-[234.66px]">
                                <span class="font-space text-msp-gold text-2xl md:text-[30px] leading-8 md:leading-9 font-bold">15+</span>
                                <span class="text-msp-light text-sm md:text-base">Tahun Pengalaman</span>
                            </div>
                            <div class="flex flex-col gap-1 min-w-[120px] md:w-[234.66px]">
                                <span class="font-space text-msp-gold text-2xl md:text-[30px] leading-8 md:leading-9 font-bold">200+</span>
                                <span class="text-msp-light text-sm md:text-base">Klien Korporat</span>
                            </div>
                            <div class="flex flex-col gap-1 min-w-[120px] md:w-[234.66px]">
                                <span class="font-space text-msp-gold text-2xl md:text-[30px] leading-8 md:leading-9 font-bold">5000+</span>
                                <span class="text-msp-light text-sm md:text-base">Tenaga Kerja Tersalurkan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
            </div>
        </div>
    </section>

    {{-- About Section --}}
    <section class="py-16 md:py-20 bg-msp-bg">
        <div class="max-w-[1302px] mx-auto px-6 flex flex-col lg:flex-row items-center gap-10 md:gap-16">
            <div class="w-full lg:w-1/2">
                <div class="rounded-2xl overflow-hidden shadow-[0px_8px_10px_-6px_rgba(0,0,0,0.1),0px_20px_25px_-5px_rgba(0,0,0,0.1)]">
                    <img src="{{ asset('images/about-team.png') }}" alt="Tim PT MSP" class="w-full h-[300px] md:h-[400px] lg:h-[500px] object-cover">
                </div>
            </div>
            <div class="w-full lg:w-1/2 flex flex-col gap-4 md:gap-6">
                <h2 class="font-space text-msp-navy text-2xl md:text-3xl lg:text-4xl leading-snug md:leading-10 font-bold">Dedikasi untuk Keamanan dan Kelancaran Bisnis Anda</h2>
                <p class="text-msp-gray text-base md:text-lg leading-6 md:leading-[29.25px]">PT Mentari Satya Perkasa (MSP) hadir sebagai mitra strategis yang mengintegrasikan layanan outsourcing tenaga kerja, pengelolaan lingkungan, dan pengendalian hama secara profesional.</p>
                <p class="text-msp-gray text-base md:text-lg leading-6 md:leading-[29.25px]">Kami percaya bahwa operasional yang efisien dimulai dari fondasi sumber daya yang andal dan lingkungan kerja yang aman.</p>
                <div class="flex flex-wrap gap-6 pt-4">
                    <div class="flex flex-col gap-2">
                        <span class="font-space text-msp-blue text-2xl leading-8 font-bold">98%</span>
                        <span class="text-msp-gray text-sm leading-5">Client Retention</span>
                    </div>
                    <div class="flex flex-col gap-2">
                        <span class="font-space text-msp-blue text-2xl leading-8 font-bold">24/7</span>
                        <span class="text-msp-gray text-sm leading-5">Support Tim</span>
                    </div>
                    <div class="flex flex-col gap-2">
                        <span class="font-space text-msp-blue text-2xl leading-8 font-bold">100%</span>
                        <span class="text-msp-gray text-sm leading-5">Compliance</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- News Section --}}
    <section class="py-16 md:py-20 bg-[rgba(220,226,243,0.3)]">
        <div class="max-w-[1302px] mx-auto px-6 flex flex-col gap-8 md:gap-12">
            <div class="flex flex-wrap justify-between items-end gap-4">
                <div class="flex flex-col gap-2 md:gap-4">
                    <h2 class="font-space text-msp-navy text-2xl md:text-3xl lg:text-4xl leading-snug md:leading-10 font-bold">Apa Kabar MSP?</h2>
                    <p class="text-msp-gray text-sm md:text-base">Berita dan pembaruan terbaru dari aktivitas kami.</p>
                </div>
                <a href="#" class="flex items-center gap-2 text-msp-blue font-semibold text-sm md:text-base">
                    Semua Berita
                    <img src="{{ asset('images/icon-arrow-right.svg') }}" alt="" class="w-4 h-4">
                </a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                <article class="flex flex-col rounded-2xl bg-white border border-msp-border shadow-[0px_1px_2px_0px_rgba(0,0,0,0.05)] overflow-hidden">
                    <img src="{{ asset('images/news-1.png') }}" alt="" class="w-full h-48 object-cover">
                    <div class="flex flex-col gap-3 p-5 md:p-6">
                        <span class="font-mono text-msp-blue text-xs leading-4 font-medium">12 OKT 2023</span>
                        <h3 class="font-space text-msp-navy text-lg md:text-xl leading-6 md:leading-7 font-bold">MSP Tanda Tangani MoU dengan Kawasan Industri Terbesar</h3>
                        <p class="text-msp-gray text-sm leading-5">Ekspansi layanan keamanan dan kebersihan ke sektor industri manufaktur berskala internasional.</p>
                    </div>
                </article>
                <article class="flex flex-col rounded-2xl bg-white border border-msp-border shadow-[0px_1px_2px_0px_rgba(0,0,0,0.05)] overflow-hidden">
                    <img src="{{ asset('images/news-2.png') }}" alt="" class="w-full h-48 object-cover">
                    <div class="flex flex-col gap-3 p-5 md:p-6">
                        <span class="font-mono text-msp-blue text-xs leading-4 font-medium">05 NOV 2023</span>
                        <h3 class="font-space text-msp-navy text-lg md:text-xl leading-6 md:leading-7 font-bold">Pelatihan Sertifikasi Garda Pratama Angkatan ke-25</h3>
                        <p class="text-msp-gray text-sm leading-5">Komitmen kami dalam mencetak personel keamanan yang profesional dan sigap dalam segala situasi.</p>
                    </div>
                </article>
                <article class="flex flex-col rounded-2xl bg-white border border-msp-border shadow-[0px_1px_2px_0px_rgba(0,0,0,0.05)] overflow-hidden sm:col-span-2 lg:col-span-1">
                    <img src="{{ asset('images/news-3.png') }}" alt="" class="w-full h-48 object-cover">
                    <div class="flex flex-col gap-3 p-5 md:p-6">
                        <span class="font-mono text-msp-blue text-xs leading-4 font-medium">20 DES 2023</span>
                        <h3 class="font-space text-msp-navy text-lg md:text-xl leading-6 md:leading-7 font-bold">Inovasi Layanan Pest Control Ramah Lingkungan</h3>
                        <p class="text-msp-gray text-sm leading-5">Memperkenalkan metode baru dalam pengendalian hama yang aman bagi ekosistem sekitar.</p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    {{-- Main Services Section --}}
    <section class="py-16 md:py-20 px-6 bg-white">
        <div class="max-w-[1302px] mx-auto flex flex-col lg:flex-row items-center gap-10 md:gap-16">
            <div class="relative w-full max-w-[595px] aspect-[595/500] shrink-0">
                <div class="absolute top-0 left-0 w-[80%] h-[80%] rounded-2xl overflow-hidden shadow-[0px_4px_6px_-4px_rgba(0,0,0,0.1),0px_10px_15px_-3px_rgba(0,0,0,0.1)]">
                    <img src="{{ asset('images/landscaping.png') }}" alt="Landscaping Team" class="w-full h-full object-cover">
                </div>
                <div class="absolute bottom-0 right-0 w-[60%] h-[55%] rounded-2xl overflow-hidden shadow-[0px_25px_50px_-12px_rgba(0,0,0,0.25)] border-4 md:border-8 border-white">
                    <img src="{{ asset('images/parking-mgmt.png') }}" alt="Parking Management" class="w-full h-full object-cover">
                </div>
            </div>
            <div class="w-full lg:w-[576px] shrink-0 flex flex-col gap-4 md:gap-6">
                <h2 class="font-space text-msp-navy text-2xl md:text-3xl lg:text-4xl leading-snug lg:leading-10 font-bold">Pendekatan MSP terhadap inovasi dan solusi yang dititikberatkan pada prinsip keberlanjutan dan kemudahan klien.</h2>
                <div class="pt-2">
                    <p class="text-msp-gray text-base md:text-lg leading-6 md:leading-[29.25px]">Kami pastikan rangkaian layanan kami bisa memberi solusi dan layanan terbaik, sesuai tuntutan zaman. Melalui ekosistem proteksi terpadu, kami menawarkan solusi masa depan menggunakan teknologi ramah lingkungan dan sistem manajemen yang efisien.</p>
                </div>
                <p class="text-msp-gray text-base md:text-lg leading-6 md:leading-[29.25px]">Komitmen kami juga menjamin kenyamanan bagi pelanggan di mana pun berada.</p>
            </div>
        </div>
    </section>

    {{-- Services Grid Section --}}
    <section class="py-16 md:py-20 bg-msp-dark">
        <div class="max-w-[1302px] mx-auto px-6 flex flex-col gap-10 md:gap-16">
            <div class="flex flex-col items-center gap-4">
                <h2 class="font-space text-white text-center text-2xl md:text-3xl lg:text-4xl leading-snug md:leading-10 font-bold">Jasa Outsourcing MSP</h2>
                <div class="max-w-full md:max-w-[672px] text-center px-4">
                    <p class="text-msp-light text-sm md:text-base leading-6">Menyediakan tenaga ahli dan terlatih untuk mendukung kelancaran operasional bisnis Anda di berbagai sektor.</p>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                <div class="flex flex-col rounded-2xl border border-[rgba(42,63,158,0.3)] overflow-hidden">
                    <img src="{{ asset('images/cleaning.png') }}" alt="Cleaning Service" class="w-full h-40 md:h-48 object-cover">
                    <div class="flex flex-col gap-3 p-6 md:p-8">
                        <h3 class="font-space text-white text-lg md:text-xl leading-7 font-bold">Cleaning Service</h3>
                        <p class="text-[rgba(220,226,243,0.8)] text-sm leading-[22.75px]">Solusi kebersihan profesional untuk gedung perkantoran, area industri, dan komersial dengan standar sanitasi tinggi.</p>
                    </div>
                </div>
                <div class="flex flex-col rounded-2xl border border-[rgba(42,63,158,0.3)] overflow-hidden">
                    <img src="{{ asset('images/security.png') }}" alt="Security" class="w-full h-40 md:h-48 object-cover">
                    <div class="flex flex-col gap-3 p-6 md:p-8">
                        <h3 class="font-space text-white text-lg md:text-xl leading-7 font-bold">Security</h3>
                        <p class="text-[rgba(220,226,243,0.8)] text-sm leading-[22.75px]">Layanan keamanan terpadu dengan personel terlatih dan bersertifikasi untuk menjamin aset serta keselamatan area bisnis Anda.</p>
                    </div>
                </div>
                <div class="flex flex-col rounded-2xl border border-[rgba(42,63,158,0.3)] overflow-hidden">
                    <img src="{{ asset('images/office-support.png') }}" alt="Office Support" class="w-full h-40 md:h-48 object-cover">
                    <div class="flex flex-col gap-3 p-6 md:p-8">
                        <h3 class="font-space text-white text-lg md:text-xl leading-7 font-bold">Office Support</h3>
                        <p class="text-[rgba(220,226,243,0.8)] text-sm leading-[22.75px]">Tenaga administrasi dan operasional kantor yang andal untuk mendukung efisiensi alur kerja harian perusahaan Anda.</p>
                    </div>
                </div>
                <div class="flex flex-col rounded-2xl border border-[rgba(42,63,158,0.3)] overflow-hidden">
                    <img src="{{ asset('images/driver.png') }}" alt="Driver" class="w-full h-40 md:h-48 object-cover">
                    <div class="flex flex-col gap-3 p-6 md:p-8">
                        <h3 class="font-space text-white text-lg md:text-xl leading-7 font-bold">Driver</h3>
                        <p class="text-[rgba(220,226,243,0.8)] text-sm leading-[22.75px]">Pengemudi profesional yang menjamin keamanan, ketepatan waktu, dan kenyamanan dalam mobilitas operasional perusahaan.</p>
                    </div>
                </div>
                <div class="flex flex-col rounded-2xl border border-[rgba(42,63,158,0.3)] overflow-hidden">
                    <img src="{{ asset('images/parking-card.png') }}" alt="Parking Management" class="w-full h-40 md:h-48 object-cover">
                    <div class="flex flex-col gap-3 p-6 md:p-8">
                        <h3 class="font-space text-white text-lg md:text-xl leading-7 font-bold">Parking Management</h3>
                        <p class="text-[rgba(220,226,243,0.8)] text-sm leading-[22.75px]">Sistem pengelolaan parkir yang efisien dan aman guna memberikan kenyamanan maksimal bagi pengunjung dan karyawan.</p>
                    </div>
                </div>
                <div class="flex flex-col rounded-2xl border border-[rgba(42,63,158,0.3)] overflow-hidden">
                    <img src="{{ asset('images/landscaping-card.png') }}" alt="Landscaping" class="w-full h-40 md:h-48 object-cover">
                    <div class="flex flex-col gap-3 p-6 md:p-8">
                        <h3 class="font-space text-white text-lg md:text-xl leading-7 font-bold">Landscaping</h3>
                        <p class="text-[rgba(220,226,243,0.8)] text-sm leading-[22.75px]">Perawatan dan penataan area hijau yang estetis untuk menciptakan lingkungan kerja yang segar, asri, dan representatif.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Secondary Services Section --}}
    <section class="py-16 md:py-20 bg-msp-bg">
        <div class="max-w-[1302px] mx-auto px-6 flex flex-col gap-6 md:gap-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
                <div class="flex flex-col p-6 md:p-8 rounded-2xl bg-white border border-msp-border shadow-[0px_1px_2px_0px_rgba(0,0,0,0.05)]">
                    <div class="w-16 h-[88px] flex flex-col items-center pb-6">
                        <div class="w-16 h-16 flex items-center justify-center bg-[rgba(11,33,69,0.1)] rounded-xl">
                            <img src="{{ asset('images/icon-perizinan.svg') }}" alt="" class="w-5 h-6">
                        </div>
                    </div>
                    <div class="pb-4">
                        <h3 class="font-space text-msp-navy text-xl md:text-2xl leading-8 font-bold">Perizinan Lingkungan</h3>
                    </div>
                    <div class="pb-6 md:pr-[38.52px]">
                        <p class="text-msp-gray text-sm md:text-base">Pendampingan komprehensif dalam pengurusan dokumen AMDAL, UKL-UPL, dan perizinan lingkungan lainnya untuk memastikan kepatuhan regulasi perusahaan Anda.</p>
                    </div>
                    <a href="#" class="flex items-center gap-2 text-msp-blue font-semibold text-sm md:text-base">
                        Pelajari Lebih Lanjut
                        <img src="{{ asset('images/icon-arrow-small.svg') }}" alt="" class="w-[9.33px] h-[9.33px]">
                    </a>
                </div>
                <div class="flex flex-col p-6 md:p-8 rounded-2xl bg-white border border-msp-border shadow-[0px_1px_2px_0px_rgba(0,0,0,0.05)]">
                    <div class="w-16 h-[88px] flex flex-col items-center pb-6">
                        <div class="w-16 h-16 flex items-center justify-center bg-[rgba(11,33,69,0.1)] rounded-xl">
                            <img src="{{ asset('images/icon-pest-control.svg') }}" alt="" class="w-5 h-[22.5px]">
                        </div>
                    </div>
                    <div class="pb-4">
                        <h3 class="font-space text-msp-navy text-xl md:text-2xl leading-8 font-bold">Pest Control</h3>
                    </div>
                    <div class="pb-6 md:pr-[33.53px]">
                        <p class="text-msp-gray text-sm md:text-base">Pengendalian hama terpadu untuk area komersial dan industri guna menjaga higienitas, melindungi aset, dan mencegah kerugian akibat infestasi hama.</p>
                    </div>
                    <a href="#" class="flex items-center gap-2 text-msp-blue font-semibold text-sm md:text-base">
                        Pelajari Lebih Lanjut
                        <img src="{{ asset('images/icon-arrow-small.svg') }}" alt="" class="w-[9.33px] h-[9.33px]">
                    </a>
                </div>
            </div>
            <div class="flex flex-col p-4 md:p-6 rounded-2xl border border-[rgba(220,226,243,0.8)] bg-[rgba(220,226,243,0.5)]">
                <p class="text-center text-msp-navy text-xs md:text-sm leading-5 font-semibold">
                    Catatan: <span class="font-normal text-msp-gray">Beberapa layanan terspesialisasi mungkin dikelola di bawah naungan entitas afiliasi kami, PT TNS, dengan standar mutu yang sama.</span>
                </p>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="pt-16 lg:pt-20 bg-msp-navy border-t border-msp-white-alpha">
        <div class="max-w-[1302px] mx-auto px-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-8 lg:gap-12">
                <div class="sm:col-span-2 lg:col-span-4 flex flex-col gap-6">
                    <span class="font-space text-xl leading-7 font-bold text-white">PT Mentari Satya Perkasa</span>
                    <p class="text-[rgba(220,226,243,0.8)] text-sm md:text-base leading-[26px]">Mentari Satya Perkasa terdepan di Indonesia, menyediakan layanan komprehensif untuk keamanan, pengelolaan lingkungan, dan keberlanjutan bisnis dengan standar mutu internasional.</p>
                    <div class="flex gap-4 pt-2">
                        <a href="#" class="w-10 h-10 flex items-center justify-center bg-msp-white-alpha rounded-xl">
                            <img src="{{ asset('images/icon-social-1.svg') }}" alt="" class="w-[16.67px] h-[16.67px]">
                        </a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center bg-msp-white-alpha rounded-xl">
                            <img src="{{ asset('images/icon-social-2.svg') }}" alt="" class="w-[16.67px] h-[13.33px]">
                        </a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center bg-msp-white-alpha rounded-xl">
                            <img src="{{ asset('images/icon-social-3.svg') }}" alt="" class="w-[15px] h-[15px]">
                        </a>
                    </div>
                </div>
                <div class="lg:col-span-2 flex flex-col gap-6">
                    <h4 class="font-space text-msp-gold text-lg leading-7 font-bold">Perusahaan</h4>
                    <ul class="flex flex-col gap-3 md:gap-4">
                        <li><a href="#" class="text-[rgba(220,226,243,0.8)] text-sm md:text-base">Tentang Kami</a></li>
                        <li><a href="#" class="text-[rgba(220,226,243,0.8)] text-sm md:text-base">Pusat Media</a></li>
                        <li><a href="#" class="text-[rgba(220,226,243,0.8)] text-sm md:text-base">Karir</a></li>
                        <li><a href="#" class="text-[rgba(220,226,243,0.8)] text-sm md:text-base">Kebijakan Privasi</a></li>
                    </ul>
                </div>
                <div class="lg:col-span-3 flex flex-col gap-6">
                    <h4 class="font-space text-msp-gold text-lg leading-7 font-bold">Layanan</h4>
                    <ul class="flex flex-col gap-3 md:gap-4">
                        <li><a href="#" class="text-[rgba(220,226,243,0.8)] text-sm md:text-base">Jasa Outsourcing</a></li>
                        <li><a href="#" class="text-[rgba(220,226,243,0.8)] text-sm md:text-base">Perizinan Lingkungan</a></li>
                        <li><a href="#" class="text-[rgba(220,226,243,0.8)] text-sm md:text-base">Pest Control</a></li>
                        <li><a href="#" class="flex items-center gap-2 text-[rgba(220,226,243,0.8)] text-sm md:text-base">Pengadaan Barang (PT TNS) <img src="{{ asset('images/icon-external-link.svg') }}" alt="" class="w-[9px] h-[9px]"></a></li>
                    </ul>
                </div>
                <div class="sm:col-span-2 lg:col-span-3 flex flex-col gap-6">
                    <h4 class="font-space text-msp-gold text-lg leading-7 font-bold">Hubungi Kami</h4>
                    <ul class="flex flex-col gap-3 md:gap-4">
                        <li class="flex items-start gap-3">
                            <img src="{{ asset('images/icon-location.svg') }}" alt="" class="w-4 h-5 mt-0.5 shrink-0">
                            <span class="text-[rgba(220,226,243,0.8)] text-sm md:text-base">Jakarta, Indonesia</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <img src="{{ asset('images/icon-phone.svg') }}" alt="" class="w-[18px] h-[18px] shrink-0">
                            <span class="text-[rgba(220,226,243,0.8)] text-sm md:text-base">+62 21 1234 5678</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <img src="{{ asset('images/icon-email.svg') }}" alt="" class="w-5 h-4 shrink-0">
                            <span class="text-[rgba(220,226,243,0.8)] text-sm md:text-base">info@ptmsp.co.id</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="flex flex-col border-t border-msp-white-alpha mt-10 lg:mt-16">
            <div class="max-w-[1302px] mx-auto w-full px-6 py-6 md:py-8 flex flex-wrap justify-between items-center gap-4">
                <span class="text-[rgba(220,226,243,0.6)] text-xs md:text-sm">© 2024 PT Mentari Satya Perkasa. All rights reserved.</span>
                <div class="flex gap-4 md:gap-6">
                    <a href="#" class="text-[rgba(220,226,243,0.6)] text-xs md:text-sm">Terms of Service</a>
                    <a href="#" class="text-[rgba(220,226,243,0.6)] text-xs md:text-sm">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
