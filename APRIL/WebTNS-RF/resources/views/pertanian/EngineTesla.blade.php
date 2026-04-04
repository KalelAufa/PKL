@extends('layouts.app')

@section('title', 'Engine Tesla CX-160 5.5HP - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Engine Tesla CX-160 5.5HP</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-type-display">Engine Tesla CX-160 5.5HP</div>
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/enginetesla.png') }}" alt="Engine Tesla CX-160 5.5HP" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Engine Tesla CX-160 adalah mesin bensin serbaguna yang tangguh dan efisien, dirancang untuk berbagai kebutuhan industri, pertanian, dan konstruksi. 
                        Ditenagai mesin 4-tak dengan performa tinggi, CX-160 mampu memberikan tenaga stabil untuk mengoperasikan berbagai peralatan seperti pompa air, molen, dan alat konstruksi lainnya.
                    </p>
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
                    <i class="fas fa-bolt"></i>
                </div>
                <h3 class="feature-title">Tenaga Besar</h3>
                <p class="feature-description">Mesin bertenaga tinggi yang cocok untuk berbagai kebutuhan pertanian dan industri ringan</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-weight"></i>
                </div>
                <h3 class="feature-title">Ringan & Kompak</h3>
                <p class="feature-description">Desain yang ringan dan kompak memudahkan transportasi dan penyimpanan</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield"></i>
                </div>
                <h3 class="feature-title">Keamanan Terjamin</h3>
                <p class="feature-description">Dilengkapi dengan sistem pengaman untuk mencegah kecelakaan kerja</p>
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
