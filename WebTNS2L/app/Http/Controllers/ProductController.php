<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function show(Request $request, string $id): View
    {
        $categoryProducts = [
            // Perfume Dispenser
            [
                'id' => 1,
                'name' => 'TNS 18 Grey',
                'description' => 'Digital perfume dispenser with timer and refill flexibility.',
                'category' => 'Triscent',
                'subcategory' => 'Perfume Dispenser',
                'image' => '/images/tns-18-grey.png',
                'images' => ['/images/tns-18-grey.png'],
                'specifications' => [
                    ['label' => 'LCD Display', 'value' => 'Yes'],
                    ['label' => 'Digital Timer', 'value' => 'Yes'],
                    ['label' => 'Refill Spray', 'value' => 'All Size'],
                    ['label' => 'D Battery', 'value' => '2 pcs'],
                    ['label' => 'Timer Button', 'value' => '5, 10, 15, 20 minutes'],
                ],
            ],
            [
                'id' => 3,
                'name' => 'TNS TOV-02 PRO',
                'description' => 'Oil-based scenting diffuser with 12V stable operation, 2.5W power, 200ml capacity, covering up to 500m³.',
                'category' => 'Triscent',
                'subcategory' => 'Diffuser',
                'image' => '/images/tns-tov-02-pro.png',
                'images' => ['/images/tns-tov-02-pro.png'],
                'specifications' => [
                    ['label' => 'Operation', 'value' => 'Stable 12V'],
                    ['label' => 'Power', 'value' => '2.5W'],
                    ['label' => 'Oil Capacity', 'value' => '200 ml'],
                    ['label' => 'Coverage', 'value' => 'Up to 500 m³'],
                ],
            ],
            // Diffuser
            [
                'id' => 4,
                'name' => 'TNS TZU 03',
                'description' => 'Oil-based scenting diffuser with 12V operation, 4.5W power, 300ml capacity, covering up to 800m³.',
                'category' => 'Triscent',
                'subcategory' => 'Diffuser',
                'image' => '/images/tns-tzu-03.png',
                'images' => ['/images/tns-tzu-03.png'],
                'specifications' => [
                    ['label' => 'Operation', 'value' => 'Stable 12V'],
                    ['label' => 'Power', 'value' => '4.5W'],
                    ['label' => 'Oil Capacity', 'value' => '300 ml'],
                    ['label' => 'Coverage', 'value' => 'Up to 800 m³'],
                ],
            ],
            [
                'id' => 5,
                'name' => 'TNS TZG Air',
                'description' => 'Industrial-grade oil scenting diffuser with 12V operation, 15W power, 1.500ml capacity, covering up to 4.000m³.',
                'category' => 'Triscent',
                'subcategory' => 'Diffuser',
                'image' => '/images/tns-tzg-air.png',
                'images' => ['/images/tns-tzg-air.png'],
                'specifications' => [
                    ['label' => 'Operation', 'value' => 'Stable 12V'],
                    ['label' => 'Power', 'value' => '15W'],
                    ['label' => 'Oil Capacity', 'value' => '1.500 ml'],
                    ['label' => 'Coverage', 'value' => 'Up to 4.000 m³'],
                ],
            ],
            // Hygiene Sanitary
            [
                'id' => 6,
                'name' => 'Hand Soap Dispenser',
                'description' => 'Soap dispenser unit for standard handwashing stations.',
                'category' => 'Triscent',
                'subcategory' => 'Hygiene Sanitary',
                'image' => '/images/tns-hand-soap-dispenser-single.png',
                'images' => [
                    '/images/tns-hand-soap-dispenser-single.png',
                    '/images/tns-hand-soap-dispenser-double.png',
                ],
                'specifications' => [
                    ['label' => 'Unit', 'value' => 'Single'],
                    ['label' => 'Colour', 'value' => 'White'],
                    ['label' => 'Capacity', 'value' => '400 ml'],
                    ['label' => 'Drop', 'value' => '1 ml per drop'],
                    ['label' => 'Push Type', 'value' => 'Yes'],
                ],
            ],
            [
                'id' => 7,
                'name' => 'TNS Handroll Tissue',
                'description' => 'Handroll tissue dispenser for hygienic and durable daily use.',
                'category' => 'Triscent',
                'subcategory' => 'Hygiene Sanitary',
                'image' => '/images/tns-handroll-tissue.png',
                'images' => ['/images/tns-handroll-tissue.png'],
                'specifications' => [
                    ['label' => 'Colour', 'value' => 'White'],
                    ['label' => 'Material', 'value' => 'Plastic'],
                    ['label' => 'Dimension', 'value' => '27 x 9 x 20 cm'],
                    ['label' => 'Installation', 'value' => 'Wall Mounted'],
                ],
            ],
            [
                'id' => 8,
                'name' => 'TNS Soap Dispenser 1000ml',
                'description' => 'Large-capacity soap dispenser for high-traffic hygiene points.',
                'category' => 'Triscent',
                'subcategory' => 'Hygiene Sanitary',
                'image' => '/images/tns-soap-dispenser.png',
                'images' => ['/images/tns-soap-dispenser.png'],
                'specifications' => [
                    ['label' => 'Colour', 'value' => 'White'],
                    ['label' => 'Capacity', 'value' => '1000 ml'],
                    ['label' => 'Drop', 'value' => '1 ml per drop'],
                    ['label' => 'Push Button', 'value' => 'Yes'],
                ],
            ],

            // Toilet Sanitary
            [
                'id' => 9,
                'name' => 'TNS Digital Sanitizer',
                'description' => 'Toilet sanitizer system designed to work with flush water pressure.',
                'category' => 'Triscent',
                'subcategory' => 'Toilet Sanitary',
                'image' => '/images/tns-digital-sanitizer.png',
                'images' => ['/images/tns-digital-sanitizer.png'],
                'specifications' => [
                    ['label' => 'Water Pressure System', 'value' => 'Mechanical'],
                    ['label' => 'Toilet Sanitizer', 'value' => 'Yes'],
                ],
            ],
            [
                'id' => 10,
                'name' => 'TNS Hand Dryer',
                'description' => 'Automatic hand dryer for public and commercial washroom areas.',
                'category' => 'Triscent',
                'subcategory' => 'Toilet Sanitary',
                'image' => '/images/tns-digital-hand-dryer.png',
                'images' => ['/images/tns-digital-hand-dryer.png'],
                'specifications' => [
                    ['label' => 'Auto Sensor', 'value' => 'Yes'],
                    ['label' => 'Wattage', 'value' => '600 watt'],
                    ['label' => 'Voltage', 'value' => '220 volt'],
                    ['label' => 'Air', 'value' => 'Warm'],
                ],
            ],
            [
                'id' => 11,
                'name' => 'TNS Seat Cleaner',
                'description' => 'Seat cleaner dispenser to support hygienic restroom usage.',
                'category' => 'Triscent',
                'subcategory' => 'Toilet Sanitary',
                'image' => '/images/tns-seat-cleaner.png',
                'images' => ['/images/tns-seat-cleaner.png'],
                'specifications' => [
                    ['label' => 'LCD Display', 'value' => 'Yes'],
                    ['label' => 'Digital Timer', 'value' => 'Yes'],
                    ['label' => 'Refill Spray', 'value' => 'All Size'],
                    ['label' => 'Push Button', 'value' => 'Yes'],
                ],
            ],
            [
                'id' => 12,
                'name' => 'TNS Sanitary Bin',
                'description' => 'Sanitary bin with practical pedal operation for hygiene support.',
                'category' => 'Triscent',
                'subcategory' => 'Toilet Sanitary',
                'image' => '/images/tns-sanitary-bin.png',
                'images' => ['/images/tns-sanitary-bin.png'],
                'specifications' => [
                    ['label' => 'Pedal', 'value' => 'Yes'],
                    ['label' => 'Double Lid', 'value' => 'Yes'],
                    ['label' => 'Easy Wash', 'value' => 'Yes'],
                ],
            ],
        ];

        $productDetailPageContent = [
            'grade' => 'Industrial Grade A+',
            'specificationTitle' => 'Technical Specifications',
            'relatedTitle' => 'Related Products',
            'allCategoryLabel' => 'View All Category',
            'cta' => 'Chat Now',
        ];

        $productDetailFallbackSpecs = [
            ['label' => 'Material', 'value' => 'Komposit standar industri'],
            ['label' => 'Durability', 'value' => 'Dirancang untuk siklus kerja tinggi'],
            ['label' => 'Maintenance', 'value' => 'Komponen modular dengan perawatan rendah'],
            ['label' => 'Application', 'value' => 'Operasional komersial dan fasilitas'],
        ];

        $companyProfile = [
            'whatsappLink' => 'https://wa.me/6287722725483',
        ];

        $product = null;
        foreach ($categoryProducts as $item) {
            if ((int) $item['id'] === (int) $id) {
                $product = $item;
                break;
            }
        }

        if (!$product) {
            abort(404);
        }

        $specs = $product['specifications'] ?? $productDetailFallbackSpecs;

        $relatedProducts = array_values(array_filter(
            $categoryProducts,
            fn($item) => $item['category'] === $product['category'] && $item['id'] !== $product['id']
        ));
        $relatedProducts = array_slice($relatedProducts, 0, 4);

        return view('produk-detail', [
            'product' => $product,
            'specs' => $specs,
            'relatedProducts' => $relatedProducts,
            'productDetailPageContent' => $productDetailPageContent,
            'companyProfile' => $companyProfile,
        ]);
    }
}
