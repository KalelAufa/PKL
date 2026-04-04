@extends('layouts.app')

@section('title', 'Kunci Inggris - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Kunci Inggris</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-type-display">Kunci Inggris</div>
        
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/wrench.png') }}" alt="Kunci Inggris" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Kunci pas adalah alat mekanis yang digunakan untuk mengencangkan atau mengendurkan mur dan baut. Kunci pas merupakan alat penting untuk pekerjaan otomotif dan perpipaan.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Type</div>
                            <div class="spec-value">Adjustable</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Material</div>
                            <div class="spec-value">Chrome-vanadium steel</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Size</div>
                            <div class="spec-value">6 – 24 mm (or Imperial set)</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Features</div>
                            <div class="spec-value">Adjustable jaw, Ergonomic handle, Rust resistant</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-cogs"></i>
                </div>
                <h3 class="feature-title">Multi Ukuran</h3>
                <p class="feature-description">Dapat menyesuaikan dengan berbagai ukuran mur dan baut</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Material Kuat</h3>
                <p class="feature-description">Dibuat dari baja chrome-vanadium untuk ketahanan maksimal</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-hand-paper"></i>
                </div>
                <h3 class="feature-title">Nyaman Digunakan</h3>
                <p class="feature-description">Pegangan ergonomis untuk kenyamanan penggunaan jangka panjang</p>
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
