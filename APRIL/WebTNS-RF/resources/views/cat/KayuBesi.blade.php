@extends('layouts.app')

@section('title', 'Cat Kayu & Besi - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Cat Kayu & Besi</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/kayubesi.png') }}" alt="Cat Kayu dan Besi" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Cat enamel serbaguna untuk permukaan kayu dan besi, memberikan perlindungan dan hasil akhir mengkilap.</p>
                    <p>Solusi ideal untuk furnitur, pintu, jendela, dan struktur logam yang membutuhkan perlindungan ekstra.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Type</div>
                            <div class="spec-value">Alkyd Synthetic</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Coverage</div>
                            <div class="spec-value">8 - 10 m²/liter</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Drying Time</div>
                            <div class="spec-value">3 - 5 hours</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Finishing</div>
                            <div class="spec-value">Glossy / Semi Glossy</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Features</div>
                            <div class="spec-value">Rust Resistant, Long-lasting</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-tree"></i>
                </div>
                <h3 class="feature-title">Untuk Kayu</h3>
                <p class="feature-description">Melindungi dan memperindah permukaan kayu</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-hammer"></i>
                </div>
                <h3 class="feature-title">Untuk Besi</h3>
                <p class="feature-description">Perlindungan anti karat untuk logam</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Ketahanan</h3>
                <p class="feature-description">Tahan lama terhadap cuaca dan gesekan</p>
            </div>
        </div>
        
        <div class="buttons-container">
            <a href="{{ route('katalog.index', ['kategoriSlug' => 'cat']) }}" class="action-button back-button">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('home') }}" class="action-button home-button">
                <i class="fas fa-home"></i> Beranda
            </a>
        </div>
    </div>
@endsection
