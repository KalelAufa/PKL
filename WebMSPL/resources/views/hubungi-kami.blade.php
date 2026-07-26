@extends('layouts.app')

@section('title', 'Hubungi Kami - PT Mentari Satya Perkasa')

@push('meta')
<meta name="description" content="Hubungi PT Mentari Satya Perkasa untuk konsultasi layanan outsourcing, perizinan lingkungan, dan pengendalian hama. Kami siap membantu bisnis Anda.">
<meta property="og:title" content="Hubungi Kami - PT Mentari Satya Perkasa">
<meta property="og:description" content="Hubungi tim PT Mentari Satya Perkasa untuk konsultasi layanan profesional Anda.">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url('/hubungi-kami') }}">
<link rel="canonical" href="{{ url('/hubungi-kami') }}">
@endpush

@section('body_class', 'bg-[#f8f9fa]')

@section('content')
    {{-- Hero Section --}}
    <section class="pt-16 px-4 pb-0 bg-msp-bg" data-aos="fade" data-aos-duration="800">
        <div class="mx-2 md:mx-4 lg:mx-6 relative overflow-hidden rounded-2xl min-h-[300px] md:min-h-[350px]">
            <img src="{{ asset('images/' . ($pageContents['hero_image']->value ?? 'layanan-hero.png')) }}" alt=""
                class="absolute inset-0 w-full h-full object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-br from-[rgba(11,33,69,0.9)] to-[rgba(11,33,69,0.7)]"></div>
            <div class="relative px-6 py-14 md:pt-[60px] md:pb-6">
                <div class="max-w-full lg:max-w-[768px] flex flex-col gap-4 md:gap-6">
                    <h1 class="font-space text-white text-3xl sm:text-4xl md:text-5xl lg:text-6xl leading-snug md:leading-[60px] font-bold">{{ $pageContents['hero_title']->value ?? 'Hubungi Kami' }}</h1>
                    <div class="max-w-full lg:max-w-[672px]">
                        <p class="text-msp-light text-base md:text-lg leading-6 md:leading-7">{{ $pageContents['hero_subtitle']->value ?? 'Kami siap membantu Anda dengan solusi outsourcing, pengelolaan lingkungan, dan pengendalian hama terbaik untuk bisnis Anda.' }}</p>
                    </div>
                    <div class="flex flex-wrap gap-3 md:gap-4 pt-2 md:pt-4">
                        <a href="#contact-form" class="flex items-center px-6 md:px-8 py-3 md:py-3.5 bg-gradient-to-br from-[#F2A71B] to-[#FBC34C] rounded-xl text-msp-navy font-semibold text-sm md:text-base transition-all duration-300 hover:scale-105 hover:shadow-xl">Kirim Pesan</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Main Contact Section --}}
    <section class="py-16 md:py-20">
        <div class="max-w-[1152px] mx-auto px-6">
            <div class="grid grid-cols-12 gap-x-6 lg:gap-x-8 gap-y-12">

                {{-- Contact Info --}}
                <div class="col-span-12 lg:col-span-5 flex flex-col gap-8" data-aos="fade-right">
                    <div class="flex flex-col gap-2">
                        <h2 class="font-space font-semibold text-msp-dark text-2xl md:text-3xl leading-[36px] md:leading-[42px]">Informasi Kontak</h2>
                        <p class="text-msp-gray text-sm md:text-base leading-[22px] md:leading-[26px]">Jangan ragu untuk menghubungi kami. Tim kami akan segera merespons pertanyaan Anda.</p>
                    </div>

                    <div class="flex flex-col gap-4">
                        <div class="flex gap-4 items-start" data-aos="fade-right" data-aos-delay="100">
                            <div class="w-10 h-[50px] bg-[#e1e3e4] rounded-xl flex items-center justify-center shrink-0">
                                <i class="fas fa-map-marker-alt text-xl text-[#000411]"></i>
                            </div>
                            <div>
                                <h3 class="font-space font-semibold text-msp-dark text-[18px] leading-7">Kantor Pusat</h3>
                                <p class="text-msp-gray text-sm md:text-base leading-[22px] md:leading-[26px]">{!! nl2br(e($companySettings['address']->value ?? "Gedung PT MSP Lantai 5\nJl. Jend. Sudirman Kav. 1\nJakarta Pusat, 10220, Indonesia")) !!}</p>
                            </div>
                        </div>

                        <div class="flex gap-4 items-start" data-aos="fade-right" data-aos-delay="200">
                            <div class="w-10 h-[50px] bg-[#e1e3e4] rounded-xl flex items-center justify-center shrink-0">
                                <i class="fas fa-phone text-xl text-[#000411]"></i>
                            </div>
                            <div>
                                <h3 class="font-space font-semibold text-msp-dark text-[18px] leading-7">Telepon</h3>
                                <p class="text-msp-gray text-sm md:text-base leading-[22px] md:leading-[26px]">{{ $companySettings['phone']->value ?? '+62 21 1234 5678' }}</p>
                                <p class="text-msp-gray text-xs md:text-sm leading-5 mt-1">{{ $companySettings['office_hours']->value ?? 'Senin - Jumat, 08:00 - 17:00 WIB' }}</p>
                            </div>
                        </div>

                        <div class="flex gap-4 items-start" data-aos="fade-right" data-aos-delay="300">
                            <div class="w-10 h-[50px] bg-[#e1e3e4] rounded-xl flex items-center justify-center shrink-0">
                                <i class="fas fa-envelope text-xl text-[#000411]"></i>
                            </div>
                            <div>
                                <h3 class="font-space font-semibold text-msp-dark text-[18px] leading-7">Email</h3>
                                <p class="text-msp-dark text-sm md:text-base leading-[22px] md:leading-[26px]">{{ $companySettings['email']->value ?? 'info@ptmsp.co.id' }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Social --}}
                    <div class="border-t border-[#e1e3e4] pt-4 flex flex-col gap-4">
                        <span class="font-bold text-msp-gray text-[10px] md:text-xs leading-[14px] tracking-[0.6px] uppercase">Ikuti Kami</span>
                        <div class="flex gap-4">
                            <a href="{{ $companySettings['social_facebook']->value ?? '#' }}" class="w-10 h-10 bg-msp-dark rounded-xl flex items-center justify-center shadow-[0px_1px_1px_rgba(0,0,0,0.05)] transition-all duration-300 hover:scale-110">
                                <i class="fab fa-facebook-f text-white"></i>
                            </a>
                            <a href="{{ $companySettings['social_x']->value ?? '#' }}" class="w-10 h-10 bg-msp-dark rounded-xl flex items-center justify-center shadow-[0px_1px_1px_rgba(0,0,0,0.05)] transition-all duration-300 hover:scale-110">
                                <i class="fab fa-x-twitter text-white"></i>
                            </a>
                            <a href="{{ $companySettings['social_instagram']->value ?? '#' }}" class="w-10 h-10 bg-msp-dark rounded-xl flex items-center justify-center shadow-[0px_1px_1px_rgba(0,0,0,0.05)] transition-all duration-300 hover:scale-110">
                                <i class="fab fa-instagram text-white"></i>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Contact Form --}}
                <div class="col-span-12 lg:col-span-7" data-aos="fade-left" x-data="contactForm()">
                    <div class="bg-white border border-[#e1e3e4] rounded-2xl shadow-[0px_1px_1px_rgba(0,0,0,0.05)] p-8 flex flex-col gap-4">
                        <h2 class="font-space font-semibold text-msp-dark text-xl md:text-2xl leading-[30px] md:leading-[34px]">Kirim Pesan</h2>

                        <form id="contact-form" action="{{ route('contact.store') }}" method="POST" class="flex flex-col gap-4"
                              @submit.prevent="submit">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="field-group flex flex-col gap-2">
                                    <label for="contact-name" class="font-bold text-msp-dark text-[10px] md:text-xs leading-[14px] tracking-[0.6px] uppercase">Nama Lengkap</label>
                                    <input id="contact-name" type="text" name="name" placeholder="Masukkan nama Anda" required
                                        class="w-full px-4 py-[14px] bg-[#f8f9fa] border border-[#c5c6cf] rounded-xl text-msp-dark text-sm md:text-base placeholder-[#6b7280] outline-none focus:ring-2 focus:ring-msp-gold transition-all">
                                </div>
                                <div class="field-group flex flex-col gap-2">
                                    <label for="contact-company" class="font-bold text-msp-dark text-[10px] md:text-xs leading-[14px] tracking-[0.6px] uppercase">Perusahaan</label>
                                    <input id="contact-company" type="text" name="company" placeholder="Nama perusahaan"
                                        class="w-full px-4 py-[14px] bg-[#f8f9fa] border border-[#c5c6cf] rounded-xl text-msp-dark text-sm md:text-base placeholder-[#6b7280] outline-none focus:ring-2 focus:ring-msp-gold transition-all">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="field-group flex flex-col gap-2">
                                    <label for="contact-email" class="font-bold text-msp-dark text-[10px] md:text-xs leading-[14px] tracking-[0.6px] uppercase">Email</label>
                                    <input id="contact-email" type="email" name="email" placeholder="email@perusahaan.com" required
                                        class="w-full px-4 py-[14px] bg-[#f8f9fa] border border-[#c5c6cf] rounded-xl text-msp-dark text-sm md:text-base placeholder-[#6b7280] outline-none focus:ring-2 focus:ring-msp-gold transition-all">
                                </div>
                                <div class="field-group flex flex-col gap-2">
                                    <label for="contact-phone" class="font-bold text-msp-dark text-[10px] md:text-xs leading-[14px] tracking-[0.6px] uppercase">Nomor Telepon</label>
                                    <input id="contact-phone" type="tel" name="phone" placeholder="+62 812..."
                                        class="w-full px-4 py-[14px] bg-[#f8f9fa] border border-[#c5c6cf] rounded-xl text-msp-dark text-sm md:text-base placeholder-[#6b7280] outline-none focus:ring-2 focus:ring-msp-gold transition-all">
                                </div>
                            </div>

                            <div class="field-group flex flex-col gap-2">
                                <label for="contact-service" class="font-bold text-msp-dark text-[10px] md:text-xs leading-[14px] tracking-[0.6px] uppercase">Layanan yang Diminati</label>
                                <div class="relative">
                                    <select id="contact-service" name="service" class="w-full appearance-none px-4 py-[13px] bg-[#f8f9fa] border border-[#c5c6cf] rounded-xl text-msp-dark text-sm md:text-base outline-none focus:ring-2 focus:ring-msp-gold transition-all">
                                        <option value="">Pilih Layanan</option>
                                        <option value="outsourcing">Jasa Outsourcing</option>
                                        <option value="lingkungan">Perizinan Lingkungan</option>
                                        <option value="pest-control">Pest Control</option>
                                        <option value="maintenance">Building Maintenance</option>
                                        <option value="landscaping">Landscaping</option>
                                    </select>
                                    <i class="fas fa-chevron-down text-[#6B7280] absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none"></i>
                                </div>
                            </div>

                            <div class="field-group flex flex-col gap-2 pb-[6px]">
                                <label for="contact-message" class="font-bold text-msp-dark text-[10px] md:text-xs leading-[14px] tracking-[0.6px] uppercase">Pesan</label>
                                <textarea id="contact-message" name="message" rows="5" placeholder="Tuliskan pertanyaan atau kebutuhan Anda secara detail..." required
                                    class="w-full px-4 py-3 bg-[#f8f9fa] border border-[#c5c6cf] rounded-xl text-msp-dark text-sm md:text-base placeholder-[#6b7280] outline-none focus:ring-2 focus:ring-msp-gold transition-all resize-none"></textarea>
                            </div>

                            <div x-show="errorMsg" x-cloak class="flex items-center gap-2 px-4 py-3 bg-red-50 border border-red-200 rounded-xl text-red-700 text-sm">
                                <i class="fas fa-exclamation-circle text-red-400"></i>
                                <span x-text="errorMsg"></span>
                            </div>

                            <div class="pt-2">
                                <button type="submit" :disabled="submitting"
                                    class="inline-flex items-center gap-2 px-8 py-3 bg-msp-gold text-msp-navy font-bold text-xs md:text-sm leading-[14px] tracking-[0.6px] rounded-xl shadow-[0px_4px_7px_rgba(242,167,27,0.2)] transition-all duration-300 hover:brightness-110 hover:shadow-lg disabled:opacity-50 disabled:cursor-not-allowed">
                                    <span x-text="submitting ? 'Mengirim...' : 'Kirim Pesan'"></span>
                                    <i class="fas fa-arrow-right text-msp-navy" x-show="!submitting"></i>
                                    <i class="fas fa-spinner fa-spin text-msp-navy" x-show="submitting" x-cloak></i>
                                </button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Map Section --}}
    <section class="bg-[#f8f9fa] py-16 md:py-20" data-aos="fade-up">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="flex flex-col gap-4">
                <h2 class="font-space font-semibold text-msp-dark text-xl md:text-2xl leading-[30px] md:leading-[34px] text-center">Lokasi Kami</h2>
                <div class="h-[300px] md:h-[400px] rounded-2xl overflow-hidden">
                    <iframe title="Lokasi Kantor PT Mentari Satya Perkasa" src="{{ $pageContents['map_embed_url']->value ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.4!2d106.8125!3d-6.2615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1f6c7b6c9c5!2sJakarta!5e0!3m2!1sid!2sid!4v1' }}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('toast')
<div x-data="{ show: false }"
     @contact-sent.window="show = true"
     x-show="show"
     x-cloak
     class="fixed bottom-24 right-6 z-[9999] w-[340px]"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 translate-y-4"
     x-transition:enter-end="opacity-100 translate-y-0"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100 translate-y-0"
     x-transition:leave-end="opacity-0 translate-y-4">
    <div class="bg-white rounded-2xl shadow-2xl border border-green-100 p-6 flex flex-col gap-4">
        <div class="flex items-start justify-between gap-3">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 rounded-xl bg-green-100 flex items-center justify-center shrink-0">
                    <i class="fas fa-check-circle text-green-500 text-xl"></i>
                </div>
                <div>
                    <p class="font-space font-bold text-[16px] text-msp-dark leading-tight">Pesan Terkirim!</p>
                    <p class="text-msp-gray text-[12px] leading-relaxed mt-0.5">Tim kami akan merespons dalam 1×24 jam kerja.</p>
                </div>
            </div>
            <button @click="show = false"
                    class="w-7 h-7 rounded-lg bg-gray-100 hover:bg-gray-200 flex items-center justify-center text-msp-gray shrink-0 transition">
                <i class="fas fa-times text-[11px]"></i>
            </button>
        </div>
        <div class="h-1 bg-gray-100 rounded-full overflow-hidden">
            <div class="h-full bg-green-400 rounded-full origin-left"
                 x-init="$watch('show', v => { if(v) { setTimeout(() => show = false, 6000); } })"
                 :style="show ? 'animation: shrink-bar 6s linear forwards' : 'transform: scaleX(0)'"></div>
        </div>
    </div>
</div>
<style>
@keyframes shrink-bar { from { transform: scaleX(1); } to { transform: scaleX(0); } }
</style>
@endpush

@push('scripts')
<script>
function contactForm() {
    return {
        submitting: false,
        errorMsg: '',
        async submit(e) {
            this.submitting = true;
            this.errorMsg = '';
            const form = e.target;
            const data = new FormData(form);
            try {
                const res = await fetch(form.action, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
                    body: data,
                });
                const json = await res.json();
                if (json.success) {
                    form.reset();
                    window.dispatchEvent(new CustomEvent('contact-sent'));
                } else {
                    this.errorMsg = json.message || 'Terjadi kesalahan. Silakan coba lagi.';
                }
            } catch {
                this.errorMsg = 'Gagal mengirim pesan. Periksa koneksi Anda.';
            } finally {
                this.submitting = false;
            }
        }
    };
}
</script>
@endpush
