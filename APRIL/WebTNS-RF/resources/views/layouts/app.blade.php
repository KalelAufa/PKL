<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title", "Tricipta Niaga Sukses")</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    @yield("styles")
</head>
<body>

<header class="header">
    <div class="header-content">
        <div class="logo-container">
            <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="Logo Tricipta Niaga Sukses"></a>
            <div class="brand-text">
                <a href="{{ route('home') }}" style="text-decoration: none;"><h1>Tricipta Niaga Sukses</h1></a>
            </div>
        </div>
    </div>
</header>

<main>
    @yield("content")
</main>

<a href="https://wa.me/6287722725483" class="whatsapp" target="_blank" aria-label="Chat on WhatsApp">
    <img src="{{ asset('images/wa.png') }}" alt="WhatsApp">
</a>

<footer>
    <div class="copyright">
        <p>&copy; {{ date('Y') }} Tricipta Niaga Sukses. Hak Cipta Dilindungi.</p>
    </div>
</footer>

</body>
</html>
