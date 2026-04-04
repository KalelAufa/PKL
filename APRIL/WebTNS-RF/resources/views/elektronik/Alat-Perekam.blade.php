@extends('layouts.app')

@section('title', 'Alat Perekam - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Alat Perekam</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/miccam.png') }}" alt="Alat Perekam" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Alat perekam digunakan untuk merekam suara atau video dalam kegiatan dokumentasi, pelatihan, atau rapat kerja.</p>
                    <p>Kami menyediakan berbagai alat perekam berkualitas tinggi dengan fitur canggih untuk memenuhi kebutuhan profesional Anda.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi Teknis</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Kategori</div>
                            <div class="spec-value">Perangkat Perekam</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Jenis</div>
                            <div class="spec-value">Perangkat Suara, Kamera Video, Perangkat Digital</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Kualitas Rekaman</div>
                            <div class="spec-value">Audio HD / Video Full HD</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Penyimpanan</div>
                            <div class="spec-value">Memori Internal atau Kartu SD (hingga 128 GB)</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Fitur</div>
                            <div class="spec-value">Penyaring Noise, Baterai Tahan Lama, Transfer USB</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-microphone-alt"></i>
                </div>
                <h3 class="feature-title">Kualitas Audio</h3>
                <p class="feature-description">Rekaman suara jernih dengan teknologi noise reduction</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-video"></i>
                </div>
                <h3 class="feature-title">Kualitas Video</h3>
                <p class="feature-description">Rekaman video stabil dengan resolusi tinggi</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-battery-full"></i>
                </div>
                <h3 class="feature-title">Daya Tahan</h3>
                <p class="feature-description">Baterai tahan lama untuk penggunaan intensif</p>
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
