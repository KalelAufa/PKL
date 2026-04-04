@extends('layouts.app')

@section('title', 'Stabilizer SVC 500VA - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Stabilizer SVC 500VA</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/stabilizer.png') }}" alt="Stabilizer SVC 500VA" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Stabilizer ini menjaga kestabilan tegangan listrik untuk perangkat elektronik agar tetap aman dan tahan lama dalam penggunaan.</p>
                    <p>Dengan proteksi overload dan short circuit, stabilizer ini memberikan perlindungan maksimal untuk perangkat elektronik Anda.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi Teknis</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Kapasitas</div>
                            <div class="spec-value">500VA</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Input Voltage</div>
                            <div class="spec-value">140V – 260V</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Output Voltage</div>
                            <div class="spec-value">220V ±10%</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Frekuensi</div>
                            <div class="spec-value">50Hz/60Hz</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Display</div>
                            <div class="spec-value">Analog Meter</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Proteksi</div>
                            <div class="spec-value">Overload, Short Circuit</div>
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
                <h3 class="feature-title">Stabil Tegangan</h3>
                <p class="feature-description">Menjaga tegangan output stabil meski input bervariasi</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Proteksi Lengkap</h3>
                <p class="feature-description">Proteksi overload dan short circuit untuk keamanan perangkat</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-tachometer-alt"></i>
                </div>
                <h3 class="feature-title">Monitoring Real-time</h3>
                <p class="feature-description">Display analog untuk memantau tegangan secara langsung</p>
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
