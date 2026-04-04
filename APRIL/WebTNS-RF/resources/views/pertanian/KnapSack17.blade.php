@extends('layouts.app')

@section('title', 'KnapSack 17L Swan SA-17 Manual - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>KnapSack 17L Swan SA-17 Manual</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-type-display">KnapSack 17L Swan SA-17 Manual</div>
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/knapsack17.png') }}" alt="KnapSack 17L Swan SA-17 Manual" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>KnapSack 17L SA-17 Manual adalah alat semprot hama berkapasitas 17 liter dengan sistem pompa manual yang 
                        dirancang untuk memudahkan pekerjaan penyemprotan pada lahan pertanian, perkebunan, maupun taman. Terbuat dari material 
                        tangguh dan tahan lama, dilengkapi tali bahu ergonomis untuk kenyamanan penggunaan, 
                        serta nozzle yang dapat diatur sesuai kebutuhan penyemprotan.
                    </p>
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
                    <i class="fas fa-spray-can"></i>
                </div>
                <h3 class="feature-title">Semprot Merata</h3>
                <p class="feature-description">Memberikan hasil penyemprotan yang halus dan konsisten</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-bag-shopping"></i>
                </div>
                <h3 class="feature-title">Kapasitas Besar</h3>
                <p class="feature-description">Tangki 17 liter cocok untuk area perkebunan yang luas</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-hand-holding-water"></i>
                </div>
                <h3 class="feature-title">Mudah Digunakan</h3>
                <p class="feature-description">Dilengkapi pompa manual yang mudah dioperasikan kapan saja</p>
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
