@extends('layouts.app')

@section('title', 'Propeller - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Propeller</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-type-display">Propeller</div>
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/propeller.png') }}" alt="Propeller" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Propeller adalah baling-baling kapal yang berfungsi untuk menghasilkan daya dorong sehingga kapal dapat bergerak maju atau mundur di air. Komponen ini sangat penting dalam sistem penggerak kapal.</p>
                    <p>Propeller tersedia dalam berbagai desain dan material, dirancang untuk memberikan efisiensi maksimal serta tahan terhadap korosi di lingkungan laut. Cocok digunakan pada berbagai tipe kapal, baik kapal kecil maupun kapal besar.</p>
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
                    <i class="fas fa-fan"></i>
                </div>
                <h3 class="feature-title">Daya Dorong Kuat</h3>
                <p class="feature-description">Memberikan tenaga optimal untuk pergerakan kapal</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-water"></i>
                </div>
                <h3 class="feature-title">Desain Hidrodinamis</h3>
                <p class="feature-description">Mengurangi hambatan air untuk efisiensi tinggi</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-tools"></i>
                </div>
                <h3 class="feature-title">Material Kokoh</h3>
                <p class="feature-description">Terbuat dari bahan tahan karat dan tahan lama</p>
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
