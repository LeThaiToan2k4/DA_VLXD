<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\DonHang;
use App\Models\ChiTietDonHang;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
        public function add(Request $request)
    {
        $id = $request->MASP;
        $soluong = $request->soluong ?? 1;

        $sp = SanPham::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['soluong'] += $soluong;
        } else {
            $cart[$id] = [
                'TENSP' => $sp->TENSP,
                'DONGIABAN' => $sp->DONGIABAN,
                'HINHANH' => $sp->HINHANH,
                'soluong' => $soluong,
                'MADVT' => $sp->donViTinh->TENDVT
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Đã thêm vào giỏ hàng!');
    }
    // Hiển thị giỏ hàng
    public function index()
    {
        // Lấy nội dung giỏ hàng từ session hoặc database
        $cart = session()->get('cart', []); // ví dụ lưu trong session

        // Trả về view giỏ hàng
        return view('user.cart.index', compact('cart'));
    }
    // Hiển thị form checkout
    public function checkoutForm()
    {
        $cart = session()->get('cart', []);
        if(empty($cart)) {
            return redirect()->route('cua-hang.cart.index')->with('error', 'Giỏ hàng trống!');
        }
        return view('user.cart.checkout', compact('cart'));
    }

    // Xử lý checkout
    public function checkout(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $cart = session()->get('cart', []);
        if(empty($cart)) {
            return redirect()->route('cua-hang.cart.index')->with('error', 'Giỏ hàng trống!');
        }

        // Tạo đơn hàng
        $donHang = DonHang::create([
            'TENKH' => $request->name,
            'EMAIL' => $request->email,
            'SDT' => $request->phone,
            'DIACHI' => $request->address,
            'NGAYDATHANG' => Carbon::now(),
            'TRANGTHAI' => 'Chờ xử lý',
        ]);

        // Lưu chi tiết đơn hàng
        foreach($cart as $masp => $item){
            ChiTietDonHang::create([
                'MADH' => $donHang->id,
                'MASP' => $masp,
                'SOLUONG' => $item['soluong'],
                'DONGIA' => $item['DONGIABAN'],
            ]);
        }

        // Xóa giỏ hàng sau khi thanh toán
        Session::forget('cart');

        return redirect()->route('cua-hang.home')->with('success', 'Đặt hàng thành công!');
    }

}
