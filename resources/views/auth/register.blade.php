@extends('layouts.app')

@section('title', 'Đăng ký tài khoản - Tiệm Bánh Trung Thu')

@section('content')
<div class="login-wrapper d-flex align-items-center justify-content-center py-5">

  <div class="card shadow-lg border-0 rounded-4 p-4 login-card">
    <div class="card-body">
      <h3 class="text-center fw-bold text-royal mb-4">
        Đăng ký tài khoản
      </h3>

      <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- Họ và tên --}}
        <div class="mb-3">
          <label for="name" class="form-label fw-semibold">Họ và tên</label>
          <input id="name" type="text"
                 class="form-control form-control-lg rounded-3 @error('name') is-invalid @enderror"
                 name="name" value="{{ old('name') }}" required autofocus
                 placeholder="Nhập họ và tên của bạn">
          @error('name')
              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
          @enderror
        </div>

        {{-- Email --}}
        <div class="mb-3">
          <label for="email" class="form-label fw-semibold">Email</label>
          <input id="email" type="email"
                 class="form-control form-control-lg rounded-3 @error('email') is-invalid @enderror"
                 name="email" value="{{ old('email') }}" required
                 placeholder="Nhập địa chỉ email">
          @error('email')
              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
          @enderror
        </div>

        {{-- Mật khẩu --}}
        <div class="mb-3">
          <label for="password" class="form-label fw-semibold">Mật khẩu</label>
          <input id="password" type="password"
                 class="form-control form-control-lg rounded-3 @error('password') is-invalid @enderror"
                 name="password" required placeholder="Nhập mật khẩu">
          @error('password')
              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
          @enderror
        </div>

        {{-- Xác nhận mật khẩu --}}
        <div class="mb-3">
          <label for="password-confirm" class="form-label fw-semibold">Xác nhận mật khẩu</label>
          <input id="password-confirm" type="password"
                 class="form-control form-control-lg rounded-3"
                 name="password_confirmation" required placeholder="Nhập lại mật khẩu">
        </div>

        {{-- Nút Đăng ký --}}
        <div class="d-grid mb-3">
          <button type="submit" class="btn btn-gold fw-semibold py-2 rounded-3">
            Đăng ký
          </button>
        </div>

        {{-- Đã có tài khoản --}}
        <div class="text-center mt-3">
          <span class="text-muted">Đã có tài khoản?</span>
          <a href="{{ route('login') }}" class="text-decoration-none text-royal fw-semibold">
            Đăng nhập ngay
          </a>
        </div>
      </form>
    </div>
  </div>

</div>
@endsection
