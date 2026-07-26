<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login — PT MSP</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@600;700&family=Hanken+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
</head>
<body class="font-inter antialiased min-h-screen flex">

    {{-- Left panel: brand --}}
    <div class="hidden lg:flex lg:w-[480px] flex-col justify-between relative overflow-hidden"
         style="background: linear-gradient(160deg, #0B2145 0%, #0B1E3E 60%, #071535 100%);">

        {{-- Decorative gold blob --}}
        <div class="absolute -top-20 -right-20 w-72 h-72 rounded-full opacity-10"
             style="background: radial-gradient(circle, #F2A71B 0%, transparent 70%)"></div>
        <div class="absolute -bottom-16 -left-16 w-56 h-56 rounded-full opacity-10"
             style="background: radial-gradient(circle, #2A3F9E 0%, transparent 70%)"></div>

        {{-- Top: logo --}}
        <div class="px-10 pt-12">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center border border-white/10">
                    <img src="{{ asset('images/logo.png') }}" alt="PT MSP" class="w-7 h-7 object-contain">
                </div>
                <div>
                    <div class="font-space font-bold text-[18px] text-white leading-tight">PT MSP</div>
                    <div class="font-hanken text-[11px] text-white/40 uppercase tracking-widest">Admin Panel</div>
                </div>
            </div>
        </div>

        {{-- Middle: tagline --}}
        <div class="px-10">
            <h1 class="font-space font-bold text-[36px] text-white leading-tight mb-4">
                Kelola Konten<br>Perusahaan Anda
            </h1>
            <p class="font-inter text-[15px] text-white/60 leading-relaxed max-w-[320px]">
                Panel administrasi terpusat untuk PT Mentari Satya Perkasa. Kelola berita, layanan, tim, dan lebih banyak lagi.
            </p>

            {{-- Gold accent bar --}}
            <div class="flex items-center gap-2 mt-8">
                <div class="w-10 h-1 rounded-full bg-msp-gold"></div>
                <div class="w-4 h-1 rounded-full bg-msp-gold/40"></div>
                <div class="w-2 h-1 rounded-full bg-msp-gold/20"></div>
            </div>
        </div>

        {{-- Bottom: quote --}}
        <div class="px-10 pb-12">
            <div class="bg-white/5 border border-white/10 rounded-xl px-5 py-4">
                <p class="font-inter text-[13px] text-white/50 italic leading-relaxed">
                    "Membangun kepercayaan melalui layanan afiliasi yang handal dan profesional."
                </p>
                <p class="font-hanken font-semibold text-[12px] text-msp-gold mt-2">— PT Mentari Satya Perkasa</p>
            </div>
        </div>
    </div>

    {{-- Right panel: form --}}
    <div class="flex-1 flex flex-col items-center justify-center px-6 py-12 bg-msp-bg">

        {{-- Mobile: logo --}}
        <div class="flex items-center gap-3 mb-10 lg:hidden">
            <img src="{{ asset('images/logo.png') }}" alt="PT MSP" class="h-10 w-auto">
            <span class="font-space font-bold text-[20px] text-msp-navy">PT MSP</span>
        </div>

        <div class="w-full max-w-[400px]">

            {{-- Header --}}
            <div class="mb-8">
                <h2 class="font-space font-bold text-[28px] text-msp-navy leading-tight">Selamat datang</h2>
                <p class="font-inter text-[15px] text-msp-gray mt-1">Masuk ke akun admin Anda.</p>
            </div>

            {{-- Alerts --}}
            <x-auth-session-status class="mb-4" :status="session('status')" />

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

            {{-- Form card --}}
            <div class="bg-white rounded-2xl border border-msp-border shadow-[0_4px_24px_rgba(11,33,69,0.06)] p-8">
                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="email" class="block font-hanken font-semibold text-[13px] text-msp-navy mb-1.5">
                            Alamat Email
                        </label>
                        <div class="relative">
                            <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-msp-gray-light text-[13px]">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <input id="email" type="email" name="email" value="{{ old('email') }}"
                                   required autofocus autocomplete="username"
                                   class="block w-full h-[46px] pl-10 pr-4 rounded-xl border border-msp-border bg-msp-bg font-inter text-[14px] text-msp-navy placeholder-msp-gray/40 focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20 focus:outline-none transition-colors"
                                   placeholder="admin@perusahaan.co.id">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block font-hanken font-semibold text-[13px] text-msp-navy mb-1.5">
                            Kata Sandi
                        </label>
                        <div class="relative" x-data="{ show: false }">
                            <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-msp-gray-light text-[13px]">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input id="password" :type="show ? 'text' : 'password'" name="password"
                                   required autocomplete="current-password"
                                   class="block w-full h-[46px] pl-10 pr-10 rounded-xl border border-msp-border bg-msp-bg font-inter text-[14px] text-msp-navy placeholder-msp-gray/40 focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20 focus:outline-none transition-colors"
                                   placeholder="Kata sandi Anda">
                            <button type="button" @click="show = !show"
                                    class="absolute right-3.5 top-1/2 -translate-y-1/2 text-msp-gray-light hover:text-msp-navy transition text-[13px]"
                                    aria-label="Tampilkan atau sembunyikan kata sandi">
                                <i x-show="!show" class="fas fa-eye"></i>
                                <i x-show="show" class="fas fa-eye-slash" x-cloak></i>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="flex items-center gap-2 cursor-pointer">
                            <input id="remember_me" type="checkbox" name="remember"
                                   class="w-4 h-4 rounded border-msp-border text-msp-gold focus:ring-msp-gold/20 focus:ring-2 focus:ring-offset-0">
                            <span class="font-inter text-[13px] text-msp-gray">Ingat saya</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                               class="font-inter text-[13px] text-msp-blue hover:text-msp-navy transition">
                                Lupa password?
                            </a>
                        @endif
                    </div>

                    <button type="submit"
                            class="w-full h-[48px] rounded-xl font-hanken font-bold text-[15px] text-[#071B3B] hover:brightness-105 focus:outline-none focus:ring-2 focus:ring-msp-gold/40 transition-all duration-200 shadow-[0_4px_14px_rgba(242,167,27,0.25)]"
                            style="background: linear-gradient(135deg, #F2A71B 0%, #FBC34C 100%)">
                        <i class="fas fa-sign-in-alt mr-2 text-[13px]"></i>
                        Masuk ke Panel Admin
                    </button>
                </form>
            </div>

            {{-- Footer --}}
            <p class="mt-6 text-center font-inter text-[12px] text-msp-gray-light">
                PT Mentari Satya Perkasa &bull; Panel Administrasi Internal
            </p>
        </div>
    </div>

    @vite(['resources/js/app.js'])
    <script>
        // Alpine.js x-cloak cleanup (in case Alpine loads late)
        document.addEventListener('alpine:init', () => {});
    </script>
</body>
</html>
