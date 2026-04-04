@extends('layouts.app')

@section('title', 'Portable Compressor - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Portable Compressor</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/portablecom.png') }}" alt="Portable Compressor" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Portable Compressor adalah alat yang menyediakan udara bertekanan tinggi untuk berbagai kebutuhan di lokasi proyek konstruksi.</p>
                    <p>Dengan desain yang mudah dipindahkan dan performa tinggi, alat ini sangat ideal untuk mengoperasikan berbagai peralatan pneumatik di lapangan.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Wind Flow</div>
                            <div class="spec-value">185 - 1600 cfm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Operating Pressure</div>
                            <div class="spec-value">100 - 200 psi</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Engine Power</div>
                            <div class="spec-value">74 - 150 HP</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Fuel Type</div>
                            <div class="spec-value">Diesel</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Weight</div>
                            <div class="spec-value">165 - 2000 kg</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Air Tank</div>
                            <div class="spec-value">150 - 500 liter</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-wind"></i>
                </div>
                <h3 class="feature-title">Output Tinggi</h3>
                <p class="feature-description">Kapasitas udara besar hingga 1600 cfm untuk kebutuhan proyek berat</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-truck-moving"></i>
                </div>
                <h3 class="feature-title">Mudah Dipindahkan</h3>
                <p class="feature-description">Desain portable dengan roda untuk mobilitas tinggi di lokasi proyek</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-cogs"></i>
                </div>
                <h3 class="feature-title">Daya Tahan Tinggi</h3>
                <p class="feature-description">Konstruksi kokoh dengan komponen berkualitas untuk penggunaan intensif</p>
            </div>
        </div>
        
        <div class="buttons-container">
            <a href="{{ route('katalog.index', ['kategoriSlug' => 'alat-konstruksi']) }}" class="action-button back-button">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('home') }}" class="action-button home-button">
                <i class="fas fa-home"></i> Beranda
            </a>
        </div>
    </div>
@endsection
