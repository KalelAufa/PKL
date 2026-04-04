@extends('layouts.app')

@section('title', 'Folder Arsip - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Folder Arsip</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/arsip.png') }}" alt="arsip" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Folder arsip ini dirancang untuk menyimpan dan mengorganisir dokumen penting Anda secara rapi dan aman, cocok digunakan di sekolah, kantor, maupun kebutuhan administrasi lainnya.</p>
                    <p>Dengan desain yang elegan dan material berkualitas, folder arsip ini membantu menjaga dokumen tetap teratur serta mudah ditemukan saat dibutuhkan.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Type</div>
                            <div class="spec-value">-</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Material</div>
                            <div class="spec-value">-</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Size</div>
                            <div class="spec-value">-</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Features</div>
                            <div class="spec-value">-</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-folder"></i>
                </div>
                <h3 class="feature-title">Penyimpanan Rapih</h3>
                <p class="feature-description">Membantu menyusun dokumen agar lebih terorganisir.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <h3 class="feature-title">Mudah Diakses</h3>
                <p class="feature-description">Dokumen dapat diakses dengan cepat dan mudah.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-archive"></i>
                </div>
                <h3 class="feature-title">Arsip dan Tahan Lama</h3>
                <p class="feature-description">Melindungi berkas agar tetap aman</p>
            </div>
        </div>
        
        <div class="buttons-container">
            <a href="{{ route('katalog.index', ['kategoriSlug' => 'pendidikan']) }}" class="action-button back-button">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('home') }}" class="action-button home-button">
                <i class="fas fa-home"></i> Beranda
            </a>
        </div>
    </div>
@endsection
