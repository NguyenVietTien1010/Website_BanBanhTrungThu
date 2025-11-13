@if(empty($cart))
  <div class="alert alert-warning text-center py-5 rounded-4 shadow-sm bg-light">
    <h4 class="mb-3 text-royal fw-bold">🛒 Giỏ hàng của bạn đang trống</h4>
    <p>Hãy chọn những chiếc bánh yêu thích để mùa trăng thêm trọn vẹn!</p>
    <a href="{{ route('products.index') }}" class="btn btn-gold fw-semibold px-4 mt-3">Mua sắm ngay</a>
  </div>

@else
  <section class=" checkout-wrapper cart-section my-5 fade-in">
    <div class="card border-0 shadow-lg rounded-4">
      <div class="card-header text-white rounded-top-4 py-3"
           style="background: linear-gradient(90deg, #7B004B 0%, #4B006E 100%);">
        <h4 class="mb-0 fw-bold"><i class="bi bi-bag-check me-2"></i>Giỏ hàng của bạn</h4>
      </div>

      <div class="card-body p-4">
        <div class="table-responsive">
          <table class="table align-middle mb-0">
            <thead class="table-light">
              <tr class="text-center">
                <th class="text-start fw-semibold text-dark">Sản phẩm</th>
                <th class="fw-semibold">Số lượng</th>
                <th class="fw-semibold text-end">Đơn giá</th>
                <th class="fw-semibold text-end">Thành tiền</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($cart as $id => $item)
                <tr>
                  {{-- Cột sản phẩm --}}
                  <td class="d-flex align-items-center">
                    <img src="{{ Str::startsWith($item['image'], ['products/', 'public/']) 
                              ? Storage::url($item['image']) 
                              : asset($item['image']) }}"
                    alt="{{ $item['name'] }}"
                    class="rounded-3 shadow-sm me-3"
                    style="width: 70px; height: 70px; object-fit: cover;">

                    <div>
                      <div class="fw-semibold text-dark">{{ $item['name'] }}</div>
                      <small class="text-muted">{{ $item['qty'] }} × {{ number_format($item['price']) }}đ</small>
                    </div>
                  </td>

                  {{-- Cột số lượng --}}
                  <td class="text-center" style="width: 120px;">
                    <input type="number"
                           class="form-control form-control-sm input-qty text-center border-0 bg-light"
                           value="{{ $item['qty'] }}"
                           min="1"
                           data-id="{{ $id }}">
                  </td>

                  {{-- Cột đơn giá & thành tiền --}}
                  <td class="text-end text-muted">{{ number_format($item['price']) }}đ</td>
                  <td class="text-end fw-bold text-dark">{{ number_format($item['price'] * $item['qty']) }}đ</td>

                  {{-- Nút xoá --}}
                    <td class="text-center">
                    <button class="btn btn-outline-danger btn-sm rounded-circle btn-remove-item"
                            data-id="{{ $id }}" title="Xóa sản phẩm">
                        <i class="bi bi-x-lg"></i>
                    </button>
                    </td>
                </tr>
              @endforeach
            </tbody>

            <tfoot class="border-top">
              <tr>
                <th colspan="3" class="text-end fs-5 fw-semibold text-dark">Tổng cộng:</th>
                <th class="text-end fs-5 fw-bold text-danger">{{ number_format($total) }}đ</th>
                <th></th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>

      <div class="card-footer text-end bg-white border-0 rounded-bottom-4 p-4">
        <a href="{{ route('checkout.index') }}" class="btn btn-gold btn-lg fw-semibold px-5">
          Tiến hành thanh toán
        </a>
      </div>
    </div>
  </section>
@endif
