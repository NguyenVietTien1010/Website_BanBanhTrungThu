@extends('layouts.app')

@section('content')

<!-- =================== 🌕 BANNER TRUNG THU (Ảnh tĩnh cao cấp) =================== -->
<section class="hero-banner container my-4 fade-in">
  <div class="banner-wrapper rounded-5 shadow-lg overflow-hidden">
    <img src="{{ asset('images/anhbia.png') }}" 
         alt="Quà tặng doanh nghiệp Maison Mooncake" 
         class="w-100 hero-banner-img">
  </div>
</section>

<!-- =================== ✨ HERO TEXT =================== -->
<section class="container text-center my-5 fade-in hero-text">
    <h1 class="display-5 fw-bold text-purple mb-3">Tiệm Bánh Trung Thu</h1>
    <p class="fs-5 text-muted">
        Hương vị truyền thống – Đậm đà bản sắc – Trao gửi yêu thương mùa đoàn viên.
    </p>
</section>


<!-- =================== 🏢 DOANH NGHIỆP HÀNG ĐẦU =================== -->
<section class="container my-5 fade-in business-highlight">
  <div class="row align-items-center gx-5 gy-4">
    <div class="col-md-5">
      <div class="image-frame">
        <img src="{{ asset('images/business_gift.jpg') }}" alt="Doanh nghiệp hàng đầu" class="img-fluid rounded-4">
      </div>
    </div>
    <div class="col-md-7">
      <div class="section-accent mb-3"></div>
      <p class="subtitle text-purple mb-1">15 năm khẳng định vị thế</p>
      <h2 class="display-6 fw-bold text-gold lh-sm mb-4">
        Quà tặng của những<br>
        <span class="text-purple">Doanh nghiệp hàng đầu</span>
      </h2>
      <p>
        Trong suốt <strong>15 năm qua</strong>, Tiệm Bánh Trung Thu luôn là món quà được các doanh nghiệp hàng đầu lựa chọn —
        gửi gắm lời chúc đoàn viên, sự tri ân và niềm trân trọng dành cho đối tác, khách hàng thân thiết.
      </p>
      <p>
        Sản phẩm của chúng tôi là sự giao thoa tinh tế giữa <em>giá trị truyền thống</em> và <em>nghệ thuật hiện đại</em>,
        mang đến vẻ sang trọng, tinh tế trong từng chi tiết — khẳng định đẳng cấp và vị thế riêng biệt.
      </p>
    </div>
  </div>
</section>

<!-- =================== 🌸 SẮC HOA THỊNH VƯỢNG =================== -->
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

<!-- =================== 🎁 BỘ SƯU TẬP TRUNG THU 2025 =================== -->
<section class="collection-section text-center py-5 fade-in">
  <div class="container">

    <!-- Tiêu đề -->
    <h5 class="fw-bold text-gold mb-2">BỘ SƯU TẬP</h5>
    <h2 class="display-6 fw-bold text-royal mb-3">Bánh Trung Thu 2025</h2>
    <p class="lead mx-auto mb-5 text-dark" style="max-width: 800px; color:#000;">
        BST Bánh Trung Thu <strong>“Sắc Hoa Thịnh Vượng”</strong> mang phong vị quý phái,
        kết hợp lớp phủ nhung mềm mịn cùng họa tiết 3D nổi bật, tôn vinh vẻ đẹp truyền thống Việt.
        Mỗi hộp quà là biểu tượng của sự <em>tinh tế, sang trọng</em> và gửi gắm lời chúc đoàn viên viên mãn.
    </p>


    <!-- Bộ sưu tập -->
    <div class="row justify-content-center g-4">
      <div class="col-md-4">
        <div class="card collection-card border-0 shadow-lg">
          <img src="{{ asset('images/box1.jpg') }}" class="card-img-top" alt="Hộp 1">
        </div>
      </div>
      <div class="col-md-4">
        <div class="card collection-card border-0 shadow-lg">
          <img src="{{ asset('images/box2.jpg') }}" class="card-img-top" alt="Hộp 2">
        </div>
      </div>
      <div class="col-md-4">
        <div class="card collection-card border-0 shadow-lg">
          <img src="{{ asset('images/box3.jpg') }}" class="card-img-top" alt="Hộp 3">
        </div>
      </div>
    </div>

    <!-- Nút xem thêm -->
    <div class="mt-5">
      <a href="{{ route('products.index') }}" class="btn btn-gold px-4 py-2 fw-semibold rounded-pill">
        Xem toàn bộ Bộ sưu tập 2025
      </a>
    </div>
  </div>
</section>
</br>
<!-- =================== 🎁 FEATURED PRODUCTS =================== -->
<section class="featured-section container my-5 fade-in">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="section-heading fw-bold">
      Sản phẩm nổi bật
    </h3>
    <a href="{{ route('products.index') }}" class="text-highlight fw-semibold text-decoration-none">
      Xem tất cả →
    </a>
  </div>

  <div class="row g-4">
    @forelse($products as $product)
      <div class="col-md-4">
        <div class="product-card h-100">
          <div class="product-img-wrap">
            <img src="{{ asset($product->image) }}" 
            alt="Hình sản phẩm" 
            width="70" height="70" 
            class="rounded object-fit-cover border">

          </div>
          <div class="product-info text-center p-4">
            <h5 class="product-name fw-bold">{{ $product->name }}</h5>
            <p class="product-desc">{{ Str::limit($product->description, 60) }}</p>
            <p class="product-price">{{ number_format($product->price) }}đ</p>
            <a href="{{ route('products.show', $product->slug) }}" class="btn-product">
              Xem chi tiết
            </a>
          </div>
        </div>
      </div>
    @empty
      <p class="text-muted text-center">Hiện chưa có sản phẩm nào.</p>
    @endforelse
  </div>
</section>


<!-- =================== 💎 CAM KẾT TỪ THƯƠNG HIỆU =================== -->
<section class="brand-commitments py-5 fade-in">
  <div class="container text-center">
    <h2 class="section-heading fw-bold">CAM KẾT TỪ THƯƠNG HIỆU</h2>

    <div class="row g-4">
      <!-- 1️⃣ NGUYÊN LIỆU -->
      <div class="col-md-6">
        <div class="commit-card d-flex align-items-center p-3 shadow-lg">
          <img src="{{ asset('images/commit1.jpg') }}" alt="Nguyên liệu" class="commit-img me-3 rounded-4">
          <div class="text-start">
            <h5 class="fw-bold text-warning">NGUYÊN LIỆU THƯỢNG HẠNG</h5>
            <p>Nguyên liệu được nhập khẩu, chọn lọc hương vị tinh tế, tỉ mỉ, đảm bảo chất lượng tươi ngon thượng hạng.</p>
          </div>
        </div>
      </div>

      <!-- 2️⃣ UY TÍN -->
      <div class="col-md-6">
        <div class="commit-card d-flex align-items-center p-3 shadow-lg">
          <img src="{{ asset('images/commit2.jpg') }}" alt="Lựa chọn uy tín" class="commit-img me-3 rounded-4">
          <div class="text-start">
            <h5 class="fw-bold text-warning">LỰA CHỌN UY TÍN</h5>
            <p>Được bảo trợ bởi tập đoàn ẩm thực hàng đầu Việt Nam – Golden Gate Group, Maison Mooncake là đối tác của hơn 2000 doanh nghiệp.</p>
          </div>
        </div>
      </div>

      <!-- 3️⃣ SANG TRỌNG -->
      <div class="col-md-6">
        <div class="commit-card d-flex align-items-center p-3 shadow-lg">
          <img src="{{ asset('images/commit3.jpg') }}" alt="Sang trọng" class="commit-img me-3 rounded-4">
          <div class="text-start">
            <h5 class="fw-bold text-warning">SANG TRỌNG & TINH TẾ</h5>
            <p>Mẫu mã hộp được đổi mới qua từng năm với màu sắc và họa tiết tinh tế. Năm 2025, Maison Mooncake cho ra mắt bộ sưu tập mới sang trọng, phù hợp nhu cầu quà tặng đa dạng.</p>
          </div>
        </div>
      </div>

      <!-- 4️⃣ HƯƠNG VỊ -->
      <div class="col-md-6">
        <div class="commit-card d-flex align-items-center p-3 shadow-lg">
          <img src="{{ asset('images/commit4.jpg') }}" alt="Hương vị tuyệt hảo" class="commit-img me-3 rounded-4">
          <div class="text-start">
            <h5 class="fw-bold text-warning">HƯƠNG VỊ TUYỆT HẢO</h5>
            <p>Maison Mooncake mang đến hương vị độc đáo: thập cẩm, sen trà xanh, hạt sen trứng muối, đậu đỏ, trà Ô long, Việt quất... cho mùa trăng tròn thêm ý nghĩa.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- =================== 🛍️ HƯỚNG DẪN ĐẶT MUA =================== -->
<section class="order-guide maison-order py-5 fade-in">
  <div class="container text-center">
    <h2 class="section-heading fw-bold">HƯỚNG DẪN ĐẶT MUA</h2>
    <div class="row justify-content-center g-4">

      <!-- 🟣 DOANH NGHIỆP / ĐẠI LÝ -->
      <div class="col-lg-6">
        <div class="enterprise-box p-4 text-center">
          <!-- Thanh tiêu đề vàng -->
          <div class="enterprise-tab mx-auto mb-4">
            <span>Dành cho khách hàng doanh nghiệp/đại lý</span>
          </div>

          <h5 class="fw-semibold text-white mb-4">
            Ưu đãi dành riêng cho khách hàng doanh nghiệp
          </h5>

          <!-- 2 vòng tròn ưu đãi -->
          <div class="benefit-circle-wrap d-flex justify-content-center align-items-start flex-wrap gap-4 mb-4">
            <div class="benefit-circle">
              <div class="circle-icon"><i class="bi bi-check-lg"></i></div>
              <p>Ưu đãi chiết khấu khi đặt mua sớm<br>hoặc đặt số lượng lớn</p>
            </div>
            <div class="benefit-circle">
              <div class="circle-icon"><i class="bi bi-check-lg"></i></div>
              <p>Hỗ trợ doanh nghiệp in logo miễn phí,<br>tạo dấu ấn riêng cho món quà</p>
            </div>
          </div>

          <p class="text-light small opacity-75 mb-2">
            Khách hàng vui lòng liên hệ trực tiếp để được đặt mua và nhận ưu đãi:
          </p>

          <!-- Liên hệ -->
          <div class="contact-info text-light fw-semibold small d-flex justify-content-center align-items-center gap-4 flex-wrap">
            <div><i class="bi bi-telephone-fill me-1"></i> Hotline: <span class="text-warning">0919.708.568</span></div>
            <div><i class="bi bi-envelope-fill me-1"></i> Email: <span class="text-warning">dathang@maison.com.vn</span></div>
            <div><i class="bi bi-chat-dots-fill me-1"></i> Zalo OA</div>
          </div>
        </div>
      </div>


      <!-- 🩷 KHÁCH HÀNG MUA LẺ -->
      <div class="col-lg-6">
        <div class="retail-box p-4 text-center">
          <!-- Thanh tiêu đề -->
          <div class="retail-tab mx-auto mb-4">
            <span>Dành cho khách hàng mua lẻ</span>
          </div>

          <h5 class="fw-semibold text-royal mb-4">Khách hàng vui lòng mua qua các kênh sau:</h5>

          <!-- Các kênh TMĐT -->
          <div class="retail-platforms d-flex justify-content-center align-items-center gap-4 flex-wrap mb-4">
            <div class="platform-circle"><img src="{{ asset('images/shopee.png') }}" alt="Shopee"></div>
            <div class="platform-circle"><img src="{{ asset('images/tiktok.png') }}" alt="Tiktok"></div>
            <div class="platform-circle"><img src="{{ asset('images/lazada.png') }}" alt="Lazada"></div>
          </div>

          <h6 class="fw-semibold text-royal mb-3">Hoặc hệ thống siêu thị toàn quốc:</h6>

          <!-- Siêu thị -->
          <div class="retail-grid d-flex justify-content-center align-items-center gap-4 flex-wrap">
            <div class="store-logo"><img src="{{ asset('images/bigc.png') }}" alt="BigC"></div>
            <div class="store-logo"><img src="{{ asset('images/lotte.png') }}" alt="LotteMart"></div>
            <div class="store-logo"><img src="{{ asset('images/aeon.png') }}" alt="AEON Mall"></div>
            <div class="store-logo"><img src="{{ asset('images/coopmart.png') }}" alt="CoopMart"></div>
          </div>
        </div>
      </div>



    </div>
  </div>
</section>



@endsection
