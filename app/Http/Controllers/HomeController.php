<?php

namespace App\Http\Controllers;

use App\Models\SanPham;

class HomeController extends Controller
{
    public function index()
    {
        $sanphams = SanPham::take(8)->get();
        return view('home', compact('sanphams'));
    }
}
