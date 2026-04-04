@extends('layouts.app')

@section('title', 'Jam Dinding - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Jam Dinding</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/jam.png') }}" alt="Jam Dinding" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Jam dinding merupakan alat penunjuk waktu yang dapat digunakan di rumah, kantor, atau ruang publik.</p>
                    <p>Dengan desain yang elegan, jam dinding kami cocok untuk mempercantik ruangan sekaligus membantu Anda mengatur waktu dengan lebih baik.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Diameter</div>
                            <div class="spec-value">14 inch</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Thickness</div>
                            <div class="spec-value">4 cm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Frame Color</div>
                            <div class="spec-value">Silver</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <h3 class="feature-title">Waktu Tepat</h3>
                <p class="feature-description">Menunjukkan waktu akurat sepanjang hari.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-battery-full"></i>
                </div>
                <h3 class="feature-title">Hemat Daya</h3>
                <p class="feature-description">Jam dinding tahan lama dengan konsumsi energi rendah.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-stopwatch"></i>
                </div>
                <h3 class="feature-title">Pengukur Waktu</h3>
                <p class="feature-description">Membantu melacak durasi secara presisi.</p>
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
