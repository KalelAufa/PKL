@extends('layouts.app')

@section('title', 'FOAM AFFF 6% - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>FOAM AFFF 6%</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-selector-container">
            <div class="model-selector">
                <label for="modelSelect"><strong>Model:</strong></label>
                <select id="modelSelect" onchange="updateSpecs()">
                    <option value="F 600 AF3">F 600 AF3</option>
                    <option value="F 900 AF3">F 900 AF3</option>
                    <option value="F 3000 AF3">F 3000 AF3</option>
                    <option value="F 5000 AF3">F 5000 AF3</option>
                    <option value="F 9000 AF3">F 9000 AF3</option>
                </select>
            </div>
        </div>
        
        <div class="model-type-display" id="modelTypeDisplay">F 600 AF3</div>
        
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/foamapar.png') }}" alt="FOAM AFFF 6% Fire Extinguisher" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>FOAM AFFF 6% adalah alat pemadam api yang dirancang untuk memadamkan kebakaran kelas A (padat) dan kelas B (cairan mudah terbakar).</p>
                    <p>Dengan formula khusus yang membentuk lapisan pelindung, FOAM AFFF efektif mencegah nyala api kembali dan cocok untuk berbagai jenis kebakaran.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Media</div>
                            <div class="spec-value" id="media">FOAM AFFF 6%</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Type</div>
                            <div class="spec-value" id="type">Stored Pressure N2 (Nitrogen)</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Capacity</div>
                            <div class="spec-value" id="capacity">6 liter</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Fire Class</div>
                            <div class="spec-value" id="fireClass">A, B</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Cylinder</div>
                            <div class="spec-value" id="cylinder">Without Welding (Tanpa Las)</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Discharge Distance</div>
                            <div class="spec-value" id="dischargeDistance">4 - 8 m</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Discharge Time</div>
                            <div class="spec-value" id="dischargeTime">13 s</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Total Height</div>
                            <div class="spec-value" id="totalHeight">532 mm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Total Width</div>
                            <div class="spec-value" id="totalWidth">285 mm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Tank Diameter</div>
                            <div class="spec-value" id="tankDiameter">160 mm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Operating Temperature</div>
                            <div class="spec-value" id="operatingTemp">1 to 65 °C</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Working Pressure</div>
                            <div class="spec-value" id="workingPressure">15 bar</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Total Weight</div>
                            <div class="spec-value" id="totalWeight">9.5 kg</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Fire Rating</div>
                            <div class="spec-value" id="fireRating">8A.113B</div>
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
                    <i class="fas fa-fire-extinguisher"></i>
                </div>
                <h3 class="feature-title">Dual Protection</h3>
                <p class="feature-description">Efektif untuk kebakaran kelas A (padat) dan kelas B (cairan mudah terbakar)</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Lapisan Pelindung</h3>
                <p class="feature-description">Membentuk lapisan pelindung untuk mencegah nyala api kembali</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-temperature-high"></i>
                </div>
                <h3 class="feature-title">Suhu Operasi Optimal</h3>
                <p class="feature-description">Dapat beroperasi pada suhu 1°C hingga 65°C</p>
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
