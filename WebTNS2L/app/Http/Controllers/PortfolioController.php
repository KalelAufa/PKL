<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function index(): View
    {
        $portfolioPageContent = [
            'title' => 'PORTOFOLIO PROYEK.',
            'subtitle' => 'Implementasi material dan solusi industri berkualitas tinggi pada sektor komersial dan publik di seluruh Indonesia.',
        ];

        $portfolioProjects = [
            [
                'id' => 1,
                'sector' => 'Instansi Pemerintah',
                'title' => 'Dinas Perkebunan',
                'image' => '/images/portofolio-dinas-perkebunan.png',
            ],
            [
                'id' => 2,
                'sector' => 'Instansi Pemerintah',
                'title' => 'Mushollah Dinas Perkebunan',
                'image' => '/images/portofolio-mushollah-dinas-perkebunan.png',
            ],
        ];

        return view('portofolio', [
            'portfolioPageContent' => $portfolioPageContent,
            'portfolioProjects' => $portfolioProjects,
        ]);
    }
}
