@extends('layouts.app')

@section('title', 'Traktor Quick Zena - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Traktor Quick Capung</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-type-display">Traktor Quick Capung</div>
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/tractorquick.png') }}" alt="Traktor Quick Zena" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Traktor Quick Zena adalah traktor tangan modern yang dirancang untuk meningkatkan produktivitas pertanian. Memiliki mesin kuat, mudah digunakan, dan efisien dalam konsumsi bahan bakar, sangat cocok untuk pengolahan lahan, pembajakan, serta berbagai aktivitas pertanian lainnya.</p>
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
                    <i class="fas fa-tractor"></i>
                </div>
                <h3 class="feature-title">Tenaga Kuat</h3>
                <p class="feature-description">Dilengkapi mesin bertenaga tinggi untuk berbagai jenis lahan</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-cogs"></i>
                </div>
                <h3 class="feature-title">Durabilitas Tinggi</h3>
                <p class="feature-description">Material kokoh dengan daya tahan lama untuk pemakaian intensif</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-seedling"></i>
                </div>
                <h3 class="feature-title">Serbaguna</h3>
                <p class="feature-description">Mendukung berbagai pekerjaan pertanian dan perkebunan</p>
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
