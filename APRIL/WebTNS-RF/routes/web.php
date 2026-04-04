<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KatalogController;

// Route Home (Welcome)
Route::get("/", function () {
    return view("welcome");
});

// Route Utama (Dashboard Kategori)
Route::get("/home", function () {
    $products = [];
    foreach (config("katalog.kategori") as $slug => $data) {
        $products[] = [
            "title" => $data["title"],
            "image" => $data["image"],
            "a" => route("katalog.index", ["kategoriSlug" => $slug])
        ];
    }
    return view("index", compact("products"));
})->name("home");

// Rute Dinamis Katalog
Route::get("/katalog/{kategoriSlug}", [KatalogController::class, "index"])->name("katalog.index");
Route::get("/katalog/{kategoriSlug}/{produkSlug}", [KatalogController::class, "show"])->name("katalog.show");

