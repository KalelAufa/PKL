@extends('layouts.app')

@section('title', 'Kursi Kantor - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Kursi Kantor</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/alatkantor/kursi.png') }}" alt="Kursi Kantor Ergonomis" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Kursi kantor dirancang untuk kenyamanan saat duduk bekerja dalam waktu lama.</p>
                    <p>Dengan dukungan lumbar dan material berkualitas, kursi ini memberikan kenyamanan optimal untuk produktivitas kerja seharian.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Material</div>
                            <div class="spec-value">Mesh, Leather, or Cloth</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Height Adjustable</div>
                            <div class="spec-value">Yes</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Features</div>
                            <div class="spec-value">Armrest, Back Support, Wheels</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-spa"></i>
                </div>
                <h3 class="feature-title">Ergonomis</h3>
                <p class="feature-description">Desain nyaman untuk duduk lama</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-undo-alt"></i>
                </div>
                <h3 class="feature-title">Fleksibel</h3>
                <p class="feature-description">Putaran 360° untuk mobilitas</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-cogs"></i>
                </div>
                <h3 class="feature-title">Adjustable</h3>
                <p class="feature-description">Tinggi dan sandaran dapat disesuaikan</p>
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
