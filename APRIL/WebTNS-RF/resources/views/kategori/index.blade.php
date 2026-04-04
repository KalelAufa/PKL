@extends("layouts.app")

@section("title", $kategoriInfo["title"] . " - Tricipta Niaga Sukses")

@section("styles")
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
    html, body {
        margin: 0;
        padding: 0;
        overflow-x: hidden;
    }
    body {
        font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        line-height: 1.6;
        color: var(--dark);
        background: linear-gradient(135deg, #f5f7fa 0%, #e6e9f0 100%);
        min-height: 100vh;
        background-attachment: fixed;
    }
    .header {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        padding: 0.8rem 0;
        box-shadow: var(--shadow);
        position: sticky;
        top: -1px;
        z-index: 1000;
        backdrop-filter: blur(10px);
        width: 100%;
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
    main {
        max-width: 1200px;
        margin: 2rem auto 3rem;
        padding: 0 2rem;
    }
    .section-title {
        text-align: center;
        margin-bottom: 2rem;
        position: relative;
    }
    .section-title h2 {
        font-family: 'Montserrat', sans-serif;
        font-size: 2.2rem;
        color: var(--primary);
        display: inline-block;
        padding-bottom: 0.5rem;
    }
    .section-title h2::after {
        content: '';
        position: absolute;
        width: 80px;
        height: 4px;
        background: var(--secondary);
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 2px;
    }
    .product-container2 {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 2rem;
        margin-top: 1.5rem;
    }
    .product-card2 {
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
        height: 300px;
    }
    .product-card2:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }
    .product-image-container {
        width: 100%;
        height: 100%;
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        background: white;
    }
    .product-card2 img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
        transition: transform 0.5s ease;
        padding: 15px;
    }
    .product-card2:hover img {
        transform: scale(1.08);
    }
    .product-overlay2 {
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
        pointer-events: none;
    }
    .product-card2:hover .product-overlay2 {
        opacity: 1;
    }
    .product-overlay2 h3 {
        color: white;
        font-size: 1.4rem;
        margin-bottom: 0.5rem;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        text-align: center;
        padding: 0 0.5rem;
        pointer-events: none;
    }
    .back-container {
        max-width: 1200px;
        margin: 2rem auto;
        padding: 0 2rem;
        display: flex;
        justify-content: flex-start;
    }
    .back-button {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: var(--secondary);
        color: var(--primary-dark);
        padding: 0.8rem 1.8rem;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        box-shadow: 0 4px 15px rgba(211, 179, 65, 0.4);
        transition: var(--transition);
        border: 2px solid transparent;
    }
    .back-button:hover {
        background: transparent;
        color: var(--secondary);
        border-color: var(--secondary);
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(211, 179, 65, 0.6);
    }
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
    footer {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        color: white;
        padding: 2rem;
        box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.1);
    }
    .copyright {
        text-align: center;
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.9rem;
        max-width: 1200px;
        margin: 0 auto;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection

@section("content")
<div class="section-title">
    <h2>{{ $kategoriInfo["title"] }}</h2>
</div>

<div class="product-container2">
    @php $index = 0 @endphp
    @forelse($produkList as $slug => $item)
        <a href="{{ route('katalog.show', ['kategoriSlug' => $kategoriSlug, 'produkSlug' => $slug]) }}" class="product-card2" style="animation-delay: {{ 0.1 + ($index * 0.1) }}s">
            <div class="product-image-container">
                <img src="{{ asset($item['image']) }}" alt="{{ $item['title'] }}">
                <div class="product-overlay2">
                    <h3>{{ $item["title"] }}</h3>
                </div>
            </div>
        </a>
        @php $index++ @endphp
    @empty
        <p style="grid-column: span 4; text-align: center;">Belum ada produk.</p>
    @endforelse
</div>

@endsection
