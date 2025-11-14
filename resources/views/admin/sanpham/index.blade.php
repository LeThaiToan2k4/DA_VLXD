@extends('layouts.app')

@section('title', 'Danh sách sản phẩm')

@section('content')
    <h2>Danh sách sản phẩm</h2>

    <a href="{{ route('admin.sanpham.create') }}" class="btn btn-add">+ Thêm sản phẩm</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Mã SP</th>
                <th>Tên SP</th>
                <th>Loại</th>
                <th>ĐVT</th>
                <th>Giá bán</th>
                <th>Bán lẻ</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sanphams as $sp)
                <tr>
                    <td>{{ $sp->MASP }}</td>
                    <td>{{ $sp->TENSP }}</td>
                    <td>{{ $sp->TENLOAI }}</td>
                    <td>{{ $sp->TENDVT }}</td>
                    <td>{{ number_format($sp->DONGIABAN, 0, ',', '.') }}</td>
                    <td>{{ $sp->BANLE ? 'Có' : 'Không' }}</td>
                    <td>
                        <a href="{{ route('admin.sanpham.edit', $sp->MASP) }}" class="btn btn-edit">Sửa</a>
                        <a href="{{ route('admin.sanpham.destroy', $sp->MASP) }}" class="btn btn-del"
                            onclick="return confirm('Xóa sản phẩm này?')">Xóa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
