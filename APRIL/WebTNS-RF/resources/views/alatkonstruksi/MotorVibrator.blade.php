@extends('layouts.app')

@section('title', 'Motor Vibrator - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Motor Vibrator</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-selector-container">
            <div class="model-selector">
                <label for="modelSelect"><strong>Type:</strong></label>
                <select id="modelSelect" onchange="updateSpecs()">
                    <option value="ZN16" selected>ZN 1.6</option>
                    <option value="ZN22">ZN 2.2</option>
                </select>
            </div>
        </div>
        
        <div class="model-type-display" id="modelTypeDisplay">ZN 1.6</div>
        
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/motorvib.png') }}" alt="Motor Vibrator" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Mesin penggetar yang dirancang untuk menghasilkan getaran kuat dan stabil dalam berbagai aplikasi industri seperti pengecoran beton atau pemisahan material.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Type</div>
                            <div class="spec-value" id="type">ZN 1.6</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Motor Power</div>
                            <div class="spec-value" id="motor">1600 Watt</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Voltage Option</div>
                            <div class="spec-value" id="voltage">220V / 380V</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Vibration Speed</div>
                            <div class="spec-value" id="vibration">2850 Rpm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Weight</div>
                            <div class="spec-value" id="weight">14 Kg</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Connection Type</div>
                            <div class="spec-value" id="connection">Coupling</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Dimension</div>
                            <div class="spec-value" id="dimension">390 x 230 x 270 mm</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-wave-square"></i>
                </div>
                <h3 class="feature-title">Getaran Kuat</h3>
                <p class="feature-description">Menghasilkan getaran yang stabil untuk berbagai aplikasi industri</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3 class="feature-title">Daya Tinggi</h3>
                <p class="feature-description">Motor bertenaga untuk kinerja optimal</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Daya Tahan</h3>
                <p class="feature-description">Konstruksi kokoh untuk penggunaan jangka panjang</p>
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
