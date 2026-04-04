@extends('layouts.app')

@section('title', 'Wet Chemical - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Wet Chemical</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-selector-container">
            <div class="model-selector">
                <label for="modelSelect"><strong>Model:</strong></label>
                <select id="modelSelect" onchange="updateSpecs()">
                    <option value="W 300 K">W 300 K</option>
                    <option value="W 600 K">W 600 K</option>
                    <option value="W 900 K">W 900 K</option>
                </select>
            </div>
        </div>
        
        <div class="model-type-display" id="modelTypeDisplay">W 300 K</div>
        
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/wet.png') }}" alt="Wet Chemical Fire Extinguisher" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>SERVVO Wet Chemical dikembangkan untuk memadamkan kelas kebakaran K, yaitu kebakaran di dapur yang disebabkan oleh minyak goreng.</p>
                    <p>Dengan formula khusus yang efektif untuk kebakaran minyak dan lemak, serta aman untuk peralatan dapur.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Media</div>
                            <div class="spec-value" id="media">Wet Chemical</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Type</div>
                            <div class="spec-value" id="type">Stored Pressure N2 (Nitrogen)</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Capacity</div>
                            <div class="spec-value" id="capacity">3 Liter</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Fire Class</div>
                            <div class="spec-value" id="fireClass">A, K</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Cylinder Tube</div>
                            <div class="spec-value" id="cylinder">Without Welding</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Spray Distance</div>
                            <div class="spec-value" id="dischargeDistance">2 - 7 meters</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Discharge Time</div>
                            <div class="spec-value" id="dischargeTime">9 s</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Height Total</div>
                            <div class="spec-value" id="totalHeight">445 mm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Width Total</div>
                            <div class="spec-value" id="totalWidth">268 mm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Tube Diameter</div>
                            <div class="spec-value" id="tankDiameter">130 mm</div>
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
                            <div class="spec-value" id="averageWeight">5.4 kg</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Fire Rating</div>
                            <div class="spec-value" id="fireRating">5A, 25K</div>
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
                    <i class="fas fa-utensils"></i>
                </div>
                <h3 class="feature-title">Khusus Dapur</h3>
                <p class="feature-description">Dirancang khusus untuk kebakaran kelas K di dapur dan restoran</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-oil-can"></i>
                </div>
                <h3 class="feature-title">Anti Minyak</h3>
                <p class="feature-description">Efektif memadamkan kebakaran minyak goreng dan lemak</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Aman Peralatan</h3>
                <p class="feature-description">Tidak merusak peralatan dapur setelah pemadaman</p>
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
