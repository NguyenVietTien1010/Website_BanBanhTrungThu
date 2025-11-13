@php
    use Illuminate\Support\Facades\Storage;

    $cart = session('cart', []);
    $total = 0;
@endphp

@if(empty($cart))
  {{-- Khi giỏ hàng trống --}}
  <div class="text-center py-4">
    <i class="bi bi-bag-dash fs-3 text-royal mb-2 d-block"></i>
    <p class="text-muted mb-2">Giỏ hàng của bạn đang trống.</p>
    <a href="{{ route('products.index') }}" class="btn btn-gold btn-sm rounded-pill px-3 fw-semibold shadow-sm">
      Mua sắm ngay
    </a>
  </div>
@else
  {{-- Danh sách sản phẩm trong giỏ --}}
  <ul class="list-group list-group-flush" id="mini-cart-list"
      style="max-height: 320px; overflow-y: auto; scrollbar-width: thin;">
    @foreach($cart as $id => $item)
      @php $total += $item['price'] * $item['qty']; @endphp
      <li class="list-group-item d-flex justify-content-between align-items-center border-0 py-3">
        <div class="d-flex align-items-center">
          {{-- Ảnh sản phẩm --}}
          @php
              // Nếu ảnh có đường dẫn trong Storage
              $imageUrl = Str::startsWith($item['image'], ['products/', 'public/'])
                            ? Storage::url($item['image'])
                            : asset($item['image']);
          @endphp
          <img src="{{ $imageUrl }}" 
               alt="{{ $item['name'] }}" 
               class="rounded-3 shadow-sm me-3"
               style="width: 55px; height: 55px; object-fit: cover;">

          <div>
            <div class="fw-semibold text-dark small">{{ $item['name'] }}</div>
            <div class="text-muted small">{{ $item['qty'] }} × {{ number_format($item['price']) }}đ</div>
          </div>
        </div>
        <div class="fw-bold text-dark small">{{ number_format($item['price'] * $item['qty']) }}đ</div>
      </li>
    @endforeach
  </ul>

  {{-- Tổng cộng + nút Xem giỏ hàng --}}
  <div class="p-3 border-top bg-light-subtle">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <span class="fw-semibold text-dark">Tổng cộng:</span>
      <span class="fw-bold fs-5 text-danger">{{ number_format($total) }}đ</span>
    </div>
    <a href="{{ route('cart.index') }}"
       class="btn btn-gold w-100 fw-semibold rounded-pill shadow-sm py-2">
      Xem giỏ hàng
    </a>
  </div>
@endif
