@extends('layouts.app')
@section('title', 'Giỏ hàng')

@section('content')
<h3>Giỏ hàng của bạn</h3>

@if(session('cart') && count(session('cart')) > 0)
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php $tong = 0; @endphp
                @foreach(session('cart') as $id => $item)
                    @php
                        $thanhtien = $item['DONGIABAN'] * $item['soluong'];
                        $tong += $thanhtien;
                    @endphp
                    <tr>
                        <td>{{ $item['TENSP'] }}</td>
                        <td>{{ number_format($item['DONGIABAN']) }} ₫</td>
                        <td>
                            <form action="{{ route('cua-hang.cart.update') }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <input type="number" name="soluong" value="{{ $item['soluong'] }}" min="1" class="form-control d-inline w-auto" style="width: 70px;">
                                <button type="submit" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-sync"></i>
                                </button>
                            </form>
                        </td>
                        <td>{{ number_format($thanhtien) }} ₫</td>
                        <td>
                            <form action="{{ route('cua-hang.cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr class="table-info">
                    <td colspan="3" class="text-end fw-bold">Tổng cộng:</td>
                    <td colspan="2" class="fw-bold text-danger">{{ number_format($tong) }} ₫</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="text-end mt-3">
        <a href="{{ route('cua-hang.checkout.create') }}" class="btn btn-success btn-lg">Tiến hành đặt hàng</a>
    </div>
@else
    <div class="text-center py-5">
        <p class="text-muted">Giỏ hàng trống.</p>
        <a href="{{ route('cua-hang.products.index') }}" class="btn btn-primary">Tiếp tục mua sắm</a>
    </div>
@endif
@endsection
