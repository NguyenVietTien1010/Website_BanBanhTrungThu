@extends('layouts.app')

@section('title', 'Giỏ hàng - Tiệm Bánh Maison')

@section('content')
<div class="container my-5 fade-in">
  <div id="cart-page-container">
    @include('cart._cart_table', ['cart' => $cart, 'total' => $total])
  </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
  const cartContainer = document.getElementById('cart-page-container');
  const toastElement = document.getElementById('ajax-toast');
  const toastMessage = document.getElementById('toast-message-content');
  const cartToast = new bootstrap.Toast(toastElement);

  // Gửi request AJAX
  function sendCartRequest(url, data) {
    fetch(url, {
      method: 'POST',
      body: data,
      headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
      }
    })
    .then(res => res.json())
    .then(data => {
      if (data.success) {
        document.getElementById('cart-mini-wrapper').innerHTML = data.cartHeader;
        document.getElementById('cart-page-container').innerHTML = data.cartHtml;
        document.getElementById('cart-count-badge').innerText =
          document.querySelectorAll('#cart-mini-wrapper .list-group-item').length;
        if (data.message) {
          toastMessage.innerText = data.message;
          cartToast.show();
        }
      }
    })
    .catch(err => console.error('Error:', err));
  }

  // Xóa sản phẩm
  cartContainer.addEventListener('click', e => {
    if (e.target.closest('.btn-remove-item')) {
      e.preventDefault();
      const id = e.target.closest('.btn-remove-item').dataset.id;
      const fd = new FormData();
      fd.append('product_id', id);
      sendCartRequest('{{ route("cart.remove") }}', fd);
    }
  });

  // Cập nhật số lượng
  cartContainer.addEventListener('change', e => {
    if (e.target.classList.contains('input-qty')) {
      const id = e.target.dataset.id;
      const qty = e.target.value;
      const fd = new FormData();
      fd.append('product_id', id);
      fd.append('qty', qty);
      sendCartRequest('{{ route("cart.update") }}', fd);
    }
  });
});
</script>
@endsection
