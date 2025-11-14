<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\SanPhamApiController;
use App\Http\Controllers\Api\LoaiSanPhamApiController;

// -------- API Đăng nhập ---------
Route::post('/login', [AuthApiController::class, 'login']);

// -------- API Sản phẩm ----------
Route::prefix('/sanpham')->group(function () {
    Route::get('/', [SanPhamApiController::class, 'index']);
    Route::get('/{id}', [SanPhamApiController::class, 'show']);
    Route::post('/store', [SanPhamApiController::class, 'store']);
    Route::put('/update/{id}', [SanPhamApiController::class, 'update']);
    Route::delete('/delete/{id}', [SanPhamApiController::class, 'destroy']);
});

// -------- API Loại sản phẩm ----------
Route::prefix('/loaisanpham')->group(function () {
    Route::get('/', [LoaiSanPhamApiController::class, 'index']);
    Route::get('/{id}', [LoaiSanPhamApiController::class, 'show']);
});
