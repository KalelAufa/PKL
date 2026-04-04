@extends('layouts.app')

@section('title', 'Tekina Shaft Vibrator - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Tekina Shaft Vibrator</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-selector-container">
            <div class="model-selector">
                <label for="modelSelect"><strong>Model:</strong></label>
                <select id="modelSelect" onchange="updateSpecs()">
                    <option value="jk284" selected>JK 28*4</option>
                    <option value="jk286">JK 28*6</option>
                    <option value="jk384">JK 38*4</option>
                    <option value="jk386">JK 38*6</option>
                    <option value="jk50">JK 50*6</option>
                    <option value="jk60">JK 60*6</option>
                    <option value="jk70">JK 70*6</option>
                    </select>
            </div>
        </div>
        
        <div class="model-type-display" id="modelTypeDisplay">JK 28*4</div>
        
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/vibrator.png') }}" alt="Tekina Shaft Vibrator" class="product-image" id="productImage">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Alat untuk pemadatan tanah di area sempit, efektif dalam pemadatan mendalam. Dirancang khusus untuk pekerjaan di ruang terbatas dengan kinerja optimal.</p>
                    <p>Dengan konstruksi yang kokoh dan desain ergonomis, vibrator shaft ini memberikan hasil pemadatan yang seragam dan tahan lama.</p>
                </div>
                
                <div class="specs-container" id="specsContainer" style="display: block;">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Type</div>
                            <div class="spec-value" id="type">JK 28*4</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Diameter Head</div>
                            <div class="spec-value" id="diameter">28 mm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Shaft Length</div>
                            <div class="spec-value" id="shaft">4 Meter</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Weight</div>
                            <div class="spec-value" id="weight">11 Kg</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-compress-arrows-alt"></i>
                </div>
                <h3 class="feature-title">Area Sempit</h3>
                <p class="feature-description">Dirancang khusus untuk pekerjaan di ruang terbatas dan sulit dijangkau</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-layer-group"></i>
                </div>
                <h3 class="feature-title">Pemadatan Mendalam</h3>
                <p class="feature-description">Mampu mencapai kedalaman pemadatan yang optimal</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-battery-full"></i>
                </div>
                <h3 class="feature-title">Daya Tahan</h3>
                <p class="feature-description">Konstruksi kokoh dengan material berkualitas tinggi</p>
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
