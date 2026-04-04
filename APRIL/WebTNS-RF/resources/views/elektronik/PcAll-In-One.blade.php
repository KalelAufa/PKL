@extends('layouts.app')

@section('title', 'PC All-in-One - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>PC All-in-One</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/pc.png') }}" alt="PC All-in-One" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>PC All-in-One merupakan perangkat komputer terintegrasi yang menggabungkan komponen utama ke dalam monitor, cocok digunakan untuk kebutuhan kerja maupun presentasi.</p>
                    <p>Dengan desain minimalis dan performa tinggi, PC ini memberikan solusi komputasi yang efisien untuk berbagai kebutuhan bisnis dan profesional.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Processor</div>
                            <div class="spec-value">Intel® Core™ i5-8250U, 1.6GHz (6M Cache, up to 3.4 GHz)</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Display</div>
                            <div class="spec-value">21.5″ LED-backlit, FHD (1920 x 1080)</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Memory & Storage</div>
                            <div class="spec-value">16GB RAM, 512GB SSD</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Connectivity</div>
                            <div class="spec-value">802.11ac + Bluetooth 4.1 (Dual Band) 1x1</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Accessories</div>
                            <div class="spec-value">Zen Golden Wired Keyboard + Mouse</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Operating System</div>
                            <div class="spec-value">Windows 11</div>
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
                <p class="feature-description">Processor Intel Core i5 generasi terbaru untuk komputasi cepat</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-desktop"></i>
                </div>
                <h3 class="feature-title">Layar Jernih</h3>
                <p class="feature-description">Resolusi Full HD untuk pengalaman visual yang tajam</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-memory"></i>
                </div>
                <h3 class="feature-title">Penyimpanan Cepat</h3>
                <p class="feature-description">SSD 512GB untuk akses data yang lebih cepat</p>
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
