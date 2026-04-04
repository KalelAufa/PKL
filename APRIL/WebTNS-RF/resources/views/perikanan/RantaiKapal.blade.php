@extends('layouts.app')

@section('title', 'Rantai Kapal - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Rantai Kapal</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-type-display">Rantai Kapal</div>
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/rantaikapal.png') }}" alt="Rantai Kapal" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Rantai kapal adalah komponen penting yang digunakan untuk mengikat dan menambatkan kapal pada jangkar atau dermaga. Rantai ini berfungsi menjaga posisi kapal agar tetap stabil dan aman saat berlabuh.</p>
                    <p>Rantai kapal tersedia dalam berbagai ukuran dan material, dirancang untuk memiliki kekuatan tinggi serta tahan terhadap korosi di lingkungan laut. Cocok digunakan pada berbagai jenis kapal, baik kapal kecil maupun kapal besar.</p>
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
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">--</h3>
                <p class="feature-description">--</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-sun"></i>
                </div>
                <h3 class="feature-title">--</h3>
                <p class="feature-description">--</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <h3 class="feature-title">--</h3>
                <p class="feature-description">--</p>
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
