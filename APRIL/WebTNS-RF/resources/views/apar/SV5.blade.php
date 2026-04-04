@extends('layouts.app')

@section('title', 'SV-5 Solution - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>SV-5 Solution</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-selector-container">
            <div class="model-selector">
                <label for="modelSelect"><strong>Model:</strong></label>
                <select id="modelSelect" onchange="updateSpecs()">
                    <option value="B 60 SV-5">B 60 SV-5</option>
                    <option value="B 100 SV-5">B 100 SV-5</option>
                    <option value="B 300 SV-5">B 300 SV-5</option>
                    <option value="B 600 SV-5">B 600 SV-5</option>
                    <option value="B 900 SV-5">B 900 SV-5</option>
                    <option value="B 3000 SV-5">B 3000 SV-5</option>
                    <option value="B 5000 SV-5">B 5000 SV-5</option>
                </select>
            </div>
        </div>
        
        <div class="model-type-display" id="modelTypeDisplay">B 60 SV-5</div>
        
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/sv5.png') }}" alt="SV-5 Solution Fire Extinguisher" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>SV-5 Solution menjadi pilihan utama untuk kebakaran mulai dari sepeda motor listrik, mobil listrik termasuk bus dan truck bertenaga listrik.</p>
                    <p>Dengan berbagai ukuran dari 0.6 liter hingga 50 liter, solusi ini memberikan perlindungan optimal untuk berbagai kebutuhan kendaraan listrik.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Media</div>
                            <div class="spec-value" id="media">SV-5 Solution</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Type</div>
                            <div class="spec-value" id="type">Stored Pressure</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Capacity</div>
                            <div class="spec-value" id="capacity">0.6 liter</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Cylinder Tube</div>
                            <div class="spec-value" id="cylinder">Without Welding</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Spray Distance</div>
                            <div class="spec-value" id="dischargeDistance">2 - 5 m</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Discharge Time</div>
                            <div class="spec-value" id="dischargeTime">6 s</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Height Total</div>
                            <div class="spec-value" id="totalHeight">267 mm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Width Total</div>
                            <div class="spec-value" id="totalWidth">97 mm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Temperature</div>
                            <div class="spec-value" id="operatingTemp">1 - 65 °C</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Working Pressure</div>
                            <div class="spec-value" id="workingPressure">15 bar</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Average Weight</div>
                            <div class="spec-value" id="averageWeight">1.3 kg</div>
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
                    <i class="fas fa-bolt"></i>
                </div>
                <h3 class="feature-title">Khusus Kendaraan Listrik</h3>
                <p class="feature-description">Dirancang khusus untuk memadamkan kebakaran pada kendaraan listrik</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-fire-extinguisher"></i>
                </div>
                <h3 class="feature-title">SV-5 Solution</h3>
                <p class="feature-description">Formula khusus yang efektif untuk kebakaran baterai lithium</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-car"></i>
                </div>
                <h3 class="feature-title">Berbagai Ukuran</h3>
                <p class="feature-description">Tersedia dalam 7 ukuran untuk berbagai jenis kendaraan</p>
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
