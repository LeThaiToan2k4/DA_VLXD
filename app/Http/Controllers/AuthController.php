<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaiKhoan;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $tk = TaiKhoan::where('TENDANGNHAP', $request->username)
            ->where('MATKHAU', $request->password)
            ->first();

        if ($tk) {
            Session::put('user', $tk);
            if ($tk->QUYEN == 'ADMIN') {
                return redirect()->route('admin.home');
            }
            return redirect()->route('home');
        }
        return back()->with('error', 'Sai tên đăng nhập hoặc mật khẩu');
    }

    public function logout()
    {
        Session::forget('user');
        return redirect()->route('home');
    }
}
