@extends('layouts.app')

@section('title', 'Lampu Sirene Perahu - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Lampu Sirene Perahu</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-type-display">Lampu Sirene Perahu</div>
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/lampusirene.png') }}" alt="Lampu Sirene" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Lampu sirene perahu adalah perangkat penerangan dan peringatan yang digunakan pada kapal untuk memberikan sinyal visual dan suara dalam situasi darurat atau saat membutuhkan perhatian khusus di perairan.</p>
                    <p>Lampu sirene perahu tersedia dalam berbagai warna dan tingkat intensitas, dirancang tahan terhadap cuaca dan lingkungan laut. Cocok digunakan pada kapal patroli, kapal nelayan, maupun kapal transportasi untuk meningkatkan keselamatan dan komunikasi.</p>
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
                    <i class="fas fa-bullhorn"></i>
                </div>
                <h3 class="feature-title">Sirene Keras</h3>
                <p class="feature-description">Menyediakan peringatan darurat dengan suara nyaring</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h3 class="feature-title">Lampu Terang</h3>
                <p class="feature-description">Menghasilkan cahaya kuat untuk kondisi malam</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Keselamatan Terjamin</h3>
                <p class="feature-description">Meningkatkan keamanan kapal saat di laut</p>
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
