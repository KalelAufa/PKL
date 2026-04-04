@extends('layouts.app')

@section('title', 'SV-MED - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>SV-MED</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-selector-container">
            <div class="model-selector">
                <label for="modelSelect"><strong>Model:</strong></label>
                <select id="modelSelect" onchange="updateSpecs()">
                    <option value="D 110 SV-MED">D 110 SV-MED</option>
                    <option value="D 380 SV-MED">D 380 SV-MED</option>
                    <option value="D 450 SV-MED">D 450 SV-MED</option>
                    <option value="D 600 SV-MED">D 600 SV-MED</option>
                    <option value="D 900 SV-MED">D 900 SV-MED</option>
                    <option value="D 2270 SV-MED">D 2270 SV-MED</option>
                </select>
            </div>
        </div>
        
        <div class="model-type-display" id="modelTypeDisplay">D 110 SV-MED</div>
        
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/svmed.png') }}" alt="SV-MED Fire Extinguisher" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>SV-MED menjadi solusi ideal untuk mencegah dan memadamkan api pada kelas A, B, C. SERVVO SV-MED sudah Medical Grade sehingga sangat sesuai untuk rumah sakit, apotek, dan lab.</p>
                    <p>Dengan berbagai ukuran dari 1.1 kg hingga 22.7 kg, solusi ini memberikan perlindungan optimal untuk berbagai kebutuhan fasilitas medis.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Media</div>
                            <div class="spec-value" id="media">Clean Agent SV-MED</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Type</div>
                            <div class="spec-value" id="type">Stored Pressure N2 (Nitrogen)</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Capacity</div>
                            <div class="spec-value" id="capacity">1.1 kg</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Fire Class</div>
                            <div class="spec-value" id="fireClass">A, B, C</div>
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
                            <div class="spec-value" id="dischargeTime">8 s</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Height Total</div>
                            <div class="spec-value" id="totalHeight">300 mm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Width Total</div>
                            <div class="spec-value" id="totalWidth">130 mm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Tube Diameter</div>
                            <div class="spec-value" id="tankDiameter">90 mm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Temperature</div>
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
                            <div class="spec-value" id="finishing">COLOR: WHITE, UV RESISTANCE POWDER COATING</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-hospital"></i>
                </div>
                <h3 class="feature-title">Medical Grade</h3>
                <p class="feature-description">Khusus dirancang untuk fasilitas kesehatan seperti rumah sakit dan laboratorium</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Clean Agent</h3>
                <p class="feature-description">Tidak meninggalkan residu dan aman untuk peralatan medis</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-fire-extinguisher"></i>
                </div>
                <h3 class="feature-title">Multi-Kelas</h3>
                <p class="feature-description">Efektif untuk kebakaran kelas A, B, dan C termasuk peralatan medis</p>
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
