@extends('layouts.app')
@section('title', 'Sản phẩm - VLXD Minh Hiếu')

@section('content')
<div class="row">
    <!-- Sidebar danh mục -->
    <div class="col-md-3">
        <div class="card mb-4">
            <div class="card-header"><strong>Danh mục</strong></div>
            <div class="list-group list-group-flush">
                <!-- Tất cả sản phẩm -->
                <a href="{{ route('cua-hang.products.index') }}"
                   class="list-group-item {{ request()->has('loai') ? '' : 'active' }}">
                   Tất cả
                </a>

                <!-- Theo từng loại -->
                @foreach($loai as $l)
                    <a href="{{ route('cua-hang.products.index', ['loai' => $l->MALOAI]) }}"
                       class="list-group-item {{ request('loai') == $l->MALOAI ? 'active' : '' }}">
                       {{ $l->TENLOAI }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Danh sách sản phẩm -->
    <div class="col-md-9">
        <h3 class="mb-3">Sản phẩm</h3>
        <div class="row">
            @forelse($sanpham as $sp)
                <div class="col-md-4 mb-4">
                    <div class="card product-card h-100">
                        <img src="{{ $sp->HINHANH ? asset('storage/' . $sp->HINHANH) : asset('images/no-image.jpg') }}"
                             class="card-img-top" alt="{{ $sp->TENSP }}">
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title">{{ $sp->TENSP }}</h6>
                            <p class="text-muted small">{{ $sp->loai->TENLOAI ?? 'Chưa xác định' }}</p>
                            <p class="price">{{ number_format($sp->DONGIABAN) }} ₫ / {{ $sp->donViTinh->TENDVT ?? '-' }}</p>

                            <!-- Form thêm giỏ hàng -->
                            <form action="{{ route('cua-hang.cart.add') }}" method="POST" class="mt-auto">
                                @csrf
                                <input type="hidden" name="MASP" value="{{ $sp->MASP }}">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-cart-plus"></i> Thêm vào giỏ
                                </button>
                            </form>

                            <!-- Link xem chi tiết -->
                            <a href="{{ route('cua-hang.products.show', $sp->MASP) }}"
                               class="btn btn-outline-secondary mt-2 w-100">
                               Xem chi tiết
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">Không có sản phẩm nào.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $sanpham->withQueryString()->links() }}
        </div>
    </div>
</div>
@endsection
