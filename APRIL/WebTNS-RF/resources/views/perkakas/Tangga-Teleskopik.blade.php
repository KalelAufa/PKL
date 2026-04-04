@extends('layouts.app')

@section('title', 'Tangga Teleskopik - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Tangga Teleskopik</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-type-display">Tangga Teleskopik</div>
        
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/tangga.png') }}" alt="Tangga Teleskopik" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Tangga teleskopik multifungsi dengan sistem penguncian aman, dapat disesuaikan tinggi sesuai kebutuhan pekerjaan. Dirancang untuk pekerjaan di ketinggian dengan stabilitas dan keamanan terjamin.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Maximum Height</div>
                            <div class="spec-value">3 Meters</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Material</div>
                            <div class="spec-value">Aluminum Alloy</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Maximum Load</div>
                            <div class="spec-value">150 Kg</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Safety Features</div>
                            <div class="spec-value">Stabilizer</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-arrows-alt-v"></i>
                </div>
                <h3 class="feature-title">Tinggi Dapat Diatur</h3>
                <p class="feature-description">Dapat disesuaikan dari 1m hingga 3m sesuai kebutuhan pekerjaan</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-weight"></i>
                </div>
                <h3 class="feature-title">Ringan & Portabel</h3>
                <p class="feature-description">Terbuat dari aluminium alloy yang ringan namun kuat</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-lock"></i>
                </div>
                <h3 class="feature-title">Sistem Penguncian Aman</h3>
                <p class="feature-description">Mekanisme penguncian ganda untuk keamanan ekstra</p>
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
