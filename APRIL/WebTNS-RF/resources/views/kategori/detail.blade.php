@extends("layouts.app")

@section("title", $produk["title"] . " - Tricipta Niaga Sukses")

@section("styles")
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section("content")
<div class="section-title">
    <h2>{{ $produk["title"] }}</h2>
</div>

<div class="product-detail-container">
    <div class="product-content">
        <div class="product-image-container">
            <img src="{{ asset($produk['image']) }}" alt="{{ $produk['title'] }}" class="product-image">
        </div>

        <div class="product-details">
            <div class="product-description">
                <p>{{ $produk["description"] }}</p>
                <p>Silakan hubungi kami untuk informasi lebih lanjut mengenai produk ini.</p>
            </div>

            <div class="specs-container">
                <h3 class="specs-title">Spesifikasi</h3>
                <div class="specs-grid">
                    <div class="spec-item">
                        <div class="spec-label">Kategori</div>
                        <div class="spec-value">{{ $namaKategori }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="buttons-container">
        <a href="{{ route('katalog.index', ['kategoriSlug' => $kategoriSlug]) }}" class="action-button back-button">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        <a href="{{ route('home') }}" class="action-button home-button">
            <i class="fas fa-home"></i> Beranda
        </a>
    </div>
</div>
@endsection
