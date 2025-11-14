<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TaiKhoan;

class AuthApiController extends Controller
{
    public function login(Request $request)
    {
        $tk = TaiKhoan::where('TENDANGNHAP', $request->username)
            ->where('MATKHAU', $request->password)
            ->first();

        if (!$tk) {
            return response()->json([
                'success' => false,
                'message' => 'Sai tên đăng nhập hoặc mật khẩu'
            ], 401);
        }

        return response()->json([
            'success' => true,
            'message' => 'Đăng nhập thành công',
            'data' => $tk
        ]);
    }
}
