<x-guest-layout>

    {{-- Header outside card --}}
    <div class="mb-8">
        <h2 class="font-space font-bold text-[28px] text-msp-navy leading-tight">Lupa Password?</h2>
        <p class="font-inter text-[15px] text-msp-gray mt-1">Masuk ke akun admin Anda.</p>
    </div>

    {{-- Status alert --}}
    @if (session('status'))
        <div class="mb-5 px-4 py-3 bg-green-50 border border-green-200 rounded-xl flex items-center gap-2.5">
            <i class="fas fa-check-circle text-green-500 text-[14px] shrink-0"></i>
            <p class="font-inter text-[13px] text-green-700">{{ session('status') }}</p>
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-5 px-4 py-3 bg-red-50 border border-red-200 rounded-xl">
            <div class="flex items-start gap-2">
                <i class="fas fa-exclamation-circle text-red-500 mt-0.5 text-[13px]"></i>
                <ul class="text-[13px] text-red-700 font-inter space-y-0.5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    {{-- Card --}}
    <div class="bg-white rounded-2xl border border-msp-border shadow-[0_4px_24px_rgba(11,33,69,0.06)] p-8">
        <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
            @csrf

            {{-- Email --}}
            <div>
                <label for="email" class="block font-hanken font-semibold text-[13px] text-msp-navy mb-1.5">
                    Alamat Email
                </label>
                <div class="relative">
                    <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-msp-gray-light text-[13px]">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                           required autofocus autocomplete="email"
                           placeholder="admin@perusahaan.co.id"
                           class="block w-full h-[46px] pl-10 pr-4 rounded-xl border bg-msp-bg font-inter text-[14px] text-msp-navy placeholder-msp-gray/40 focus:outline-none transition-colors
                                  {{ $errors->get('email') ? 'border-red-400 focus:border-red-400 focus:ring-2 focus:ring-red-400/20' : 'border-msp-border focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20' }}">
                </div>
            </div>

            {{-- Info box --}}
            <div class="flex items-start gap-3 px-4 py-3 bg-blue-50 border border-blue-100 rounded-xl">
                <i class="fas fa-info-circle text-msp-blue text-[13px] mt-0.5 shrink-0"></i>
                <p class="font-inter text-[12px] text-msp-blue leading-relaxed">
                    Tautan reset akan dikirim ke email terdaftar. Periksa folder <span class="font-semibold">Spam</span> jika tidak muncul dalam 5 menit.
                </p>
            </div>

            {{-- Submit --}}
            <button type="submit"
                    class="w-full h-[48px] rounded-xl font-hanken font-bold text-[15px] text-[#071B3B] hover:brightness-105 focus:outline-none focus:ring-2 focus:ring-msp-gold/40 transition duration-200 shadow-[0_4px_14px_rgba(242,167,27,0.25)]"
                    style="background: linear-gradient(135deg, #F2A71B 0%, #FBC34C 100%)">
                <i class="fas fa-paper-plane mr-2 text-[13px]"></i>
                Kirim Tautan Reset
            </button>

            {{-- Divider --}}
            <div class="relative flex items-center gap-3 py-1">
                <div class="flex-1 h-px bg-msp-border"></div>
                <span class="font-inter text-[11px] text-msp-gray-light uppercase tracking-wider">atau</span>
                <div class="flex-1 h-px bg-msp-border"></div>
            </div>

            {{-- Back to login --}}
            <a href="{{ route('login') }}"
               class="flex items-center justify-center gap-2 w-full h-[46px] rounded-xl border border-msp-border bg-white font-hanken font-semibold text-[14px] text-msp-navy hover:bg-msp-bg transition-colors">
                <i class="fas fa-arrow-left text-[12px] text-msp-gray-light"></i>
                Kembali ke Halaman Masuk
            </a>
        </form>
    </div>

    {{-- Footer --}}
    <p class="mt-6 text-center font-inter text-[12px] text-msp-gray-light">
        PT Mentari Satya Perkasa &bull; Panel Administrasi Internal
    </p>

</x-guest-layout>
