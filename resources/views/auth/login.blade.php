@extends('layouts.app')

@section('title', 'Đăng nhập - Tiệm Bánh Trung Thu')

@section('content')
<div class="login-wrapper d-flex align-items-center justify-content-center py-5">

  <div class="card shadow-lg border-0 rounded-4 p-4 login-card">
    <div class="card-body">
      <h3 class="text-center fw-bold text-royal mb-4">
        Đăng nhập tài khoản
      </h3>

      <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- EMAIL --}}
        <div class="mb-3">
          <label for="email" class="form-label fw-semibold">Email</label>
          <input id="email" type="email"
                 class="form-control form-control-lg rounded-3 @error('email') is-invalid @enderror"
                 name="email" value="{{ old('email') }}" required autofocus
                 placeholder="Nhập địa chỉ email">
          @error('email')
              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
          @enderror
        </div>

        {{-- PASSWORD --}}
        <div class="mb-3">
          <label for="password" class="form-label fw-semibold">Mật khẩu</label>
          <input id="password" type="password"
                 class="form-control form-control-lg rounded-3 @error('password') is-invalid @enderror"
                 name="password" required placeholder="Nhập mật khẩu">
          @error('password')
              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
          @enderror
        </div>

        {{-- REMEMBER ME --}}
        <div class="form-check mb-3">
          <input class="form-check-input" type="checkbox" name="remember" id="remember"
                 {{ old('remember') ? 'checked' : '' }}>
          <label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
        </div>

        {{-- SUBMIT --}}
        <div class="d-grid mb-3">
          <button type="submit" class="btn btn-gold fw-semibold py-2 rounded-3">
            Đăng nhập
          </button>
        </div>

        {{-- FORGOT PASSWORD --}}
        @if (Route::has('password.request'))
        <div class="text-center">
          <a href="{{ route('register') }}" class="text-decoration-none text-royal fw-semibold">
            Đăng ký tài khoản ngay 
          </a>
        </div>
        @endif
      </form>
    </div>
  </div>

</div>
@endsection
