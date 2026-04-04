@extends('layouts.app')

@section('title', 'Tali Tambang - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Tali Tambang</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-type-display">Tali Tambang</div>
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/talitambang.png') }}" alt="Tali Tambang" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Tali tambang adalah tali yang digunakan untuk berbagai keperluan di bidang perikanan, seperti mengikat, menarik, atau mengangkat barang di kapal dan pelabuhan.</p>
                    <p>Tali tambang tersedia dalam berbagai ukuran dan material, memiliki kekuatan tinggi serta tahan terhadap air dan cuaca, sehingga cocok digunakan untuk aktivitas di lingkungan laut.</p>
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
                    <i class="fas fa-dna"></i>
                </div>
                <h3 class="feature-title">Serat Tinggi</h3>
                <p class="feature-description">Dibuat dari serat berkualitas tinggi untuk daya tahan maksimal.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-anchor"></i>
                </div>
                <h3 class="feature-title">Tahan Beban Berat</h3>
                <p class="feature-description">Dirancang untuk menahan beban berat dan tekanan tinggi.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-arrows-alt"></i>
                </div>
                <h3 class="feature-title">Fleksibel</h3>
                <p class="feature-description">Dapat digunakan dalam berbagai aplikasi dan kondisi.</p>
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
