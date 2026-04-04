@extends('layouts.app')

@section('title', 'Alat Pengasah - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Alat Pengasah</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-type-display">Alat Pengasah</div>
        
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/asah.png') }}" alt="Alat Pengasah" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Alat pengasah digunakan untuk mengasah kembali mata pisau, gunting, atau alat potong lainnya agar tetap tajam dan efisien saat digunakan.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Type</div>
                            <div class="spec-value">Manual or Electric</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Sharpening Angle</div>
                            <div class="spec-value">15° – 30°</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Compatible Tools</div>
                            <div class="spec-value">Knives, Scissors, Blades</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Features</div>
                            <div class="spec-value">Anti-slip base, Multi-stage sharpening, Replaceable sharpening stone</div>
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
                <h3 class="feature-title">Ketajaman Optimal</h3>
                <p class="feature-description">Menghasilkan ketajaman yang presisi untuk berbagai alat potong</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-sliders-h"></i>
                </div>
                <h3 class="feature-title">Pengaturan Sudut</h3>
                <p class="feature-description">Memungkinkan pengaturan sudut pengasahan yang tepat</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-sync-alt"></i>
                </div>
                <h3 class="feature-title">Multi Tahap</h3>
                <p class="feature-description">Proses pengasahan bertahap untuk hasil terbaik</p>
            </div>
        </div>
        
        <div class="buttons-container">
            <a href="{{ route('katalog.index', ['kategoriSlug' => 'perkakas']) }}" class="action-button back-button">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('home') }}" class="action-button home-button">
                <i class="fas fa-home"></i> Beranda
            </a>
        </div>
    </div>
@endsection
