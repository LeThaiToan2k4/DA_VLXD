<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;


Route::get('/', [HomeController::class, 'index'])->name('home');

// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');

Route::prefix('admin/sanpham')->group(function () {
    Route::get('/', [AdminController::class, 'sanphamIndex'])->name('admin.sanpham.index');
    Route::get('/create', [AdminController::class, 'create'])->name('admin.sanpham.create');
    Route::post('/store', [AdminController::class, 'store'])->name('admin.sanpham.store');
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.sanpham.edit');
    Route::post('/update/{id}', [AdminController::class, 'update'])->name('admin.sanpham.update');
    Route::get('/delete/{id}', [AdminController::class, 'destroy'])->name('admin.sanpham.destroy');
});

// Cửa hàng (user)
Route::prefix('cua-hang')->name('cua-hang.')->group(function () {
    // Trang chủ cửa hàng
    Route::get('/', [ProductController::class, 'index'])->name('home');

    // Sản phẩm
    Route::get('/san-pham', [ProductController::class, 'index'])->name('products.index');
    Route::get('/san-pham/{MASP}', [ProductController::class, 'show'])->name('products.show');

    // Giỏ hàng
    Route::post('/gio-hang/them', [CartController::class, 'add'])->name('cart.add');
    Route::get('/gio-hang', [CartController::class, 'index'])->name('cart.index');
    Route::post('/gio-hang/cap-nhat', [CartController::class, 'update'])->name('cart.update');
    Route::post('/gio-hang/xoa', [CartController::class, 'remove'])->name('cart.remove');


});
