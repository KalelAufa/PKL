@extends('layouts.app')

@section('title', 'Globe - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Globe</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/globe.png') }}" alt="globe" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Globe ini merupakan alat edukasi yang menampilkan peta dunia secara tiga dimensi, sangat cocok digunakan untuk pembelajaran geografi di sekolah maupun sebagai dekorasi informatif di rumah dan kantor.</p>
                    <p>Globe ini hadir dengan desain elegan, cocok untuk mempercantik ruangan sekaligus membantu Anda memahami letak geografis negara-negara di dunia secara visual dan interaktif.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Material</div>
                            <div class="spec-value">Plastic</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Map Type</div>
                            <div class="spec-value">World Political Map</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Weight</div>
                            <div class="spec-value">1,1 kg</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-globe"></i>
                </div>
                <h3 class="feature-title">Desain Global</h3>
                <p class="feature-description">Desain modern dengan finishing halus yang memberikan kesan profesional dan stylish.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-circle-nodes"></i>
                </div>
                <h3 class="feature-title">Koneksi Luas</h3>
                <p class="feature-description">Mendukung keterhubungan yang lebih luas dengan sistem yang terintegrasi dan fleksibel.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-network-wired"></i>
                </div>
                <h3 class="feature-title">Operasi Senyap</h3>
                <p class="feature-description">Dilengkapi sistem peredam sehingga beroperasi dengan sangat tenang tanpa gangguan suara bising.</p>
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
