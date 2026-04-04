@extends('layouts.app')

@section('title', 'Boat Shaft - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Boat Shaft</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-type-display">Boat Shaft</div>
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/boatshaft.png') }}" alt="Boat Shaft" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Boat shaft adalah poros penggerak yang digunakan untuk mentransmisikan tenaga dari mesin ke baling-baling kapal. Komponen ini sangat penting untuk memastikan kapal dapat bergerak dengan efisien dan stabil di air.</p>
                    <p>Boat shaft tersedia dalam berbagai ukuran dan material, dirancang untuk tahan terhadap korosi dan beban berat di lingkungan laut. Cocok digunakan pada berbagai jenis kapal, dari kapal kecil hingga kapal besar.</p>
                </div>
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Type</div>
                            <div class="spec-value">-</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Base Material</div>
                            <div class="spec-value">-</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Durability</div>
                            <div class="spec-value">-</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Color</div>
                            <div class="spec-value">-</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Application Area</div>
                            <div class="spec-value">-</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Application Method</div>
                            <div class="spec-value">-</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Tahan Korosi</h3>
                <p class="feature-description">Material yang digunakan memiliki ketahanan tinggi terhadap korosi, ideal untuk lingkungan laut.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-sun"></i>
                </div>
                <h3 class="feature-title">Daya Tahan Tinggi</h3>
                <p class="feature-description">Mampu tahan terhadap suhu tinggi dan tekanan, memastikan kinerja optimal.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <h3 class="feature-title">Umur Panjang</h3>
                <p class="feature-description">Dirancang untuk ketahanan jangka panjang, mengurangi frekuensi penggantian.</p>
            </div>
        </div>
        
        <div class="buttons-container">
            <a href="{{ route('katalog.index', ['kategoriSlug' => 'perikanan']) }}" class="action-button back-button">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('home') }}" class="action-button home-button">
                <i class="fas fa-home"></i> Beranda
            </a>
        </div>
    </div>
@endsection
