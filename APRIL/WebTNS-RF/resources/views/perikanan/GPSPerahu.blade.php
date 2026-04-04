@extends('layouts.app')

@section('title', 'GPS Perahu - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>GPS Perahu</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-type-display">GPS Perahu</div>
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/gpsperahu.png') }}" alt="GPS Perahu" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>GPS perahu adalah perangkat navigasi yang digunakan untuk menentukan posisi dan arah kapal secara akurat di perairan. Dengan GPS, pengguna dapat memantau lokasi kapal secara real-time dan merencanakan rute pelayaran dengan lebih aman.</p>
                    <p>GPS perahu tersedia dalam berbagai tipe dan fitur, seperti pelacakan lokasi, penanda titik tujuan, serta integrasi dengan peta digital. Cocok digunakan untuk kapal nelayan, kapal wisata, maupun kapal pribadi.</p>
                </div>
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Type</div>
                            <div class="spec-value">-</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Base Material</div>
                            <div class="spec-value">-</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Durability</div>
                            <div class="spec-value">-</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Color</div>
                            <div class="spec-value">-</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Application Area</div>
                            <div class="spec-value">-</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Application Method</div>
                            <div class="spec-value">-</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-map-marked-alt"></i>
                </div>
                <h3 class="feature-title">Navigasi Akurat</h3>
                <p class="feature-description">Memastikan perjalanan yang aman dan efisien</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-satellite-dish"></i>
                </div>
                <h3 class="feature-title">Sinyal GPS Kuat</h3>
                <p class="feature-description">Menjamin akurasi lokasi di berbagai kondisi cuaca</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-route"></i>
                </div>
                <h3 class="feature-title">Rute Pelayaran Optimal</h3>
                <p class="feature-description">Membantu merencanakan jalur terbaik untuk perjalanan</p>
            </div>
        </div>
        
        <div class="buttons-container">
            <a href="{{ route('katalog.index', ['kategoriSlug' => 'perikanan']) }}" class="action-button back-button">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('home') }}" class="action-button home-button">
                <i class="fas fa-home"></i> Beranda
            </a>
        </div>
    </div>
@endsection
