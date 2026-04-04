@extends('layouts.app')

@section('title', 'Bar Bender - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Bar Bender</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/barbender.png') }}" alt="Bar Bender" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Alat ini digunakan untuk membengkokkan batang baja tulangan sesuai sudut tertentu dengan presisi tinggi.</p>
                    <p>Dengan desain yang kuat dan kinerja tinggi, Bar Bender ini sangat ideal untuk berbagai aplikasi konstruksi beton bertulang.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Max Diameter</div>
                            <div class="spec-value">6 - 42 mm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Voltage</div>
                            <div class="spec-value">380V / 3 Phase</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Power</div>
                            <div class="spec-value">3 - 4 kW</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Speed</div>
                            <div class="spec-value">10 - 15 rpm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Weight</div>
                            <div class="spec-value">250 - 400 kg</div>
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
                <h3 class="feature-title">Presisi Tinggi</h3>
                <p class="feature-description">Membengkokkan baja tulangan dengan akurasi sudut yang tepat</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-cog"></i>
                </div>
                <h3 class="feature-title">Kinerja Optimal</h3>
                <p class="feature-description">Desain kokoh untuk pembengkokan baja yang efisien</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Keamanan</h3>
                <p class="feature-description">Fitur keamanan lengkap untuk operator dan peralatan</p>
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
