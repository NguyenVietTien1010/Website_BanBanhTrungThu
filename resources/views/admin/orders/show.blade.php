@extends('admin.layouts.admin')
@section('title', 'Chi tiết Đơn hàng')

@section('content')
<div class="container-fluid fade-in">
    <h1 class="fw-bold text-purple mb-4">
        🧾 Mã Đơn hàng:
        <span class="font-monospace text-decoration-underline text-primary">{{ $order->code }}</span>
    </h1>

    <div class="row g-4">
        {{-- 🧁 Danh sách sản phẩm --}}
        <div class="col-md-8">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-header bg-gradient text-white fw-semibold" 
                     style="background: linear-gradient(90deg, #7209b7, #b5179e);">
                    Sản phẩm
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0 align-middle">
                        <thead class="table-light text-center">
                            <tr>
                                <th>Sản phẩm</th>
                                <th width="120">Số lượng</th>
                                <th width="150" class="text-end">Đơn giá</th>
                                <th width="150" class="text-end">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td class="text-center">{{ $item->qty }}</td>
                                    <td class="text-end">{{ number_format($item->price) }}đ</td>
                                    <td class="text-end fw-bold text-danger">
                                        {{ number_format($item->price * $item->qty) }}đ
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-end fs-5">Tổng cộng:</th>
                                <th class="text-end fs-5 fw-bold text-danger">
                                    {{ number_format($order->total) }}đ
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        {{-- 👤 Thông tin khách hàng + trạng thái --}}
        <div class="col-md-4">
            <div class="card border-0 shadow-lg rounded-4 mb-4">
                <div class="card-header bg-light fw-semibold">Thông tin Khách hàng</div>
                <div class="card-body">
                    <p><strong>Tên khách hàng:</strong> {{ $order->customer_name }}</p>
                    <p><strong>Email:</strong> {{ $order->customer_email }}</p>
                    <p><strong>Số điện thoại:</strong> {{ $order->customer_phone }}</p>
                    <p><strong>Địa chỉ giao hàng:</strong> {{ $order->customer_address }}</p>
                </div>
            </div>

            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-header bg-light fw-semibold">Trạng thái đơn hàng</div>
                <div class="card-body">
                    @php
                        $statusLabels = [
                            'pending' => '🕓 Chờ xử lý',
                            'confirmed' => '✅ Đã xác nhận',
                            'shipping' => '🚚 Đang giao',
                            'completed' => '🎉 Hoàn thành',
                            'canceled' => '❌ Đã hủy'
                        ];
                        $statusColors = [
                            'pending' => 'bg-warning text-dark',
                            'confirmed' => 'bg-info text-dark',
                            'shipping' => 'bg-primary',
                            'completed' => 'bg-success',
                            'canceled' => 'bg-danger'
                        ];
                    @endphp

                    <p>
                        <strong>Trạng thái đơn:</strong><br>
                        <span class="badge px-3 py-2 {{ $statusColors[$order->status] ?? 'bg-secondary' }}">
                            {{ $statusLabels[$order->status] ?? ucfirst($order->status) }}
                        </span>
                    </p>

                    <p>
                        <strong>Thanh toán:</strong><br>
                        <span class="badge px-3 py-2 {{ $order->payment_status == 'paid' ? 'bg-success' : 'bg-secondary' }}">
                            {{ $order->payment_status == 'paid' ? 'Đã thanh toán' : 'Chưa thanh toán' }}
                        </span>
                    </p>

                    <p><strong>Ngày đặt:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Nút thao tác --}}
    <div class="mt-4 d-flex gap-3">
        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary rounded-pill px-4">
            ⬅️ Quay lại danh sách
        </a>
        <button class="btn btn-gradient rounded-pill px-4" onclick="window.print()">
            🖨️ In hóa đơn
        </button>
    </div>
</div>

{{-- ================= STYLE ================= --}}
<style>
.text-purple { color: #4a148c !important; }
.btn-gradient {
    background: linear-gradient(135deg, #7209b7, #b5179e);
    color: white;
    border: none;
    transition: 0.2s;
}
.btn-gradient:hover {
    opacity: 0.9;
    transform: translateY(-2px);
}
.fade-in {
    animation: fadeIn 0.4s ease-in-out;
}
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
@media print {
    .btn, nav, .footer-gold { display: none !important; }
    body { background: white !important; }
}
</style>
@endsection
