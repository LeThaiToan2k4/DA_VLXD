<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaiKhoan;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Hiển thị form login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Xử lý login
    public function login(Request $request)
    {
        $tk = TaiKhoan::where('TENDANGNHAP', $request->username)
            ->first();

        if ($tk && $tk->MATKHAU === $request->password) {
            Session::put('user', $tk);
            if ($tk->QUYEN === 'ADMIN') {
                return redirect()->route('admin.home');
            }
            return redirect()->route('home');
        }

        return back()->with('error', 'Sai tên đăng nhập hoặc mật khẩu');
    }

    // Hiển thị form register
    public function showRegister()
    {
        return view('auth.register');
    }

    // Xử lý đăng ký người dùng mới
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:TAIKHOAN,TENDANGNHAP',
            'password' => 'required|min:4|confirmed',
        ]);

        TaiKhoan::create([
            'TENDANGNHAP' => $request->username,
            'MATKHAU' => $request->password, // nếu muốn hash: Hash::make($request->password)
            'QUYEN' => 'USER',
        ]);

        return redirect()->route('login')->with('success', 'Đăng ký thành công! Hãy đăng nhập.');
    }

    // Xử lý logout
    public function logout()
    {
        Session::forget('user');
        return redirect()->route('home');
    }
}
