@extends('layouts.app')

@section('title', 'Frequency Converter - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Frequency Converter</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-selector-container">
            <div class="model-selector">
                <label for="modelSelect"><strong>Model:</strong></label>
                <select id="modelSelect" onchange="updateSpecs()">
                    <option value="CMM11">CMM11</option>
                    <option value="CMM15">CMM15</option>
                    <option value="CMM25">CMM25</option>
                    <option value="CMT25">CMT25</option>
                    <option value="CMT35">CMT35</option>
                    <option value="CMT55">CMT55</option>
                    <option value="CMT85">CMT85</option>
                </select>
            </div>
        </div>
        
        <div class="model-type-display" id="modelTypeDisplay">CMM11</div>
        
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/freq.png') }}" alt="Frequency Converter" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Alat ini digunakan untuk mengubah frekuensi listrik agar alat bisa beroperasi pada frekuensi tertentu.</p>
                    <p>Dengan desain yang kuat dan kinerja tinggi, frequency converter ini sangat ideal untuk berbagai aplikasi industri dan konstruksi.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Model</div>
                            <div class="spec-value" id="model">CMM11</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Frame (type)</div>
                            <div class="spec-value" id="frame">Handle</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Outlets</div>
                            <div class="spec-value" id="outlets">1</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Supply Electric Cable (m)</div>
                            <div class="spec-value" id="cable">3.5 m</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Weight</div>
                            <div class="spec-value" id="weight">17 kg</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3 class="feature-title">Konversi Presisi</h3>
                <p class="feature-description">Mengubah frekuensi listrik dengan akurasi tinggi untuk operasi optimal</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-cog"></i>
                </div>
                <h3 class="feature-title">Kinerja Tinggi</h3>
                <p class="feature-description">Desain kokoh untuk penggunaan industri berat</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Keamanan</h3>
                <p class="feature-description">Sistem proteksi lengkap untuk peralatan dan operator</p>
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
