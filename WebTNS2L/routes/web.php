<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/kategori', [CategoryController::class, 'index']);
Route::get('/portofolio', [PortfolioController::class, 'index']);
Route::get('/hubungi-kami', [ContactController::class, 'index']);
Route::get('/produk/{id}', [ProductController::class, 'show']);
