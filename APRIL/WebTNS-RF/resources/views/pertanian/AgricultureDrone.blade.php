@extends('layouts.app')

@section('title', 'Agriculture Drone- Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Agriculture Drone</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-type-display">Agriculture Drone</div>
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/drone.png') }}" alt="Agriculture Drone" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Agriculture Drone adalah teknologi modern yang dirancang untuk membantu petani melakukan penyemprotan, pemupukan, dan pemantauan lahan secara efisien. 
                        Dengan sistem terbang otomatis dan kontrol presisi, drone ini mampu menjangkau area yang luas dalam waktu singkat, sehingga menghemat tenaga, waktu, dan biaya operasional.
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
                    <i class="fas fa-helicopter"></i>
                </div>
                <h3 class="feature-title">Penyemprotan Modern</h3>
                <p class="feature-description">Menggunakan teknologi drone untuk penyemprotan yang cepat dan presisi</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-battery-full"></i>
                </div>
                <h3 class="feature-title">Baterai Tahan Lama</h3>
                <p class="feature-description">Mampu beroperasi lebih lama dengan baterai berkualitas tinggi</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-water"></i>
                </div>
                <h3 class="feature-title">Sistem Penyemprotan Cerdas</h3>
                <p class="feature-description">Dapat disesuaikan dengan kebutuhan penyemprotan tanaman</p>
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
