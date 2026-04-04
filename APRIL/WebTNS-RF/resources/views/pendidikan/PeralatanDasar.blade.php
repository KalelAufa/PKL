@extends('layouts.app')

@section('title', 'Peralatan Pendidikan Dasar - Tricipta Niaga Sukses')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection

@section('content')
<div class="section-title">
        <h2>Peralatan Pendidikan Dasar</h2>
    </div>
    
    <div class="product-detail-container">
        <div class="model-selector-container">
            <div class="model-selector">
                <label for="modelSelect"><strong>Jenis Alat:</strong></label>
                <select id="modelSelect" onchange="updateSpecs()">
                    <option value="pensil" selected>Pencil</option> <!-- Perubahan di sini -->
                    <option value="penghapus">Eraser</option>
                    <option value="penggaris">Ruler</option>
                    <option value="buku">Book</option>
                    <option value="pulpen">Pen</option>
                    <option value="kotakpensil">Pencil Case</option>
                    <option value="spidol">Marker</option>
                </select>
            </div>
        </div>
        
        <div class="model-type-display" id="modelTypeDisplay">Pencil</div> <!-- Perubahan di sini -->
        
        <div class="product-content">
            <div class="product-image-container">
                <img src="{{ asset('images/pensil.png') }}" alt="Pensil" class="product-image" id="alatImage"> <!-- Perubahan di sini -->
            </div>
            
            <div class="product-details">
                <div class="product-description">
                    <p>Peralatan pendidikan dasar mendukung proses belajar mengajar yang efektif dan menyenangkan bagi siswa di berbagai jenjang.</p>
                </div>
                
                <div class="specs-container" id="specContainer"> <!-- Perubahan di sini -->
                    <h3 class="specs-title">Spesifikasi</h3>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-label">Product Name</div>
                            <div class="spec-value" id="type">Pencil</div> <!-- Perubahan di sini -->
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Material</div>
                            <div class="spec-value" id="material">Wood and Graphite</div> <!-- Perubahan di sini -->
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Size</div>
                            <div class="spec-value" id="size">Length 17.5 cm</div> <!-- Perubahan di sini -->
                        </div>
                        <div class="spec-item">
                            <div class="spec-label">Features</div>
                            <div class="spec-value" id="features">Smooth writing, break-resistant lead</div> <!-- Perubahan di sini -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="feature-cards">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-pencil-alt"></i>
                </div>
                <h3 class="feature-title">Kualitas Tinggi</h3>
                <p class="feature-description">Dibuat dengan material berkualitas untuk ketahanan dan kenyamanan penggunaan</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h3 class="feature-title">Pendidikan</h3>
                <p class="feature-description">Mendukung proses belajar mengajar yang efektif</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-child"></i>
                </div>
                <h3 class="feature-title">Ramah Anak</h3>
                <p class="feature-description">Desain yang aman dan sesuai untuk kebutuhan siswa</p>
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
@endsection
