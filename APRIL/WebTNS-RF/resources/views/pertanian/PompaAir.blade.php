@extends('layouts.app')

@section('title', 'Pompa Air Bensin Proquip QWP100 - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Pompa Air Bensin Proquip QWP100</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-type-display">Pompa Air Bensin Proquip QWP100</div>
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/pompaair.png') }}" alt="Pompa Air" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Pompa Air adalah alat pertanian modern yang digunakan untuk mengalirkan air ke lahan pertanian secara efisien. Dengan teknologi canggih, alat ini membantu petani dalam pengelolaan irigasi, meningkatkan hasil panen, serta mengurangi tenaga kerja dan biaya operasional di lahan sawah.</p>
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
                    <i class="fas fa-tint"></i>
                </div>
                <h3 class="feature-title">Debit Air Besar</h3>
                <p class="feature-description">Mampu memompa air dengan kapasitas tinggi, cocok untuk irigasi dan kebutuhan lapangan.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-gas-pump"></i>
                </div>
                <h3 class="feature-title">Hemat Bahan Bakar</h3>
                <p class="feature-description">Pompa ini dirancang untuk efisiensi bahan bakar yang optimal, mengurangi biaya operasional.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-tools"></i>
                </div>
                <h3 class="feature-title">Durable & Mudah Perawatan</h3>
                <p class="feature-description">Material berkualitas tinggi dengan sparepart mudah ditemukan.</p>
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
