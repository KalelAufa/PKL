@extends('layouts.app')

@section('title', 'Rompi Safety Kapal - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Rompi Safety Kapal</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-type-display">Rompi Safety Kapal</div>
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/rompisafety.png') }}" alt="Rompi Safety" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Rompi safety kapal adalah alat pelindung diri yang wajib digunakan saat beraktivitas di atas air untuk menjaga keselamatan penumpang dan awak kapal. Rompi ini dirancang agar tetap mengapung dan mudah dikenakan.</p>
                    <p>Terbuat dari bahan berkualitas yang tahan air dan nyaman dipakai, rompi safety kapal cocok digunakan untuk berbagai jenis kapal/perahu dan aktivitas air, seperti memancing, wisata, atau transportasi.</p>
                </div>
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Type</div>
                            <div class="spec-value">-</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Base Material</div>
                            <div class="spec-value">-</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Durability</div>
                            <div class="spec-value">-</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Color</div>
                            <div class="spec-value">-</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Application Area</div>
                            <div class="spec-value">-</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Application Method</div>
                            <div class="spec-value">-</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-life-ring"></i>
                </div>
                <h3 class="feature-title">Keamanan Tinggi</h3>
                <p class="feature-description">Memberikan perlindungan maksimal saat beraktivitas di air</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-user-shield"></i>
                </div>
                <h3 class="feature-title">Perlindungan Diri</h3>
                <p class="feature-description">Dirancang untuk memberikan perlindungan maksimal bagi pengguna</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-water"></i>
                </div>
                <h3 class="feature-title">Tahan Air</h3>
                <p class="feature-description">Dirancang untuk tetap mengapung dan tahan air</p>
            </div>
        </div>
        
        <div class="buttons-container">
            <a href="{{ route('katalog.index', ['kategoriSlug' => 'perikanan']) }}" class="action-button back-button">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('home') }}" class="action-button home-button">
                <i class="fas fa-home"></i> Beranda
            </a>
        </div>
    </div>
@endsection
