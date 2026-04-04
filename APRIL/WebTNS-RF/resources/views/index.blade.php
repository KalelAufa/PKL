<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tricipta Niaga Sukses - General Supplier</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        :root {
            --primary: #2c5f2d;
            --primary-dark: #1a3c1a;
            --secondary: #d3b341;
            --secondary-light: #e9d77e;
            --light: #f5f7fa;
            --dark: #2d3748;
            --accent: #764ba2;
            --success: #25d366;
            --shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            --transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        html {
            scroll-behavior: smooth;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--dark);
            background: linear-gradient(135deg, #f5f7fa 0%, #e6e9f0 100%);
            min-height: 100vh;
            background-attachment: fixed;
            overflow-x: hidden;
        }

        /* Header Styles */
        .header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            padding: 0.8rem 0;
            box-shadow: var(--shadow);
            position: fixed;
            top: 0;
            z-index: 1000;
            backdrop-filter: blur(10px);
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo-container img {
            width: 65px;
            height: 65px;
            border-radius: 12px;
            object-fit: cover;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .logo-container img:hover {
            transform: scale(1.05);
        }

        .brand-text {
            display: flex;
            flex-direction: column;
        }

        .brand-text h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--secondary);
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            letter-spacing: -0.5px;
            line-height: 1.2;
        }

        .brand-text a {
            text-decoration: none;
        }

        .brand-text p {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 300;
            letter-spacing: 0.5px;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(44, 95, 45, 0.85), rgba(26, 60, 26, 0.9)), url('https://images.unsplash.com/photo-1600880292203-757bb62b4baf?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            height: 100vh;
            min-height: 600px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(44, 95, 45, 0.7) 0%, rgba(26, 60, 26, 0.8) 100%);
            z-index: 1;
        }

        .hero-content {
            max-width: 900px;
            padding: 0 2rem;
            position: relative;
            z-index: 2;
        }

        .hero h2 {
            font-family: 'Montserrat', sans-serif;
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4);
            line-height: 1.2;
        }

        .hero p {
            font-size: 1.4rem;
            margin-bottom: 2.5rem;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            opacity: 0.9;
            font-weight: 300;
        }

        .cta-button {
            display: inline-block;
            background: var(--secondary);
            color: var(--primary-dark);
            padding: 1rem 2.5rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            text-decoration: none;
            box-shadow: 0 6px 20px rgba(211, 179, 65, 0.5);
            transition: var(--transition);
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
        }

        .cta-button:hover {
            background: transparent;
            color: var(--secondary);
            border-color: var(--secondary);
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(211, 179, 65, 0.7);
        }

        .cta-button::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s ease, height 0.6s ease;
        }

        .cta-button:hover::after {
            width: 300px;
            height: 300px;
        }

        .cta-button i {
            margin-left: 0.5rem;
            transition: transform 0.3s ease;
        }

        .cta-button:hover i {
            transform: translateX(5px);
        }

        .scroll-down {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 2;
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
            text-align: center;
            animation: bounce 2s infinite;
        }

        .scroll-down i {
            display: block;
            font-size: 1.5rem;
            margin-bottom: 5px;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {transform: translateY(0) translateX(-50%);}
            40% {transform: translateY(-20px) translateX(-50%);}
            60% {transform: translateY(-10px) translateX(-50%);}
        }

        /* Main Content */
        main {
            max-width: 1200px;
            margin: 0 auto 3rem;
            padding: 0 2rem;
        }

        .section-title {
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
            padding-top: 3rem;
        }

        .section-title h2 {
            font-family: 'Montserrat', sans-serif;
            font-size: 2.5rem;
            color: var(--primary);
            display: inline-block;
            padding-bottom: 0.5rem;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            width: 100px;
            height: 5px;
            background: var(--secondary);
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }

        /* Product Container */
        .product-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2.5rem;
            margin-top: 1rem;
        }

        /* Product Card */
        .product-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
            display: block;
            text-decoration: none;
            color: inherit;
            opacity: 0;
            animation: fadeIn 0.8s ease-out forwards;
            border: 1px solid rgba(0, 0, 0, 0.05);
            height: 340px;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .product-image {
            width: 100%;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .product-card:hover .product-image img {
            transform: scale(1.08);
        }

        .product-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to top, rgba(44, 95, 45, 0.9), rgba(44, 95, 45, 0.7) 40%, transparent 70%);
            padding: 1.5rem 1rem;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .product-card:hover .product-overlay {
            opacity: 1;
        }

        .product-overlay h3 {
            color: white;
            font-size: 1.6rem;
            margin-bottom: 0.5rem;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
            text-align: center;
        }

        .product-overlay p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1rem;
            line-height: 1.4;
            text-align: center;
        }

        /* About Section */
        .about-section {
            background: white;
            border-radius: 16px;
            box-shadow: var(--shadow);
            padding: 3rem;
            margin: 5rem 0;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 3rem;
        }

        .about-content {
            flex: 1;
            min-width: 300px;
        }

        .about-content h2 {
            font-family: 'Montserrat', sans-serif;
            font-size: 2rem;
            color: var(--primary);
            margin-bottom: 1.5rem;
        }

        .about-content p {
            margin-bottom: 1.2rem;
            line-height: 1.8;
        }

        .about-image {
            flex: 1;
            min-width: 300px;
            border-radius: 12px;
            overflow: hidden;
            position: relative;
            transition: var(--transition);
        }

        .about-image::before {
            content: '';
            position: absolute;
            top: -15px;
            left: -15px;
            width: 100%;
            height: 100%;
            border: 3px solid var(--secondary);
            border-radius: 12px;
            z-index: -1;
        }

        .about-image img {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 12px;
        }

        .about-image:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        }

        /* WhatsApp Button */
        .whatsapp {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 60px;
            height: 60px;
            background: var(--success);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4);
            transition: var(--transition);
            z-index: 1000;
            animation: pulse 2s infinite;
        }

        .whatsapp:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 25px rgba(37, 211, 102, 0.6);
        }

        .whatsapp img {
            width: 36px;
            height: 36px;
            object-fit: contain;
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 3rem 2rem 2rem;
            box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.1);
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
        }

        .footer-column h3 {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.4rem;
            margin-bottom: 1.5rem;
            color: var(--secondary);
            position: relative;
            padding-bottom: 0.5rem;
        }

        .footer-column h3::after {
            content: '';
            position: absolute;
            width: 50px;
            height: 3px;
            background: var(--secondary);
            bottom: 0;
            left: 0;
        }

        .footer-column p, .footer-column a {
            color: rgba(255, 255, 255, 0.85);
            margin-bottom: 0.8rem;
            display: block;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-column a {
            color: rgba(255, 255, 255, 0.85);
            margin-bottom: 0.8rem;
            display: block;
            text-decoration: none;
            transition: color 0.3s ease;
            cursor: pointer;
            width: fit-content;
        }

        .footer-column a:hover {
            color: var(--secondary);
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 0.8rem;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 0.8rem;
        }

        .contact-item i {
            color: var(--secondary);
            font-size: 1.2rem;
            margin-top: 0.2rem;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1.2rem;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transition: var(--transition);
        }

        .social-links a:hover {
            background: var(--secondary); /* Semi-transparent */
            transform: translateY(-3px);
            box-shadow: var(--light);
            color: white !important;
        }

        .social-links i {
            font-size: 1.2rem;
        }

        .copyright {
            text-align: center;
            padding-top: 2rem;
            margin-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.5); }
            70% { box-shadow: 0 0 0 15px rgba(37, 211, 102, 0); }
            100% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0); }
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .hero h2 { font-size: 3rem; }
            .hero p { font-size: 1.2rem; }
            .section-title h2 { font-size: 2.2rem; }
        }

        @media (max-width: 768px) {
            .header-content { padding: 0 1rem; }
            .brand-text h1 { font-size: 1.5rem; }
            .hero { height: 80vh; min-height: 500px; }
            .hero h2 { font-size: 2.2rem; }
            .hero p { font-size: 1.1rem; }
            .about-section { padding: 2rem; margin: 3rem 0; }
            .section-title h2 { font-size: 2rem; }
            .footer-content { gap: 2rem; }
            .product-card { height: 300px; }
        }

        @media (max-width: 480px) {
            .header-content { flex-direction: column; text-align: center; }
            .logo-container { justify-content: center; }
            .brand-text { align-items: center; }
            .hero { height: 70vh; min-height: 450px; padding: 0 1rem; }
            .hero h2 { font-size: 1.8rem; }
            .hero p { font-size: 1rem; }
            .product-container { grid-template-columns: 1fr; }
            .about-section { padding: 1.5rem; gap: 2rem; }
            .about-content, .about-image { min-width: 100%; }
            .footer-content { grid-template-columns: 1fr; }
            .product-card { height: 280px; }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-content">
            <div class="logo-container">
                <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="Logo Tricipta Niaga Sukses">
                </a>
                <div class="brand-text">
                    <a href="{{ route('home') }}"><h1>Tricipta Niaga Sukses</h1></a>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h2>General Supplier</h2>
            <p>Menyediakan berbagai produk material konstruksi berkualitas tinggi dengan harga kompetitif untuk mendukung kesuksesan proyek Anda</p>
            <a href="#products" class="cta-button">Lihat Produk Kami <i class="fas fa-arrow-down"></i></a>
        </div>
        <div class="scroll-down">
            <i class="fas fa-chevron-down"></i>
            Scroll untuk melihat lebih banyak
        </div>
    </section>

    <!-- Main Content -->
    <main>
        <div id="products" class="section-title">
            <h2>Produk Kami</h2>
        </div>

        <div class="product-container">
            @isset($products)
                @foreach ($products as $index => $product)
                    <a href="{{ $product['a'] ?? '#' }}" class="product-card" style="animation-delay: {{ 0.1 + ($index * 0.1) }}s">
                        <div class="product-image">
                            <img src="{{ asset($product['image'] ?? '') }}" alt="{{ $product['title'] ?? '' }}">
                            <div class="product-overlay">
                                <h3>{{ $product['title'] ?? '' }}</h3>
                                <p>Klik untuk detail produk</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            @else
                <p>Tidak ada produk yang ditampilkan</p>
            @endisset
        </div>

        <!-- About Section -->
        <div class="about-section">
            <div class="about-content">
                <h2>Tentang Tricipta Niaga Sukses</h2>
                <p>PT Tricipta Niaga Sukses resmi berdiri pada 29 Mei 2024. Fokus utama kami adalah dalam jasa Pengadaan Barang, Maintenance, dan General Rental. Sebagai mitra terpercaya, kami memahami pentingnya kualitas dan ketepatan waktu dalam setiap proyek yang kami tangani. Oleh karena itu, kami selalu berupaya untuk memberikan layanan yang melebihi ekspektasi dan membangun hubungan jangka panjang dengan para pelanggan kami.</p>
                <p>Produk kami dipilih dengan ketat untuk memastikan kualitas dan keawetan, sehingga Anda dapat fokus pada pembangunan tanpa khawatir tentang ketersediaan material.</p>
                <p>Tim profesional kami siap memberikan solusi terbaik untuk kebutuhan material proyek Anda, mulai dari perencanaan hingga pengiriman tepat waktu.</p>
            </div>
            <div class="about-image">
                <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Tentang Kami">
            </div>
        </div>
    </main>

    <!-- WhatsApp -->
    <a href="https://api.whatsapp.com/send?phone=6287722725483
" class="whatsapp" target="_blank" aria-label="Chat on WhatsApp">
        <img src="{{ asset('images/wa.png') }}" alt="WhatsApp">
    </a>

    {{-- CAROUSEL --}}
<div class="section-title carousel-title"><h2>Our Brand</h2></div>

    <div class="logo-carousel">
		<div class="logo-slide">
			<img src="{{ asset('images/brand/acer.png') }}" alt="">
			<img src="{{ asset('images/brand/canon.png') }}" alt="">
			<img src="{{ asset('images/brand/asianpaint.png') }}" alt="">
			<img src="{{ asset('images/brand/atlascopco.png') }}" alt="">
			<img src="{{ asset('images/brand/epson.png') }}" alt="">
			<img src="{{ asset('images/brand/hikvision.png') }}" alt="">
			<img src="{{ asset('images/brand/oli.png') }}" alt="" style="height: 90px;">
			{{-- <img src="{{ asset('images/brand/ppg.png') }}" alt=""> --}}
			<img src="{{ asset('images/brand/servvo.png') }}" alt="">
			<img src="{{ asset('images/brand/wackerneuson.png') }}" alt="">
			<img src="{{ asset('images/brand/advan.png') }}" alt="">
			<img src="{{ asset('images/brand/exen.png') }}" alt="">
			<img src="{{ asset('images/brand/apc.png') }}" alt="" style="position: relative; top: 12px;">
			<img src="{{ asset('images/brand/axioo.png') }}" alt="">
			<img src="{{ asset('images/brand/brother.png') }}" alt="">
			<img src="{{ asset('images/brand/cisco.png') }}" alt="">
			<img src="{{ asset('images/brand/dell.png') }}" alt="" style="height: 90px">
			<img src="{{ asset('images/brand/ebara.png') }}" alt="" style="height: 116px;">
			<img src="{{ asset('images/brand/fortinet.png') }}" alt="">
			<img src="{{ asset('images/brand/grundfos.png') }}" alt="">
			<img src="{{ asset('images/brand/hewlett.png') }}" alt="">
			<img src="{{ asset('images/brand/hp.png') }}" alt="">
			<img src="{{ asset('images/brand/husqvarna.png') }}" alt="" style="height: 90px">
			<img src="{{ asset('images/brand/ica.png') }}" alt="">
			<img src="{{ asset('images/brand/panasonic.png') }}" alt="">
			<img src="{{ asset('images/brand/microvision.png') }}" alt="">
			<img src="{{ asset('images/brand/microsoft.png') }}" alt="">
			<img src="{{ asset('images/brand/lg.png') }}" alt="">
			<img src="{{ asset('images/brand/lenovo.png') }}" alt="">
			<img src="{{ asset('images/brand/intel.png') }}" alt="">
			<img src="{{ asset('images/brand/innola.png') }}" alt="">
			<img src="{{ asset('images/brand/iceboard.png') }}" alt="">
			<img src="{{ asset('images/brand/prolink.png') }}" alt="">
			<img src="{{ asset('images/brand/samsung.png') }}" alt="">
			<img src="{{ asset('images/brand/sophos.png') }}" alt="">
			<img src="{{ asset('images/brand/spc.png') }}" alt="">
			<img src="{{ asset('images/brand/synology.png') }}" alt="">
			<img src="{{ asset('images/brand/toshiba.png') }}" alt="">
			<img src="{{ asset('images/brand/tsurumi.png') }}" alt="">
			<img src="{{ asset('images/brand/viewsonic.png') }}" alt="">

		</div>
		<div class="logo-slide">
			<img src="{{ asset('images/brand/acer.png') }}" alt="">
			<img src="{{ asset('images/brand/canon.png') }}" alt="">
			<img src="{{ asset('images/brand/asianpaint.png') }}" alt="">
			<img src="{{ asset('images/brand/atlascopco.png') }}" alt="">
			<img src="{{ asset('images/brand/epson.png') }}" alt="">
			<img src="{{ asset('images/brand/hikvision.png') }}" alt="">
			<img src="{{ asset('images/brand/oli.png') }}" alt="" style="height: 90px;">
			{{-- <img src="{{ asset('images/brand/ppg.png') }}" alt=""> --}}
			<img src="{{ asset('images/brand/servvo.png') }}" alt="">
			<img src="{{ asset('images/brand/wackerneuson.png') }}" alt="">
			<img src="{{ asset('images/brand/advan.png') }}" alt="">
			<img src="{{ asset('images/brand/exen.png') }}" alt="">
			<img src="{{ asset('images/brand/apc.png') }}" alt="" style="position: relative; top: 12px;">
			<img src="{{ asset('images/brand/axioo.png') }}" alt="">
			<img src="{{ asset('images/brand/brother.png') }}" alt="">
			<img src="{{ asset('images/brand/cisco.png') }}" alt="">
			<img src="{{ asset('images/brand/dell.png') }}" alt="" style="height: 90px">
			<img src="{{ asset('images/brand/ebara.png') }}" alt="" style="height: 116px;">
			<img src="{{ asset('images/brand/fortinet.png') }}" alt="">
			<img src="{{ asset('images/brand/grundfos.png') }}" alt="">
			<img src="{{ asset('images/brand/hewlett.png') }}" alt="">
			<img src="{{ asset('images/brand/hp.png') }}" alt="">
			<img src="{{ asset('images/brand/husqvarna.png') }}" alt="" style="height: 120px">
			<img src="{{ asset('images/brand/ica.png') }}" alt="">
			<img src="{{ asset('images/brand/panasonic.png') }}" alt="">
			<img src="{{ asset('images/brand/microvision.png') }}" alt="">
			<img src="{{ asset('images/brand/microsoft.png') }}" alt="">
			<img src="{{ asset('images/brand/lg.png') }}" alt="">
			<img src="{{ asset('images/brand/lenovo.png') }}" alt="">
			<img src="{{ asset('images/brand/intel.png') }}" alt="">
			<img src="{{ asset('images/brand/innola.png') }}" alt="">
			<img src="{{ asset('images/brand/iceboard.png') }}" alt="">
			<img src="{{ asset('images/brand/prolink.png') }}" alt="">
			<img src="{{ asset('images/brand/samsung.png') }}" alt="">
			<img src="{{ asset('images/brand/sophos.png') }}" alt="">
			<img src="{{ asset('images/brand/spc.png') }}" alt="">
			<img src="{{ asset('images/brand/synology.png') }}" alt="">
			<img src="{{ asset('images/brand/toshiba.png') }}" alt="">
			<img src="{{ asset('images/brand/tsurumi.png') }}" alt="">
			<img src="{{ asset('images/brand/viewsonic.png') }}" alt="">

		</div>

	</div>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-column">
                <h3>Tricipta Niaga Sukses</h3>
                <p>Menyediakan solusi material konstruksi berkualitas tinggi.</p>
                <div class="social-links">
                    <a href="https://www.facebook.com/profile.php?id=61575115807180"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/triciptaniagasukses/"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <div class="footer-column">
                <h3>Produk Kami</h3>
                @isset($products)
                    @foreach ($products as $product)
                        <a href="{{ $product['a'] ?? '#' }}">{{ $product['title'] ?? '' }}</a>
                    @endforeach
                @else
                    <p>Tidak ada produk</p>
                @endisset
            </div>

            <div class="footer-column">
                <h3>Kontak Kami</h3>
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>Graha Kota Blok C4 No. 05 Suko, Sidoarjo, Jawa Timur, Indonesia</div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <div>+62 877-2272-5483</div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <div>cs.triciptaniagasukses@gmail.com</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; {{ date('Y') }} Tricipta Niaga Sukses. Hak Cipta Dilindungi.</p>
        </div>
    </footer>


</body>
</html>
