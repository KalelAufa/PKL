@extends('layouts.app')

@section('title', 'Mesin Pembersih Gabah - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Mesin Pembersih Gabah</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-type-display">Mesin Pembersih Gabah</div>
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/gabah.png') }}" alt="Mesin Pembersih Gabah" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Mesin Pembersih Gabah adalah alat pertanian yang dirancang untuk membersihkan gabah dari kotoran, sekam, dan benda asing lainnya secara efisien. Dengan teknologi modern, mesin ini membantu petani meningkatkan kualitas gabah, mempercepat proses pembersihan, serta mengurangi tenaga kerja dan biaya operasional di area penggilingan padi.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">--</div>
                            <div class="spec-value">-</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">--</div>
                            <div class="spec-value">-</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">--</div>
                            <div class="spec-value">-</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">--</div>
                            <div class="spec-value">-</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-broom"></i>
                </div>
                <h3 class="feature-title">Pembersihan Optimal</h3>
                <p class="feature-description">Membersihkan gabah dengan efisien dan cepat</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-tachometer-alt"></i>
                </div>
                <h3 class="feature-title">Kecepatan Tinggi</h3>
                <p class="feature-description">Mampu membersihkan gabah dalam waktu singkat</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-industry"></i>
                </div>
                <h3 class="feature-title">Tahan Lama</h3>
                <p class="feature-description">Konstruksi kokoh dan awet untuk pemakaian jangka panjang</p>
            </div>
        </div>
        
        <div class="buttons-container">
            <a href="{{ route('katalog.index', ['kategoriSlug' => 'pertanian']) }}" class="action-button back-button">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('home') }}" class="action-button home-button">
                <i class="fas fa-home"></i> Beranda
            </a>
        </div>
    </div>
@endsection
