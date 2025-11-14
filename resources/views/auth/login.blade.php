@extends('layouts.app')

@section('title', 'Đăng nhập')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-4">
    <h4 class="mb-3 text-center">Đăng nhập</h4>
    @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <form method="POST" action="{{ route('login.post') }}">
      @csrf
      <div class="mb-3">
        <label>Tên đăng nhập</label>
        <input type="text" name="username" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Mật khẩu</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <button class="btn btn-primary w-100">Đăng nhập</button>
    </form>
  </div>
</div>
@endsection
