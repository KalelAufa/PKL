@extends('layouts.app')

@section('title', 'Kalkulator - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Kalkulator</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/kalkulator.png') }}" alt="kalkulator" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Kalkulator ini dirancang untuk membantu Anda menghitung dengan akurat dan efisien, cocok digunakan di sekolah, kantor, maupun kebutuhan sehari-hari.</p>
                    <p>Kalkulator ini hadir dengan desain elegan, cocok untuk mempercantik ruangan sekaligus membantu Anda menghitung dan mengatur waktu dengan lebih baik.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Type</div>
                            <div class="spec-value">12 digit electronic desk calculator</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Function</div>
                            <div class="spec-value">Basic arithmetic operations</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Material</div>
                            <div class="spec-value">Plastic</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Additional Features</div>
                            <div class="spec-value">Equipped with memory buttons (M+, M-, MRC)</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-calculator"></i>
                </div>
                <h3 class="feature-title">Kalkulasi Cepat</h3>
                <p class="feature-description">Membantu perhitungan cepat dan akurat.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-square-root-variable"></i>
                </div>
                <h3 class="feature-title">Rumus Pintar</h3>
                <p class="feature-description">Cocok untuk kebutuhan rumus dan perhitungan ilmiah.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-hashtag"></i>
                </div>
                <h3 class="feature-title">Hitung Mudah</h3>
                <p class="feature-description">Sederhana untuk menghitung angka sehari-hari.</p>
            </div>
        </div>
        
        <div class="buttons-container">
            <a href="{{ route('katalog.index', ['kategoriSlug' => 'pendidikan']) }}" class="action-button back-button">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('home') }}" class="action-button home-button">
                <i class="fas fa-home"></i> Beranda
            </a>
        </div>
    </div>
@endsection
