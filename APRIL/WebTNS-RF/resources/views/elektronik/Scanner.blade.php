@extends('layouts.app')

@section('title', 'Scanner A3 - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Scanner A3</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/scanner.png') }}" alt="Scanner A3" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Scanner ini mampu memindai dokumen hingga ukuran A3 dengan kualitas tinggi untuk kebutuhan arsip dan digitalisasi dokumen penting.</p>
                    <p>Dilengkapi dengan sensor CCD canggih dan resolusi optik tinggi untuk hasil pindaian yang tajam dan detail.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Scan Size</div>
                            <div class="spec-value">Up to A3 (297 × 420 mm)</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Resolution</div>
                            <div class="spec-value">2.400 × 4.800 dpi</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Censor</div>
                            <div class="spec-value">3-color, 6-line CCD with large pixel size</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Media Support</div>
                            <div class="spec-value">35mm film up to A3 transparencies</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Superior Features</div>
                            <div class="spec-value">Optical Auto Focus for clearer, sharper images</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-expand"></i>
                </div>
                <h3 class="feature-title">Ukuran Besar</h3>
                <p class="feature-description">Mampu memindai dokumen hingga ukuran A3 dengan kualitas tinggi</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-search-plus"></i>
                </div>
                <h3 class="feature-title">Resolusi Tinggi</h3>
                <p class="feature-description">Resolusi optik hingga 4.800 dpi untuk detail maksimal</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-camera"></i>
                </div>
                <h3 class="feature-title">Sensor CCD</h3>
                <p class="feature-description">Sensor canggih untuk reproduksi warna yang akurat</p>
            </div>
        </div>
        
        <div class="buttons-container">
            <a href="{{ route('katalog.index', ['kategoriSlug' => 'alat-elektronik']) }}" class="action-button back-button">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('home') }}" class="action-button home-button">
                <i class="fas fa-home"></i> Beranda
            </a>
        </div>
    </div>
@endsection
