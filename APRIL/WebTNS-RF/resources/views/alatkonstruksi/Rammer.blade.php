@extends('layouts.app')

@section('title', 'Rammer - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Rammer</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-selector-container">
            <div class="model-selector">
                <label for="modelSelect"><strong>Model:</strong></label>
                <select id="modelSelect" onchange="updateSpecs()">
                    <option value="gasoline" selected>Gasoline Tamping</option>
                    <option value="diesel">Diesel Tamping</option>
                    <option value="gasolinespain">Gasoline Tamping (Spain)</option>
                    <option value="gasolinejapan">Gasoline Tamping (Japan)</option>
                    <option value="dieseljapan">Diesel Tamping (Japan)</option>
                </select>
            </div>
        </div>
        
        <div class="model-type-display" id="modelTypeDisplay">Gasoline Tamping</div>
        
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/rammer.png') }}" alt="Rammer" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Alat untuk pemadatan tanah di area sempit, efektif dalam pemadatan mendalam.</p>
                    <p>Dengan desain yang kuat dan kinerja tinggi, rammer ini sangat ideal untuk berbagai aplikasi konstruksi jalan dan bangunan.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid" id="specsGrid">
                        <!-- Specifications will be generated dynamically -->
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-compress-arrows-alt"></i>
                </div>
                <h3 class="feature-title">Pemadatan Efisien</h3>
                <p class="feature-description">Mampu memadatkan tanah di area sempit dengan efektif</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3 class="feature-title">Tenaga Kuat</h3>
                <p class="feature-description">Daya pemadatan tinggi untuk hasil optimal</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Daya Tahan</h3>
                <p class="feature-description">Konstruksi kokoh untuk penggunaan jangka panjang</p>
            </div>
        </div>
        
        <div class="buttons-container">
            <a href="{{ route('katalog.index', ['kategoriSlug' => 'alat-konstruksi']) }}" class="action-button back-button">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('home') }}" class="action-button home-button">
                <i class="fas fa-home"></i> Beranda
            </a>
        </div>
    </div>
@endsection
