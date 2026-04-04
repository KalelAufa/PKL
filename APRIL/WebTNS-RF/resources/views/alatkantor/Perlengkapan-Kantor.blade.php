@extends('layouts.app')

@section('title', 'Perlengkapan Kantor - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Perlengkapan Kantor</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-selector-container">
            <div class="model-selector">
                <label for="modelSelect"><strong>Jenis:</strong></label>
                <select id="modelSelect" onchange="updateSpecs()">
                    <option value="pen">Pulpen</option>
                    <option value="notebook">Notebook</option>
                    <option value="calculator">Kalkulator</option>
                    <option value="stapler">Stapler</option>
                </select>
            </div>
        </div>
        
        <div class="model-type-display" id="modelTypeDisplay">Pulpen Standard</div>
        
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/pulpen1.png') }}" alt="Pulpen" class="product-image" id="alatImage">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Perlengkapan kantor membantu kelancaran pekerjaan administrasi dan operasional harian di lingkungan kerja.</p>
                    <p>Pulpen standard kami memberikan pengalaman menulis yang nyaman dengan tinta berkualitas tinggi.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Product Type</div>
                            <div class="spec-value" id="type">Pulpen Standard</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Material</div>
                            <div class="spec-value" id="material">Plastic, Ink</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Function</div>
                            <div class="spec-value" id="function">Writing tool for documents</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Features</div>
                            <div class="spec-value" id="features">Quick-drying ink, comfortable grip</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h3 class="feature-title">Kualitas Terjamin</h3>
                <p class="feature-description">Produk dengan standar kualitas tinggi untuk kebutuhan kantor</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-briefcase"></i>
                </div>
                <h3 class="feature-title">Profesional</h3>
                <p class="feature-description">Mendukung produktivitas kerja profesional</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-thumbs-up"></i>
                </div>
                <h3 class="feature-title">Daya Tahan</h3>
                <p class="feature-description">Desain ergonomis dan tahan lama</p>
            </div>
        </div>
        
        <div class="buttons-container">
            <a href="{{ route('katalog.index', ['kategoriSlug' => 'alat-elektronik']) }}" class="action-button back-button">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('home') }}" class="action-button home-button">
                <i class="fas fa-home"></i> Beranda
            </a>
        </div>
    </div>
@endsection
