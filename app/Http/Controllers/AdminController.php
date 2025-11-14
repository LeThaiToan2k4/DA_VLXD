<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // Trang chính admin
    public function index()
    {
        return view('admin.homeAdmin');
    }

    // Danh sách sản phẩm
    public function sanphamIndex()
    {
        $sanphams = DB::table('SANPHAM')
            ->join('LOAISANPHAM', 'SANPHAM.MALOAI', '=', 'LOAISANPHAM.MALOAI')
            ->join('DONVITINH', 'SANPHAM.MADVT', '=', 'DONVITINH.MADVT')
            ->select('SANPHAM.*', 'LOAISANPHAM.TENLOAI', 'DONVITINH.TENDVT')
            ->get();

        return view('admin.sanpham.index', compact('sanphams'));
    }

    // Form thêm sản phẩm
    public function create()
    {
        $loaisp = DB::table('LOAISANPHAM')->get();
        $donvitinh = DB::table('DONVITINH')->get();
        return view('admin.sanpham.create', compact('loaisp', 'donvitinh'));
    }

    // Lưu sản phẩm mới
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

    // Form sửa sản phẩm
    public function edit($id)
    {
        $sanpham = SanPham::findOrFail($id);
        $loaisp = DB::table('LOAISANPHAM')->get();
        $donvitinh = DB::table('DONVITINH')->get();
        return view('admin.sanpham.edit', compact('sanpham', 'loaisp', 'donvitinh'));
    }

    // Cập nhật sản phẩm
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

    // Xóa sản phẩm
    public function destroy($id)
    {
        SanPham::destroy($id);
        return redirect()->route('admin.sanpham.index')->with('success', 'Đã xóa sản phẩm!');
    }
}
