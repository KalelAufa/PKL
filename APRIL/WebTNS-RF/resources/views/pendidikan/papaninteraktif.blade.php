@extends('layouts.app')

@section('title', 'Papan Interaktif - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Papan Interaktif</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/papaninteraktif.png') }}" alt="Papan Interaktif" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Papan interaktif adalah perangkat digital yang memungkinkan penulisan, gambar, dan interaksi langsung pada layar, cocok untuk presentasi, pembelajaran, dan kolaborasi di ruang kelas atau kantor.</p>
                    <p>Dengan fitur sentuh dan konektivitas, papan interaktif kami memudahkan proses belajar-mengajar, diskusi kelompok, serta integrasi dengan berbagai perangkat untuk pengalaman interaktif yang maksimal.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Surface</div>
                            <div class="spec-value">USB/AV/VGA/HDMI/LAN</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Resolution</div>
                            <div class="spec-value">1920x1080/3840x2160 (4k)</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Brightness</div>
                            <div class="spec-value">400 nit</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Network</div>
                            <div class="spec-value">LAN/WIFI</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">contrast ratio</div>
                            <div class="spec-value">5000:1</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-chalkboard"></i>
                </div>
                <h3 class="feature-title">Interaksi Digital</h3>
                <p class="feature-description">Mendukung penulisan dan gambar langsung secara digital untuk kolaborasi aktif.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="feature-title">Kolaborasi Real-Time</h3>
                <p class="feature-description">Bisa digunakan bersama-sama oleh banyak pengguna secara bersamaan.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-save"></i>
                </div>
                <h3 class="feature-title">Penyimpanan & Berbagi</h3>
                <p class="feature-description">Hasil tulisan dapat disimpan dan dibagikan ke perangkat lain dengan mudah.</p>
            </div>
        </div>
        
        <div class="buttons-container">
            <a href="{{ route('katalog.index', ['kategoriSlug' => 'pendidikan']) }}" class="action-button back-button">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('home') }}" class="action-button home-button">
                <i class="fas fa-home"></i> Beranda
            </a>
        </div>
    </div>
@endsection
