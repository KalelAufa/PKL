@extends('layouts.app')

@section('title', 'Bar Cutter - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Bar Cutter</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/barcutter.png') }}" alt="Bar Cutter" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Bar Cutter adalah alat pemotong baja tulangan yang dirancang untuk memotong batang baja dengan presisi tinggi pada konstruksi beton bertulang.</p>
                    <p>Dengan pisau potong khusus dan sistem hidrolik yang kuat, alat ini mampu memotong baja tulangan hingga diameter 42mm dengan hasil potongan yang rapi dan akurat.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Cutting Capacity</div>
                            <div class="spec-value">10 - 42 mm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Motor Power</div>
                            <div class="spec-value">3.7 kW (5 HP)</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Voltage</div>
                            <div class="spec-value">3 Phase, 220V / 380V</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Weight</div>
                            <div class="spec-value">836 kg</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Cutting Speed</div>
                            <div class="spec-value">28 - 32 cuts/minute</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Blade Type</div>
                            <div class="spec-value">HSS Tungsten Carbide</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-cut"></i>
                </div>
                <h3 class="feature-title">Presisi Tinggi</h3>
                <p class="feature-description">Memotong baja tulangan dengan akurasi ±0.5mm untuk hasil potongan sempurna</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-tachometer-alt"></i>
                </div>
                <h3 class="feature-title">Efisiensi Tinggi</h3>
                <p class="feature-description">Mampu memotong hingga 32 batang baja per menit untuk produktivitas maksimal</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Keamanan Optimal</h3>
                <p class="feature-description">Dilengkapi sistem pengaman ganda untuk melindungi operator selama penggunaan</p>
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
