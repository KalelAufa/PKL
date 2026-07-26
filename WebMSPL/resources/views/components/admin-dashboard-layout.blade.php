<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') — PT MSP Admin</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&family=Hanken+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css'])
    @stack('styles')
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="font-inter antialiased bg-msp-bg" x-data="{ sidebarOpen: false }">

@php
    $unreadCount = \App\Models\ContactMessage::where('is_read', false)->count();
    $companyLogo = \App\Models\PageContent::where('page', 'company')->where('key', 'company_logo')->value('value');
    $logoSrc = $companyLogo ? asset('images/' . $companyLogo) : asset('images/logo.png');
@endphp

<div class="flex h-screen overflow-hidden">

    {{-- Backdrop for mobile --}}
    <div x-show="sidebarOpen" x-cloak x-transition.opacity
         @click="sidebarOpen = false"
         class="fixed inset-0 z-30 bg-black/60 lg:hidden"></div>

    {{-- ================================================================
         SIDEBAR
    ================================================================ --}}
    <aside class="w-[264px] min-w-[264px] h-screen flex flex-col fixed lg:static inset-y-0 left-0 z-40 transition-transform duration-300 -translate-x-full lg:translate-x-0"
           :class="{ 'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen }"
           style="background: linear-gradient(180deg, #0B2145 0%, #0B1E3E 100%);">

        {{-- Brand header --}}
        <div class="px-4 pt-6 pb-5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-white/8 flex items-center justify-center shrink-0 border border-white/10">
                    <img src="{{ $logoSrc }}" alt="PT MSP" class="w-7 h-7 object-contain">
                </div>
                <div>
                    <div class="font-space font-bold text-[17px] text-white leading-tight">PT MSP</div>
                    <div class="font-hanken text-[10px] text-[#5A6E8C] uppercase tracking-[0.15em] mt-0.5">Admin Panel</div>
                </div>
            </div>
        </div>

        {{-- Divider --}}
        <div class="mx-4 h-px bg-white/5 mb-2"></div>

        {{-- Navigation --}}
        <nav class="flex-1 overflow-y-auto px-3 pb-4">

            {{-- Main section --}}
            <div class="px-2 pt-3 pb-1.5">
                <span class="font-hanken font-semibold text-[9.5px] text-[#4B5E7A] uppercase tracking-[0.15em]">Utama</span>
            </div>
            <div class="space-y-0.5">
                <x-admin-dashboard-nav-item
                    :href="route('admin.dashboard')"
                    :active="request()->routeIs('admin.dashboard')"
                    label="Dashboard" icon="dashboard" />
                <x-admin-dashboard-nav-item
                    :href="route('admin.messages.index')"
                    :active="request()->routeIs('admin.messages.*')"
                    label="Pesan Masuk" icon="pesan"
                    :badge="$unreadCount" />
            </div>

            {{-- Content section --}}
            <div class="px-2 pt-4 pb-1.5">
                <span class="font-hanken font-semibold text-[9.5px] text-[#4B5E7A] uppercase tracking-[0.15em]">Konten</span>
            </div>
            <div class="space-y-0.5">
                <x-admin-dashboard-nav-item
                    :href="route('admin.news.index')"
                    :active="request()->routeIs('admin.news.*')"
                    label="Berita" icon="berita" />
                <x-admin-dashboard-nav-item
                    :href="route('admin.categories.index')"
                    :active="request()->routeIs('admin.categories.*')"
                    label="Kategori" icon="kategori" />
                <x-admin-dashboard-nav-item
                    :href="route('admin.services.index')"
                    :active="request()->routeIs('admin.services.*')"
                    label="Layanan" icon="layanan" />
                <x-admin-dashboard-nav-item
                    :href="route('admin.page-content.index')"
                    :active="request()->routeIs('admin.page-content.*')"
                    label="Konten Halaman" icon="konten" />
            </div>

            {{-- Company section --}}
            <div class="px-2 pt-4 pb-1.5">
                <span class="font-hanken font-semibold text-[9.5px] text-[#4B5E7A] uppercase tracking-[0.15em]">Perusahaan</span>
            </div>
            <div class="space-y-0.5">
                <x-admin-dashboard-nav-item
                    :href="route('admin.team-members.index')"
                    :active="request()->routeIs('admin.team-members.*')"
                    label="Anggota Tim" icon="tim" />
                <x-admin-dashboard-nav-item
                    :href="route('admin.milestones.index')"
                    :active="request()->routeIs('admin.milestones.*')"
                    label="Pencapaian" icon="pencapaian" />
            </div>

            {{-- Settings section --}}
            <div class="px-2 pt-4 pb-1.5">
                <span class="font-hanken font-semibold text-[9.5px] text-[#4B5E7A] uppercase tracking-[0.15em]">Sistem</span>
            </div>
            <div class="space-y-0.5">
                <x-admin-dashboard-nav-item
                    :href="route('admin.users.index')"
                    :active="request()->routeIs('admin.users.*')"
                    label="Admin User" icon="admin" />
                <x-admin-dashboard-nav-item
                    :href="route('admin.company-settings.index')"
                    :active="request()->routeIs('admin.company-settings.*')"
                    label="Pengaturan" icon="pengaturan" />
                <x-admin-dashboard-nav-item
                    href="{{ url('/') }}"
                    label="Lihat Website" icon="tentang" target="_blank" />
            </div>
        </nav>

        {{-- Sidebar footer --}}
        <div class="px-4 py-3.5 border-t border-white/5 bg-black/10">
            <div class="flex items-center gap-2.5">
                <div class="w-7 h-7 rounded-full bg-msp-gold/20 flex items-center justify-center shrink-0">
                    <i class="fas fa-user-circle text-msp-gold text-[13px]"></i>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="font-hanken font-semibold text-[12px] text-white/80 truncate">{{ Auth::user()->name }}</div>
                    <div class="font-hanken text-[10px] text-[#4B5E7A] truncate">{{ Auth::user()->role === 'admin' ? 'Superadmin' : 'Editor' }}</div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" title="Keluar"
                            class="w-7 h-7 flex items-center justify-center text-[#4B5E7A] hover:text-red-400 transition rounded-lg hover:bg-red-500/10">
                        <i class="fas fa-sign-out-alt text-[12px]"></i>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    {{-- ================================================================
         MAIN CONTENT AREA
    ================================================================ --}}
    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">

        {{-- Top header bar --}}
        <header class="h-[60px] bg-white border-b border-msp-border flex items-center justify-between px-4 lg:px-7 shrink-0 shadow-[0_1px_0_rgba(11,30,62,0.06)]">

            {{-- Left: hamburger + breadcrumb --}}
            <div class="flex items-center gap-3 min-w-0">
                {{-- Mobile hamburger --}}
                <button @click="sidebarOpen = !sidebarOpen"
                        class="lg:hidden w-8 h-8 flex items-center justify-center text-msp-gray-light hover:text-msp-navy rounded-lg hover:bg-msp-bg-alt transition"
                        :aria-label="sidebarOpen ? 'Tutup sidebar' : 'Buka sidebar'">
                    <i class="fas fa-bars text-base"></i>
                </button>

                {{-- Breadcrumb --}}
                <nav class="hidden sm:flex items-center gap-1.5 text-[13px] font-inter" aria-label="Breadcrumb">
                    <a href="{{ route('admin.dashboard') }}" class="text-msp-gray-light hover:text-msp-navy transition">
                        <i class="fas fa-home text-[12px]"></i>
                    </a>
                    @hasSection('breadcrumb')
                        <span class="text-msp-border"><i class="fas fa-chevron-right text-[10px]"></i></span>
                        @yield('breadcrumb')
                    @else
                        <span class="text-msp-border"><i class="fas fa-chevron-right text-[10px]"></i></span>
                        <span class="text-msp-navy font-medium">@yield('title', 'Dashboard')</span>
                    @endif
                </nav>
            </div>

            {{-- Right: notifications + user --}}
            <div class="flex items-center gap-3">

                {{-- Notification bell --}}
                <a href="{{ route('admin.messages.index', ['filter' => 'unread']) }}"
                   class="relative w-9 h-9 flex items-center justify-center text-msp-gray-light hover:text-msp-navy rounded-lg hover:bg-msp-bg-alt transition"
                   title="Pesan belum dibaca">
                    <i class="fas fa-bell text-base"></i>
                    @if($unreadCount > 0)
                        <span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-msp-gold border border-white"></span>
                    @endif
                </a>

                {{-- Divider --}}
                <div class="w-px h-6 bg-msp-border"></div>

                {{-- User block --}}
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-full bg-msp-sidebar flex items-center justify-center text-white text-[13px] font-semibold shrink-0 shadow-sm">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div class="hidden md:block">
                        <div class="font-hanken font-semibold text-[13px] text-[#191C1E] leading-tight">{{ Auth::user()->name }}</div>
                        <div class="font-hanken text-[11px] text-msp-gray-light leading-tight">
                            {{ Auth::user()->role === 'admin' ? 'Superadmin' : 'Editor' }}
                        </div>
                    </div>
                </div>
            </div>
        </header>

        {{-- Page content --}}
        <main class="flex-1 overflow-y-auto p-6 lg:p-8">
            {{ $slot }}
        </main>
    </div>
</div>

@vite(['resources/js/app.js'])
@stack('scripts')
</body>
</html>
