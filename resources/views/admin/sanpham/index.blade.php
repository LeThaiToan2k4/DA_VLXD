@extends('layouts.admin')

@section('content')
    <h2>Danh sách sản phẩm</h2>
    <a href="{{ route('admin.sanpham.create') }}" class="btn btn-primary mb-2">+ Thêm sản phẩm</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Mã SP</th>
                <th>Tên SP</th>
                <th>Loại</th>
                <th>ĐVT</th>
                <th>Giá bán</th>
                <th>Bán lẻ</th>
                <th>Mô tả</th>
                <th>Hình ảnh</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sanphams as $sp)
                <tr>
                    <td>{{ $sp->MASP }}</td>
                    <td>{{ $sp->TENSP }}</td>
                    <td>{{ $sp->loai->TENLOAI ?? '-' }}</td>
                    <td>{{ $sp->dvt->TENDVT ?? '-' }}</td>
                    <td>{{ number_format($sp->DONGIABAN, 0, ',', '.') }}</td>
                    <td>{{ $sp->BANLE ? 'Có' : 'Không' }}</td>
                    <td>{{ $sp->MOTA ?? '-' }}</td>
                    <td>
                        @if ($sp->HINHANH)
                            <img src="{{ asset('storage/' . $sp->HINHANH) }}" alt="{{ $sp->TENSP }}" width="80">
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.sanpham.show', $sp->MASP) }}" class="btn btn-info btn-sm">Xem</a>
                        <a href="{{ route('admin.sanpham.edit', $sp->MASP) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <a href="{{ route('admin.sanpham.destroy', $sp->MASP) }}" class="btn btn-danger btn-sm"
                            onclick="return confirm('Xóa sản phẩm này?')">Xóa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
