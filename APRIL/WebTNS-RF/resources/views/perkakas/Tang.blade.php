@extends('layouts.app')

@section('title', 'Tang - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Tang</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-type-display">Tang Kombinasi</div>
        
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/tang.png') }}" alt="Tang" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Tang adalah perkakas tangan yang digunakan untuk mencengkeram, membengkokkan, atau memotong kabel dan benda kecil. Tang umumnya digunakan dalam pekerjaan listrik dan mekanik.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Type</div>
                            <div class="spec-value">Combination</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Material</div>
                            <div class="spec-value">Stainless steel with insulated handle</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Length</div>
                            <div class="spec-value">6 – 10 inches</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Features</div>
                            <div class="spec-value">Anti-slip handle, Wire cutter, Insulated handle</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3 class="feature-title">Insulasi Aman</h3>
                <p class="feature-description">Pegangan berinsulasi untuk pekerjaan listrik yang aman</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-cut"></i>
                </div>
                <h3 class="feature-title">Multi Fungsi</h3>
                <p class="feature-description">Dapat mencengkeram, memotong, dan membengkokkan</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Daya Tahan</h3>
                <p class="feature-description">Dibuat dari stainless steel berkualitas tinggi</p>
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
