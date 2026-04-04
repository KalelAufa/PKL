@extends('layouts.app')

@section('title', 'Engine Vibrator - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Engine Vibrator</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-selector-container">
            <div class="model-selector">
                <label for="modelSelect"><strong>Engine:</strong></label>
                <select id="modelSelect" onchange="updateSpecs()">
                    <option value="china" selected>Engine China</option>
                    <option value="diesel">Engine Diesel</option>
                    <option value="honda">Engine Honda</option>
                    <option value="robin">Engine Robin</option>
                    <option value="honda2">Engine Honda</option>
                </select>
            </div>
        </div>
        
        <div class="model-type-display" id="modelTypeDisplay">Engine China</div>
        
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/enginevib.png') }}" alt="Engine Vibrator" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Solusi andal untuk memadatkan beton dengan getaran bertenaga mesin yang stabil dan efisien.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Type</div>
                            <div class="spec-value" id="type">Engine China</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Weight</div>
                            <div class="spec-value" id="weight">30 kg</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Dimension</div>
                            <div class="spec-value" id="dimension">460 x 460 x 510</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-wave-square"></i>
                </div>
                <h3 class="feature-title">Getaran Kuat</h3>
                <p class="feature-description">Menghasilkan getaran yang stabil untuk pemadatan beton optimal</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-cog"></i>
                </div>
                <h3 class="feature-title">Kinerja Tinggi</h3>
                <p class="feature-description">Mesin bertenaga untuk hasil pemadatan yang lebih baik</p>
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
