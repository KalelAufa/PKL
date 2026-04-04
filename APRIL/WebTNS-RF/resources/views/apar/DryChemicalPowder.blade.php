@extends('layouts.app')

@section('title', 'Dry Chemical Powder - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Dry Chemical Powder</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-selector-container">
            <div class="model-selector">
                <label for="modelSelect"><strong>Model:</strong></label>
                <select id="modelSelect" onchange="updateSpecs()">
                    <option value="P100">P100</option>
                    <option value="P200">P200</option>
                    <option value="P300">P300</option>
                    <option value="P450">P450</option>
                    <option value="P600">P600</option>
                    <option value="P900">P900</option>
                    <option value="P1200">P1200</option>
                </select>
            </div>
        </div>
        
        <div class="model-type-display" id="modelTypeDisplay">P100</div>
        
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/powderapar.png') }}" alt="Dry Chemical Powder Fire Extinguisher" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Alat Pemadam Api Ringan (APAR) jenis Dry Chemical Powder efektif untuk memadamkan kebakaran kelas A, B, dan C. Menggunakan media Dry Chemical Powder PC ABC 90% yang aman dan efektif untuk berbagai jenis kebakaran termasuk cairan mudah terbakar dan peralatan listrik bertegangan.</p>
                    <p>Dengan teknologi nitrogen sebagai pendorong, alat ini memberikan performa optimal dalam berbagai kondisi.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Media</div>
                            <div class="spec-value" id="media">Dry Chemical Powder PC ABC 90% (UL)</div>
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
                            <div class="spec-value" id="dischargeDistance">2-5 m</div>
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
                            <div class="spec-value" id="workingPressure">15 bar</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Average Weight</div>
                            <div class="spec-value" id="averageWeight">2 kg</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Fire Rating</div>
                            <div class="spec-value" id="fireRating">5A:55B</div>
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
                    <i class="fas fa-fire"></i>
                </div>
                <h3 class="feature-title">Multi-Kelas</h3>
                <p class="feature-description">Efektif untuk kebakaran kelas A, B, dan C termasuk peralatan listrik bertegangan</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3 class="feature-title">Teknologi Nitrogen</h3>
                <p class="feature-description">Menggunakan nitrogen sebagai pendorong untuk performa optimal</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-temperature-low"></i>
                </div>
                <h3 class="feature-title">Rentang Suhu Luas</h3>
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
