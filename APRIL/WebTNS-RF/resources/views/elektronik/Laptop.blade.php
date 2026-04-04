@extends('layouts.app')

@section('title', 'Laptop Lenovo Ideapad Slim 3 - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Laptop Lenovo Ideapad Slim 3</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/laptop.png') }}" alt="Laptop Lenovo Ideapad Slim 3" style="width: 400px; height: auto !important;" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Raih performa terbaik Anda ke mana pun Anda pergi dengan laptop IdeaPad Slim 3 Gen 8, yang dirancang ringan dan tipis, hingga 10% lebih ramping dibandingkan generasi sebelumnya. Tersedia dalam warna Arctic Grey, Abyss Blue, dan Frost Blue, laptop tangguh ini mampu menahan benturan keras dengan daya tahan kelas militer untuk kondisi perjalanan ekstrem.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Processor</div>
                            <div class="spec-value">AMD Ryzen 7 7730U</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Operating System</div>
                            <div class="spec-value">Windows 11 Pro</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Port</div>
                            <div class="spec-value">1 USB-C, 2 USB-A, 1 HDMI 1.4b, Card Reader, jack audio combo</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Graphics</div>
                            <div class="spec-value">Integrated AMD Radeon Graphics</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Display</div>
                            <div class="spec-value">14" FHD (1920x1080)IPX, 300 nits, 45% NTSC, Anti-glare </div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Memory & Storage</div>
                            <div class="spec-value">16 GB RAM, 512GB up to 1TB GB SSD</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Battery</div>
                            <div class="spec-value">Up to 10 - 12 hours</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Audio</div>
                            <div class="spec-value">2 x 1.5W user-facing speakers with Dolby Audio™, Dual microphone array</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Camera</div>
                            <div class="spec-value">HD 720p, Fixed Focus, Privacy Shutter</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-tachometer-alt"></i>
                </div>
                <h3 class="feature-title">Performa Tinggi</h3>
                <p class="feature-description">Prosesor AMD Ryzen 7 7730U untuk multitasking lancar</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-laptop"></i>
                </div>
                <h3 class="feature-title">Portabilitas</h3>
                <p class="feature-description">Desain ringkas 14" dengan berat ringan untuk mobilitas tinggi</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-battery-full"></i>
                </div>
                <h3 class="feature-title">Baterai Tahan Lama</h3>
                <p class="feature-description">Daya tahan baterai hingga 12 jam untuk produktivitas seharian</p>
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
