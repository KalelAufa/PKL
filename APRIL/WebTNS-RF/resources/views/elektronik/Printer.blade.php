@extends('layouts.app')

@section('title', 'Printer HP Smart Tank 790 - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Printer HP Smart Tank 790 All-in-One</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/printer.png') }}" alt="Printer HP Smart Tank 790" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Printer multifungsi HP Smart Tank 790 All-in-One mendukung kebutuhan cetak, salin, dan pindai dengan fitur nirkabel modern.</p>
                    <p>Sistem tinta tank yang ekonomis dengan kapasitas tinta besar untuk penghematan biaya cetak jangka panjang.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Function</div>
                            <div class="spec-value">Print, Copy, Scan, Fax, ADF and Wireless</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Print Colours</div>
                            <div class="spec-value">Yes (Colour)</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Print Technology</div>
                            <div class="spec-value">HP Thermal Inkjet</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Duplex Printing</div>
                            <div class="spec-value">Automatic</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Connectivity</div>
                            <div class="spec-value">Nirkabel 2.4/5G dual band, Wi-Fi Direct</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Monthly Page Volume</div>
                            <div class="spec-value">400 - 1200 pages</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-tint"></i>
                </div>
                <h3 class="feature-title">Sistem Tinta Tank</h3>
                <p class="feature-description">Kapasitas tinta besar dengan biaya cetak per halaman yang ekonomis</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-wifi"></i>
                </div>
                <h3 class="feature-title">Nirkabel Lengkap</h3>
                <p class="feature-description">Dukungan koneksi nirkabel dual band untuk fleksibilitas</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-print"></i>
                </div>
                <h3 class="feature-title">Multifungsi</h3>
                <p class="feature-description">Cetak, salin, dan pindai dalam satu perangkat praktis</p>
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
