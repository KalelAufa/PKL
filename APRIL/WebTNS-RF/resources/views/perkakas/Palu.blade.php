@extends('layouts.app')

@section('title', 'Palu - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Palu</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-type-display">Palu Cakar</div>
        
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/palu.png') }}" alt="Palu" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Palu cakar dirancang untuk memberikan kekuatan maksimal dan kenyamanan saat digunakan. Cocok untuk kebutuhan konstruksi, renovasi, maupun perbaikan rumah Anda.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Type</div>
                            <div class="spec-value">Claw Hammer</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Head Material</div>
                            <div class="spec-value">High Carbon Steel</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Handle</div>
                            <div class="spec-value">Wood, Fiberglass, or Metal</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Weight</div>
                            <div class="spec-value">200g – 1.5kg</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Features</div>
                            <div class="spec-value">Anti-slip grip, Shock absorber</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-hammer"></i>
                </div>
                <h3 class="feature-title">Multi Fungsi</h3>
                <p class="feature-description">Dapat digunakan untuk berbagai keperluan konstruksi dan perbaikan</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Daya Tahan</h3>
                <p class="feature-description">Dibuat dari material berkualitas tinggi untuk ketahanan maksimal</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-hand-paper"></i>
                </div>
                <h3 class="feature-title">Nyaman Digunakan</h3>
                <p class="feature-description">Desain ergonomis untuk kenyamanan penggunaan jangka panjang</p>
            </div>
        </div>
        
        <div class="buttons-container">
            <a href="{{ route('katalog.index', ['kategoriSlug' => 'perkakas']) }}" class="action-button back-button">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('home') }}" class="action-button home-button">
                <i class="fas fa-home"></i> Beranda
            </a>
    </div>
    </div>
@endsection
