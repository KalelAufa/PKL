@extends('layouts.app')

@section('title', 'Headphone - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Headphone</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/hetset.png') }}" alt="Headphone" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Headphone berkualitas tinggi dengan suara jernih dan bass yang dalam.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Model</div>
                            <div class="spec-value">Lenovo Thinkplus th10</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Cable Connection</div>
                            <div class="spec-value">3.5mm audio cable</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Bluetooth</div>
                            <div class="spec-value">5.0</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Driver Unit</div>
                            <div class="spec-value">40mm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Battery Capacity</div>
                            <div class="spec-value">300 mAh</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Charging Interface</div>
                            <div class="spec-value">USB</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-tachometer-alt"></i>
                </div>
                <h3 class="feature-title">Performa</h3>
                <p class="feature-description">Performa tinggi dengan latensi rendah.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-headphones"></i>
                </div>
                <h3 class="feature-title">Hasil Suara</h3>
                <p class="feature-description">Suara jernih dan bass yang dalam.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-battery-full"></i>
                </div>
                <h3 class="feature-title">Pengisian Daya</h3>
                <p class="feature-description">Pengisian daya cepat dan efisien.</p>
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
