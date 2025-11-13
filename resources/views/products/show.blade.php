@extends('layouts.app')

@section('title', $product->name . ' - Tiệm Bánh Trung Thu')

@section('content')
<style>
/* ==========================
   STYLE CHUNG
========================== */
.text-royal {
  color: #6a1b9a !important; /* 💜 Màu tím chủ đạo */
}
.btn-gold {
  background: linear-gradient(135deg, #ffb300, #ff8f00);
  color: white !important;
  border: none;
  transition: 0.3s;
}
.btn-gold:hover {
  transform: translateY(-2px);
  box-shadow: 0 4px 10px rgba(255, 143, 0, 0.4);
}

/* ==========================
   HÌNH ẢNH SẢN PHẨM
========================== */
.product-detail-img {
  width: 100%;
  height: 100%;
  object-fit: contain; /* Giữ nguyên tỉ lệ ảnh, không bị cắt */
  transition: transform 0.4s ease, box-shadow 0.3s ease;
}
.product-detail-img:hover {
  transform: scale(1.03);
  box-shadow: 0 6px 18px rgba(0, 0, 0, 0.25);
}

.product-image-wrapper {
  background-color: #fff;
  border: 2px solid #f3e5f5;
  border-radius: 1.5rem;
}
@media (max-width: 768px) {
  .product-image-wrapper {
    max-width: 100%;
    aspect-ratio: auto;
  }
}

/* ==========================
   ĐÁNH GIÁ
========================== */
.star-rating {
  display: flex;
  flex-direction: row-reverse;
  justify-content: flex-start;
  font-size: 1.8rem;
}
.star-rating input {
  display: none;
}
.star-rating label {
  color: #ccc;
  cursor: pointer;
  transition: color 0.3s ease;
}
.star-rating input:checked ~ label,
.star-rating label:hover,
.star-rating label:hover ~ label {
  color: #ffb300;
}

/* ==========================
   HIỆU ỨNG FADE-IN
========================== */
.fade-in {
  animation: fadeIn 0.4s ease-in-out;
}
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(10px); }
  to { opacity: 1; transform: translateY(0); }
}
</style>

<div class="container py-5 fade-in">
  <div class="row g-5">
    
    {{-- HÌNH ẢNH SẢN PHẨM --}}
    <div class="col-md-6 d-flex justify-content-center align-items-center">
      <div class="product-image-wrapper shadow-lg rounded-4 overflow-hidden bg-white p-3"
          style="max-width: 480px; aspect-ratio: 1 / 1; display: flex; align-items: center; justify-content: center;">
          
          <img src="{{ asset($product->image) }}" 
              alt="Hình sản phẩm" 
              class="product-detail-img img-fluid rounded-4 shadow-sm border">
      </div>
    </div>

    {{-- THÔNG TIN CHI TIẾT --}}
    <div class="col-md-6">
      <h1 class="fw-bold text-royal mb-3">{{ $product->name }}</h1>
      <p class="fs-4 fw-bold text-danger mb-3">{{ number_format($product->price) }}đ</p>
      <p class="text-muted mb-4">{{ $product->description }}</p>

      <hr class="mb-4">

      {{-- FORM THÊM VÀO GIỎ --}}
      <form action="{{ route('cart.add') }}" method="POST" id="form-add-to-cart">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <div class="mb-3">
          <label for="qty" class="form-label fw-semibold text-royal">Số lượng:</label>
          <input type="number" name="qty" id="qty" class="form-control w-50" value="1" min="1">
        </div>
        <button type="submit" class="btn btn-gold btn-lg fw-semibold mt-2 px-4 py-2">
          🛒 Thêm vào giỏ hàng
        </button>
      </form>
    </div>
  </div>

  {{-- PHẦN THÔNG TIN SẢN PHẨM --}}
  <div class="row mt-5">
    <div class="col-lg-10 mx-auto">
      <div class="card border-0 shadow-sm rounded-4 p-4 bg-light">
        <h4 class="fw-bold text-royal mb-3">Thời gian sử dụng / Hướng dẫn bảo quản</h4>
        <ul class="list-unstyled ms-3">
          <li>🕒 <strong>Thời gian sử dụng:</strong> 65 ngày kể từ ngày sản xuất.</li>
          <li>🌤️ <strong>Bảo quản:</strong> Nhiệt độ phòng, tránh tiếp xúc trực tiếp với ánh nắng mặt trời.</li>
        </ul>

        <hr>

        <h5 class="fw-bold text-royal mt-4 mb-3">Chương trình hỗ trợ</h5>
        <ul class="list-unstyled ms-3">
          <li>• Hỗ trợ đổi trả trong vòng 7 ngày với lỗi do nhà sản xuất (vui lòng quay video khi mở hộp).</li>
          <li>• Hỗ trợ miễn phí vận chuyển và in logo với đơn hàng lớn.</li>
          <li>• Mọi thắc mắc vui lòng liên hệ hotline: <strong>0977 708 708</strong>.</li>
        </ul>
      </div>
    </div>
  </div>

  {{-- PHẦN ĐÁNH GIÁ --}}
  <div class="row mt-5">
    <div class="col-lg-8 mx-auto">
      <div class="card border-0 shadow-sm rounded-4 p-4">
        <h4 class="fw-bold text-royal mb-3">⭐ Đánh giá sản phẩm</h4>

        {{-- HIỂN THỊ ĐIỂM TRUNG BÌNH --}}
        <div class="mb-3">
          <div class="d-flex align-items-center">
            <div class="fs-3 text-warning me-2">
              ★★★★☆
            </div>
            <span class="text-muted">(4.0/5 từ 32 đánh giá)</span>
          </div>
        </div>

        {{-- FORM ĐÁNH GIÁ --}}
        <form>
          <div class="mb-3">
            <label class="form-label fw-semibold text-royal">Chọn số sao của bạn:</label>
            <div class="star-rating">
              @for($i = 5; $i >= 1; $i--)
                <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}">
                <label for="star{{ $i }}" title="{{ $i }} sao">★</label>
              @endfor
            </div>
          </div>
          <div class="mb-3">
            <textarea class="form-control rounded-3" rows="3" placeholder="Nhập đánh giá của bạn..."></textarea>
          </div>
          <button type="submit" class="btn btn-gold fw-semibold px-4">Gửi đánh giá</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('form-add-to-cart');
  if (!form) return;

  const toastElement = document.getElementById('ajax-toast');
  const toastMessage = document.getElementById('toast-message-content');
  const cartCount = document.getElementById('cart-count-badge');
  const miniCart = document.getElementById('cart-mini-wrapper');
  let cartToast;

  if (typeof bootstrap !== 'undefined' && toastElement) {
    cartToast = new bootstrap.Toast(toastElement);
  }

  form.addEventListener('submit', function (e) {
    e.preventDefault();

    const formData = new FormData(form);

    fetch(form.action, {
      method: 'POST',
      body: formData,
      headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
      }
    })
    .then(res => res.json())
    .then(data => {
      if (data.success) {
        if (cartCount) cartCount.textContent = data.cartCount;
        if (miniCart) miniCart.innerHTML = data.cartHtml;

        if (toastMessage && cartToast) {
          toastMessage.textContent = data.message;
          cartToast.show();
        }
      } else {
        console.error('Không thêm được vào giỏ:', data);
      }
    })
    .catch(err => console.error('Lỗi:', err));
  });
});
</script>
@endsection
