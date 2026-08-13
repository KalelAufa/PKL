<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'PT MSP') }} — Admin</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@600;700&family=Hanken+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet" media="print" onload="this.media='all'" />
    <noscript><link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@600;700&family=Hanken+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet" /></noscript>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" media="print" onload="this.media='all'" />
    <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TCTnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" /></noscript>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>[x-cloak] { display: none !important; }</style>
</head>
<body class="font-inter antialiased min-h-screen flex">

    {{-- Left panel: brand (identical to admin/login) --}}
    <div class="hidden lg:flex lg:w-[480px] flex-col justify-between relative overflow-hidden"
         style="background: var(--gradient-sidebar)">



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
            {{ $slot }}
        </div>

    </div>

</body>
</html>
