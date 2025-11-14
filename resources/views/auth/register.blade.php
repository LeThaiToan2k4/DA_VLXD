@extends('layouts.app')

@section('title', 'Đăng ký')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-4">
    <h4 class="mb-3 text-center">Đăng ký</h4>
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('register.post') }}">
      @csrf
      <div class="mb-3">
        <label>Tên đăng nhập</label>
        <input type="text" name="username" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Mật khẩu</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Nhập lại mật khẩu</label>
        <input type="password" name="password_confirmation" class="form-control" required>
      </div>
      <button class="btn btn-success w-100">Đăng ký</button>
    </form>
    <p class="mt-2 text-center">
      Đã có tài khoản? <a href="{{ route('login') }}">Đăng nhập</a>
    </p>
  </div>
</div>
@endsection
