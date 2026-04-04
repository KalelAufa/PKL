@extends('layouts.app')

@section('title', 'Hardisk / SSD - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Hardisk / SSD</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/ssd.png') }}" alt="Samsung SSD 870 EVO" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Hard Disk Portabel 2TB dengan interface SATA III, dirancang untuk menyimpan berbagai file penting Anda dengan aman. Memiliki kecepatan baca/tulis yang stabil sehingga cocok digunakan untuk kebutuhan kerja, backup data, maupun multimedia.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Type</div>
                            <div class="spec-value">Hard Disk Portabel</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Interface</div>
                            <div class="spec-value">SATA III</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Capacity</div>
                            <div class="spec-value">2 TB</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Write Speed</div>
                            <div class="spec-value">500MB/s</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Read Speed</div>
                            <div class="spec-value">308MB/s</div>
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
                <p class="feature-description">Kecepatan baca/tulis hingga 308/500 MB/s untuk respons instan</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Keandalan</h3>
                <p class="feature-description">Dibangun dengan material berkualitas dan sistem proteksi data untuk menjaga keamanan file Anda.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-history"></i>
                </div>
                <h3 class="feature-title">Teknologi TurboWrite</h3>
                <p class="feature-description">Mempercepat transfer data untuk kinerja optimal</p>
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
