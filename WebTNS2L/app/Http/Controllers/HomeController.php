<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $heroCarouselImages = [
            ['src' => '/images/portofolio-dinas-perkebunan.png', 'alt' => 'Dinas Perkebunan'],
            ['src' => '/images/portofolio-mushollah-dinas-perkebunan.png', 'alt' => 'Mushollah Dinas Perkebunan'],
        ];

        $homePageContent = [
            'title' => 'Mitra Strategis untuk Solusi Perdagangan dan Rental',
            'subtitle' => 'PT Tricipta Niaga Sukses menghadirkan layanan perdagangan umum, sistem rental, maintenance peralatan, dan suplai kebutuhan industri secara terintegrasi. Portofolio kami mencakup peralatan elektronik, konstruksi, pertanian, kelautan, laboratorium, APAR, hygiene, serta packaging untuk kebutuhan sektor publik maupun swasta.',
            'ctaPrimary' => 'Eksplor Solusi Kami',
            'ctaSecondary' => 'Konsultasi Sekarang',
            'productTitle' => 'Lini Solusi Utama',
            'productHint' => 'Pilih kategori sesuai kebutuhan operasional Anda',
            'whyTitle' => 'Mengapa Perusahaan Memilih Tricipta',
            'whyBody' => 'Kami menggabungkan kecepatan respons, standar kualitas profesional, dan legalitas resmi agar setiap proyek pengadaan, rental, dan maintenance berjalan aman, efisien, serta terukur.',
            'contactTitle' => 'Wujudkan Operasional Lebih Efisien',
            'contactBody' => 'Diskusikan kebutuhan pengadaan, rental, dan maintenance bersama tim kami untuk mendapatkan solusi tepat guna, kompetitif, dan siap implementasi.',
            'contactCta' => 'Hubungi Tim Konsultan',
        ];

        $homeSolutionCards = [
            [
                'title' => 'Triscent – Air Freshener Otomatis & Produk Hygiene',
                'body' => 'Solusi unggulan Triscent untuk aroma ruangan otomatis, hygiene sanitary, toilet sanitary, dan trash system untuk fasilitas modern.',
                'href' => '/kategori?category=Triscent',
            ],
        ];

        $whyChooseItems = [
            [
                'title' => 'Kemitraan Berkelanjutan',
                'body' => 'Menjalin kemitraan jangka panjang dengan pemasok dan pelanggan melalui pelayanan yang andal dan amanah.',
            ],
            [
                'title' => 'Inovasi & Solusi Efisien',
                'body' => 'Berinovasi dalam pelayanan perdagangan umum dan rental untuk menghadirkan solusi yang lebih cepat dan efisien.',
            ],
            [
                'title' => 'Harga Kompetitif & Kualitas Terjamin',
                'body' => 'Menyediakan produk dan layanan dengan harga kompetitif tanpa mengorbankan kualitas serta standar profesional.',
            ],
            [
                'title' => 'Legalitas Lengkap & Mitra Resmi',
                'body' => 'Didukung legalitas resmi (NPWP, Kemenkumham) dan menjadi mitra berbagai dinas pemerintah serta instansi resmi.',
            ],
        ];

        $whyChooseIcons = [
            <<<'SVG'
<svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" aria-hidden="true">
  <path d="M12 3l7 4v5c0 5-3.5 8-7 9-3.5-1-7-4-7-9V7l7-4z" stroke="currentColor" stroke-width="1.7" />
  <path d="M9 12l2 2 4-4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
</svg>
SVG,
            <<<'SVG'
<svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" aria-hidden="true">
  <path d="M7 4h10l2 3v10a3 3 0 0 1-3 3H8a3 3 0 0 1-3-3V7l2-3z" stroke="currentColor" stroke-width="1.7" />
  <path d="M9 10h6M9 14h4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" />
</svg>
SVG,
            <<<'SVG'
<svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" aria-hidden="true">
  <path d="M4 14V8a2 2 0 0 1 2-2h8l6 6v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2z" stroke="currentColor" stroke-width="1.7" />
  <path d="M14 6v6h6" stroke="currentColor" stroke-width="1.7" />
</svg>
SVG,
            <<<'SVG'
<svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" aria-hidden="true">
  <circle cx="12" cy="12" r="8" stroke="currentColor" stroke-width="1.7" />
  <path d="M12 8v4l3 2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
</svg>
SVG,
        ];

        $featuredProductsCarousel = [
            ['id' => 1, 'name' => 'TNS 18 Grey', 'image' => '/images/tns-18-grey.png', 'category' => 'Triscent'],
            ['id' => 3, 'name' => 'TNS TOV-02 PRO', 'image' => '/images/tns-tov-02-pro.png', 'category' => 'Triscent'],
            ['id' => 9, 'name' => 'TNS Digital Sanitizer', 'image' => '/images/tns-digital-sanitizer.png', 'category' => 'Triscent'],
            ['id' => 10, 'name' => 'TNS Hand Dryer', 'image' => '/images/tns-digital-hand-dryer.png', 'category' => 'Triscent'],
            ['id' => 11, 'name' => 'TNS Seat Cleaner', 'image' => '/images/tns-seat-cleaner.png', 'category' => 'Triscent'],
            ['id' => 12, 'name' => 'TNS Sanitary Bin', 'image' => '/images/tns-sanitary-bin.png', 'category' => 'Triscent'],
        ];

        $featuredProductsLoop = array_merge($featuredProductsCarousel, $featuredProductsCarousel);

        return view('home', [
            'heroCarouselImages' => $heroCarouselImages,
            'homePageContent' => $homePageContent,
            'homeSolutionCards' => $homeSolutionCards,
            'whyChooseItems' => $whyChooseItems,
            'whyChooseIcons' => $whyChooseIcons,
            'featuredProductsLoop' => $featuredProductsLoop,
        ]);
    }
}
