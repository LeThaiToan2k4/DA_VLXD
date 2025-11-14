@extends('layouts.app')
@section('title', 'Đặt hàng')

@section('content')
<h3>Thông tin đặt hàng</h3>

<form action="{{ route('user.checkout.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Họ tên</label>
                        <input type="text" name="TENKH" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Số điện thoại</label>
                        <input type="text" name="DIENTHOAI" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Địa chỉ giao hàng</label>
                        <textarea name="DIACHI" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ghi chú</label>
                        <textarea name="GHICHU" class="form-control" rows="2"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">Tóm tắt đơn hàng</div>
                <div class="card-body">
                    @php $tong = 0; @endphp
                    <ul class="list-group list-group-flush">
                        @foreach(session('cart') as $id => $item)
                            @php $thanhtien = $item['DONGIABAN'] * $item['soluong']; $tong += $thanhtien; @endphp
                            <li class="list-group-item d-flex justify-content-between">
                                <span>{{ $item['TENSP'] }} x{{ $item['soluong'] }}</span>
                                <span>{{ number_format($thanhtien) }} ₫</span>
                            </li>
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between fw-bold">
                            <span>Tổng tiền</span>
                            <span class="text-danger">{{ number_format($tong) }} ₫</span>
                        </li>
                    </ul>
                    <button type="submit" class="btn btn-success w-100 mt-3">Xác nhận đặt hàng</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
