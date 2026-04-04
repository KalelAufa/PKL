@extends('layouts.app')

@section('title', 'TV LED - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>TV LED</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/tv.png') }}" alt="TV LED" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>TV LED ini menghadirkan tampilan gambar jernih dengan warna yang tajam dan realistis. 
                        Desainnya ramping dan modern, sehingga mudah dipadukan dengan interior ruangan. 
                        Cocok untuk hiburan keluarga, presentasi, maupun kebutuhan multimedia sehari-hari.
                    </p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Type</div>
                            <div class="spec-value">TV LED</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Resolution</div>
                            <div class="spec-value">1920x1080 (16:09)</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Audio</div>
                            <div class="spec-value">Dolby & 2x9.5W Power</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Refresh Rate</div>
                            <div class="spec-value">60Hz</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">CPU & GPU Core</div>
                            <div class="spec-value">CA55x4 @1.1GHz (DVFS 1.45GHz) & G31MP2 @550MHz</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Connectivity</div>
                            <div class="spec-value">Wi-Fi, Bluetooth, HDMI, Ethernet, USB</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Smart Service</div>
                            <div class="spec-value">Support Google Assistant</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-tv"></i>
                </div>
                <h3 class="feature-title">Layar</h3>
                <p class="feature-description">Resolusi hingga 1920x1080 (16:09)</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-plug"></i>
                </div>
                <h3 class="feature-title">Konektivitas</h3>
                <p class="feature-description">Port HDMI, USB, Ethernet untuk konektivitas fleksibel.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fa-solid fa-volume-up"></i>
                </div>
                <h3 class="feature-title">Kamera</h3>
                <p class="feature-description">Suara jernih dan berkualitas tinggi dengan Speaker Dolby</p>
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
