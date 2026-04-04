@extends('layouts.app')

@section('title', 'Alat Keselamatan Kerja - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Alat Keselamatan Kerja</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-selector-container">
            <div class="model-selector">
                <label for="modelSelect"><strong>Jenis: </strong></label>
                <select id="modelSelect" onchange="updateSpecs()">
                    <option value="helm" selected>Helm Proyek</option>
                    <option value="sepatu">Sepatu Safety</option>
                    <option value="sarung">Sarung Tangan</option>
                    <option value="rompi">Rompi Safety</option>
                </select>
            </div>
        </div>
        
        <div class="model-type-display" id="modelTypeDisplay">Helm Proyek</div>
        
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/helm.png') }}" alt="Helm Proyek" class="product-image" id="alatImage">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Alat pelindung diri sangat penting untuk memastikan keselamatan pekerja dari bahaya fisik dan kecelakaan di tempat kerja.</p>
                </div>
                
                <div class="specs-container" id="specContainer">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Type</div>
                            <div class="spec-value" id="type">Safety Helmet</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Material</div>
                            <div class="spec-value" id="material">ABS Plastic</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Standard</div>
                            <div class="spec-value" id="standard">SNI ISO 3873:2012</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Features</div>
                            <div class="spec-value" id="features">Adjustable strap, inner padding</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-hard-hat"></i>
                </div>
                <h3 class="feature-title">Perlindungan Optimal</h3>
                <p class="feature-description">Melindungi kepala dari benturan dan benda jatuh</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Standar Tinggi</h3>
                <p class="feature-description">Memenuhi standar keselamatan internasional</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-user-check"></i>
                </div>
                <h3 class="feature-title">Nyaman Dipakai</h3>
                <p class="feature-description">Desain ergonomis untuk kenyamanan pengguna</p>
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
