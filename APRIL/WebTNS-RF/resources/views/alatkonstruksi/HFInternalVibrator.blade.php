@extends('layouts.app')

@section('title', 'High Frequency Internal Vibrator - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>High Frequency Internal Vibrator</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-selector-container">
            <div class="model-selector">
                <label for="modelSelect"><strong>Model:</strong></label>
                <select id="modelSelect" onchange="updateSpecs()">
                    <option value="VHN 38">VHN 38</option>
                    <option value="VHP 50">VHP 50</option>
                    <option value="VHP 59">VHP 59</option>
                    <option value="VHR-R65">VHR-R65</option>
                </select>
            </div>
        </div>
        
        <div class="model-type-display" id="modelTypeDisplay">VHN 38</div>
        
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/vibrator.png') }}" alt="High Frequency Internal Vibrator" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Alat ini digunakan untuk memadatkan beton dengan getaran tinggi secara efisien. Cocok untuk proyek konstruksi besar seperti jembatan dan gedung bertingkat.</p>
                    <p>Dengan frekuensi tinggi dan kinerja yang konsisten, vibrator internal kami memberikan pemadatan optimal untuk menghasilkan beton berkualitas tinggi.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Model</div>
                            <div class="spec-value" id="model">VHN 38</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Centrifugal Force (CF)</div>
                            <div class="spec-value" id="cf">1700 N</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Rated Current</div>
                            <div class="spec-value" id="current">8 A</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Rated Power (42 V)</div>
                            <div class="spec-value" id="power">0.5 kW</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Action Diameter</div>
                            <div class="spec-value" id="diameter">45 cm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Noise Level</div>
                            <div class="spec-value" id="noise">70 dB A</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Compaction Power</div>
                            <div class="spec-value" id="compaction">20 m³/h</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-tachometer-alt"></i>
                </div>
                <h3 class="feature-title">Kinerja Tinggi</h3>
                <p class="feature-description">Frekuensi getaran tinggi untuk pemadatan beton yang lebih cepat dan efisien</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3 class="feature-title">Daya Tahan</h3>
                <p class="feature-description">Dibangun dengan material berkualitas tinggi untuk ketahanan jangka panjang</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-volume-mute"></i>
                </div>
                <h3 class="feature-title">Rendah Kebisingan</h3>
                <p class="feature-description">Desain khusus untuk mengurangi tingkat kebisingan selama operasi</p>
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
