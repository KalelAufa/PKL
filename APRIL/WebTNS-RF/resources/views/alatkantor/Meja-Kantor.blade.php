@extends('layouts.app')

@section('title', 'Meja Kantor - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Meja Kantor</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/meja.png') }}" alt="Meja Kantor" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Meja kantor digunakan sebagai tempat kerja untuk menyusun dokumen dan peralatan kerja lainnya.</p>
                    <p>Dengan desain ergonomis dan material berkualitas, meja ini memberikan kenyamanan dan produktivitas maksimal untuk aktivitas kerja harian Anda.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Material</div>
                            <div class="spec-value">Wood, Metal, or MDF</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Dimension</div>
                            <div class="spec-value">120x60x75 cm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Color</div>
                            <div class="spec-value">Black, Brown</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Features</div>
                            <div class="spec-value">Drawer, Cable Management, Sturdy Frame</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-chair"></i>
                </div>
                <h3 class="feature-title">Ergonomis</h3>
                <p class="feature-description">Desain nyaman untuk penggunaan jangka panjang</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-draw-polygon"></i>
                </div>
                <h3 class="feature-title">Fungsional</h3>
                <p class="feature-description">Dilengkapi laci dan manajemen kabel</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-palette"></i>
                </div>
                <h3 class="feature-title">Beragam Warna</h3>
                <p class="feature-description">Tersedia dalam berbagai pilihan warna</p>
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
