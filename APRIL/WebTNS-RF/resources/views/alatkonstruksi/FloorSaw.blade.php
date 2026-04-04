@extends('layouts.app')

@section('title', 'Floor Saw - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Floor Saw</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/floorsaw.png') }}" alt="Floor Saw" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Floor Saw adalah mesin potong profesional yang dirancang khusus untuk memotong aspal dan beton pada pekerjaan jalan atau lantai.</p>
                    <p>Dengan pisau diamond berkualitas tinggi dan sistem pendingin air, alat ini mampu menghasilkan potongan yang presisi dan rapi pada material keras.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Blade Diameter</div>
                            <div class="spec-value">350 - 500 mm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">cutting depth</div>
                            <div class="spec-value">10 - 20 cm</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Machine Type</div>
                            <div class="spec-value">Diesel / Gasoline</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Weight</div>
                            <div class="spec-value">100 - 180 kg</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Power</div>
                            <div class="spec-value">9 - 13 HP</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Cooling System</div>
                            <div class="spec-value">Water Cooling System</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-cut"></i>
                </div>
                <h3 class="feature-title">Potongan Presisi</h3>
                <p class="feature-description">Pisau diamond berkualitas tinggi untuk hasil potongan yang rapi dan akurat</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-tachometer-alt"></i>
                </div>
                <h3 class="feature-title">Kinerja Tinggi</h3>
                <p class="feature-description">Daya 9-13 HP untuk pemotongan cepat dan efisien</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-water"></i>
                </div>
                <h3 class="feature-title">Sistem Pendingin</h3>
                <p class="feature-description">Pendingin air untuk mengurangi debu dan memperpanjang usia pisau</p>
            </div>
        </div>
        
        <div class="buttons-container">
            <a href="{{ route('katalog.index', ['kategoriSlug' => 'alat-konstruksi']) }}" class="action-button back-button">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('home') }}" class="action-button home-button">
                <i class="fas fa-home"></i> Beranda
            </a>
        </div>
    </div>
@endsection
