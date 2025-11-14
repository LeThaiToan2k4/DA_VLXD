<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use App\Models\LoaiSanPham;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $loai = LoaiSanPham::all();
        $query = SanPham::with(['loai', 'donViTinh', 'tonKho']);

        if ($request->filled('loai')) {
            $query->where('MALOAI', $request->loai);
        }

        if ($request->filled('timkiem')) {
            $query->where('TENSP', 'like', '%' . $request->timkiem . '%');
        }

        $sanpham = $query->paginate(12);

        return view('user.products.index', compact('sanpham', 'loai'));
    }

    public function show($MASP)
    {
        $sp = SanPham::with(['loai', 'donViTinh', 'tonKho', 'chiTietCat', 'chiTietDa', 'chiTietXimang'])
                     ->findOrFail($MASP);

        $tonkho = $sp->tonKho->sum('SOLUONG');

        return view('user.products.show', compact('sp', 'tonkho'));
    }
}
