@extends('layouts.app')

@section('title', 'Kamera Canon EOS M50 Mark II - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Kamera Canon EOS M50 Mark II</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/kamera.png') }}" alt="Kamera Canon EOS M50 Mark II" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Canon EOS M50 Mark II Kit 15-45mm adalah kamera multimedia serbaguna dengan fitur foto dan video yang lengkap. Dengan kemampuan fokus, perekaman, dan berbagi yang ditingkatkan, 
                        M50 Mark II masih berputar di sekitar sensor CMOS APS-C 24,1MP dan prosesor gambar DIGIC 8 dan perekaman video UHD 4K. 
                        Dual Pixel CMOS AF berbasis sensor telah ditingkatkan dengan kecepatan yang lebih tinggi dan performa Eye Detection AF yang disempurnakan.
                    </p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Lens Mount</div>
                            <div class="spec-value">Canon EF-M</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Sensor</div>
                            <div class="spec-value">24.1 MP APS-C, sharp and detailed photos.</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Autofocus</div>
                            <div class="spec-value">Dual Pixel CMOS AF + Eye Detection, fast and accurate for photos and videos.</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Video</div>
                            <div class="spec-value">4K (crop) & Full HD 60fps</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Screen</div>
                            <div class="spec-value">Vari-angle touchscreen, ideal for vlogging and selfies.</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Connectivity</div>
                            <div class="spec-value">Wi-Fi, Bluetooth, 3.5mm microphone input</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Burst</div>
                            <div class="spec-value">Up to 10 photos/second</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-video"></i>
                </div>
                <h3 class="feature-title">Perekaman</h3>
                <p class="feature-description">Mampu merekam video hingga 4K & full HD 60fps</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-wifi"></i>
                </div>
                <h3 class="feature-title">Konektivitas</h3>
                <p class="feature-description">3 konektivitas: Wi-Fi, Bluetooth, dan 3.5mm microphone input</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fa-solid fa-camera"></i>
                </div>
                <h3 class="feature-title">Kamera</h3>
                <p class="feature-description">Dapat menangkap 10 foto per detik untuk waktu singkat</p>
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
