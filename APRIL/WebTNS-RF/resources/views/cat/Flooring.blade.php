@extends('layouts.app')

@section('title', 'Cat Flooring - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Cat Flooring</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/flooring.png') }}" alt="Cat Flooring" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Pelapis lantai berbasis epoxy untuk memberikan daya tahan tinggi terhadap beban berat dan zat kimia.</p>
                    <p>Solusi ideal untuk lantai industri, garasi, dan area komersial yang membutuhkan ketahanan ekstra.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Type</div>
                            <div class="spec-value">Epoxy Coating</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Coverage</div>
                            <div class="spec-value">5 - 7 m²/liter</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Thickness</div>
                            <div class="spec-value">200 - 300 micron</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Drying Time</div>
                            <div class="spec-value">6 - 8 hours</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Features</div>
                            <div class="spec-value">Anti-slip, Chemical resistant</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-weight-hanging"></i>
                </div>
                <h3 class="feature-title">Beban Berat</h3>
                <p class="feature-description">Tahan terhadap beban berat dan tekanan tinggi</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-flask"></i>
                </div>
                <h3 class="feature-title">Tahan Kimia</h3>
                <p class="feature-description">Proteksi terhadap tumpahan bahan kimia dan minyak</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shoe-prints"></i>
                </div>
                <h3 class="feature-title">Anti Slip</h3>
                <p class="feature-description">Tekstur khusus untuk mencegah tergelincir</p>
            </div>
        </div>
        
        <div class="buttons-container">
            <a href="{{ route('katalog.index', ['kategoriSlug' => 'cat']) }}" class="action-button back-button">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('home') }}" class="action-button home-button">
                <i class="fas fa-home"></i> Beranda
            </a>
        </div>
    </div>
@endsection
