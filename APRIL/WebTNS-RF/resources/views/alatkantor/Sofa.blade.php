@extends('layouts.app')

@section('title', 'Sofa Kantor - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Sofa Kantor</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/alatkantor/sofa.png') }}" alt="Sofa Kantor Premium" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Sofa memberikan tempat duduk yang nyaman di ruang tunggu atau kantor.</p>
                    <p>Dengan desain modern dan material berkualitas tinggi, sofa kami menciptakan kesan profesional sekaligus nyaman untuk tamu dan klien Anda.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Material</div>
                            <div class="spec-value">Leather, Fabric, or Synthetic</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Sit Capacity</div>
                            <div class="spec-value">2 - 4 People</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Bearing Type</div>
                            <div class="spec-value">Foam or Spring</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Features</div>
                            <div class="spec-value">Armrest, Removable Cover, Modern Design</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-couch"></i>
                </div>
                <h3 class="feature-title">Nyaman</h3>
                <p class="feature-description">Bantalan empuk untuk kenyamanan maksimal</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-paint-brush"></i>
                </div>
                <h3 class="feature-title">Modern</h3>
                <p class="feature-description">Desain elegan untuk ruang profesional</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-broom"></i>
                </div>
                <h3 class="feature-title">Praktis</h3>
                <p class="feature-description">Cover yang bisa dilepas untuk perawatan mudah</p>
            </div>
        </div>
        
        <div class="buttons-container">
            <a href="{{ route('katalog.index', ['kategoriSlug' => 'alat-kantor']) }}" class="action-button back-button">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('home') }}" class="action-button home-button">
                <i class="fas fa-home"></i> Beranda
            </a>
        </div>
    </div>
@endsection
