@extends('layouts.app')

@section('title', 'Đặt hàng thành công - Tiệm Bánh Trung Thu')

@section('content')
<div class="checkout-wrapper d-flex align-items-center justify-content-center">
  <div class="text-center bg-white rounded-4 shadow-lg p-5 animate__animated animate__fadeInUp" style="max-width: 700px;">
    <div class="mb-4">
      <img src="{{ asset('images/success-icon.png') }}" alt="Success" width="90">
    </div>
    <h1 class="fw-bold text-royal mb-3">🎉 Đặt hàng thành công!</h1>
    <p class="lead mb-2">
      Cảm ơn bạn đã tin tưởng <strong>Tiệm Bánh Trung Thu</strong>.
    </p>
    <p class="text-muted mb-4">
      Mã đơn hàng của bạn là: 
      <strong class="font-monospace text-gold fs-4">{{ $order->code }}</strong>
    </p>

    <div class="alert alert-light border-start border-4 border-warning mx-auto mb-4" style="max-width: 500px;">
      Chúng tôi sẽ liên hệ với bạn để xác nhận đơn hàng sớm nhất! 💌
    </div>

    <a href="{{ route('products.index') }}" class="btn btn-gold btn-lg px-5 fw-semibold">
      🛍️ Tiếp tục mua sắm
    </a>
  </div>
</div>
@endsection
