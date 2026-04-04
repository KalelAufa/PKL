@extends('layouts.app')

@section('title', 'External Vibrator - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>External Vibrator</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-selector-container">
            <div class="model-selector">
                <label for="modelSelect"><strong>Model:</strong></label>
                <select id="modelSelect" onchange="updateSpecs()">
                    <option value="MVE 290/6N-HF-10A0">MVE 290/6N-HF-10A0</option>
                    <option value="MVE 1530/6N-HF-38E0">MVE 1530/6N-HF-38E0</option>
                    <option value="MVE 1300/6N-HF-50A0">MVE 1300/6N-HF-50A0</option>
                    <option value="MVE 1300/6N-HF-53A0">MVE 1300/6N-HF-53A0</option>
                </select>
            </div>
        </div>
        
        <div class="model-type-display" id="modelTypeDisplay">MVE 290/6N-HF-10A0</div>
        
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/externalvib.png') }}" alt="External Vibrator" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Digunakan dari luar cetakan beton untuk menciptakan getaran merata demi hasil coran yang padat.</p>
                    <p>Dengan desain yang kuat dan kinerja tinggi, vibrator eksternal ini sangat ideal untuk berbagai aplikasi konstruksi beton.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Model</div>
                            <div class="spec-value" id="model">MVE 290/6N-HF-10A0</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Weight</div>
                            <div class="spec-value" id="weight">5 kg</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Centrifugal Force</div>
                            <div class="spec-value" id="force">297 kg</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">RPM</div>
                            <div class="spec-value" id="rpm">0 - 6000</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Frequency</div>
                            <div class="spec-value" id="frequency">0 - 200 Hz</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Power</div>
                            <div class="spec-value" id="power">0.27 kW</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-vibration"></i>
                </div>
                <h3 class="feature-title">Getaran Merata</h3>
                <p class="feature-description">Menghasilkan getaran yang konsisten untuk pemadatan beton optimal</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-cog"></i>
                </div>
                <h3 class="feature-title">Kinerja Tinggi</h3>
                <p class="feature-description">Frekuensi tinggi untuk hasil pemadatan yang lebih baik</p>
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
