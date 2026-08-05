<x-guest-layout>

    <div class="bg-white rounded-2xl border border-msp-border shadow-[0_4px_24px_rgba(11,30,62,0.08)] p-8">

        {{-- Header --}}
        <div class="mb-7">
            <h2 class="font-space font-bold text-[24px] text-[#191C1E] leading-tight">Masuk ke Admin</h2>
            <p class="font-inter text-[14px] text-msp-gray mt-1">Gunakan akun administrator untuk melanjutkan.</p>
        </div>

        {{-- Session Status --}}
        @if (session('status'))
            <div class="mb-5 px-4 py-3 bg-green-50 border border-green-200 rounded-xl flex items-center gap-2.5">
                <i class="fas fa-check-circle text-green-500 text-[14px] shrink-0"></i>
                <p class="font-inter text-[13px] text-green-700">{{ session('status') }}</p>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            {{-- Email --}}
            <div>
                <label for="email" class="block text-[11px] font-bold text-msp-gray uppercase tracking-wider mb-2">
                    <i class="fas fa-envelope mr-1.5 text-msp-gray-light"></i>Email
                </label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                       required autofocus autocomplete="username"
                       placeholder="nama@domain.com"
                       class="w-full h-11 px-4 bg-msp-bg border rounded-xl text-[14px] text-[#191C1E] focus:outline-none transition
                              {{ $errors->get('email') ? 'border-red-400 focus:border-red-400 focus:ring-2 focus:ring-red-400/20' : 'border-msp-border focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20' }}">
                @error('email')
                    <p class="mt-1.5 text-[12px] text-red-500 flex items-center gap-1">
                        <i class="fas fa-exclamation-circle text-[11px]"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Password --}}
            <div>
                <div class="flex items-center justify-between mb-2">
                    <label for="password" class="block text-[11px] font-bold text-msp-gray uppercase tracking-wider">
                        <i class="fas fa-lock mr-1.5 text-msp-gray-light"></i>Password
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                           class="font-inter text-[12px] text-msp-gold hover:text-msp-navy transition">
                            Lupa password?
                        </a>
                    @endif
                </div>
                <input id="password" type="password" name="password"
                       required autocomplete="current-password"
                       placeholder="••••••••"
                       class="w-full h-11 px-4 bg-msp-bg border rounded-xl text-[14px] text-[#191C1E] focus:outline-none transition
                              {{ $errors->get('password') ? 'border-red-400 focus:border-red-400 focus:ring-2 focus:ring-red-400/20' : 'border-msp-border focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20' }}">
                @error('password')
                    <p class="mt-1.5 text-[12px] text-red-500 flex items-center gap-1">
                        <i class="fas fa-exclamation-circle text-[11px]"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Remember me --}}
            <div class="flex items-center gap-2.5">
                <input id="remember_me" type="checkbox" name="remember"
                       class="w-4 h-4 rounded border-msp-border text-msp-gold focus:ring-msp-gold/30 cursor-pointer">
                <label for="remember_me" class="font-inter text-[13px] text-msp-gray cursor-pointer select-none">
                    Ingat saya
                </label>
            </div>

            {{-- Submit --}}
            <button type="submit"
                    class="w-full h-11 rounded-xl font-hanken font-bold text-[15px] text-[#071B3B] flex items-center justify-center gap-2 hover:brightness-95 transition shadow-[0_2px_12px_rgba(242,167,27,0.3)]"
                    style="background: linear-gradient(135deg, #F2A71B 0%, #FBC34C 100%)">
                <i class="fas fa-sign-in-alt text-[13px]"></i>
                Masuk
            </button>
        </form>
    </div>

</x-guest-layout>
