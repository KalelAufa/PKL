@extends('layouts.app')

@section('title', 'Cat Exterior - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Cat Exterior</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/exterior.png') }}" alt="Cat Exterior" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Cat khusus luar ruangan dengan ketahanan tinggi terhadap cuaca ekstrem, sinar UV, dan jamur.</p>
                    <p>Diformulasikan khusus untuk memberikan perlindungan maksimal pada dinding eksterior bangunan Anda.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Type</div>
                            <div class="spec-value">Weatherproof Acrylic</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Coverage</div>
                            <div class="spec-value">8 - 10 m²/liter</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Drying Time</div>
                            <div class="spec-value">2 - 3 hours</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Weather Resistance</div>
                            <div class="spec-value">5 - 7 years</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Features</div>
                            <div class="spec-value">Anti-fade, Anti-algae</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-sun"></i>
                </div>
                <h3 class="feature-title">Tahan Cuaca</h3>
                <p class="feature-description">Perlindungan optimal terhadap sinar UV dan perubahan cuaca ekstrem</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Anti Jamur</h3>
                <p class="feature-description">Formula khusus mencegah pertumbuhan jamur dan lumut</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-palette"></i>
                </div>
                <h3 class="feature-title">Warna Tahan Lama</h3>
                <p class="feature-description">Warna tetap cerah dan tidak pudar dalam jangka panjang</p>
            </div>
        </div>
        
        <div class="buttons-container">
            <a href="{{ route('katalog.index', ['kategoriSlug' => 'cat']) }}" class="action-button back-button">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('home') }}" class="action-button home-button">
                <i class="fas fa-home"></i> Beranda
            </a>
        </div>
    </div>
@endsection
