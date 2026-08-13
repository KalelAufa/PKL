@props(['href', 'active' => false, 'label', 'icon', 'target' => '_self', 'badge' => null])

@php
$icons = [
    'dashboard'  => 'fas fa-th-large',
    'berita'     => 'fas fa-newspaper',
    'layanan'    => 'fas fa-briefcase',
    'konten'     => 'fas fa-layer-group',
    'admin'      => 'fas fa-user-shield',
    'kategori'   => 'fas fa-tag',
    'pesan'      => 'fas fa-inbox',
    'tentang'    => 'fas fa-globe',
    'tim'        => 'fas fa-users',
    'pencapaian'   => 'fas fa-award',
    'pengaturan'   => 'fas fa-cog',
];
$iconClass = $icons[$icon] ?? 'fas fa-circle';
@endphp

<a href="{{ $href }}" target="{{ $target }}"
   @if($target === '_blank') rel="noopener noreferrer" @endif
   class="group relative flex items-center gap-3 px-3 py-2 rounded-xl text-[13.5px] font-hanken font-medium transition duration-150
    {{ $active
        ? 'text-white'
        : 'text-[#6B7FA3] hover:text-white hover:bg-white/6' }}">

    {{-- Active background --}}
    @if($active)
        <span class="absolute inset-0 rounded-xl bg-gradient-to-r from-msp-gold/20 to-msp-gold/5 border-l-[3px] border-msp-gold"></span>
    @endif

    {{-- Icon box --}}
    <span class="relative w-[30px] h-[30px] rounded-lg flex items-center justify-center shrink-0 text-[12px] transition duration-150
        {{ $active
            ? 'bg-msp-gold/25 text-msp-gold shadow-[0_0_0_1px_rgba(242,167,27,0.3)]'
            : 'bg-white/5 text-[#6B7FA3] group-hover:bg-white/10 group-hover:text-white/90' }}">
        <i class="{{ $iconClass }}"></i>
    </span>

    <span class="relative flex-1 leading-none tracking-[0.01em]">{{ $label }}</span>

    @if($badge && $badge > 0)
        <span class="relative ml-auto min-w-[19px] h-[19px] px-1 rounded-full bg-msp-gold text-[#071B3B] text-[10px] font-bold flex items-center justify-center leading-none shadow-sm">
            {{ $badge > 99 ? '99+' : $badge }}
        </span>
    @elseif($target === '_blank')
        <span class="relative ml-auto text-[#6B7FA3]/50 text-[10px] group-hover:text-[#6B7FA3]">
            <i class="fas fa-external-link-alt"></i>
        </span>
    @endif
</a>
