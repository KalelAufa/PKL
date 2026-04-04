@extends('layouts.app')

@section('title', 'Carbon Dioxide - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Carbon Dioxide</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-selector-container">
            <div class="model-selector">
                <label for="modelSelect"><strong>Model:</strong></label>
                <select id="modelSelect" onchange="updateSpecs()">
                    <option value="C 200 CO2">C 200 CO2</option>
                    <option value="C 500 CO2">C 500 CO2</option>
                    <option value="C 680 CO2">C 680 CO2</option>
                    <option value="C 900 CO2">C 900 CO2</option>
                    <option value="C 2300 CO2">C 2300 CO2</option>
                    <option value="C 4500 CO2">C 4500 CO2</option>
                </select>
            </div>
        </div>
        
        <div class="model-type-display" id="modelTypeDisplay">C 200 CO2</div>
        
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/carbonapar.png') }}" alt="Carbon Dioxide Fire Extinguisher" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Alat Pemadam Api Ringan (APAR) jenis Carbon Dioxide (CO2) dirancang untuk memadamkan kebakaran kelas B dan C, terutama yang melibatkan cairan mudah terbakar dan peralatan listrik.</p>
                    <p>CO2 efektif karena tidak meninggalkan residu, sehingga aman digunakan pada peralatan elektronik dan lingkungan yang membutuhkan kebersihan tinggi.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Media</div>
                            <div class="spec-value" id="media">Carbon Dioxide (CO2)</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Type</div>
                            <div class="spec-value" id="type">Self Pressure</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Capacity</div>
                            <div class="spec-value" id="capacity">2 kg</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Fire Class</div>
                            <div class="spec-value" id="fireClass">B, C</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Cylinder</div>
                            <div class="spec-value" id="cylinder">Without Welding (Tanpa Las)</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Discharge Distance</div>
                            <div class="spec-value" id="dischargeDistance">2 - 3 m</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Discharge Time</div>
                            <div class="spec-value" id="dischargeTime">9 s</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Total Height</div>
                            <div class="spec-value" id="totalHeight">525 mm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Total Width</div>
                            <div class="spec-value" id="totalWidth">175 mm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Tank Diameter</div>
                            <div class="spec-value" id="tankDiameter">114 mm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Operating Temperature</div>
                            <div class="spec-value" id="operatingTemp">-20 to 60 °C</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Working Pressure</div>
                            <div class="spec-value" id="workingPressure">70 bar</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Total Weight</div>
                            <div class="spec-value" id="totalWeight">7.6 kg</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Fire Rating</div>
                            <div class="spec-value" id="fireRating">21B</div>
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
                <h3 class="feature-title">Bebas Residu</h3>
                <p class="feature-description">Tidak meninggalkan residu setelah digunakan, ideal untuk peralatan elektronik dan lingkungan sensitif</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-plug"></i>
                </div>
                <h3 class="feature-title">Aman untuk Elektronik</h3>
                <p class="feature-description">Dapat digunakan dengan aman pada kebakaran yang melibatkan peralatan listrik</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-temperature-low"></i>
                </div>
                <h3 class="feature-title">Suhu Operasi Luas</h3>
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
