@section('title', 'Pengguna Admin')

<x-admin-dashboard-layout>
<div class="max-w-[800px]">

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="font-space font-bold text-[24px] text-[#191C1E] leading-tight">Pengguna Admin</h1>
            <p class="font-inter text-[14px] text-msp-gray mt-0.5">Kelola akses ke panel administrasi.</p>
        </div>
        <a href="{{ route('admin.users.create') }}"
           class="shrink-0 h-10 px-5 rounded-xl font-hanken font-bold text-[14px] text-[#071B3B] inline-flex items-center gap-2 hover:brightness-95 transition shadow-[0_2px_8px_rgba(242,167,27,0.2)]"
           style="background: linear-gradient(135deg, #F2A71B 0%, #FBC34C 100%)">
            <i class="fas fa-plus text-[11px]"></i>
            Tambah Pengguna
        </a>
    </div>

    @if (session('success'))
        <div class="mb-5 flex items-center gap-3 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-xl text-[13px] font-inter">
            <i class="fas fa-check-circle text-green-500"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl border border-msp-border overflow-hidden shadow-[0_1px_4px_rgba(11,30,62,0.04)]">
        <table class="w-full">
            <caption class="sr-only">Daftar pengguna admin</caption>
            <thead>
                <tr class="border-b border-msp-border bg-msp-bg/60">
                    <th scope="col" class="text-left font-hanken font-bold text-[11px] text-msp-gray-light uppercase tracking-wider px-5 py-3.5">Nama</th>
                    <th scope="col" class="text-left font-hanken font-bold text-[11px] text-msp-gray-light uppercase tracking-wider px-5 py-3.5 hidden md:table-cell">Email</th>
                    <th scope="col" class="text-left font-hanken font-bold text-[11px] text-msp-gray-light uppercase tracking-wider px-5 py-3.5">Role</th>
                    <th scope="col" class="text-left font-hanken font-bold text-[11px] text-msp-gray-light uppercase tracking-wider px-5 py-3.5 hidden lg:table-cell">Bergabung</th>
                    <th scope="col" class="text-right font-hanken font-bold text-[11px] text-msp-gray-light uppercase tracking-wider px-5 py-3.5 w-24">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr class="border-b border-msp-border hover:bg-msp-bg/50 transition">
                        <td class="px-5 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-msp-sidebar flex items-center justify-center text-white font-hanken font-semibold text-[14px] shrink-0 shadow-sm">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <div>
                                    <div class="font-inter font-semibold text-[14px] text-[#191C1E]">{{ $user->name }}</div>
                                    <div class="font-inter text-[12px] text-msp-gray-light md:hidden">{{ $user->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-5 py-4 font-inter text-[13px] text-msp-gray hidden md:table-cell">{{ $user->email }}</td>
                        <td class="px-5 py-4">
                            @if($user->role === 'admin')
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-inter font-bold bg-msp-sidebar/10 text-msp-sidebar border border-msp-sidebar/20">
                                    <i class="fas fa-shield-alt text-[8px]"></i> Superadmin
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-inter font-bold bg-msp-gold/10 text-[#8B5E00] border border-msp-gold/20">
                                    <i class="fas fa-pen text-[8px]"></i> Editor
                                </span>
                            @endif
                        </td>
                        <td class="px-5 py-4 font-inter text-[13px] text-msp-gray-light hidden lg:table-cell">
                            {{ $user->created_at->format('d M Y') }}
                        </td>
                        <td class="px-5 py-4 text-right">
                            <div class="flex items-center justify-end gap-1.5">
                                <a href="{{ route('admin.users.edit', $user) }}"
                                   class="w-8 h-8 rounded-lg bg-msp-bg-alt flex items-center justify-center text-msp-gray-light hover:text-msp-gold hover:bg-msp-gold/10 transition"
                                   title="Edit pengguna">
                                    <i class="fas fa-pen text-[11px]"></i>
                                </a>
                                <div class="relative" x-data="{ open: false }">
                                    <button @click="open = !open"
                                            class="w-8 h-8 rounded-lg bg-msp-bg-alt flex items-center justify-center text-msp-gray-light hover:text-msp-danger hover:bg-red-50 transition"
                                            title="Hapus pengguna">
                                        <i class="fas fa-trash text-[11px]"></i>
                                    </button>
                                    <div x-show="open" @click.away="open = false" x-cloak
                                         class="absolute right-0 top-full mt-2 w-44 bg-white rounded-xl shadow-lg border border-msp-border py-2 px-3 z-20">
                                        <p class="font-inter text-[12px] text-msp-gray mb-2.5">Hapus akun <strong>{{ $user->name }}</strong>?</p>
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="w-full h-8 rounded-lg bg-msp-danger text-white font-inter text-[12px] font-semibold hover:brightness-95 transition">
                                                Ya, Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-5 py-16 text-center">
                            <div class="w-16 h-16 rounded-2xl bg-msp-bg-alt flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-users-cog text-3xl text-msp-border"></i>
                            </div>
                            <p class="font-hanken font-semibold text-[15px] text-[#191C1E] mb-1">Belum ada pengguna</p>
                            <p class="font-inter text-[13px] text-msp-gray-light mb-4">Tambahkan pengguna yang dapat mengakses panel ini.</p>
                            <a href="{{ route('admin.users.create') }}"
                               class="inline-flex items-center gap-2 h-9 px-5 rounded-lg font-hanken font-bold text-[13px] text-[#071B3B]"
                               style="background: linear-gradient(135deg, #F2A71B 0%, #FBC34C 100%)">
                                <i class="fas fa-plus text-[10px]"></i> Tambah Pengguna Pertama
                            </a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <x-admin-pagination :paginator="$users" />
</div>
</x-admin-dashboard-layout>
