@extends('layouts.app')

@section('title', 'Gorden Lipat - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Gorden Lipat</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/gorden.png') }}" alt="Gorden Lipat" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Gorden lipat elegan kami menghadirkan perpaduan sempurna antara keindahan dan fungsi, dirancang untuk mempercantik interior rumah Anda sekaligus menghemat ruang. Dengan sistem lipat yang praktis, pemasangan dan perawatan menjadi mudah, sementara bahan berkualitas tinggi memberikan kesan mewah dan tahan lama. Cocok untuk berbagai gaya ruangan, gorden ini akan menjadi sentuhan akhir yang membuat rumah Anda tampak lebih rapi, nyaman, dan menawan."</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Material</div>
                            <div class="spec-value">Polyester</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Dimension</div>
                            <div class="spec-value">145x250 cm</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    <div class="feature-cards">
        <div class="feature-card">
            <div class="feature-icon">
                <i class="fa-solid fa-person-booth"></i>
            </div>
            <h3 class="feature-title">Privasi Maksimal</h3>
            <p class="feature-description">Memberikan perlindungan penuh dari pandangan luar.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">
                <i class="fa-solid fa-arrows-left-right"></i>
            </div>
            <h3 class="feature-title">Mudah Dilipat</h3>
            <p class="feature-description">Desain lipat praktis, mudah dibuka dan ditutup sesuai kebutuhan.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">
                <i class="fa-solid fa-swatchbook"></i>
            </div>
            <h3 class="feature-title">Pilihan Desain</h3>
            <p class="feature-description">Tersedia berbagai motif dan warna yang elegan.</p>
        </div>
    </div>

        
        <div class="buttons-container">
            <a href="{{ route('katalog.index', ['kategoriSlug' => 'alat-kantor']) }}" class="action-button back-button">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('home') }}" class="action-button home-button">
                <i class="fas fa-home"></i> Beranda
            </a>
        </div>
    </div>
@endsection
