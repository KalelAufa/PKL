@extends('layouts.app')

@section('title', 'Gergaji Mesin - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Gergaji Mesink</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-type-display">Gergaji Mesin</div>
        
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/chainsaw.png') }}" alt="Gergaji Mesin" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Gergaji mesin berkualitas tinggi, dirancang untuk memudahkan pemotongan kayu dan material lainnya secara cepat dan presisi. Cocok untuk kebutuhan pertukangan, konstruksi, maupun hobi, memberikan hasil maksimal dengan tenaga kuat dan penggunaan yang aman.</p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Machine</div>
                            <div class="spec-value">2 Stroke</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Cylinder</div>
                            <div class="spec-value">45.4 cc</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Power Machine</div>
                            <div class="spec-value">2.0 kW</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Oil Tank</div>
                            <div class="spec-value">0.2 liter</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Fuel Tank Capacity</div>
                            <div class="spec-value">0.47 liter</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fa-solid fa-bolt"></i>
                </div>
                <h3 class="feature-title">Kekuatan Potong</h3>
                <p class="feature-description">Mesin bertenaga tinggi dengan rantai berkualitas untuk pemotongan yang efisien.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-halved"></i>
                </div>
                <h3 class="feature-title">Daya Tahan</h3>
                <p class="feature-description">Bodi casing kokoh dan komponen tahan aus untuk umur panjang.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-hands-holding"></i>
                </div>
                <h3 class="feature-title">Keamanan & Kenyamanan</h3>
                <p class="feature-description">Pengaman rantai, pegangan ergonomis, dan fitur anti-getar untuk kenyamanan dan keselamatan.</p>
            </div>
        </div>
        
        <div class="buttons-container">
            <a href="{{ route('katalog.index', ['kategoriSlug' => 'perkakas']) }}" class="action-button back-button">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('home') }}" class="action-button home-button">
                <i class="fas fa-home"></i> Beranda
            </a>
        </div>
    </div>
@endsection
