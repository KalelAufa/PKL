@extends('layouts.app')

@section('title', 'Locker Kantor - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Locker Penyimpanan</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/alatkantor/locker.png') }}" alt="Locker Penyimpanan" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Locker digunakan untuk menyimpan barang pribadi karyawan atau siswa dengan aman dan tertata.</p>
                    <p>Dengan konstruksi kokoh dari baja powder coated, locker kami memberikan solusi penyimpanan yang aman dan tahan lama untuk berbagai kebutuhan.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Material</div>
                            <div class="spec-value">Steel Powder Coated</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Number of Compartments</div>
                            <div class="spec-value">4 - 12</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Key Type</div>
                            <div class="spec-value">Padlock / Built-in Key</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Color</div>
                            <div class="spec-value">Blue, Gray</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-lock"></i>
                </div>
                <h3 class="feature-title">Keamanan</h3>
                <p class="feature-description">Sistem penguncian yang andal</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-boxes"></i>
                </div>
                <h3 class="feature-title">Spasial</h3>
                <p class="feature-description">Berbagai ukuran kompartemen</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Durable</h3>
                <p class="feature-description">Material kuat dan tahan lama</p>
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
