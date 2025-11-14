@extends('layouts.app')

@section('title', 'Trang chủ')

@section('content')
<div class="text-center">
    <h1>Chào mừng đến với cửa hàng vật liệu xây dựng</h1>
    <p>Đây là trang chủ demo đơn giản.</p>

    @if (Session::get('user') === 'admin')
        <a href="{{ route('admin') }}" class="btn btn-primary mt-3">Vào trang quản trị</a>
    @else
        <a href="{{ route('login') }}" class="btn btn-success mt-3">Đăng nhập</a>
    @endif
</div>
@endsection
