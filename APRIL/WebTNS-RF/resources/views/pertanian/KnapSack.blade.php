@extends('layouts.app')

@section('title', 'KnapSack 13.8L Matsukawa - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>KnapSack 13.8L Matsukawa</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-type-display">KnapSack 13.8L Matsukawa</div>
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/knapsack.png') }}" alt="KnapSack 13.8L Matsukawa" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Knapsack 13.8 Matsukawa adalah sprayer tangki berkapasitas 13,8 liter yang dirancang untuk memenuhi kebutuhan penyemprotan di pertanian, perkebunan, 
                        hingga perawatan taman. Menggunakan pompa manual bertenaga yang mudah dioperasikan, alat ini memberikan semprotan merata dan konsisten, 
                        membantu mempercepat pekerjaan penyemprotan hama, pupuk cair, maupun disinfektan.
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
                    <i class="fas fa-leaf"></i>
                </div>
                <h3 class="feature-title">Ramah Perkebunan</h3>
                <p class="feature-description">Cocok untuk penyemprotan tanaman hortikultura dan perkebunan</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-weight-hanging"></i>
                </div>
                <h3 class="feature-title">Ringan dan Praktis</h3>
                <p class="feature-description">Desain ergonomis dan ringan memudahkan pengguna dalam mengoperasikan alat ini.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-water"></i>
                </div>
                <h3 class="feature-title">Tangki 13.8 L</h3>
                <p class="feature-description">Kapasitas cukup besar untuk penyemprotan kebutuhan menengah</p>
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
