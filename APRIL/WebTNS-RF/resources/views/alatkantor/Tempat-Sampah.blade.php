@extends('layouts.app')

@section('title', 'Tempat Sampah - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Tempat Sampah</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/sampah.png') }}" alt="Tempat Sampah" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Tempat sampah digunakan untuk menjaga kebersihan ruang kerja agar tetap nyaman dan sehat.</p>
                    <p>Dengan berbagai ukuran dan model yang tersedia, tempat sampah kami memberikan solusi kebersihan yang praktis dan higienis untuk lingkungan kerja Anda.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Top Diameter</div>
                            <div class="spec-value">23 cm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Bottom Diameter</div>
                            <div class="spec-value">18.5 cm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Height</div>
                            <div class="spec-value">26 cm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Color</div>
                            <div class="spec-value">Black and silver</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-broom"></i>
                </div>
                <h3 class="feature-title">Kebersihan</h3>
                <p class="feature-description">Menjaga lingkungan kerja tetap bersih dan higienis</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h3 class="feature-title">Memenuhi Standar</h3>
                <p class="feature-description">Pastikan sampah memenuhi standar ukuran sebelum diproses lebih lanjut.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Tahan Lama</h3>
                <p class="feature-description">Material berkualitas untuk penggunaan jangka panjang</p>
            </div>
        </div>
        
        <div class="buttons-container">
            <a href="{{ route('katalog.index', ['kategoriSlug' => 'alat-kantor']) }}" class="action-button back-button">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('home') }}" class="action-button home-button">
                <i class="fas fa-home"></i> Beranda
            </a>
        </div>
    </div>
@endsection
