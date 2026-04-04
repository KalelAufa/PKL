@extends('layouts.app')

@section('title', 'Powerbank JETE A10 - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Powerbank JETE A10</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/powerbank.png') }}" alt="Powerbank JETE" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Powerbank JETE A10 merupakan sumber daya portabel yang dapat digunakan untuk mengisi daya perangkat elektronik saat bepergian.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi Teknis</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Kapasitas</div>
                            <div class="spec-value">10,000 mAh</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Output</div>
                            <div class="spec-value">Dual USB Output</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Input</div>
                            <div class="spec-value">Micro USB & Type-C</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Fitur</div>
                            <div class="spec-value">Fast Charging, LED Indicator</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Kompatibilitas</div>
                            <div class="spec-value">All USB-enabled devices</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-battery-full"></i>
                </div>
                <h3 class="feature-title">Kapasitas Besar</h3>
                <p class="feature-description">10,000 mAh untuk pengisian daya berkali-kali</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3 class="feature-title">Fast Charging</h3>
                <p class="feature-description">Teknologi pengisian cepat untuk perangkat</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-plug"></i>
                </div>
                <h3 class="feature-title">Dual Output</h3>
                <p class="feature-description">Dapat mengisi 2 perangkat sekaligus</p>
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
