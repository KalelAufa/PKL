@extends('layouts.app')

@section('title', 'Cat Waterproofing - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Cat Waterproofing</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/water.png') }}" alt="Cat Waterproofing" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Cat pelapis anti-bocor berbahan dasar elastomerik yang mampu menahan tekanan air pada permukaan horizontal maupun vertikal.</p>
                    <p>Solusi ideal untuk atap, teras, kamar mandi, dan area basah lainnya yang membutuhkan perlindungan maksimal terhadap rembesan air.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Type</div>
                            <div class="spec-value">Elastomeric Emulsion</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Coverage</div>
                            <div class="spec-value">1 - 2 m²/kg</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Elasticity</div>
                            <div class="spec-value">≥ 300%</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">thickness</div>
                            <div class="spec-value">0.5 - 1 mm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Features</div>
                            <div class="spec-value">UV Resistant, Water Resistant</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-umbrella"></i>
                </div>
                <h3 class="feature-title">Anti Bocor</h3>
                <p class="feature-description">Perlindungan maksimal terhadap rembesan air</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-expand"></i>
                </div>
                <h3 class="feature-title">Elastis</h3>
                <p class="feature-description">Dapat mengikuti pergerakan struktur bangunan</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-sun"></i>
                </div>
                <h3 class="feature-title">Tahan Cuaca</h3>
                <p class="feature-description">Tahan terhadap sinar UV dan perubahan suhu</p>
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
