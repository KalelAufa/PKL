@extends('layouts.app')

@section('title', 'Bilge Pump - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Bilge Pump</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-type-display">Bilge Pump</div>
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/bilgepump.png') }}" alt="Bilge Pump" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Bilge pump adalah pompa yang digunakan untuk mengeluarkan air dari ruang lambung kapal (bilge). Pompa ini sangat penting untuk menjaga kapal tetap kering dan aman dari genangan air yang dapat membahayakan stabilitas kapal.</p>
                    <p>Bilge pump tersedia dalam berbagai tipe dan kapasitas, cocok untuk kapal kecil hingga besar. Mudah dipasang dan dioperasikan, serta tahan terhadap lingkungan laut yang korosif.</p>
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
                    <i class="fas fa-tint"></i>
                </div>
                <h3 class="feature-title">Pompa Efektif</h3>
                <p class="feature-description">Mampu membuang air dari ruang kapal dengan cepat</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-cogs"></i>
                </div>
                <h3 class="feature-title">Kinerja Handal</h3>
                <p class="feature-description">Mesin tahan lama dengan performa stabil</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-plug"></i>
                </div>
                <h3 class="feature-title">Mudah Dipasang</h3>
                <p class="feature-description">Instalasi praktis dengan sistem kelistrikan kapal</p>
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
