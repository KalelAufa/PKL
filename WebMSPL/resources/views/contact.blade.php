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

@section('content')
    {{-- Hero Section --}}
    <section class="pt-16 px-4 pb-0 bg-msp-bg">
        <div class="mx-2 md:mx-4 lg:mx-6 relative overflow-hidden rounded-3xl min-h-[300px] md:min-h-[380px]">
            <img src="{{ asset('images/' . ($pageContents['hero_image']->value ?? 'layanan-hero.png')) }}" alt=""
                class="absolute inset-0 w-full h-full object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-t from-[#0B2145] via-[rgba(11,33,69,0.75)] to-[rgba(11,33,69,0.45)]"></div>
            <div class="absolute bottom-0 left-0 right-0 flex flex-col px-8 pb-12 md:px-12">
                <div class="max-w-[672px] flex flex-col gap-4 md:gap-5">
                    <h1 class="font-space text-white text-3xl sm:text-4xl md:text-5xl font-bold leading-tight">{{ $pageContents['hero_title']->value ?? 'Hubungi Kami' }}</h1>
                    <p class="text-msp-light text-base md:text-lg leading-7">{{ $pageContents['hero_subtitle']->value ?? 'Kami siap membantu Anda dengan solusi outsourcing, pengelolaan lingkungan, dan pengendalian hama terbaik untuk bisnis Anda.' }}</p>
                    <a href="#contact-form"
                        class="inline-flex items-center gap-2 px-6 py-3 bg-msp-gold text-msp-navy font-bold text-sm rounded-xl w-fit transition duration-300 hover:brightness-110 hover:shadow-lg">{{ $pageContents['hero_cta']->value ?? 'Kirim Pesan' }}</a>
                </div>
            </div>
        </div>
    </section>

    {{-- Main Contact Section --}}
    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-[1152px] mx-auto px-6">
            <div class="grid grid-cols-12 gap-x-8 gap-y-12">

                {{-- Contact Info --}}
                <div class="col-span-12 lg:col-span-5 flex flex-col gap-8">
                    <div class="flex flex-col gap-2">
                        <h2 class="font-space font-semibold text-msp-dark text-2xl md:text-3xl leading-snug">{{ $pageContents['contact_info_title']->value ?? 'Informasi Kontak' }}</h2>
                        <p class="text-msp-gray text-sm md:text-base leading-relaxed">{{ $pageContents['contact_info_subtitle']->value ?? 'Jangan ragu untuk menghubungi kami. Tim kami akan segera merespons pertanyaan Anda.' }}</p>
                    </div>

                    <div class="flex flex-col gap-4">
                        <div class="flex gap-4 items-start">
                            <div class="w-11 h-11 bg-msp-bg rounded-xl flex items-center justify-center shrink-0">
                                <i class="fas fa-map-marker-alt text-msp-navy"></i>
                            </div>
                            <div>
                                <h3 class="font-space font-semibold text-msp-dark text-base">Kantor Pusat</h3>
                                <p class="text-msp-gray text-sm leading-relaxed mt-1">{!! nl2br(e($companySettings['address']->value ?? "Gedung PT MSP Lantai 5\nJl. Jend. Sudirman Kav. 1\nJakarta Pusat, 10220, Indonesia")) !!}</p>
                            </div>
                        </div>

                        <div class="flex gap-4 items-start">
                            <div class="w-11 h-11 bg-msp-bg rounded-xl flex items-center justify-center shrink-0">
                                <i class="fas fa-phone text-msp-navy"></i>
                            </div>
                            <div>
                                <h3 class="font-space font-semibold text-msp-dark text-base">Telepon</h3>
                                <p class="text-msp-gray text-sm leading-relaxed mt-1">{{ $companySettings['phone']->value ?? '+62 21 1234 5678' }}</p>
                                <p class="text-msp-gray/70 text-xs mt-0.5">{{ $companySettings['office_hours']->value ?? 'Senin - Jumat, 08:00 - 17:00 WIB' }}</p>
                            </div>
                        </div>

                        <div class="flex gap-4 items-start">
                            <div class="w-11 h-11 bg-msp-bg rounded-xl flex items-center justify-center shrink-0">
                                <i class="fas fa-envelope text-msp-navy"></i>
                            </div>
                            <div>
                                <h3 class="font-space font-semibold text-msp-dark text-base">Email</h3>
                                <p class="text-msp-dark text-sm leading-relaxed mt-1">{{ $companySettings['email']->value ?? 'info@ptmsp.co.id' }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Social --}}
                    <div class="border-t border-msp-border pt-5 flex flex-col gap-4">
                        <div class="flex gap-3">
                            <a href="{{ $companySettings['social_facebook']->value ?? '#' }}"
                                class="w-10 h-10 bg-msp-navy rounded-xl flex items-center justify-center transition duration-300 hover:-translate-y-0.5 hover:shadow-md">
                                <i class="fab fa-facebook-f text-white text-sm"></i>
                            </a>
                            <a href="{{ $companySettings['social_x']->value ?? '#' }}"
                                class="w-10 h-10 bg-msp-navy rounded-xl flex items-center justify-center transition duration-300 hover:-translate-y-0.5 hover:shadow-md">
                                <i class="fab fa-x-twitter text-white text-sm"></i>
                            </a>
                            <a href="{{ $companySettings['social_instagram']->value ?? '#' }}"
                                class="w-10 h-10 bg-msp-navy rounded-xl flex items-center justify-center transition duration-300 hover:-translate-y-0.5 hover:shadow-md">
                                <i class="fab fa-instagram text-white text-sm"></i>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Contact Form --}}
                <div class="col-span-12 lg:col-span-7" x-data="contactForm()">
                    <div id="contact-form" class="bg-white border border-msp-border rounded-2xl shadow-sm p-8 flex flex-col gap-5">
                        <h2 class="font-space font-semibold text-msp-dark text-xl md:text-2xl">Kirim Pesan</h2>

                        {{-- Inline success --}}
                        <div x-show="sent" x-cloak
                             class="flex items-start gap-3 px-5 py-4 bg-green-50 border border-green-200 rounded-xl">
                            <div class="w-10 h-10 rounded-xl bg-green-100 flex items-center justify-center shrink-0">
                                <i class="fas fa-check text-green-600 text-sm"></i>
                            </div>
                            <div>
                                <p class="font-space font-bold text-msp-dark text-base leading-tight">Pesan Terkirim</p>
                                <p class="text-msp-gray text-sm leading-relaxed mt-0.5">Tim kami akan merespons dalam 1×24 jam kerja.</p>
                                <button type="button" @click="sent = false"
                                        class="mt-3 text-msp-blue font-semibold text-sm hover:text-msp-navy transition-colors">
                                    Kirim pesan lain →
                                </button>
                            </div>
                        </div>

                        <form action="{{ route('contact.store') }}" method="POST" class="flex flex-col gap-4"
                              @submit.prevent="submit"
                              x-show="!sent">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="flex flex-col gap-2">
                                    <label for="contact-name" class="font-mono text-msp-dark text-[10px] tracking-widest uppercase font-bold">Nama Lengkap</label>
                                    <input id="contact-name" type="text" name="name" autocomplete="name" placeholder="Masukkan nama Anda" required
                                        class="w-full px-4 py-3.5 bg-msp-bg border border-msp-border rounded-xl text-msp-dark text-sm placeholder-msp-gray/60 outline-none focus:ring-2 focus:ring-msp-gold transition">
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label for="contact-company" class="font-mono text-msp-dark text-[10px] tracking-widest uppercase font-bold">Perusahaan</label>
                                    <input id="contact-company" type="text" name="company" autocomplete="organization" placeholder="Nama perusahaan"
                                        class="w-full px-4 py-3.5 bg-msp-bg border border-msp-border rounded-xl text-msp-dark text-sm placeholder-msp-gray/60 outline-none focus:ring-2 focus:ring-msp-gold transition">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="flex flex-col gap-2">
                                    <label for="contact-email" class="font-mono text-msp-dark text-[10px] tracking-widest uppercase font-bold">Email</label>
                                    <input id="contact-email" type="email" name="email" autocomplete="email" placeholder="email@perusahaan.com" required
                                        class="w-full px-4 py-3.5 bg-msp-bg border border-msp-border rounded-xl text-msp-dark text-sm placeholder-msp-gray/60 outline-none focus:ring-2 focus:ring-msp-gold transition">
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label for="contact-phone" class="font-mono text-msp-dark text-[10px] tracking-widest uppercase font-bold">Nomor Telepon</label>
                                    <input id="contact-phone" type="tel" name="phone" autocomplete="tel" placeholder="+62 812..."
                                        class="w-full px-4 py-3.5 bg-msp-bg border border-msp-border rounded-xl text-msp-dark text-sm placeholder-msp-gray/60 outline-none focus:ring-2 focus:ring-msp-gold transition">
                                </div>
                            </div>

                            <div class="flex flex-col gap-2">
                                <label for="contact-service" class="font-mono text-msp-dark text-[10px] tracking-widest uppercase font-bold">Layanan yang Diminati</label>
                                <div class="relative">
                                    <select id="contact-service" name="service"
                                        class="w-full appearance-none px-4 py-3.5 bg-msp-bg border border-msp-border rounded-xl text-msp-dark text-sm outline-none focus:ring-2 focus:ring-msp-gold transition">
                                        <option value="">Pilih Layanan</option>
                                        @foreach(\App\Models\Service::where('is_affiliate', false)->orderBy('order')->get() as $svc)
                                            <option value="{{ $svc->slug }}">{{ $svc->title }}</option>
                                        @endforeach
                                    </select>
                                    <i class="fas fa-chevron-down text-msp-gray/60 absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-xs"></i>
                                </div>
                            </div>

                            <div class="flex flex-col gap-2">
                                <label for="contact-message" class="font-mono text-msp-dark text-[10px] tracking-widest uppercase font-bold">Pesan</label>
                                <textarea id="contact-message" name="message" rows="5" placeholder="Tuliskan pertanyaan atau kebutuhan Anda secara detail..." required
                                    class="w-full px-4 py-3 bg-msp-bg border border-msp-border rounded-xl text-msp-dark text-sm placeholder-msp-gray/60 outline-none focus:ring-2 focus:ring-msp-gold transition resize-none"></textarea>
                            </div>

                            <div x-show="errorMsg" x-cloak class="flex items-center gap-2 px-4 py-3 bg-red-50 border border-red-200 rounded-xl text-red-700 text-sm">
                                <i class="fas fa-exclamation-circle text-red-400"></i>
                                <span x-text="errorMsg"></span>
                            </div>

                            <div class="pt-1">
                                <button type="submit" :disabled="submitting"
                                    class="inline-flex items-center gap-2 px-8 py-3.5 bg-msp-gold text-msp-navy font-bold text-sm rounded-xl transition duration-300 hover:brightness-110 hover:shadow-lg disabled:opacity-50 disabled:cursor-not-allowed">
                                    <span x-text="submitting ? 'Mengirim...' : 'Kirim Pesan'"></span>
                                    <i class="fas fa-arrow-right text-xs" x-show="!submitting"></i>
                                    <i class="fas fa-spinner fa-spin text-xs" x-show="submitting" x-cloak></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Map Section --}}
    <section class="bg-msp-bg py-16 md:py-20">
        <div class="max-w-[1152px] mx-auto px-6 flex flex-col gap-4">
            <div class="flex flex-col gap-2">
                <h2 class="font-space font-semibold text-msp-dark text-xl md:text-2xl">{{ $pageContents['map_title']->value ?? 'Lokasi Kami' }}</h2>
            </div>
            <div class="h-[300px] md:h-[400px] rounded-2xl overflow-hidden shadow-sm border border-msp-border">
                <iframe title="Lokasi Kantor PT Mentari Satya Perkasa"
                    src="{{ $pageContents['map_embed_url']->value ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.4!2d106.8125!3d-6.2615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1f6c7b6c9c5!2sJakarta!5e0!3m2!1sid!2sid!4v1' }}"
                    width="100%" height="100%" style="border:0;" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    allow="fullscreen"></iframe>
            </div>
        </div>
    </section>
@endsection


@push('scripts')
<script>
function contactForm() {
    return {
        submitting: false,
        sent: false,
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
                    this.sent = true;
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
