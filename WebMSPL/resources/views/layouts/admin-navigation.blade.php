<nav x-data="{ open: false }" class="bg-msp-navy border-b border-[rgba(255,255,255,0.1)]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('admin.dashboard') }}" class="font-space text-white text-lg font-bold">
                        PT MSP — Admin
                    </a>
                </div>
                <div class="hidden space-x-4 sm:-my-px sm:ms-6 sm:flex">
                    <a href="{{ route('admin.dashboard') }}"
                       class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-white hover:text-msp-gold focus:outline-none transition duration-150 ease-in-out @if(request()->routeIs('admin.dashboard')) border-b-2 border-msp-gold @endif">
                        Dashboard
                    </a>
                    <a href="{{ route('admin.news.index') }}"
                       class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-white hover:text-msp-gold focus:outline-none transition duration-150 ease-in-out @if(request()->routeIs('admin.news.*')) border-b-2 border-msp-gold @endif">
                        Berita
                    </a>
                    <a href="{{ route('admin.services.index') }}"
                       class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-white hover:text-msp-gold focus:outline-none transition duration-150 ease-in-out @if(request()->routeIs('admin.services.*')) border-b-2 border-msp-gold @endif">
                        Layanan
                    </a>
                    <a href="{{ route('admin.team-members.index') }}"
                       class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-white hover:text-msp-gold focus:outline-none transition duration-150 ease-in-out @if(request()->routeIs('admin.team-members.*')) border-b-2 border-msp-gold @endif">
                        Tim
                    </a>
                    <a href="{{ route('admin.messages.index') }}"
                       class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-white hover:text-msp-gold focus:outline-none transition duration-150 ease-in-out @if(request()->routeIs('admin.messages.*')) border-b-2 border-msp-gold @endif">
                        Pesan
                    </a>
                    <a href="{{ route('admin.page-content.edit', 'home') }}"
                       class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-white hover:text-msp-gold focus:outline-none transition duration-150 ease-in-out @if(request()->routeIs('admin.page-content.*')) border-b-2 border-msp-gold @endif">
                        Konten
                    </a>
                    <a href="{{ route('admin.company-settings.index') }}"
                       class="inline-flex items-center gap-1 px-1 pt-1 text-sm font-medium leading-5 text-white hover:text-msp-gold focus:outline-none transition duration-150 ease-in-out @if(request()->routeIs('admin.company-settings.*')) border-b-2 border-msp-gold text-msp-gold @endif">
                        <i class="fas fa-cog text-[11px]"></i> Pengaturan
                    </a>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white hover:text-msp-gold focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <a href="{{ url('/') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Lihat Website</a>
                        <x-dropdown-link :href="route('profile.edit')">Profile</x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-msp-gold hover:bg-[rgba(255,255,255,0.1)] focus:outline-none focus:bg-[rgba(255,255,255,0.1)] focus:text-msp-gold transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('admin.dashboard') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-white hover:text-msp-gold">Dashboard</a>
            <a href="{{ route('admin.news.index') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-white hover:text-msp-gold">Berita</a>
            <a href="{{ route('admin.services.index') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-white hover:text-msp-gold">Layanan</a>
            <a href="{{ route('admin.team-members.index') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-white hover:text-msp-gold">Tim</a>
            <a href="{{ route('admin.messages.index') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-white hover:text-msp-gold">Pesan</a>
            <a href="{{ route('admin.page-content.edit', 'home') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-white hover:text-msp-gold">Konten</a>
            <a href="{{ route('admin.company-settings.index') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-white hover:text-msp-gold">Pengaturan</a>
        </div>
        <div class="pt-4 pb-1 border-t border-[rgba(255,255,255,0.1)]">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-[rgba(255,255,255,0.6)]">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <a href="{{ url('/') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-white hover:text-msp-gold">Lihat Website</a>
                <a href="{{ route('profile.edit') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-white hover:text-msp-gold">Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="block pl-3 pr-4 py-2 text-base font-medium text-white hover:text-msp-gold">Log Out</a>
                </form>
            </div>
        </div>
    </div>
</nav>
