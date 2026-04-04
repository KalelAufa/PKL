@extends('layouts.app')

@section('title', 'Meja dan Kursi Siswa - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Meja dan Kursi Kelas</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-type-display">Classic Student Set</div>
        
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/mejakursi.png') }}" alt="Meja dan Kursi Siswa" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Produk ini dirancang untuk mendukung kegiatan pendidikan dan pembelajaran di sekolah atau lembaga pendidikan lainnya.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Material</div>
                            <div class="spec-value">Metal, wood</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Finishing</div>
                            <div class="spec-value">Powder coating</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Table Dimensions</div>
                            <div class="spec-value">60 x 40 x 75 cm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Chair Dimensions</div>
                            <div class="spec-value">36 x 36 x 44 cm</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-chair"></i>
                </div>
                <h3 class="feature-title">Ergonomis</h3>
                <p class="feature-description">Desain yang nyaman untuk penggunaan jangka panjang</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Tahan Lama</h3>
                <p class="feature-description">Material kuat dan tahan lama untuk penggunaan intensif</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-school"></i>
                </div>
                <h3 class="feature-title">Mendukung Pembelajaran</h3>
                <p class="feature-description">Mendukung lingkungan belajar yang optimal</p>
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
