@extends('layouts.app')

@section('title', 'Thermatic - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Thermatic</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-selector-container">
            <div class="model-selector">
                <label for="modelSelect"><strong>Model:</strong></label>
                <select id="modelSelect" onchange="updateSpecs()">
                    <option value="D 500 Thermatic">D 500 Thermatic</option>
                    <option value="D 1000 Thermatic">D 1000 Thermatic</option>
                    <option value="D 2000 Thermatic">D 2000 Thermatic</option>
                    <option value="D 3000 Thermatic">D 3000 Thermatic</option>
                </select>
            </div>
        </div>
        
        <div class="model-type-display" id="modelTypeDisplay">D 500 Thermatic</div>
        
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/thermatic.png') }}" alt="Thermatic Fire Extinguisher" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Thermatic adalah alat pemadam api yang dilengkapi dengan alat pendeteksi panas yang secara otomatis akan bekerja untuk mengeluarkan media ketika suhu mencapai 57°C.</p>
                    <p>Dengan sistem otomatis dan menggunakan Clean Agent SV-36, Thermatic memberikan perlindungan maksimal untuk ruangan yang membutuhkan sistem pemadaman otomatis.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Media</div>
                            <div class="spec-value" id="media">Clean Agent SV - 36</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Type</div>
                            <div class="spec-value" id="type">Stored Pressure N2 (Nitrogen)</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Capacity</div>
                            <div class="spec-value" id="capacity">5 kg</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Fire Class</div>
                            <div class="spec-value" id="fireClass">A, B, C</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Cylinder Tube</div>
                            <div class="spec-value" id="cylinder">With Welding</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Total Height (mm)</div>
                            <div class="spec-value" id="totalHeight">390</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Cylinder Diameter (mm)</div>
                            <div class="spec-value" id="tankDiameter">220</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Sprinkler Detector Temperature (°C)</div>
                            <div class="spec-value" id="detectorTemp">57</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Working Pressure</div>
                            <div class="spec-value" id="workingPressure">7 bar</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Average Total Weight (kg)</div>
                            <div class="spec-value" id="averageWeight">8.8</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Volume Protection</div>
                            <div class="spec-value" id="volumeProtection">27 m³</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Labeling</div>
                            <div class="spec-value" id="labeling">Screen Printing</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Finishing</div>
                            <div class="spec-value" id="finishing">COLOR: RED, UV RESISTANCE POWDER COATING</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-thermometer-half"></i>
                </div>
                <h3 class="feature-title">Sistem Otomatis</h3>
                <p class="feature-description">Aktif secara otomatis saat suhu mencapai 57°C tanpa perlu intervensi manusia</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-robot"></i>
                </div>
                <h3 class="feature-title">Deteksi Cerdas</h3>
                <p class="feature-description">Dilengkapi dengan sensor panas yang sensitif dan akurat</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Clean Agent</h3>
                <p class="feature-description">Menggunakan Clean Agent SV-36 yang ramah lingkungan dan efektif</p>
            </div>
        </div>
        
        <div class="buttons-container">
            <a href="{{ route('katalog.index', ['kategoriSlug' => 'apar']) }}" class="action-button back-button">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('home') }}" class="action-button home-button">
                <i class="fas fa-home"></i> Beranda
            </a>
        </div>
    </div>
@endsection
