@extends('layouts.app')

@section('title', 'Roll Meteran - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Roll Meteran</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-type-display">Roll Meteran</div>
        
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/meteran.png') }}" alt="Roll Meteran" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Roll meteran dirancang untuk memberikan pengukuran yang akurat dan mudah digunakan. Cocok untuk kebutuhan konstruksi, renovasi, maupun perbaikan rumah Anda.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Material</div>
                            <div class="spec-value">Tylon coating</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Measurement</div>
                            <div class="spec-value">Meter and inch</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Grip</div>
                            <div class="spec-value">Ergonomic grip</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-ruler"></i>
                </div>
                <h3 class="feature-title">Serbaguna</h3>
                <p class="feature-description">Memiliki dua satuan ukur (meter & inch) untuk berbagai kebutuhan konstruksi.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-tools"></i>
                </div>
                <h3 class="feature-title">Kualitas Tinggi</h3>
                <p class="feature-description">Pita baja berlapis Tylon yang kuat, tahan aus, dan tidak mudah pudar.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3 class="feature-title">Akurasi Tinggi</h3>
                <p class="feature-description">Pengukuran lebih presisi dengan standar kelas II untuk hasil yang andal.</p>
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
