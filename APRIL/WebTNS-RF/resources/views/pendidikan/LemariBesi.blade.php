@extends('layouts.app')

@section('title', 'Lemari Besi - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Lemari Besi</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-type-display">Lemari Besi</div>
        
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/lemaribesi.png') }}" alt="Lemari Besi" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Produk ini dirancang untuk mendukung kegiatan pendidikan dan pembelajaran di sekolah atau lembaga pendidikan lainnya.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Material</div>
                            <div class="spec-value">High-quality solid steel</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Dimensions (cm)</div>
                            <div class="spec-value">183x90x45</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Shelves</div>
                            <div class="spec-value">Adjustable shelves for versatile storage.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Keamanan Tinggi</h3>
                <p class="feature-description">Dibuat dengan material kuat untuk perlindungan optimal</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-box-open"></i>
                </div>
                <h3 class="feature-title">Kapasitas Besar</h3>
                <p class="feature-description">Ruang penyimpanan yang luas untuk berbagai kebutuhan</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <h3 class="feature-title">Daya Tahan</h3>
                <p class="feature-description">Konstruksi kokoh untuk penggunaan jangka panjang</p>
            </div>
        </div>
        
        
         <div class="buttons-container">
            <a href="{{ route('katalog.index', ['kategoriSlug' => 'pendidikan']) }}" class="action-button back-button">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('home') }}" class="action-button home-button">
                <i class="fas fa-home"></i> Beranda
            </a>
    </div>
    </div>
@endsection
