<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bảng quản trị - Tiệm Bánh Trung Thu')</title>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            display: flex;
            min-height: 100vh;
            background: #f8f9fa;
            font-family: 'Inter', sans-serif;
        }

        /* Sidebar */
        .admin-sidebar {
            width: 260px;
            background: linear-gradient(180deg, #3a0ca3 0%, #7209b7 100%);
            color: #fff;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }

        .admin-sidebar h4 {
            padding: 1.5rem 1rem;
            text-align: center;
            font-weight: 700;
            font-family: 'Playfair Display', serif;
            background: rgba(255,255,255,0.05);
            margin: 0;
            border-bottom: 1px solid rgba(255,255,255,0.15);
        }

        .admin-sidebar .nav-link {
            color: rgba(255,255,255,0.85);
            padding: 0.75rem 1.25rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
            border-left: 4px solid transparent;
            transition: all 0.25s ease;
        }

        .admin-sidebar .nav-link:hover {
            background: rgba(255,255,255,0.1);
            color: #fff;
            border-left: 4px solid #ffb703;
        }

        .admin-sidebar .nav-link.active {
            background: rgba(255,255,255,0.15);
            color: #fff;
            border-left: 4px solid #ffd60a;
        }

        .admin-sidebar hr {
            margin: 1rem;
            border-color: rgba(255,255,255,0.2);
        }

        /* Nội dung */
        .admin-content {
            flex-grow: 1;
            padding: 2rem;
            background: #fdfcfb;
            animation: fadeIn 0.6s ease-in-out;
        }

        .admin-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
        }

        .admin-header h2 {
            font-family: 'Playfair Display', serif;
            color: #3a0ca3;
            font-weight: 700;
        }

        /* Thông báo */
        .alert {
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        }

        /* Hiệu ứng xuất hiện */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .admin-sidebar {
                width: 100%;
                flex-direction: row;
                overflow-x: auto;
            }
            .admin-sidebar .nav-link {
                flex: 1;
                justify-content: center;
                padding: 1rem;
                border-left: none;
                border-bottom: 3px solid transparent;
            }
            .admin-sidebar .nav-link.active {
                border-bottom: 3px solid #ffd60a;
            }
        }
    </style>
</head>

<body>
    {{-- SIDEBAR --}}
    <nav class="admin-sidebar">
        <h4>🛠️ Admin Panel</h4>
        <ul class="nav flex-column flex-grow-1">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.orders.index') }}" class="nav-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                    <i class="bi bi-basket"></i> Đơn hàng
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.products.index') }}" class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                    <i class="bi bi-box-seam"></i> Sản phẩm
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.categories.index') }}" class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                    <i class="bi bi-tags"></i> Danh mục
                </a>
            </li>
            <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.users.*')?'active':'' }}" href="{{ route('admin.users.index') }}">
                👤 Tài khoản
            </a>
            </li>

            <hr>

            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link" target="_blank">
                    <i class="bi bi-house-door"></i> Xem trang web
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link text-warning"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right"></i> Đăng xuất
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
            </li>
        </ul>
    </nav>

    {{-- MAIN CONTENT --}}
    <main class="admin-content">
        <div class="admin-header">
            <h2>@yield('title', 'Dashboard')</h2>
        </div>

        {{-- Thông báo --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> Có lỗi xảy ra!
                <ul class="mb-0 mt-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Nội dung chính --}}
        @yield('content')
    </main>
</body>
</html>
