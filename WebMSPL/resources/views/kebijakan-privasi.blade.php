@extends('layouts.app')

@section('title', 'Kebijakan Privasi - PT Mentari Satya Perkasa')

@push('meta')
<meta name="description" content="Kebijakan Privasi PT Mentari Satya Perkasa — informasi tentang bagaimana kami mengumpulkan, menggunakan, dan melindungi data pribadi Anda.">
<link rel="canonical" href="{{ url('/kebijakan-privasi') }}">
@endpush

@section('content')
    <section class="mt-16 py-20 md:py-28">
        <div class="max-w-[800px] mx-auto px-6">
            <h1 class="font-space font-bold text-msp-dark text-3xl md:text-4xl leading-tight mb-8">Kebijakan Privasi</h1>

            <div class="prose text-msp-gray leading-7 flex flex-col gap-6">
                <p>PT Mentari Satya Perkasa ("MSP", "kami") berkomitmen untuk melindungi privasi pengguna yang mengakses situs web ini. Kebijakan Privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, dan menjaga informasi pribadi Anda.</p>

                <h2 class="font-space font-bold text-msp-dark text-xl mt-4">Informasi yang Kami Kumpulkan</h2>
                <p>Kami dapat mengumpulkan informasi yang Anda berikan secara langsung, seperti nama, alamat email, nomor telepon, dan nama perusahaan melalui formulir kontak di situs ini.</p>

                <h2 class="font-space font-bold text-msp-dark text-xl mt-4">Penggunaan Informasi</h2>
                <p>Informasi yang Anda berikan digunakan semata-mata untuk merespons pertanyaan dan permintaan layanan Anda. Kami tidak menjual, menyewakan, atau mendistribusikan data pribadi Anda kepada pihak ketiga tanpa izin Anda.</p>

                <h2 class="font-space font-bold text-msp-dark text-xl mt-4">Keamanan Data</h2>
                <p>Kami menerapkan langkah-langkah keamanan yang wajar untuk melindungi informasi pribadi Anda dari akses, pengungkapan, atau perubahan yang tidak sah.</p>

                <h2 class="font-space font-bold text-msp-dark text-xl mt-4">Hubungi Kami</h2>
                <p>Jika Anda memiliki pertanyaan terkait kebijakan privasi ini, silakan hubungi kami melalui <a href="{{ route('contact') }}" class="text-msp-blue underline">halaman kontak</a> atau email ke <a href="mailto:info@ptmsp.co.id" class="text-msp-blue underline">info@ptmsp.co.id</a>.</p>

                <p class="text-sm text-msp-gray-light mt-4">Terakhir diperbarui: Juli 2026</p>
            </div>
        </div>
    </section>
@endsection
