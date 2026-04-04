@extends('layouts.app')

@section('title', 'Mesin Pompa Yamamax WP80XT - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Mesin Pompa Yamamax WP80XT</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-type-display">Mesin Pompa Yamamax WP80XT</div>
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/mesinpompa.png') }}" alt="Mesin Pompa" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Mesin Pompa Yamamax WP80XT adalah solusi handal untuk kebutuhan irigasi pertanian dan pemindahan air. Dilengkapi dengan mesin bertenaga, desain tangguh, dan konsumsi bahan bakar efisien, WP80XT mampu memberikan performa optimal di berbagai kondisi lapangan, sehingga mendukung produktivitas petani secara maksimal.</p>
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
                    <i class="fas fa-cogs"></i>
                </div>
                <h3 class="feature-title">Mesin Bertenaga</h3>
                <p class="feature-description">Ditenagai oleh mesin yang kuat dan efisien, memastikan kinerja optimal dalam setiap penggunaan.</p>
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
