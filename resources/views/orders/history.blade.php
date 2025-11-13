@extends('layouts.app')

@section('title', 'Lịch sử đơn hàng - Tiệm Bánh Trung Thu')

@section('content')
<style>
    html, body {
        margin: 0;
        padding: 0;
        height: 100%;
    }

    body {
        /* 🌕 Nền gradient kết hợp ảnh */
        background: linear-gradient(180deg, rgba(253,246,255,0.9) 0%, rgba(255,253,248,0.95) 100%), 
                    url("{{ asset('images/bg-login.jpg') }}") center/cover no-repeat fixed;
        background-attachment: fixed;
        font-family: 'Inter', sans-serif;
    }

    .fade-in {
        animation: fadeIn 0.8s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .card {
        border-radius: 20px !important;
        overflow: hidden;
        border: none;
        background: rgba(255, 255, 255, 0.88);
        backdrop-filter: blur(6px);
    }

    .card-body {
        border-radius: 20px;
    }

    .table thead {
        background-color: #f3e5f5;
        color: #4a148c;
        font-weight: 600;
    }

    .table tbody tr {
        transition: background-color 0.3s ease;
    }

    .table tbody tr:hover {
        background-color: #fef3ff;
    }

    .btn-outline-primary {
        border-color: #6a1b9a;
        color: #6a1b9a;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.25s ease-in-out;
    }

    .btn-outline-primary:hover {
        background-color: #6a1b9a;
        color: #fff;
    }

    .btn-gold {
        background: linear-gradient(45deg, #ffd54f, #ffb300);
        border: none;
        color: #4a148c;
        font-weight: 600;
        border-radius: 8px;
        transition: 0.3s;
    }

    .btn-gold:hover {
        background: linear-gradient(45deg, #ffca28, #ffa000);
        color: #fff;
    }

    .alert {
        background-color: rgba(243, 229, 245, 0.9);
        border: none;
        color: #4a148c;
        backdrop-filter: blur(5px);
    }

    h2.text-royal {
        color: #6a1b9a;
        font-family: 'Playfair Display', serif;
        letter-spacing: 0.5px;
        text-shadow: 0 1px 2px rgba(0,0,0,0.1);
    }
</style>

<div class="container my-5 fade-in">
    <h2 class="fw-bold text-royal mb-4 text-center">📦 Lịch sử đơn hàng của bạn</h2>

    @if($orders->isEmpty())
        <div class="alert alert-info text-center rounded-4 py-5 shadow-sm">
            <h5>Hiện bạn chưa có đơn hàng nào.</h5>
            <a href="{{ route('products.index') }}" class="btn btn-gold mt-3">Mua sắm ngay</a>
        </div>
    @else
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body">
                <table class="table align-middle text-center">
                    <thead>
                        <tr>
                            <th>Mã đơn</th>
                            <th>Ngày đặt</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td class="fw-semibold text-purple">{{ $order->code }}</td>
                                <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                <td class="text-danger fw-bold">{{ number_format($order->total) }}đ</td>
                                <td>
                                    @if($order->status == 'pending')
                                        <span class="badge bg-warning text-dark">Chờ xử lý</span>
                                    @elseif($order->status == 'confirmed')
                                        <span class="badge bg-info text-dark">Đã xác nhận</span>
                                    @elseif($order->status == 'delivered')
                                        <span class="badge bg-success">Đã giao</span>
                                    @else
                                        <span class="badge bg-secondary">Khác</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-outline-primary btn-sm">
                                        Xem
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection
