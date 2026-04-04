@extends('layouts.app')

@section('title', 'Rak - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Rak Penyimpanan</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/rak.png') }}" alt="Rak Penyimpanan" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Rak digunakan untuk menyimpan dokumen, buku, atau perlengkapan kantor secara terorganisir.</p>
                    <p>Dengan desain modular dan material berkualitas, rak kami memberikan solusi penyimpanan yang efisien untuk ruang kerja Anda.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Dimension (mm)</div>
                            <div class="spec-value">1500x500x1550</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Material</div>
                            <div class="spec-value">Stainless Steel Material 201</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Weight Capacity</div>
                            <div class="spec-value">Up to 100 kg per shelf</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Features</div>
                            <div class="spec-value">Adjustable legs, Flatpack Delivery</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-layer-group"></i>
                </div>
                <h3 class="feature-title">Modular</h3>
                <p class="feature-description">Desain modular untuk berbagai kebutuhan penyimpanan</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-weight-hanging"></i>
                </div>
                <h3 class="feature-title">Kuat</h3>
                <p class="feature-description">Kapasitas beban hingga 100 kg per rak</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-sliders-h"></i>
                </div>
                <h3 class="feature-title">Adjustable</h3>
                <p class="feature-description">Tinggi rak dapat disesuaikan</p>
            </div>
        </div>
        
        <div class="buttons-container">
            <a href="{{ route('katalog.index', ['kategoriSlug' => 'alat-kantor']) }}" class="action-button back-button">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('home') }}" class="action-button home-button">
                <i class="fas fa-home"></i> Beranda
            </a>
        </div>
    </div>
@endsection
