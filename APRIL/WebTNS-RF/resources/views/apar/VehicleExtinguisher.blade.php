@extends('layouts.app')

@section('title', 'Vehicle Extinguisher - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Vehicle Extinguisher</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-selector-container">
            <div class="model-selector">
                <label for="modelSelect"><strong>Model:</strong></label>
                <select id="modelSelect" onchange="updateSpecs()">
                    <option value="D 240 Ve-Ex">D 240 Ve-Ex</option>
                    <option value="D 840 Ve-Ex">D 840 Ve-Ex</option>
                    <option value="D 990 Ve-Ex">D 990 Ve-Ex</option>
                    <option value="D 1430 Ve-Ex">D 1430 Ve-Ex</option>
                </select>
            </div>
        </div>
        
        <div class="model-type-display" id="modelTypeDisplay">D 240 Ve-Ex</div>
        
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/vex.png') }}" alt="Vehicle Extinguisher" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Vehicle Extinguisher (Ve-Ex) dirancang khusus untuk memberikan perlindungan optimal pada alat transportasi. Dengan kapasitas mulai dari 1 kg hingga 6.5 kg, alat pemadam ini sangat ideal untuk kendaraan pribadi maupun komersial.</p>
                    <p>Menggunakan Dry Chemical Powder PC ABC 90% yang efektif dan sistem tekanan nitrogen untuk performa pemadaman yang handal dalam berbagai kondisi.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Media</div>
                            <div class="spec-value" id="media">Dry Chemical Powder PC ABC 90% (UL')</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Type</div>
                            <div class="spec-value" id="type">Stored Pressure Nitrogen</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Capacity</div>
                            <div class="spec-value" id="capacity">1 Kg</div>
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
                            <div class="spec-label">Spray Distance (m)</div>
                            <div class="spec-value" id="dischargeDistance">2 - 5</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Minimum Spray Time (s)</div>
                            <div class="spec-value" id="dischargeTime">8</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Total Height (mm)</div>
                            <div class="spec-value" id="totalHeight">300</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Total Width (mm)</div>
                            <div class="spec-value" id="totalWidth">118</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Cylinder Diameter (mm)</div>
                            <div class="spec-value" id="tankDiameter">90</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Temperature (°C)</div>
                            <div class="spec-value" id="operatingTemp">-20 - 60</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Working Pressure</div>
                            <div class="spec-value" id="workingPressure">15 bar</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Average Total Weight (kg)</div>
                            <div class="spec-value" id="averageWeight">2</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Fire Rating</div>
                            <div class="spec-value" id="fireRating">5A.55B</div>
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
                    <i class="fas fa-car"></i>
                </div>
                <h3 class="feature-title">Khusus Kendaraan</h3>
                <p class="feature-description">Dirancang khusus untuk perlindungan optimal pada berbagai jenis kendaraan</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-fire-extinguisher"></i>
                </div>
                <h3 class="feature-title">Dry Chemical</h3>
                <p class="feature-description">Menggunakan Dry Chemical Powder PC ABC 90% yang sangat efektif</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Tekanan Nitrogen</h3>
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
