@extends('layouts.app')
@section('title', 'Tất cả sản phẩm')
@section('content')

@section('content')
    <section class="product-list-section py-5 fade-in">
        <section class="container my-5 fade-in prosperity-highlight">
    <div class="row align-items-center gx-5 gy-4 flex-md-row-reverse">
        <div class="col-md-5">
        <div class="image-frame">
            <img src="{{ asset('images/floral_prosperity.jpg') }}" alt="Sắc Hoa Thịnh Vượng" class="img-fluid rounded-4">
        </div>
        </div>
        <div class="col-md-7">
        <div class="section-accent mb-3"></div>
        <p class="subtitle text-purple mb-1">Hương sắc đoàn viên</p>
        <h2 class="display-6 fw-bold text-gold lh-sm mb-4">
            “Sắc Hoa Thịnh Vượng”
        </h2>
        <p>
            Khi hoa nở, thịnh vượng đến — cảm hứng từ <strong>sen thanh khiết</strong> và <strong>hoa mẫu đơn quý phái</strong>.
            Bộ sưu tập <strong>Sắc Hoa Thịnh Vượng 2025</strong> tôn vinh vẻ đẹp thuần Việt,
            tượng trưng cho <em>sự khởi sắc và sung túc.</em>
        </p>
        <p>
            Mỗi chiếc bánh Maison là lời chúc an lành, gói trọn trong hộp vàng kim tinh tế — biểu trưng cho
            <strong>tài lộc, thịnh vượng và niềm vui đoàn viên.</strong>
        </p>
        </div>
    </div>
    </section>
  <div class="container">
    <h2 class="text-center fw-bold mb-5 section-heading">Tất cả sản phẩm</h2>

    <!-- 🔍 TÌM KIẾM & LỌC -->
    <form method="GET" action="{{ route('products.index') }}" class="filter-bar mb-5">
      <div class="row justify-content-center g-3">
        <div class="col-md-4 col-12">
          <input type="text" name="search" value="{{ request('search') }}" class="form-control form-control-lg search-input"
                 placeholder="🔍 Tìm kiếm sản phẩm...">
        </div>
        <div class="col-md-3 col-12">
          <select name="category" class="form-select form-select-lg select-filter">
            <option value="">-- Tất cả loại sản phẩm --</option>
            @foreach($categories as $category)
              <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
              </option>
            @endforeach
          </select>
        </div>
        <div class="col-md-2 col-12 text-center">
          <button type="submit" class="btn btn-gold w-100 fw-semibold">Lọc</button>
        </div>
      </div>
    </form>

    <!-- 🧁 DANH SÁCH SẢN PHẨM -->
    <div class="row g-4 justify-content-center">
      @forelse($products as $product)
        <div class="col-md-4 col-sm-6">
          <div class="product-card text-center h-100">
            <div class="product-img-wrap">
              <img src="{{ asset($product->image) }}" 
     alt="Hình sản phẩm" 
     class="rounded object-fit-cover border">

            </div>
            <div class="product-info p-4">
              <h5 class="product-name fw-bold">{{ $product->name }}</h5>
              <p class="product-price">{{ number_format($product->price) }}đ</p>
              <a href="{{ route('products.show', $product->slug) }}" class="btn btn-gold-outline mt-2">Xem chi tiết</a>
            </div>
          </div>
        </div>
      @empty
        <p class="text-center text-muted fs-5 mt-4">Không tìm thấy sản phẩm nào.</p>
      @endforelse
    </div>

    <!-- Phân trang -->
    <div class="d-flex justify-content-center mt-5">
      {{ $products->links('pagination::bootstrap-5') }}
    </div>
  </div>
</section>
@endsection