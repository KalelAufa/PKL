@extends('layouts.app')

@section('title', 'Rice Transplanter - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Rice Transplanter</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-type-display">Rice Transplanter</div>
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/rice.png') }}" alt="Rice Transplanter" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Rice Transplanter adalah alat pertanian modern yang digunakan untuk menanam bibit padi secara otomatis dan efisien. Dengan teknologi canggih, alat ini membantu petani mempercepat proses tanam, meningkatkan hasil panen, serta mengurangi tenaga kerja dan biaya operasional di lahan sawah.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">--</div>
                            <div class="spec-value">-</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">--</div>
                            <div class="spec-value">-</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">--</div>
                            <div class="spec-value">-</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">--</div>
                            <div class="spec-value">-</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-seedling"></i>
                </div>
                <h3 class="feature-title">Tanam Efisien</h3>
                <p class="feature-description">Mempercepat proses tanam padi dengan hasil lebih rapi</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-arrows-alt-h"></i>
                </div>
                <h3 class="feature-title">Jarak Presisi</h3>
                <p class="feature-description">Menjaga jarak tanam seragam untuk pertumbuhan optimal</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-tractor"></i>
                </div>
                <h3 class="feature-title">Mudah Dikendalikan</h3>
                <p class="feature-description">Dirancang untuk kemudahan penggunaan dan kontrol yang baik</p>
            </div>
        </div>
        
        <div class="buttons-container">
            <a href="{{ route('katalog.index', ['kategoriSlug' => 'pertanian']) }}" class="action-button back-button">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('home') }}" class="action-button home-button">
                <i class="fas fa-home"></i> Beranda
            </a>
        </div>
    </div>
@endsection
