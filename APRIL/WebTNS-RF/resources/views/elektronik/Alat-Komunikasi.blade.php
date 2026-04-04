@extends('layouts.app')

@section('title', 'Alat Komunikasi - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Alat Komunikasi</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/telefono.png') }}" alt="Alat Komunikasi" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Alat komunikasi digunakan untuk menyampaikan informasi secara efektif antara individu atau kelompok dalam berbagai situasi kerja.</p>
                    <p>Dengan teknologi terkini, kami menyediakan solusi komunikasi yang andal untuk mendukung operasional bisnis Anda.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Category</div>
                            <div class="spec-value">Communication Devices</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Product Example</div>
                            <div class="spec-value">Office Phone</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Range</div>
                            <div class="spec-value">Up to 5 km (depending on device)</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Power Source</div>
                            <div class="spec-value">Battery or Electricity</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Features</div>
                            <div class="spec-value">Clear Audio, Noise Cancellation, Hands-Free Option</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-broadcast-tower"></i>
                </div>
                <h3 class="feature-title">Konektivitas Andal</h3>
                <p class="feature-description">Jaringan komunikasi yang stabil dan jangkauan luas</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-volume-up"></i>
                </div>
                <h3 class="feature-title">Kualitas Audio</h3>
                <p class="feature-description">Suara jernih dengan teknologi noise reduction</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-battery-full"></i>
                </div>
                <h3 class="feature-title">Daya Tahan</h3>
                <p class="feature-description">Baterai tahan lama untuk penggunaan intensif</p>
            </div>
        </div>
        
        <div class="buttons-container">
            <a href="{{ route('katalog.index', ['kategoriSlug' => 'alat-elektronik']) }}" class="action-button back-button">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('home') }}" class="action-button home-button">
                <i class="fas fa-home"></i> Beranda
            </a>
        </div>
    </div>
@endsection
