@extends('layouts.app')

@section('title', 'SERVVO Fire Tubing - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>SERVVO Fire Tubing</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-selector-container">
            <div class="model-selector">
                <label for="modelSelect"><strong>Model:</strong></label>
                <select id="modelSelect" onchange="updateSpecs()">
                    <option value="SFT 240 SV-36">SFT 240 SV-36</option>
                    <option value="SFT 840 SV-36">SFT 840 SV-36</option>
                    <option value="SFT 990 SV-36">SFT 990 SV-36</option>
                    <option value="SFT 1430 SV-36">SFT 1430 SV-36</option>
                </select>
            </div>
        </div>
        
        <div class="model-type-display" id="modelTypeDisplay">SFT 240 SV-36</div>
        
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/sft.png') }}" alt="SERVVO Fire Tubing" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>SERVVO Fire Tubing adalah spot release fire extinguisher yang sangat handal dan dirancang khusus sebagai fire extinguisher tanpa operator.</p>
                    <p>Dengan teknologi Clean Agent SV-36 dan sistem tekanan nitrogen, produk ini memberikan perlindungan kebakaran otomatis yang efektif untuk berbagai kelas kebakaran.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Media</div>
                            <div class="spec-value" id="media">Clean Agent SV-36</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Type</div>
                            <div class="spec-value" id="type">Stored Pressure N2 (Nitrogen)</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Capacity</div>
                            <div class="spec-value" id="capacity">1 kg</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Fire Class</div>
                            <div class="spec-value" id="fireClass">A, B, C</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Tube Cylinder</div>
                            <div class="spec-value" id="cylinder">Without Welding (Tanpa Las)</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Height Total</div>
                            <div class="spec-value" id="heightTotal">293 mm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Tube Diameter</div>
                            <div class="spec-value" id="tubeDiameter">90 mm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Temperature</div>
                            <div class="spec-value" id="temperature">-20 to 60 °C</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Working Pressure</div>
                            <div class="spec-value" id="workingPressure">7 bar</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Average Weight</div>
                            <div class="spec-value" id="averageWeight">2.6 kg</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Protection Area</div>
                            <div class="spec-value" id="protectionArea">1 m²</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Hose Length</div>
                            <div class="spec-value" id="hoseLength">3 m</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Labeling</div>
                            <div class="spec-value" id="labeling">Screen Printing</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Finishing</div>
                            <div class="spec-value" id="finishing">Color: Red, UV Resistance Powder Coating</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-robot"></i>
                </div>
                <h3 class="feature-title">Operasi Otomatis</h3>
                <p class="feature-description">Dirancang sebagai fire extinguisher tanpa operator, bekerja secara otomatis saat terdeteksi kebakaran</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-fire-extinguisher"></i>
                </div>
                <h3 class="feature-title">Multi-Kelas</h3>
                <p class="feature-description">Efektif untuk kebakaran kelas A, B, dan C</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-temperature-low"></i>
                </div>
                <h3 class="feature-title">Suhu Ekstrim</h3>
                <p class="feature-description">Dapat beroperasi pada suhu -20°C hingga 60°C</p>
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
