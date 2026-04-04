@extends('layouts.app')

@section('title', 'Lemari Kantor - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Lemari Arsip</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/lemarikantor.png') }}" alt="Lemari Kantor" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Lemari kantor digunakan untuk menyimpan dokumen penting agar tersusun rapi dan mudah diakses kapan saja.</p>
                    <p>Dengan material berkualitas tinggi dan sistem penguncian yang aman, lemari kantor kami memberikan solusi penyimpanan yang tahan lama dan terorganisir.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Type</div>
                            <div class="spec-value">B - 204 G</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Length</div>
                            <div class="spec-value">88 cm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Height</div>
                            <div class="spec-value"> 183 cm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Width</div>
                            <div class="spec-value">45 cm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Weight</div>
                            <div class="spec-value">52.3 kg</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Color</div>
                            <div class="spec-value">Grey</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-box-open"></i>
                </div>
                <h3 class="feature-title">Kapasitas Besar</h3>
                <p class="feature-description">Dapat menyimpan hingga 50 folder dokumen dengan rapi</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-lock"></i>
                </div>
                <h3 class="feature-title">Keamanan</h3>
                <p class="feature-description">Dilengkapi sistem penguncian untuk keamanan dokumen</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-door-closed"></i>
                </div>
                <h3 class="feature-title">Pintu Berkaca</h3>
                <p class="feature-description">Lemari berkaca ganda dengan desain rapi, melindungi dokumen penting dari debu dan kerusakan.</p>
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
