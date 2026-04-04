@extends('layouts.app')

@section('title', 'Papan Tulis Putih - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Papan Tulis Putih</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/alatkantor/papan.png') }}" alt="Papan Tulis Putih" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Papan tulis putih adalah media visual untuk menulis, menjelaskan ide, dan presentasi di ruang kantor atau kelas.</p>
                    <p>Dengan permukaan yang halus dan mudah dibersihkan, papan tulis putih kami memberikan solusi presentasi yang praktis dan efisien untuk kebutuhan bisnis dan pendidikan Anda.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Surface</div>
                            <div class="spec-value">Magnetic / Non-Magnetic</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Frame</div>
                            <div class="spec-value">Aluminum</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Size</div>
                            <div class="spec-value">60x90 cm, 90x120 cm, 120x240 cm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Accessories</div>
                            <div class="spec-value">Marker, Eraser, Magnet</div>
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
                <h3 class="feature-title">Presentasi Visual</h3>
                <p class="feature-description">Membantu visualisasi ide dengan jelas dan interaktif</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-magnet"></i>
                </div>
                <h3 class="feature-title">Versi Magnetik</h3>
                <p class="feature-description">Dapat digunakan dengan magnet untuk menempel catatan</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-eraser"></i>
                </div>
                <h3 class="feature-title">Mudah Dibersihkan</h3>
                <p class="feature-description">Permukaan halus yang mudah dihapus dan digunakan kembali</p>
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
