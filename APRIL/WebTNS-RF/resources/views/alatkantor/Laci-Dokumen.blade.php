@extends('layouts.app')

@section('title', 'Laci Dokumen - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Laci Dokumen</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/lacidokumen.png') }}" alt="Laci Kantor" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Laci digunakan untuk menyimpan dokumen atau peralatan kantor secara rapi dan aman.</p>
                    <p>Dengan desain yang ergonomis dan material berkualitas, laci kami memberikan solusi penyimpanan yang praktis dan tahan lama untuk kebutuhan kantor Anda.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Material</div>
                            <div class="spec-value">Metal</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Type</div>
                            <div class="spec-value">Office Furniture</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Locking System</div>
                            <div class="spec-value">Yes</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Dimension</div>
                            <div class="spec-value">Height 690 * Width 280</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-archive"></i>
                </div>
                <h3 class="feature-title">Penyimpanan Optimal</h3>
                <p class="feature-description">Desain laci yang luas untuk menyimpan berbagai dokumen dan peralatan kantor</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-lock"></i>
                </div>
                <h3 class="feature-title">Keamanan</h3>
                <p class="feature-description">Sistem penguncian yang aman untuk dokumen penting</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-ruler-combined"></i>
                </div>
                <h3 class="feature-title">Desain Ergonomis</h3>
                <p class="feature-description">Kemudahan akses dan penggunaan sehari-hari</p>
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
