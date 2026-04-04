@extends('layouts.app')

@section('title', 'Sound System - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Sound System</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/soundsystem.png') }}" alt="Yamaha NS-F150" class="product-image">
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Sound system ini menghadirkan kualitas audio jernih dengan detail suara yang memukau. 
                        Bass yang kuat dan treble yang seimbang memberikan pengalaman mendengarkan lebih 
                        hidup. Cocok untuk acara, hiburan rumah, maupun kebutuhan profesional.
                    </p>
                </div>
                
                <div class="specs-container">
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">System Type</div>
                            <div class="spec-value">Self powered 10”, two-way, bass-reﬂex</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Max SPL Output</div>
                            <div class="spec-value">124 dB</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Power Rating</div>
                            <div class="spec-value">1000W Peak,  500W Continuous</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Respon Frekuensi</div>
                            <div class="spec-value">35 Hz – 50 kHz</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Net Weight</div>
                            <div class="spec-value">11.79 kg</div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Inputs</div>
                            <div class="spec-value">2 x Balanced XLR-1/4” combination inputs</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-music"></i>
                </div>
                <h3 class="feature-title">Suara Berkualitas</h3>
                <p class="feature-description">Respon frekuensi lebar untuk reproduksi suara yang akurat</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-volume-up"></i>
                </div>
                <h3 class="feature-title">Bass Kuat</h3>
                <p class="feature-description">Woofer 10 inci menghasilkan bass yang dalam dan bertenaga.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-sliders-h"></i>
                </div>
                <h3 class="feature-title">Versatil</h3>
                <p class="feature-description">Cocok untuk rumah dan aplikasi profesional</p>
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
