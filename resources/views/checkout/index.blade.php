@extends('layouts.app')

@section('title', 'Thanh toán - Tiệm Bánh Trung Thu')

@section('content')
<div class="checkout-wrapper py-5 fade-in">
  <div class="container">
    <div class="row g-4">

      {{-- CỘT TRÁI - THÔNG TIN GIAO HÀNG --}}
      <div class="col-lg-7">
        <div class="card border-0 shadow-lg rounded-4 p-4 bg-white">
          <h3 class="fw-bold text-royal mb-3">Thông tin giao hàng</h3>
          <p class="text-muted mb-4">
            Vui lòng nhập thông tin để nhận hàng.<br>
            <small>(Bạn cần đăng nhập để tiến hành thanh toán)</small>
          </p>

          <form action="{{ route('checkout.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label class="form-label fw-semibold">Họ tên người nhận *</label>
              <input type="text" name="customer_name"
                     class="form-control form-control-lg rounded-3 shadow-sm @error('customer_name') is-invalid @enderror"
                     value="{{ old('customer_name', auth()->user()->name) }}" required>
              @error('customer_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Số điện thoại *</label>
                <input type="text" name="customer_phone"
                       class="form-control form-control-lg rounded-3 shadow-sm @error('customer_phone') is-invalid @enderror"
                       value="{{ old('customer_phone') }}" required>
                @error('customer_phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Email *</label>
                <input type="email" name="customer_email"
                       class="form-control form-control-lg rounded-3 shadow-sm @error('customer_email') is-invalid @enderror"
                       value="{{ old('customer_email', auth()->user()->email) }}" required>
                @error('customer_email') <div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>
            </div>

            <div class="mb-4">
              <label class="form-label fw-semibold">Địa chỉ nhận hàng *</label>
              <textarea name="customer_address" rows="3"
                        class="form-control form-control-lg rounded-3 shadow-sm @error('customer_address') is-invalid @enderror"
                        placeholder="Nhập địa chỉ chi tiết..." required>{{ old('customer_address') }}</textarea>
              @error('customer_address') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="d-grid">
              <button type="submit" class="btn btn-gold fw-semibold py-3 fs-5 rounded-3">
                ✅ Xác nhận đặt hàng (COD)
              </button>
            </div>
          </form>
        </div>
      </div>

      {{-- CỘT PHẢI - ĐƠN HÀNG --}}
      <div class="col-lg-5">
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
          <div class="card-header text-white fw-bold py-3"
               style="background: linear-gradient(90deg, #7B004B 0%, #4B006E 100%);">
            🛍️ Đơn hàng của bạn ({{ count($cart) }} sản phẩm)
          </div>
          <ul class="list-group list-group-flush">
            @foreach($cart as $item)
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <div>
                <div class="fw-semibold">{{ $item['name'] }}</div>
                <small class="text-muted">Số lượng: {{ $item['qty'] }}</small>
              </div>
              <span class="fw-bold text-royal">{{ number_format($item['price'] * $item['qty']) }}đ</span>
            </li>
            @endforeach
          </ul>
          <div class="card-footer bg-light d-flex justify-content-between align-items-center fs-5 fw-bold">
            <span>Tổng cộng:</span>
            <span class="text-danger">{{ number_format($total) }}đ</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
