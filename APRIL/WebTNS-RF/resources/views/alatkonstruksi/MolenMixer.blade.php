@extends('layouts.app')

@section('title', 'Molen Mixer - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Molen Mixer</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/molenmixer.png') }}" alt="Molen Mixer" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Molen Mixer adalah alat untuk mencampur adukan beton, mortar, dan bahan bangunan lainnya dengan hasil yang homogen dan konsisten.</p>
                    <p>Dengan kapasitas yang bervariasi, alat ini cocok untuk berbagai skala proyek konstruksi dari kecil hingga besar, menjamin kualitas campuran yang optimal.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Machine Model</div>
                            <div class="spec-value">Horizontal 4-Stroke Diesel</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Combustion System</div>
                            <div class="spec-value">Direct Injection</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Intake System</div>
                            <div class="spec-value">Naturally Aspirated</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Total Cylinder</div>
                            <div class="spec-value">1</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Cooling System</div>
                            <div class="spec-value">Radiator</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Lubricant</div>
                            <div class="spec-value">SAE 40</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Fuel</div>
                            <div class="spec-value">Diesel</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Mixer Capacity</div>
                            <div class="spec-value">350 - 500 liter</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-mixer"></i>
                </div>
                <h3 class="feature-title">Pencampuran Optimal</h3>
                <p class="feature-description">Desain drum yang efisien untuk pencampuran bahan bangunan yang merata</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-cogs"></i>
                </div>
                <h3 class="feature-title">Daya Tahan Tinggi</h3>
                <p class="feature-description">Dibangun dengan material kuat untuk penggunaan intensif di proyek konstruksi</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-gas-pump"></i>
                </div>
                <h3 class="feature-title">Efisiensi Bahan Bakar</h3>
                <p class="feature-description">Mesin diesel irit bahan bakar dengan performa tinggi</p>
            </div>
        </div>
        
        <div class="buttons-container">
            <a href="{{ route('katalog.index', ['kategoriSlug' => 'alat-konstruksi']) }}" class="action-button back-button">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('home') }}" class="action-button home-button">
                <i class="fas fa-home"></i> Beranda
            </a>
        </div>
    </div>
@endsection
