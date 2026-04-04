@extends('layouts.app')

@section('title', 'Paku & Baut - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Paku & Baut</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-type-display">Paku & Baut</div>
        
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/pakubaut.png') }}" alt="Paku & Baut" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Digunakan untuk menggabungkan dua material secara permanen dalam konstruksi, seperti sambungan kayu atau papan. Paku dan baut kami terbuat dari material berkualitas tinggi untuk kekuatan dan daya tahan optimal.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Type</div>
                            <div class="spec-value">Nails and Bolts</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Size</div>
                            <div class="spec-value">2 inches</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Material</div>
                            <div class="spec-value">Carbon Steel</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-hammer"></i>
                </div>
                <h3 class="feature-title">Kuat & Tahan Lama</h3>
                <p class="feature-description">Terbuat dari baja karbon berkualitas tinggi untuk kekuatan maksimal</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Anti Karat</h3>
                <p class="feature-description">Dilapisi material khusus untuk ketahanan terhadap korosi</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-tools"></i>
                </div>
                <h3 class="feature-title">Multi Fungsi</h3>
                <p class="feature-description">Cocok untuk berbagai kebutuhan konstruksi dan perbaikan</p>
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
