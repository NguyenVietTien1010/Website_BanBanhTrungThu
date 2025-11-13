<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title', config('app.name', 'Tiệm Bánh Trung Thu'))</title>

  {{-- Fonts --}}
  <link href="https://fonts.bunny.net/css?family=Inter:400,500,600,700|Playfair+Display:600,700" rel="stylesheet">

  {{-- Bootstrap + Vite --}}
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

  {{-- Custom Theme --}}
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

  @stack('head')
</head>

<body class="d-flex flex-column min-vh-100 bg-light text-dark">
  <div id="app"  class="d-flex flex-column min-vh-100">

    {{-- ================== 🟣 NAVBAR ================== --}}
    <nav class="navbar navbar-expand-md sticky-top header-colored shadow-sm">
      <div class="container">
        <a class="navbar-brand fw-bold text-gold" href="{{ url('/') }}" style="font-family: 'Playfair Display', serif;">
          🥮 Tiệm Bánh Trung Thu
        </a>

        <button class="navbar-toggler border-0 text-gold" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          {{-- Left --}}
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link text-light fw-semibold" href="{{ route('home') }}">Trang chủ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light fw-semibold" href="{{ route('products.index') }}">Sản phẩm</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light fw-semibold" href="{{ route('about.index') }}">Về chúng tôi</a>
            </li>
          </ul>

          {{-- Right --}}
          <ul class="navbar-nav ms-auto align-items-md-center gap-md-2">
            {{-- Giỏ hàng mini --}}
            <li class="nav-item dropdown">
              <a id="cartDropdown" class="nav-link btn btn-gold rounded-pill px-3 text-dark fw-semibold"
                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Giỏ hàng
                <span class="badge bg-purple text-light ms-1" id="cart-count-badge">
                  {{ collect(session('cart', []))->sum('qty') }}
                </span>
              </a>

              <div class="dropdown-menu dropdown-menu-end shadow border-0 p-0"
                  id="cart-mini-wrapper"
                  style="width: 360px; max-height: 420px; overflow:auto;"
                  data-bs-auto-close="outside">
                @include('layouts._cart_mini')
              </div>
            </li>


            {{-- Đăng nhập / Người dùng --}}
            @guest
              @if (Route::has('login'))
                <li class="nav-item">
                  <a class="nav-link text-light" href="{{ route('login') }}">Đăng nhập</a>
                </li>
              @endif
              @if (Route::has('register'))
                <li class="nav-item">
                  <a class="nav-link text-light" href="{{ route('register') }}">Đăng ký</a>
                </li>
              @endif
            @else
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle text-light fw-semibold" href="#" role="button"
                   data-bs-toggle="dropdown" aria-expanded="false">
                  {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-end shadow border-0">
                  @if(Auth::user()->is_admin)
                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                  @endif

                  {{-- 📦 Lịch sử đơn hàng --}}
                  <a class="dropdown-item" href="{{ route('orders.history') }}">Lịch sử đơn hàng</a>

                  <hr class="dropdown-divider">

                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Đăng xuất
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </div>
              </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>

    {{-- ================== 🟡 MAIN CONTENT ================== --}}
    <main class="flex-grow-1" style="padding:0; background-color:#FFFDF7;">
      @yield('content')
    </main>

    {{-- ================== 🔔 TOAST ================== --}}
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
      <div id="ajax-toast" class="toast fade" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header text-light bg-purple">
          <strong class="me-auto">🎉 Thông báo</strong>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body text-dark" id="toast-message-content"></div>
      </div>
    </div>

    {{-- ================== 🟤 FOOTER ================== --}}
    <footer class="footer-gold py-5 mt-auto">
      <div class="container">
        <div class="row g-4">
          <div class="col-md-4">
            <h5>Tiệm Bánh Trung Thu</h5>
            <p>Hương vị truyền thống, quà tặng sang trọng cho mùa trăng đoàn viên.</p>
          </div>
          <div class="col-md-4">
            <h6>Liên hệ</h6>
            <ul class="list-unstyled mb-0">
              <li>📍 123 Trăng Rằm, Q.1, TP.HCM</li>
              <li>☎️ 0909 000 000</li>
              <li>✉️ cskh@tiembanh.vn</li>
            </ul>
          </div>
          <div class="col-md-4">
            <h6>Nhận ưu đãi</h6>
            <form class="d-flex gap-2">
              <input type="email" class="form-control form-control-sm" placeholder="Email của bạn">
              <button class="btn btn-gold btn-sm" type="button">Đăng ký</button>
            </form>
          </div>
        </div>
        <hr>
        <div class="d-flex justify-content-between small">
          <span>© {{ date('Y') }} Tiệm Bánh Trung Thu</span>
          <span>Made with ♥ by Laravel</span>
        </div>
      </div>
    </footer>

  </div>
{{-- ================== 💬 FLOATING CONTACT BUTTONS ================== --}}
  <div class="contact-buttons">
      <a href="https://zalo.me/g/yokpqm622" target="_blank" class="contact-btn zalo" title="Chat qua Zalo">
          <img src="{{ asset('images/zalo.png') }}" alt="Zalo">
      </a>
      <a href="https://www.facebook.com/hathanhmooncake/" target="_blank" class="contact-btn fb" title="Fanpage Facebook">
          <img src="{{ asset('images/facebook.png') }}" alt="Facebook">
      </a>
  </div>

  <style>
      .contact-buttons {
          position: fixed;
          right: 20px;
          bottom: 80px;
          z-index: 9999;
          display: flex;
          flex-direction: column;
          gap: 12px;
      }
      .contact-btn {
          width: 55px;
          height: 55px;
          border-radius: 50%;
          display: flex;
          align-items: center;
          justify-content: center;
          background: white;
          box-shadow: 0 4px 10px rgba(0,0,0,0.15);
          transition: all 0.3s ease;
          overflow: hidden;
      }
      .contact-btn img {
          width: 36px;
          height: 36px;
          object-fit: contain;
      }
      .contact-btn:hover {
          transform: translateY(-3px) scale(1.05);
          box-shadow: 0 6px 14px rgba(0,0,0,0.2);
      }
      .contact-btn.zalo {
          border: 3px solid #0088ff;
      }
      .contact-btn.fb {
          border: 3px solid #1877f2;
      }
      @keyframes fadeUp {
          from { opacity: 0; transform: translateY(20px); }
          to { opacity: 1; transform: translateY(0); }
      }
      .contact-buttons {
          animation: fadeUp 0.8s ease-out;
      }
      @media (max-width: 576px) {
          .contact-buttons {
              right: 15px;
              bottom: 60px;
          }
          .contact-btn {
              width: 50px;
              height: 50px;
          }
      }
  </style>
  {{-- ✅ FIX: chỉ giữ @stack, xóa @yield để tránh conflict --}}
@yield('scripts')
@stack('scripts')
  
</body>
</html>
