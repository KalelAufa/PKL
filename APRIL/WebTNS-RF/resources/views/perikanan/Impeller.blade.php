@extends('layouts.app')

@section('title', 'Impeller - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Impeller</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-type-display">Impeller</div>
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/impeller.png') }}" alt="Impeller" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Impeller adalah komponen utama pada pompa atau aerator yang berfungsi untuk menggerakkan air atau udara dengan efisien. Desain impeller memungkinkan aliran fluida yang optimal sehingga meningkatkan kinerja alat.</p>
                    <p>Impeller tersedia dalam berbagai ukuran dan material, tahan terhadap korosi serta cocok digunakan pada aplikasi perikanan, industri, maupun pertanian.</p>
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
                <h3 class="feature-title">Sirkulasi Optimal</h3>
                <p class="feature-description">Meningkatkan aliran pendingin agar mesin tetap stabil</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-water"></i>
                </div>
                <h3 class="feature-title">Aliran Lancar</h3>
                <p class="feature-description">Dirancang untuk memastikan aliran air yang lancar dan stabil.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-cogs"></i>
                </div>
                <h3 class="feature-title">Presisi Tinggi</h3>
                <p class="feature-description">Diproduksi dengan detail presisi untuk performa terbaik.</p>
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
