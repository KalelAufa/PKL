@extends('layouts.app')

@section('title', 'Cat Interior - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Cat Interior</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/interior.png') }}" alt="Cat Interior" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Cat interior dirancang untuk memberikan tampilan yang halus dan tahan lama di dalam ruangan dengan berbagai pilihan warna.</p>
                    <p>Diformulasikan khusus untuk ruangan dalam dengan hasil akhir yang sempurna dan ramah lingkungan.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Type</div>
                            <div class="spec-value">Acrylic Emulsion</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Coverage</div>
                            <div class="spec-value">10 - 12 m²/liter</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Drying Time</div>
                            <div class="spec-value">1 - 2 hours</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Finishing</div>
                            <div class="spec-value">Doff, Satin, Glossy</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Features</div>
                            <div class="spec-value">Anti-fungal, stain resistant</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-paint-roller"></i>
                </div>
                <h3 class="feature-title">Aplikasi Mudah</h3>
                <p class="feature-description">Hasil sempurna dengan aplikasi yang mudah dan cepat kering</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-wind"></i>
                </div>
                <h3 class="feature-title">Ramah Lingkungan</h3>
                <p class="feature-description">Formula rendah VOC dan tidak berbau tajam</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-broom"></i>
                </div>
                <h3 class="feature-title">Mudah Dibersihkan</h3>
                <p class="feature-description">Permukaan yang tahan terhadap noda dan mudah dibersihkan</p>
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
