@extends('layouts.app')

@section('title', 'Obeng Plus - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Obeng Plus</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-type-display">Obeng Plus</div>
        
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/obengplus.png') }}" alt="Obeng Plus" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Obeng adalah alat penting dalam pekerjaan mekanik dan rumah tangga untuk mengencangkan atau melepas sekrup. Obeng Plus (Phillips) dirancang khusus untuk sekrup dengan kepala berbentuk plus (+).</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Type</div>
                            <div class="spec-value">Phillips Screwdriver</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Length</div>
                            <div class="spec-value">150 mm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Material</div>
                            <div class="spec-value">Chromium Steel</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-screwdriver"></i>
                </div>
                <h3 class="feature-title">Presisi Tinggi</h3>
                <p class="feature-description">Ujung obeng yang presisi untuk cengkeraman sempurna pada sekrup</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Material Kuat</h3>
                <p class="feature-description">Terbuat dari baja chromium yang tahan lama</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-hand-paper"></i>
                </div>
                <h3 class="feature-title">Genggaman Nyaman</h3>
                <p class="feature-description">Gagang ergonomis untuk kenyamanan penggunaan jangka panjang</p>
            </div>
        </div>
        
        <div class="buttons-container">
            <a href="{{ route('katalog.index', ['kategoriSlug' => 'perkakas']) }}" class="action-button back-button">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('home') }}" class="action-button home-button">
                <i class="fas fa-home"></i> Beranda
            </a>
        </div>
    </div>
@endsection
