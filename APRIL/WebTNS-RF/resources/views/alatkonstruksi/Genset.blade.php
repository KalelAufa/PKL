@extends('layouts.app')

@section('title', 'Genset - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Genset</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/genset.png') }}" alt="Genset" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Genset digunakan sebagai sumber daya listrik di lokasi proyek saat listrik utama tidak tersedia.</p>
                    <p>Dengan berbagai kapasitas yang tersedia, genset kami memberikan solusi daya yang andal untuk berbagai kebutuhan konstruksi.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Output Power</div>
                            <div class="spec-value">15 - 3750 kVA</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Fuel Type</div>
                            <div class="spec-value">Diesel</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Voltage</div>
                            <div class="spec-value">380 - 415 V</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Phase</div>
                            <div class="spec-value">3 Phase</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Frequency</div>
                            <div class="spec-value">50 / 60 Hz</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3 class="feature-title">Daya Besar</h3>
                <p class="feature-description">Menyediakan daya listrik yang stabil untuk berbagai peralatan proyek</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-gas-pump"></i>
                </div>
                <h3 class="feature-title">Efisiensi Bahan Bakar</h3>
                <p class="feature-description">Konsumsi bahan bakar yang efisien untuk pengoperasian ekonomis</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Keandalan Tinggi</h3>
                <p class="feature-description">Desain kokoh untuk operasional terus-menerus di lokasi proyek</p>
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
