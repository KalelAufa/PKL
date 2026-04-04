@extends('layouts.app')

@section('title', 'Rak Sepatu - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Rak Sepatu</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/raksepatu.png') }}" alt="Rak Sepatu" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Rak sepatu ini dirancang untuk menyimpan dan menata sepatu Anda dengan rapi, cocok digunakan di rumah, sekolah, maupun kantor.</p>
                    <p>Dengan desain elegan, rak sepatu ini mempercantik ruangan sekaligus menjaga sepatu tetap terorganisir dan mudah diakses.</p>
                </div>
                
                <div class="specs-container">
                    Spesifikasi
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Type</div>
                            <div class="spec-value">-</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Material</div>
                            <div class="spec-value">-</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Size</div>
                            <div class="spec-value">-</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Features</div>
                            <div class="spec-value">-</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shoe-prints"></i>
                </div>
                <h3 class="feature-title">Kapasitas Luas</h3>
                <p class="feature-description">Mampu menampung banyak sepatu dengan rapi.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-box"></i>
                </div>
                <h3 class="feature-title">Tersusun Rapi</h3>
                <p class="feature-description">Membantu menjaga kerapian dan kebersihan ruangan.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-border-all"></i>
                </div>
                <h3 class="feature-title">Desain Kokoh</h3>
                <p class="feature-description">Struktur kuat dengan bahan berkualitas.</p>
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
