@extends('layouts.app')

@section('title', 'Cat Kapal Coating - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Cat Coating Kapal</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-type-display">Cat Coating Kapal</div>
        
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/catcoating.png') }}" alt="Cat Kapal Coating" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Cat kapal coating kami dirancang khusus untuk memberikan perlindungan maksimal terhadap korosi dan kondisi lingkungan laut yang ekstrim. Dengan formula khusus yang tahan terhadap air laut, sinar UV, dan perubahan suhu.</p>
                    <p>Produk ini sangat ideal untuk digunakan pada kapal, dok kapal, dan berbagai struktur maritim lainnya. Memberikan daya tahan tinggi dengan finishing yang halus dan tahan lama.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Type</div>
                            <div class="spec-value">-</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Base Material</div>
                            <div class="spec-value">-</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Durability</div>
                            <div class="spec-value">-</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Color</div>
                            <div class="spec-value">-</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Application Area</div>
                            <div class="spec-value">-</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Application Method</div>
                            <div class="spec-value">-</div>
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
                <h3 class="feature-title">Anti Korosi</h3>
                <p class="feature-description">Perlindungan optimal terhadap karat dan korosi akibat air laut</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-sun"></i>
                </div>
                <h3 class="feature-title">Tahan UV</h3>
                <p class="feature-description">Tidak mudah pudar meski terpapar sinar matahari terus menerus</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <h3 class="feature-title">Daya Tahan Lama</h3>
                <p class="feature-description">Masa pakai hingga 10 tahun dengan perawatan minimal</p>
            </div>
        </div>
        
        <div class="buttons-container">
            <a href="{{ route('katalog.index', ['kategoriSlug' => 'perikanan']) }}" class="action-button back-button">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('home') }}" class="action-button home-button">
                <i class="fas fa-home"></i> Beranda
            </a>
        </div>
    </div>
@endsection
