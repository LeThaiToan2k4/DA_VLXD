@extends('layouts.app')
@section('title', 'Chi tiết sản phẩm - VLXD Minh Hiếu')

@section('content')
<div class="row">
    <div class="col-md-6">
        <!-- Hình ảnh sản phẩm -->
        <div class="card mb-4">
            <img src="{{ $sp->HINHANH ? asset('storage/' . $sp->HINHANH) : asset('images/no-image.jpg') }}"
                 class="card-img-top" alt="{{ $sp->TENSP }}">
        </div>
    </div>

    <div class="col-md-6">
        <h3>{{ $sp->TENSP }}</h3>
        <p class="text-muted">
            Loại: {{ $sp->loai->TENLOAI ?? 'Chưa xác định' }}<br>
            Đơn vị: {{ $sp->donViTinh->TENDVT ?? '-' }}
        </p>
        <p class="price display-5">{{ number_format($sp->DONGIABAN) }} ₫</p>

        <form action="{{ route('cua-hang.cart.add') }}" method="POST" class="mt-3">
            @csrf
            <input type="hidden" name="MASP" value="{{ $sp->MASP }}">
            <div class="mb-3">
                <label for="soluong" class="form-label">Số lượng:</label>
                <input type="number" id="soluong" name="soluong" value="1" min="1" class="form-control" style="width: 100px;">
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-cart-plus"></i> Thêm vào giỏ
            </button>
        </form>

        <a href="{{ route('cua-hang.products.index') }}" class="btn btn-outline-secondary mt-3">
            Quay lại danh sách
        </a>
    </div>
</div>

<div class="row mt-5">
    <div class="col-12">
        <h4>Mô tả sản phẩm</h4>
        <p>{{ $sp->MOTA ?? 'Chưa có mô tả' }}</p>
    </div>
</div>
@endsection
