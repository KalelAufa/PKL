@extends('layouts.app')

@section('title', 'Submersible Pump - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Submersible Pump</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/subpump.png') }}" alt="Submersible Pump" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Submersible Pump digunakan untuk menguras air dari area kerja konstruksi yang tergenang.</p>
                    <p>Dengan desain yang tahan air dan performa tinggi, pompa ini ideal untuk berbagai kebutuhan dewatering di lokasi konstruksi.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Power</div>
                            <div class="spec-value">0.75 - 5.5 kW</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Water Flow Rate</div>
                            <div class="spec-value">100 - 1000 L/min</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Maximum Head</div>
                            <div class="spec-value">10 - 30 meters</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Outlet Diameter</div>
                            <div class="spec-value">2 - 4 inch</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Type</div>
                            <div class="spec-value">Submersible</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-tint"></i>
                </div>
                <h3 class="feature-title">Kapasitas Besar</h3>
                <p class="feature-description">Kemampuan memompa air dengan volume besar secara efisien</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-water"></i>
                </div>
                <h3 class="feature-title">Tahan Air</h3>
                <p class="feature-description">Desain kedap air untuk operasional di bawah permukaan air</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3 class="feature-title">Daya Tahan</h3>
                <p class="feature-description">Konstruksi kokoh untuk penggunaan intensif di lokasi proyek</p>
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
