@extends('layouts.app')

@section('title', 'Mesin Bajak Proquip APEX - 800 - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Mesin Bajak Proquip APEX - 800</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-type-display">Mesin Bajak Proquip APEX - 800</div>
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/mesinbajak.png') }}" alt="Mesin Bajak Proquip APEX - 800" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Mesin Bajak Proquip APEX - 800 adalah alat pertanian modern yang dirancang untuk membajak lahan secara efisien dan cepat. Dilengkapi dengan teknologi canggih, mesin ini mampu mengolah tanah dengan kedalaman dan lebar optimal, sehingga meningkatkan produktivitas pertanian. Cocok digunakan untuk berbagai jenis lahan, APEX - 800 membantu petani menghemat waktu, tenaga, dan biaya operasional.</p>
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
                    <i class="fas fa-tractor"></i>
                </div>
                <h3 class="feature-title">Mesin Bertenaga</h3>
                <p class="feature-description">Dilengkapi mesin bensin yang kuat, mampu membajak tanah keras maupun gembur</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-leaf"></i>
                </div>
                <h3 class="feature-title">Efisien & Ramah Lingkungan</h3>
                <p class="feature-description">Desain hemat bahan bakar untuk mengurangi biaya operasional</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-road"></i>
                </div>
                <h3 class="feature-title">Serbaguna</h3>
                <p class="feature-description">Cocok digunakan untuk kebun, sawah kecil, hingga lahan perkebunan ringan</p>
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
