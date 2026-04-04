@extends('layouts.app')

@section('title', 'Air Conditioner - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
            <h2>Air Conditioner</h2>
        </div>

        <div class="product-detail-container">
            <div class="product-content">
                <div class="product-image-container">
                    <img src="{{ asset('images/ac.png') }}" alt="Air Conditioner" class="product-image">
                </div>

                <div class="product-details">
                    <div class="product-description">
                        <p>AC ini dirancang untuk menghadirkan kesejukan yang merata di seluruh ruangan. 
                            Dengan teknologi pendinginan cepat, konsumsi energi yang efisien, serta tingkat 
                            kebisingan rendah, produk ini memberikan kenyamanan maksimal bagi pengguna. 
                            Desain modernnya membuat AC ini sesuai digunakan baik di rumah maupun di lingkungan perkantoran.
                        </p>
                    </div>

                    <div class="specs-container">
                        <h3 class="specs-title">Spesifikasi</h3>
                        <div class="specs-grid">
                            <div class="spec-item">
                                <div class="spec-label">Capacity ( Cooling,Btu/hr )</div>
                                <div class="spec-value">12000 Btu/hr</div>
                            </div>
                            <div class="spec-item">
                                <div class="spec-label">Caapcity ( Cooling, kW )</div>
                                <div class="spec-value">3.517 kW</div>
                            </div>
                            <div class="spec-item">
                                <div class="spec-label">EER ( Cooling, W/W)</div>
                                <div class="spec-value">3.06 W/W</div>
                            </div>
                            <div class="spec-item">
                                <div class="spec-label">Noise Level</div>
                                <div class="spec-value">44 / 35 dBA</div>
                            </div>
                            <div class="spec-item">
                                <div class="spec-label">Power Consumption ( Cooling, W)</div>
                                <div class="spec-value">1320 W</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="feature-cards">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-snowflake"></i>
                    </div>
                    <h3>Sistem Pendingin</h3>
                    <p>Rasakan pendinginan yang kuat dengan teknologi pendingin udara.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-wind"></i>
                    </div>
                    <h3>Sirkulasi Udara</h3>
                    <p>Aliran udara dingin menyebar merata ke seluruh ruangan untuk kenyamanan maksimal.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-volume-down"></i>
                    </div>
                    <h3>Tingkat Kebisingan Rendah</h3>
                    <p>Beroperasi dengan suara yang halus sehingga tidak mengganggu aktivitas maupun istirahat Anda.</p>
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
