@extends('layouts.app')

@section('title', 'Chi tiết đơn hàng')

@section('content')
<style>
    .order-detail-container {
        background: #fffdf8;
        border-radius: 16px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        padding: 30px;
        margin-top: 40px;
        margin-bottom: 60px;
    }

    .order-header {
        border-bottom: 2px solid #f3e5f5;
        margin-bottom: 20px;
        padding-bottom: 10px;
    }

    .order-header h4 {
        color: #6a1b9a;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .order-header h4 i {
        color: #9c27b0;
    }

    .order-section h6 {
        color: #4a148c;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .order-section ul {
        padding-left: 0;
        list-style: none;
        color: #333;
        font-size: 0.95rem;
    }

    .order-status .badge {
        padding: 6px 10px;
        font-size: 0.85rem;
        border-radius: 6px;
    }

    .table {
        border-radius: 10px;
        overflow: hidden;
    }

    .table thead {
        background: #f3e5f5;
        color: #4a148c;
        font-weight: 600;
    }

    .table tbody tr:hover {
        background: #fef3ff;
    }

    .order-total {
        text-align: right;
        font-size: 1.2rem;
        font-weight: 600;
        color: #c2185b;
    }

    .btn-back {
        background-color: #6a1b9a;
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 8px 20px;
        transition: 0.3s;
    }

    .btn-back:hover {
        background-color: #4a148c;
        color: #fff;
    }
</style>

<div class="container">
    <div class="order-detail-container">
        <div class="order-header">
            <h4><i class="bi bi-box-seam"></i> Chi tiết đơn hàng 
                <span class="text-muted">#{{ $order->code ?? $order->id }}</span>
            </h4>
        </div>

        <div class="row">
            <div class="col-md-6 order-section">
                <h6>Thông tin đơn hàng</h6>
                <ul>
                    <li><strong>Ngày đặt:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</li>
                    <li class="order-status">
                        <strong>Trạng thái:</strong>
                        @if($order->status == 'pending')
                            <span class="badge bg-warning text-dark">Chờ xử lý</span>
                        @elseif($order->status == 'confirmed')
                            <span class="badge bg-info text-dark">Đã xác nhận</span>
                        @elseif($order->status == 'delivered')
                            <span class="badge bg-success">Đã giao</span>
                        @else
                            <span class="badge bg-secondary">Khác</span>
                        @endif
                    </li>
                </ul>
            </div>

            <div class="col-md-6 order-section">
                <h6>Người nhận</h6>
                <ul>
                    <li><strong>Họ tên:</strong> {{ $order->customer_name }}</li>
                    <li><strong>SĐT:</strong> {{ $order->customer_phone }}</li>
                    <li><strong>Email:</strong> {{ $order->customer_email }}</li>
                    <li><strong>Địa chỉ:</strong> {{ $order->customer_address }}</li>
                </ul>
            </div>
        </div>

        <hr>

        <h6 class="mb-3">Danh sách sản phẩm</h6>
        <div class="table-responsive">
            <table class="table align-middle text-center">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                    <tr>
                        <td>{{ $item->product->name ?? 'Sản phẩm' }}</td>
                        <td>{{ $item->quantity ?? $item->qty ?? 0 }}</td> {{-- ✅ FIX số lượng không hiện --}}
                        <td>{{ number_format($item->price) }}đ</td>
                        <td class="text-danger fw-bold">
                            {{ number_format(($item->price ?? 0) * ($item->quantity ?? $item->qty ?? 0)) }}đ
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="order-total mt-3">
            Tổng cộng: <span>{{ number_format($order->total) }}đ</span>
        </div>

        <div class="text-end mt-4">
            <a href="{{ route('orders.history') }}" class="btn btn-back">
                ← Quay lại lịch sử đơn hàng
            </a>
        </div>
    </div>
</div>
@endsection
