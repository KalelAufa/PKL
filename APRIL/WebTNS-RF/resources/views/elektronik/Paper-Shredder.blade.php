@extends('layouts.app')

@section('title', 'Paper Shredder - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Paper Shredder</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/paper.png') }}" alt="Paper Shredder" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Mesin penghancur kertas ini digunakan untuk menghancurkan dokumen penting agar tidak bisa dibaca atau digunakan kembali.</p>
                    <p>Dengan sistem cross-cut dan kapasitas besar, memberikan keamanan dokumen dengan hasil potongan kecil yang sulit direkonstruksi.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Power</div>
                            <div class="spec-value">420 Watt</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Paper Capacity</div>
                            <div class="spec-value">15 sheets</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Input Paper</div>
                            <div class="spec-value">A4</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Basket Capacity</div>
                            <div class="spec-value">25 liter</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Cutting Size</div>
                            <div class="spec-value">4 x 35 mm</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-cut"></i>
                </div>
                <h3 class="feature-title">Cross-Cut</h3>
                <p class="feature-description">Penghancuran menyilang untuk keamanan dokumen maksimal</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <h3 class="feature-title">Kapasitas Besar</h3>
                <p class="feature-description">Mampu menghancurkan hingga 10 lembar sekaligus</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Keamanan</h3>
                <p class="feature-description">Proteksi panas dan sistem otomatis untuk penggunaan aman</p>
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
