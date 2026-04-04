@extends('layouts.app')

@section('title', 'Proyektor - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Proyektor</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/alatkantor/proyektor.png') }}" alt="Proyektor" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Proyektor digunakan untuk menampilkan gambar atau presentasi di layar besar, cocok untuk rapat dan seminar.</p>
                    <p>Dengan resolusi Full HD 1080p dan brightness 3500 lumens, memberikan tampilan yang jernih bahkan di ruangan terang.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi Teknis</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Resolution</div>
                            <div class="spec-value">1080p Full HD</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Brightness</div>
                            <div class="spec-value">3500 Lumens</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Port</div>
                            <div class="spec-value">HDMI, VGA, USB</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Features</div>
                            <div class="spec-value">Koreksi Keystone, Speaker Built-in</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-tv"></i>
                </div>
                <h3 class="feature-title">Resolusi Tinggi</h3>
                <p class="feature-description">Tampilan Full HD 1080p untuk kualitas gambar terbaik</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-sun"></i>
                </div>
                <h3 class="feature-title">Cahaya Terang</h3>
                <p class="feature-description">3500 lumens untuk tampilan jelas di ruangan terang</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-plug"></i>
                </div>
                <h3 class="feature-title">Konektivitas Lengkap</h3>
                <p class="feature-description">Dukungan HDMI, VGA, dan USB untuk berbagai perangkat</p>
            </div>
        </div>
        
        <div class="buttons-container">
            <a href="{{ route('katalog.index', ['kategoriSlug' => 'alat-kantor']) }}" class="action-button back-button">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('home') }}" class="action-button home-button">
                <i class="fas fa-home"></i> Beranda
            </a>
        </div>
    </div>
@endsection
