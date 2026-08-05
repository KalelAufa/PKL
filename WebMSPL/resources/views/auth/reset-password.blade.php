<x-guest-layout>

    <div class="bg-white rounded-2xl border border-msp-border shadow-[0_4px_24px_rgba(11,30,62,0.08)] p-8">

        {{-- Header --}}
        <div class="mb-7">
            <div class="w-12 h-12 rounded-2xl bg-green-50 flex items-center justify-center mb-5">
                <i class="fas fa-lock-open text-green-600 text-[18px]"></i>
            </div>
            <h2 class="font-space font-bold text-[24px] text-[#191C1E] leading-tight">Atur Ulang Password</h2>
            <p class="font-inter text-[14px] text-msp-gray mt-1.5">Buat password baru untuk akun Anda.</p>
        </div>

        <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            {{-- Email --}}
            <div>
                <label for="email" class="block text-[11px] font-bold text-msp-gray uppercase tracking-wider mb-2">
                    <i class="fas fa-envelope mr-1.5 text-msp-gray-light"></i>Email
                </label>
                <input id="email" type="email" name="email"
                       value="{{ old('email', $request->email) }}"
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
                <label for="password" class="block text-[11px] font-bold text-msp-gray uppercase tracking-wider mb-2">
                    <i class="fas fa-lock mr-1.5 text-msp-gray-light"></i>Password Baru
                </label>
                <input id="password" type="password" name="password"
                       required autocomplete="new-password"
                       placeholder="Min. 8 karakter"
                       class="w-full h-11 px-4 bg-msp-bg border rounded-xl text-[14px] text-[#191C1E] focus:outline-none transition
                              {{ $errors->get('password') ? 'border-red-400 focus:border-red-400 focus:ring-2 focus:ring-red-400/20' : 'border-msp-border focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20' }}">
                @error('password')
                    <p class="mt-1.5 text-[12px] text-red-500 flex items-center gap-1">
                        <i class="fas fa-exclamation-circle text-[11px]"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div>
                <label for="password_confirmation" class="block text-[11px] font-bold text-msp-gray uppercase tracking-wider mb-2">
                    <i class="fas fa-lock mr-1.5 text-msp-gray-light"></i>Konfirmasi Password
                </label>
                <input id="password_confirmation" type="password" name="password_confirmation"
                       required autocomplete="new-password"
                       placeholder="Ulangi password baru"
                       class="w-full h-11 px-4 bg-msp-bg border rounded-xl text-[14px] text-[#191C1E] focus:outline-none transition
                              {{ $errors->get('password_confirmation') ? 'border-red-400 focus:border-red-400 focus:ring-2 focus:ring-red-400/20' : 'border-msp-border focus:border-msp-gold focus:ring-2 focus:ring-msp-gold/20' }}">
                @error('password_confirmation')
                    <p class="mt-1.5 text-[12px] text-red-500 flex items-center gap-1">
                        <i class="fas fa-exclamation-circle text-[11px]"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Submit --}}
            <button type="submit"
                    class="w-full h-11 rounded-xl font-hanken font-bold text-[15px] text-[#071B3B] flex items-center justify-center gap-2 hover:brightness-95 transition shadow-[0_2px_12px_rgba(242,167,27,0.3)]"
                    style="background: linear-gradient(135deg, #F2A71B 0%, #FBC34C 100%)">
                <i class="fas fa-check text-[13px]"></i>
                Simpan Password Baru
            </button>
        </form>
    </div>

</x-guest-layout>
