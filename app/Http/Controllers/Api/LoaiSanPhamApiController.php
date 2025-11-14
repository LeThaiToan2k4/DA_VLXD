<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LoaiSanPham;

class LoaiSanPhamApiController extends Controller
{
    public function index()
    {
        return response()->json(LoaiSanPham::all());
    }

    public function show($id)
    {
        $loai = LoaiSanPham::find($id);

        if (!$loai) {
            return response()->json(['error' => 'Không tìm thấy'], 404);
        }

        return response()->json($loai);
    }
}
