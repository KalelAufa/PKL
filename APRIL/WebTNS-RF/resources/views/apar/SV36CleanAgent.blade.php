@extends('layouts.app')

@section('title', 'SV 36 Clean Agent - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>SV 36 Clean Agent</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-selector-container">
            <div class="model-selector">
                <label for="modelSelect"><strong>Model:</strong></label>
                <select id="modelSelect" onchange="updateSpecs()">
                    <option value="D 240 SV-36">D 240 SV-36</option>
                    <option value="D 840 SV-36">D 840 SV-36</option>
                    <option value="D 990 SV-36">D 990 SV-36</option>
                    <option value="D 1430 SV-36">D 1430 SV-36</option>
                </select>
            </div>
        </div>
        
        <div class="model-type-display" id="modelTypeDisplay">D 240 SV-36</div>
        
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/svapar.png') }}" alt="SV 36 Clean Agent Fire Extinguisher" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>SV 36 Clean Agent diciptakan untuk memberikan perlindungan yang efektif terhadap kebakaran kelas A, B, dan C. Dengan kapasitas mulai dari 1 kg hingga 6.5 kg, alat pemadam ini dirancang untuk memenuhi berbagai kebutuhan pemadaman kebakaran.</p>
                    <p>Menggunakan teknologi Clean Agent SV-36 yang ramah lingkungan dan sistem tekanan nitrogen untuk performa optimal.</p>
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
                            <div class="spec-label">Cylinder</div>
                            <div class="spec-value" id="cylinder">Without Welding (Tanpa Las)</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Discharge Distance</div>
                            <div class="spec-value" id="dischargeDistance">3 - 6 m</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Discharge Time</div>
                            <div class="spec-value" id="dischargeTime">8 s</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Total Height</div>
                            <div class="spec-value" id="totalHeight">310 mm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Total Width</div>
                            <div class="spec-value" id="totalWidth">130 mm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Tank Diameter</div>
                            <div class="spec-value" id="tankDiameter">90 mm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Operating Temperature</div>
                            <div class="spec-value" id="operatingTemp">-20 to 60 °C</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Working Pressure</div>
                            <div class="spec-value" id="workingPressure">7 bar</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Average Weight</div>
                            <div class="spec-value" id="averageWeight">2.1 kg</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Fire Rating</div>
                            <div class="spec-value" id="fireRating">5A.8B</div>
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
                    <i class="fas fa-leaf"></i>
                </div>
                <h3 class="feature-title">Ramah Lingkungan</h3>
                <p class="feature-description">Menggunakan Clean Agent SV-36 yang tidak merusak ozon dan ramah lingkungan</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-fire"></i>
                </div>
                <h3 class="feature-title">Multi-Kelas</h3>
                <p class="feature-description">Efektif untuk kebakaran kelas A, B, dan C termasuk peralatan listrik</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3 class="feature-title">Teknologi Nitrogen</h3>
                <p class="feature-description">Sistem tekanan nitrogen untuk performa pemadaman yang konsisten</p>
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
