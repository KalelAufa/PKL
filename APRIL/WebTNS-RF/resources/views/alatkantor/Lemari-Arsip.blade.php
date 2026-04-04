@extends('layouts.app')

@section('title', 'Lemari Arsip - Tricipta Niaga Sukses')

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
                <img src="{{ asset('images/lemariarsip.png') }}" alt="Lemari Arsip" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Lemari arsip digunakan untuk menyimpan dokumen penting agar tersusun rapi dan mudah diakses kapan saja.</p>
                    <p>Dengan material berkualitas tinggi dan sistem penguncian yang aman, lemari arsip kami memberikan solusi penyimpanan yang tahan lama dan terorganisir.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Material</div>
                            <div class="spec-value">Metal / Wood</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Weight</div>
                            <div class="spec-value">25 kg</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Locking System</div>
                            <div class="spec-value">Available</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Dimension</div>
                            <div class="spec-value">80x40x200</div>
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
                    <i class="fas fa-palette"></i>
                </div>
                <h3 class="feature-title">Pilihan Warna</h3>
                <p class="feature-description">Tersedia dalam berbagai warna untuk menyesuaikan interior</p>
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
