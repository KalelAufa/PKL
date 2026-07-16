<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(Request $request): View
    {
        $categoryPageContent = [
            'title' => 'Everything Your Industry Needs.',
            'subtitle' => 'Eksplor katalog lengkap Air Freshener Otomatis, produk hygiene, dan kemasan industri yang dirancang untuk reliabilitas jangka panjang.',
            'categoryLabel' => 'Category Selection',
            'allLabel' => 'SEMUA',
        ];

        $categorySubMap = [
            'Triscent' => [
                'Perfume Dispenser',
                'Diffuser',
                'Hygiene Sanitary',
                'Toilet Sanitary',
            ],
        ];

        $categoryProducts = [
            // Perfume Dispenser
            [
                'id' => 1,
                'name' => 'TNS 18 Grey',
                'description' => 'Digital perfume dispenser with timer and refill flexibility.',
                'category' => 'Triscent',
                'subcategory' => 'Perfume Dispenser',
                'image' => '/images/tns-18-grey.png',
            ],
            [
                'id' => 3,
                'name' => 'TNS TOV-02 PRO',
                'description' => 'Oil-based scenting diffuser with 12V stable operation, 2.5W power, 200ml capacity, covering up to 500m³.',
                'category' => 'Triscent',
                'subcategory' => 'Diffuser',
                'image' => '/images/tns-tov-02-pro.png',
            ],
            // Diffuser
            [
                'id' => 4,
                'name' => 'TNS TZU 03',
                'description' => 'Oil-based scenting diffuser with 12V operation, 4.5W power, 300ml capacity, covering up to 800m³.',
                'category' => 'Triscent',
                'subcategory' => 'Diffuser',
                'image' => '/images/tns-tzu-03.png',
            ],
            [
                'id' => 5,
                'name' => 'TNS TZG Air',
                'description' => 'Industrial-grade oil scenting diffuser with 12V operation, 15W power, 1.500ml capacity, covering up to 4.000m³.',
                'category' => 'Triscent',
                'subcategory' => 'Diffuser',
                'image' => '/images/tns-tzg-air.png',
            ],
            // Hygiene Sanitary
            [
                'id' => 6,
                'name' => 'Hand Soap Dispenser',
                'description' => 'Soap dispenser unit for standard handwashing stations.',
                'category' => 'Triscent',
                'subcategory' => 'Hygiene Sanitary',
                'image' => '/images/tns-hand-soap-dispenser-single.png',
            ],
            [
                'id' => 7,
                'name' => 'TNS Handroll Tissue',
                'description' => 'Handroll tissue dispenser for hygienic and durable daily use.',
                'category' => 'Triscent',
                'subcategory' => 'Hygiene Sanitary',
                'image' => '/images/tns-handroll-tissue.png',
            ],
            [
                'id' => 8,
                'name' => 'TNS Soap Dispenser 1000ml',
                'description' => 'Large-capacity soap dispenser for high-traffic hygiene points.',
                'category' => 'Triscent',
                'subcategory' => 'Hygiene Sanitary',
                'image' => '/images/tns-soap-dispenser.png',
            ],

            // Toilet Sanitary
            [
                'id' => 9,
                'name' => 'TNS Digital Sanitizer',
                'description' => 'Toilet sanitizer system designed to work with flush water pressure.',
                'category' => 'Triscent',
                'subcategory' => 'Toilet Sanitary',
                'image' => '/images/tns-digital-sanitizer.png',
            ],
            [
                'id' => 10,
                'name' => 'TNS Hand Dryer',
                'description' => 'Automatic hand dryer for public and commercial washroom areas.',
                'category' => 'Triscent',
                'subcategory' => 'Toilet Sanitary',
                'image' => '/images/tns-digital-hand-dryer.png',
            ],
            [
                'id' => 11,
                'name' => 'TNS Seat Cleaner',
                'description' => 'Seat cleaner dispenser to support hygienic restroom usage.',
                'category' => 'Triscent',
                'subcategory' => 'Toilet Sanitary',
                'image' => '/images/tns-seat-cleaner.png',
            ],
            [
                'id' => 12,
                'name' => 'TNS Sanitary Bin',
                'description' => 'Sanitary bin with practical pedal operation for hygiene support.',
                'category' => 'Triscent',
                'subcategory' => 'Toilet Sanitary',
                'image' => '/images/tns-sanitary-bin.png',
            ],
        ];

        $categoryParam = $request->query('category');
        $activeCategory = array_key_exists($categoryParam, $categorySubMap)
            ? $categoryParam
            : 'Triscent';

        return view('kategori', [
            'categoryPageContent' => $categoryPageContent,
            'categorySubMap' => $categorySubMap,
            'categoryProducts' => $categoryProducts,
            'activeCategory' => $activeCategory,
        ]);
    }
}
