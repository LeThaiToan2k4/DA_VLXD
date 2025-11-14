<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use App\Models\LoaiSanPham;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    // Danh sách sản phẩm
    public function index()
    {
        $sanphams = SanPham::with('loai')->get();
        return view('admin.sanpham.index', compact('sanphams'));
    }

    // Hiển thị form thêm
    public function create()
    {
        $loais = LoaiSanPham::all();
        return view('admin.sanpham.create', compact('loais'));
    }

    // Lưu sản phẩm mới
    public function store(Request $request)
    {
        $request->validate([
            'TENSP' => 'required',
            'DVT' => 'required',
            'GIA' => 'required|numeric',
            'MALOAI' => 'required',
        ]);

        SanPham::create($request->all());
        return redirect()->route('admin.sanpham.index')->with('success', 'Thêm sản phẩm thành công!');
    }

    // Hiển thị form sửa
    public function edit($id)
    {
        $sanpham = SanPham::findOrFail($id);
        $loais = LoaiSanPham::all();
        return view('admin.sanpham.edit', compact('sanpham', 'loais'));
    }

    // Cập nhật
    public function update(Request $request, $id)
    {
        $sanpham = SanPham::findOrFail($id);
        $sanpham->update($request->all());
        return redirect()->route('admin.sanpham.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    // Xóa
    public function destroy($id)
    {
        $sanpham = SanPham::findOrFail($id);
        $sanpham->delete();
        return redirect()->route('admin.sanpham.index')->with('success', 'Đã xóa sản phẩm!');
    }
}
