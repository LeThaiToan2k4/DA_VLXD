@extends('layouts.app')
@section('title', 'Trang chủ - VLXD Hiệp Hà')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="alert alert-info text-center py-4">
            <h1 class="display-5 fw-bold">Chào mừng đến với VLXD Hiệp Hà</h1>
            <p class="lead">Cung cấp vật liệu xây dựng chất lượng cao – Giá tốt – Giao hàng nhanh</p>
            <a href="{{ route('user.products.index') }}" class="btn btn-primary btn-lg">Xem sản phẩm</a>
        </div>
    </div>
</div>

<div class="row mt-4">
    @foreach(\App\Models\LoaiSanPham::inRandomOrder()->limit(6)->get() as $loai)
        <div class="col-md-4 mb-4">
            <div class="card h-100 text-center">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h5 class="card-title">{{ $loai->TENLOAI }}</h5>
                    <a href="{{ route('user.products.index', ['loai' => $loai->MALOAI]) }}"
                       class="btn btn-outline-primary mt-2">Xem ngay</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
