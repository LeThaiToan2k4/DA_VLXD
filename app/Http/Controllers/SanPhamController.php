<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\LoaiSanPham;

class SanPhamController extends Controller
{
    public function index()
    {
        $sanphams = SanPham::with('loai', 'dvt')->get();
        return view('admin.sanpham.index', compact('sanphams'));
    }

    public function create()
    {
        $loais = LoaiSanPham::all();
        return view('admin.sanpham.create', compact('loais'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'TENSP' => 'required|string|max:100',
            'MALOAI' => 'required|integer',
            'MADVT' => 'required|integer',
            'DONGIABAN' => 'required|numeric',
            'BANLE' => 'required|boolean',
            'MOTA' => 'nullable|string',
            'HINHANH' => 'nullable|string|max:200',
        ]);

        SanPham::create($data);
        return redirect()->route('admin.sanpham.index')->with('success', 'Đã thêm sản phẩm mới!');
    }

    public function edit($id)
    {
        $sanpham = SanPham::findOrFail($id);
        $loais = LoaiSanPham::all();
        return view('admin.sanpham.edit', compact('sanpham', 'loais'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'TENSP' => 'required|string|max:100',
            'MALOAI' => 'required|integer',
            'MADVT' => 'required|integer',
            'DONGIABAN' => 'required|numeric',
            'BANLE' => 'required|boolean',
            'MOTA' => 'nullable|string',
            'HINHANH' => 'nullable|string|max:200',
        ]);
        SanPham::findOrFail($id)->update($data);
        return redirect()->route('admin.sanpham.index')->with('success', 'Đã cập nhật sản phẩm!');
    }

    public function destroy($id)
    {
        SanPham::destroy($id);
        return redirect()->route('admin.sanpham.index')->with('success', 'Đã xóa sản phẩm!');
    }

    public function show($id)
    {
        $sp = SanPham::with(
            'loai',
            'dvt',
            'chitietCat',
            'chitietDa',
            'chitietXimang',
            'chitietSatThep',
            'chitietGach',
            'chitietSon',
            'chitietOng',
            'chitietPhuKienOng',
            'chitietBonCauChauRua',
            'chitietDayDien',
            'chitietThietBiDien',
            'chitietTrangTri'
        )->findOrFail($id);
        return view('admin.sanpham.show', compact('sp'));
    }
}
