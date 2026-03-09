<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

// ==================
// FRONTEND ROUTES
// ==================

Route::get('/', function () { return view('index-2'); });
Route::get('/shop-standard-men', function () { return view('shop-standard-men'); });
Route::get('/dress-shirts', function () { return view('dress-shirts'); });
Route::get('/jeans-men', function () { return view('jeans-men'); });
Route::get('/dress-pents-man', function () { return view('dress-pents-man'); });
Route::get('/mens-kurta', function () { return view('mens-kurta'); });
Route::get('/shop-standard', function () { return view('shop-standard'); });
Route::get('/shop-standard-clothes', function () { return view('shop-standard-clothes'); });
Route::get('/women-western', function () { return view('women-western'); });
Route::get('/ready-to-wear-women', function () { return view('ready-to-wear-women'); });
Route::get('/shoes-men-loafer', function () { return view('shoes-men-loafer'); });
Route::get('/shoes-men-sneaker', function () { return view('shoes-men-sneaker'); });
Route::get('/shoes-men-brouge', function () { return view('shoes-men-brouge'); });
Route::get('/shoes-men-boots', function () { return view('shoes-men-boots'); });
Route::get('/shoes-women-loafer', function () { return view('shoes-women-loafer'); });
Route::get('/shoes-women-heels', function () { return view('shoes-women-heels'); });
Route::get('/shoes-women-flats', function () { return view('shoes-women-flats'); });
Route::get('/shoes-women-boots', function () { return view('shoes-women-boots'); });
Route::get('/cosmetics-skincare', function () { return view('cosmetics-skincare'); });
Route::get('/cosmetics-makeup', function () { return view('cosmetics-makeup'); });
Route::get('/cosmetics-haircare', function () { return view('cosmetics-haircare'); });
Route::get('/jewellery', function () { return view('jewellery'); });
Route::get('/bags', function () { return view('bags'); });
Route::get('/tryon', function () { return view('tryon'); });
Route::get('/about-us', function () { return view('about-us'); });
Route::get('/faqs', function () { return view('faqs'); });
Route::get('/our-team', function () { return view('our-team'); });
Route::get('/error-404', function () { return view('error-404'); });
Route::get('/contact', function () { return view('contact-us-1'); });

// ==================
// AUTH ROUTES
// ==================

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==================
// ADMIN ROUTES
// ==================

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});
