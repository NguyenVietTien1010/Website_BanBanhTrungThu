<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        /* CSS đơn giản cho admin sidebar */
        body { display: flex; }
        .admin-sidebar { width: 250px; background: #343a40; color: white; min-height: 100vh; }
        .admin-sidebar a { color: #adb5bd; display: block; padding: 1rem; text-decoration: none; }
        .admin-sidebar a:hover, .admin-sidebar a.active { color: white; background: #495057; }
        .admin-content { flex-grow: 1; padding: 2rem; background-color: #f8f9fa; }
    </style>
</head>
<body>
    <nav class="admin-sidebar">
        <h4 class="p-3">Admin</h4>
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
        <a href="{{ route('admin.orders.index') }}" class="{{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">Đơn hàng</a>
        <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">Sản phẩm</a>
        <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">Danh mục</a>
        <hr class="bg-secondary mx-3">
        <a href="{{ route('home') }}" target="_blank">Xem trang web</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Đăng xuất
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
    </nav>

    <main class="admin-content">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h5 class="alert-heading">Có lỗi xảy ra!</h5>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>