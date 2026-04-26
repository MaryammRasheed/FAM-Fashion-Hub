<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Http\Request;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\ProfileController;

// ==========================================
// HOMEPAGE - Your existing welcome.blade.php
// ==========================================
Route::get('/', function () {
    return view('index-2');
})->name('home');
// ==================
// PASSWORD RESET ROUTES
// ==================

Route::middleware('guest')->group(function () {
    Route::get('/forgot-password', function () {
        return view('auth.forgot-password');
    })->name('password.request');

    Route::post('/forgot-password', function (Request $request) {
        // Handle forgot password
        return back()->with('status', 'Password reset link sent!');
    })->name('password.email');

    Route::get('/reset-password/{token}', function ($token) {
        return view('auth.reset-password', ['token' => $token]);
    })->name('password.reset');

    Route::post('/reset-password', function (Request $request) {
        // Handle reset password
        return redirect('/login')->with('status', 'Password reset successfully!');
    })->name('password.update');
});
// ==========================================
// AUTHENTICATION ROUTES
// ==========================================

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==========================================
// PRODUCTS / SHOP (Public)
// ==========================================
Route::get('/shop', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/category/{slug}', [ProductController::class, 'filterByCategory'])->name('category.filter');

// ==========================================
// YOUR EXISTING FRONTEND PAGES (keep these)
// ==========================================
Route::get('/shop-standard', fn() => view('shop-standard'))->name('shop.standard');
Route::get('/shop-standard-men', fn() => view('shop-standard-men'));
Route::get('/shop-standard-clothes', fn() => view('shop-standard-clothes'));
Route::get('/shop-standard-jewellery', fn() => view('shop-standard-jewellery'));
Route::get('/women-western', fn() => view('women-western'));
Route::get('/ready-to-wear-women', fn() => view('ready-to-wear-women'));
Route::get('/dress-shirts', fn() => view('dress-shirts'));
Route::get('/jeans-men', fn() => view('jeans-men'));
Route::get('/dress-pents-man', fn() => view('dress-pents-man'));
Route::get('/mens-kurta', fn() => view('mens-kurta'));
Route::get('/shoes-men-loafer', fn() => view('shoes-men-loafer'));
Route::get('/shoes-men-sneaker', fn() => view('shoes-men-sneaker'));
Route::get('/shoes-men-brouge', fn() => view('shoes-men-brouge'));
Route::get('/shoes-men-boots', fn() => view('shoes-men-boots'));
Route::get('/shoes-women-loafer', fn() => view('shoes-women-loafer'));
Route::get('/shoes-women-heels', fn() => view('shoes-women-heels'));
Route::get('/shoes-women-flats', fn() => view('shoes-women-flats'));
Route::get('/shoes-women-boots', fn() => view('shoes-women-boots'));
Route::get('/cosmetics-skincare', fn() => view('cosmetics-skincare'));
Route::get('/cosmetics-makeup', fn() => view('cosmetics-makeup'));
Route::get('/cosmetics-haircare', fn() => view('cosmetics-haircare'));
Route::get('/jewellery', fn() => view('jewellery'));
Route::get('/bags', fn() => view('bags'));
Route::get('/tryon', fn() => view('tryon'));
Route::get('/about-us', fn() => view('about-us'))->name('about');
Route::get('/contact', fn() => view('contact-us-1'))->name('contact');
Route::get('/faqs', fn() => view('faqs'))->name('faqs');
Route::get('/our-team', fn() => view('our-team'))->name('team');

// ==========================================
// CART (Works for guests too)
// ==========================================
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add', [CartController::class, 'add'])->name('cart.add');
    Route::put('/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::get('/count', [CartController::class, 'getCartCount'])->name('cart.count');
});

// ==========================================
// AUTHENTICATED USER ROUTES
// ==========================================
Route::middleware('auth')->group(function () {

    // Checkout & Orders
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('orders.place');
    Route::get('/orders/confirm/{id}', [OrderController::class, 'confirm'])->name('orders.confirm');
    Route::get('/orders/history', [OrderController::class, 'history'])->name('orders.history');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::post('/orders/cancel/{id}', [OrderController::class, 'cancel'])->name('orders.cancel');

    // Wishlist
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/add/{productId}', [WishlistController::class, 'add'])->name('wishlist.add');
    Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove');

    // Reviews
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::put('/reviews/{id}', [ReviewController::class, 'update'])->name('reviews.update');
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
    Route::put('/profile/change-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');
});

// ==========================================
// VENDOR PANEL
// ==========================================
Route::middleware(['auth', 'vendor'])->prefix('vendor')->name('vendor.')->group(function () {
    Route::get('/dashboard', [VendorController::class, 'dashboard'])->name('dashboard');

    // Products
    Route::get('/products', [VendorController::class, 'products'])->name('products');
    Route::get('/products/create', [VendorController::class, 'createProduct'])->name('products.create');
    Route::post('/products', [VendorController::class, 'storeProduct'])->name('products.store');
    Route::get('/products/{id}/edit', [VendorController::class, 'editProduct'])->name('products.edit');
    Route::put('/products/{id}', [VendorController::class, 'updateProduct'])->name('products.update');
    Route::delete('/products/{id}', [VendorController::class, 'deleteProduct'])->name('products.delete');

    // Orders
    Route::get('/orders', [VendorController::class, 'orders'])->name('orders');
    Route::put('/orders/{id}/status', [VendorController::class, 'updateOrderStatus'])->name('orders.update-status');

    // Inventory
    Route::get('/inventory', [VendorController::class, 'inventory'])->name('inventory');
    Route::put('/inventory/{id}', [VendorController::class, 'updateStock'])->name('inventory.update');

    // Profile & Earnings
    Route::get('/profile', [VendorController::class, 'profile'])->name('profile');
    Route::put('/profile', [VendorController::class, 'updateProfile'])->name('profile.update');
    Route::get('/earnings', [VendorController::class, 'earnings'])->name('earnings');
});

// ==========================================
// ADMIN PANEL
// ==========================================
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Users
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/users/{id}/edit', [AdminController::class, 'userEdit'])->name('users.edit');
    Route::put('/users/{id}', [AdminController::class, 'userUpdate'])->name('users.update');
    Route::delete('/users/{id}', [AdminController::class, 'userDelete'])->name('users.delete');

    // Vendors
    Route::get('/vendors', [AdminController::class, 'vendors'])->name('vendors');
    Route::post('/vendors/{id}/approve', [AdminController::class, 'vendorApprove'])->name('vendors.approve');
    Route::post('/vendors/{id}/reject', [AdminController::class, 'vendorReject'])->name('vendors.reject');

   
    // Products
    Route::get('/products', [AdminProductController::class, 'index'])->name('products');
    Route::post('/products', [AdminProductController::class, 'store'])->name('products.store');
    Route::post('/products/{id}/approve', [AdminProductController::class, 'approve'])->name('products.approve');
    Route::delete('/products/{id}', [AdminProductController::class, 'destroy'])->name('products.delete');
    Route::get('/products/{id}/edit', [AdminProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}/update', [AdminProductController::class, 'update'])->name('products.update');
    // Categories
    Route::get('/categories', [AdminController::class, 'categories'])->name('categories');
    Route::post('/categories', [AdminController::class, 'categoryStore'])->name('categories.store');
    Route::put('/categories/{id}', [AdminController::class, 'categoryUpdate'])->name('categories.update');
    Route::delete('/categories/{id}', [AdminController::class, 'categoryDelete'])->name('categories.delete');

    // Orders
    Route::get('/orders', [AdminController::class, 'orders'])->name('orders');
    Route::put('/orders/{id}/status', [AdminController::class, 'orderUpdateStatus'])->name('orders.update-status');

    // Reports
    Route::get('/reports', [AdminController::class, 'reports'])->name('reports');

  
});
