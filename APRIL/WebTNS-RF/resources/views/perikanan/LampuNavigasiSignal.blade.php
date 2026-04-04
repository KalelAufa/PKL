@extends('layouts.app')

@section('title', 'Lampu Navigasi Signal - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Lampu Navigasi Signal</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-type-display">Lampu Navigasi Signal</div>
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/lampunavigasi.png') }}" alt="Lampu Navigasi" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Lampu navigasi signal adalah perangkat penerangan yang dipasang pada kapal untuk memberikan tanda visual kepada kapal lain di sekitarnya, sesuai dengan aturan navigasi laut. Lampu ini berfungsi untuk menunjukkan posisi, arah, dan status kapal, sehingga meningkatkan keselamatan pelayaran terutama pada malam hari atau kondisi cuaca buruk.</p>
                    <p>Lampu navigasi signal tersedia dalam berbagai warna dan konfigurasi, seperti lampu hijau, merah, putih, dan kuning, yang masing-masing memiliki arti dan kegunaan tersendiri sesuai regulasi internasional. Cocok digunakan pada semua jenis kapal, baik kapal kecil maupun kapal besar.</p>
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
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h3 class="feature-title">Sinar Terang</h3>
                <p class="feature-description">Memberikan visibilitas tinggi di malam hari</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-ship"></i>
                </div>
                <h3 class="feature-title">Standar Maritim</h3>
                <p class="feature-description">Mematuhi regulasi internasional untuk keselamatan pelayaran</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3 class="feature-title">Hemat Energi</h3>
                <p class="feature-description">Menggunakan teknologi LED untuk efisiensi energi yang lebih baik</p>
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
