@extends('layouts.app')

@section('title', 'Binder - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Binder</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/alatkantor/binder.png') }}" alt="Binder" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Binder digunakan untuk menyusun dan menyimpan dokumen penting dalam satu tempat yang rapi dan mudah diakses.</p>
                    <p>Dengan berbagai ukuran dan tipe ring yang tersedia, binder kami memberikan solusi penyimpanan dokumen yang praktis dan efisien.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi Teknis</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Ukuran</div>
                            <div class="spec-value">A4 / F4</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Tipe Ring</div>
                            <div class="spec-value">2-ring / 4-ring</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Material</div>
                            <div class="spec-value">Plastik / Karton Tebal</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Pilihan Warna</div>
                            <div class="spec-value">Merah, Biru, Hitam, Transparan</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <h3 class="feature-title">Organisasi Dokumen</h3>
                <p class="feature-description">Menyusun dokumen dengan rapi dalam satu tempat</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-exchange-alt"></i>
                </div>
                <h3 class="feature-title">Fleksibel</h3>
                <p class="feature-description">Mudah menambah atau mengurangi halaman dokumen</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-palette"></i>
                </div>
                <h3 class="feature-title">Beragam Warna</h3>
                <p class="feature-description">Tersedia berbagai pilihan warna untuk kebutuhan berbeda</p>
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
