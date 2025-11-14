<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use Illuminate\Http\Request;

class SanPhamApiController extends Controller
{
    // Lấy toàn bộ sản phẩm
    public function index()
    {
        $data = SanPham::with('loai')->get();
        return response()->json($data);
    }

    // Lấy 1 sản phẩm
    public function show($id)
    {
        $sp = SanPham::with('loai')->find($id);

        if (!$sp) {
            return response()->json(['error' => 'Không tìm thấy sản phẩm'], 404);
        }

        return response()->json($sp);
    }

    // Thêm sản phẩm
    public function store(Request $request)
    {
        $request->validate([
            'TENSP' => 'required|string|max:100',
            'MALOAI' => 'required',
            'MADVT' => 'required',
            'DONGIABAN' => 'required|numeric',
            'BANLE' => 'required|boolean',
            'MOTA' => 'nullable|string',
            'HINHANH' => 'nullable|string'
        ]);

        $sp = SanPham::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Thêm sản phẩm thành công',
            'data' => $sp
        ]);
    }

    // Cập nhật sản phẩm
    public function update(Request $request, $id)
    {
        $sp = SanPham::find($id);

        if (!$sp) {
            return response()->json(['error' => 'Không tìm thấy sản phẩm'], 404);
        }

        $sp->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Cập nhật thành công',
            'data' => $sp
        ]);
    }

    // Xóa sản phẩm
    public function destroy($id)
    {
        $sp = SanPham::find($id);

        if (!$sp) {
            return response()->json(['error' => 'Không tìm thấy sản phẩm'], 404);
        }

        $sp->delete();

        return response()->json(['success' => true, 'message' => 'Đã xóa sản phẩm']);
    }
}
