<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SanPhamController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');

Route::prefix('admin/sanpham')->group(function () {
    Route::get('/', [SanPhamController::class, 'index'])->name('admin.sanpham.index');
    Route::get('/create', [SanPhamController::class, 'create'])->name('admin.sanpham.create');
    Route::post('/store', [SanPhamController::class, 'store'])->name('admin.sanpham.store');
    Route::get('/edit/{id}', [SanPhamController::class, 'edit'])->name('admin.sanpham.edit');
    Route::post('/update/{id}', [SanPhamController::class, 'update'])->name('admin.sanpham.update');
    Route::get('/delete/{id}', [SanPhamController::class, 'destroy'])->name('admin.sanpham.destroy');
    Route::get('/{id}', [SanPhamController::class, 'show'])->name('admin.sanpham.show');
});
