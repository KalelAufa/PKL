<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        $companyProfile = [
            'companyName' => 'PT Tricipta Niaga Sukses',
            'brandName' => 'Triscent',
            'tagline' => 'General Trading, Rental, and Maintenance Solutions',
            'website' => 'www.triciptaniagasukses.my.id',
            'email' => 'cs.triciptaniagasukses@gmail.com',
            'whatsapp' => '0877 2272 5483 (Titis)',
            'whatsappLink' => 'https://wa.me/6287722725483',
            'phone' => '0821 4353 5505',
            'whatsapp2' => '0821 4353 5505',
            'whatsapp2Link' => 'https://wa.me/6282143535505',
            'address' => 'Perum Graha Kota blok C4-5, Suko, Sidoarjo, Jawa Timur',
        ];

        $contactPageContent = [
            'title' => 'Hubungi Tim Kami',
            'subtitle' => 'Siap untuk mengintegrasikan keunggulan industrial ke dalam proyek Anda. Hubungi spesialis kami untuk konsultasi teknis dan solusi yang presisi.',
        ];

        $contactFormCopy = [
            'fullNameLabel' => 'Nama Lengkap',
            'fullNamePlaceholder' => 'John Doe',
            'emailLabel' => 'Email Perusahaan',
            'emailPlaceholder' => 'email@company.com',
            'needLabel' => 'Kategori Kebutuhan',
            'messageLabel' => 'Detail Pesan',
            'messagePlaceholder' => 'Deskripsikan kebutuhan industrial Anda secara spesifik...',
            'submitLabel' => 'Kirim Pesan',
        ];

        $contactNeedOptions = [
            'Air Freshener & Hygiene',
        ];

        $contactCards = [
            [
                'title' => 'Email',
                'value' => [$companyProfile['email']],
            ],
            [
                'title' => 'Kontak',
                'value' => [
                    str_replace(' (Titis)', '', $companyProfile['whatsapp']),
                    $companyProfile['phone'],
                ],
            ],
            [
                'title' => 'Address',
                'value' => [$companyProfile['address'] . ', Indonesia'],
            ],
        ];

        return view('hubungi-kami', [
            'companyProfile' => $companyProfile,
            'contactPageContent' => $contactPageContent,
            'contactFormCopy' => $contactFormCopy,
            'contactNeedOptions' => $contactNeedOptions,
            'contactCards' => $contactCards,
        ]);
    }
}
