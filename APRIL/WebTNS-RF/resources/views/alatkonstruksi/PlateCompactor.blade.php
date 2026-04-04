@extends('layouts.app')

@section('title', 'Plate Compactor - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Plate Compactor</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/platcom.png') }}" alt="Plate Compactor" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Plate Compactor adalah alat pemadat tanah atau aspal yang dirancang untuk menghasilkan permukaan yang rata dan padat.</p>
                    <p>Dengan getaran yang kuat dan plat dasar yang kokoh, alat ini sangat efektif untuk memadatkan material granular seperti tanah, kerikil, dan aspal.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Weight</div>
                            <div class="spec-value">80 - 100 kg</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Power</div>
                            <div class="spec-value">5.5 HP</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Plate Width</div>
                            <div class="spec-value">50 - 60 cm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Frequency</div>
                            <div class="spec-value">90 Hz</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Machine Type</div>
                            <div class="spec-value">Gasoline / Diesel</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Centrifugal Force</div>
                            <div class="spec-value">15 - 20 kN</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-compress-alt"></i>
                </div>
                <h3 class="feature-title">Pemadatan Optimal</h3>
                <p class="feature-description">Getaran kuat dengan frekuensi tinggi untuk hasil pemadatan maksimal</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-tachometer-alt"></i>
                </div>
                <h3 class="feature-title">Kinerja Tinggi</h3>
                <p class="feature-description">Daya 5.5 HP untuk pekerjaan pemadatan yang cepat dan efisien</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-user-shield"></i>
                </div>
                <h3 class="feature-title">Pengoperasian Nyaman</h3>
                <p class="feature-description">Handle ergonomis dan sistem anti getaran untuk kenyamanan operator</p>
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
