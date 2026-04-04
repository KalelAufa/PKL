<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function index($kategoriSlug)
    {
        $katalog = config('katalog');

        if (!array_key_exists($kategoriSlug, $katalog['kategori'])) {
            abort(404);
        }

        $kategoriInfo = $katalog['kategori'][$kategoriSlug];
        $produkList = $katalog['produk'][$kategoriSlug] ?? [];

        return view('kategori.index', compact('kategoriInfo', 'produkList', 'kategoriSlug'));
    }

    public function show($kategoriSlug, $produkSlug)
    {
        $katalog = config('katalog');

        if (!isset($katalog['produk'][$kategoriSlug][$produkSlug])) {
            abort(404);
        }

        $produk = $katalog['produk'][$kategoriSlug][$produkSlug];

        // Merender view spesifik bawaan jika ada, karena banyak tabel spesifikasi yang sifatnya HTML Hardcode
        if (isset($produk['view']) && view()->exists($produk['view'])) {
            return view($produk['view']);
        }

        $namaKategori = $katalog['kategori'][$kategoriSlug]['title'];

        return view('kategori.detail', compact('produk', 'namaKategori', 'kategoriSlug'));
    }
}
