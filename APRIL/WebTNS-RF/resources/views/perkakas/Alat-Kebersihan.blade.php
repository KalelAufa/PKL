@extends('layouts.app')

@section('title', 'Alat Kebersihan - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Alat Kebersihan</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-selector-container">
            <div class="model-selector">
                <label for="modelSelect"><strong>Jenis: </strong></label>
                <select id="modelSelect" onchange="updateSpecs()">
                    <option value="sapu" selected>Sapu</option>
                    <option value="pel">Pel Lantai</option>
                    <option value="cikrak">Cikrak</option>
                </select>
            </div>
        </div>
        
        <div class="model-type-display" id="modelTypeDisplay">Sapu</div>
        
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/sapu.png') }}" alt="Sapu" class="product-image" id="alatImage">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Peralatan kebersihan digunakan untuk menjaga area kerja tetap bersih dan aman dari kotoran serta debu.</p>
                </div>
                
                <div class="specs-container" id="specContainer">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Type</div>
                            <div class="spec-value" id="type">Broom</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Material</div>
                            <div class="spec-value" id="material">Plastic and synthetic fibers</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Size</div>
                            <div class="spec-value" id="length">120 cm</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-broom"></i>
                </div>
                <h3 class="feature-title">Pembersih Efektif</h3>
                <p class="feature-description">Membersihkan berbagai jenis permukaan dengan efektif</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-hand-sparkles"></i>
                </div>
                <h3 class="feature-title">Higienis</h3>
                <p class="feature-description">Membantu menjaga kebersihan dan kesehatan lingkungan</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Daya Tahan</h3>
                <p class="feature-description">Dibuat dari material berkualitas untuk penggunaan jangka panjang</p>
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
