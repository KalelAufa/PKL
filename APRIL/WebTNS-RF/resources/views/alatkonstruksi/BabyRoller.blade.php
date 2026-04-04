@extends('layouts.app')

@section('title', 'Baby Roller - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Baby Roller</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/babyroler.png') }}" alt="Baby Roller" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Baby Roller adalah alat pemadat tanah atau aspal yang dirancang khusus untuk area sempit seperti gang, trotoar, dan pinggir jalan.</p>
                    <p>Dengan ukuran yang kompak namun kinerja tinggi, alat ini sangat ideal untuk pekerjaan pemadatan di lokasi yang sulit dijangkau roller besar.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Type</div>
                            <div class="spec-value">Walk Behind Double Drum Roller</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Operating Weight</div>
                            <div class="spec-value">600 - 700 kg</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Drum Width</div>
                            <div class="spec-value">600 - 700 mm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Engine Power</div>
                            <div class="spec-value">5 - 7 HP</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Starter System</div>
                            <div class="spec-value">Manual / Electric Start</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Vibration System</div>
                            <div class="spec-value">Vibratory (Centrifugal Force)</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-road"></i>
                </div>
                <h3 class="feature-title">Mudah Manuver</h3>
                <p class="feature-description">Desain kompak untuk akses mudah di area sempit dan sulit dijangkau</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-tachometer-alt"></i>
                </div>
                <h3 class="feature-title">Kinerja Optimal</h3>
                <p class="feature-description">Sistem getaran centrifugal force untuk pemadatan maksimal</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-compress-arrows-alt"></i>
                </div>
                <h3 class="feature-title">Pemadatan Efisien</h3>
                <p class="feature-description">Dual drum dengan tekanan tinggi untuk hasil pemadatan sempurna</p>
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
