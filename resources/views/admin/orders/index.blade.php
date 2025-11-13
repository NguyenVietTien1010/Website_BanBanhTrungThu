@extends('admin.layouts.admin')
@section('title','Đơn hàng - Admin')

@section('content')
<div class="container-fluid fade-in">
    {{-- Tiêu đề trang --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
    </div>

    {{-- Bộ lọc tìm kiếm --}}
    <div class="card border-0 shadow-lg rounded-4 mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('admin.orders.index') }}" class="row g-3 align-items-end">
                <div class="col-md-3">
                    <label for="from" class="form-label fw-semibold">Từ ngày</label>
                    <input type="date" name="from" id="from" value="{{ request('from') }}" class="form-control shadow-sm">
                </div>
                <div class="col-md-3">
                    <label for="to" class="form-label fw-semibold">Đến ngày</label>
                    <input type="date" name="to" id="to" value="{{ request('to') }}" class="form-control shadow-sm">
                </div>
                <div class="col-md-4">
                    <label for="q" class="form-label fw-semibold">Tìm kiếm</label>
                    <input name="q" id="q" value="{{ $q ?? '' }}" placeholder="🔍 Mã đơn, tên, SĐT..." class="form-control shadow-sm">
                </div>
                <div class="col-md-2 d-flex gap-2">
                    <button type="submit" class="btn btn-gradient w-100 shadow-sm">Lọc</button>
                    <a href="{{ route('admin.orders.export.excel', request()->query()) }}" class="btn btn-success shadow-sm" title="Xuất Excel">📤</a>
                </div>
            </form>
        </div>
    </div>

    {{-- Bảng danh sách đơn hàng --}}
    <div class="card border-0 shadow-lg rounded-4">
        <div class="table-responsive">
            <table class="table align-middle text-center mb-0">
                <thead class="table-light text-uppercase small text-secondary">
                    <tr>
                        <th>Mã</th>
                        <th>Khách</th>
                        <th>Tổng</th>
                        <th>TT Thanh toán</th>
                        <th>Trạng thái</th>
                        <th>Ngày</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $o)
                    <tr class="align-middle">
                        <td class="fw-semibold text-purple">{{ $o->code }}</td>
                        <td>
                            <div class="fw-semibold">{{ $o->customer_name }}</div>
                            <small class="text-muted">{{ $o->customer_phone }}</small>
                        </td>
                        <td class="fw-bold text-danger">{{ number_format($o->total) }}đ</td>
                        <td>
                            <span class="badge 
                                {{ $o->payment_status == 'paid' ? 'bg-success' : 'bg-secondary' }}">
                                {{ ucfirst($o->payment_status) }}
                            </span>
                        </td>
                        <td>
                            <form action="{{ route('admin.orders.status', $o) }}" method="post" class="d-inline">
                                @csrf
                                <select name="status" class="form-select form-select-sm fw-semibold text-capitalize" onchange="this.form.submit()">
                                    @foreach(['pending','confirmed','shipping','completed','canceled'] as $s)
                                        <option {{ $o->status===$s?'selected':'' }} value="{{ $s }}">
                                            {{ ucfirst($s) }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                        </td>
                        <td>{{ $o->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <a href="{{ route('admin.orders.show', $o) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                Chi tiết
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="py-4 text-muted text-center">
                            Không tìm thấy đơn hàng nào 🥲
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($orders->hasPages())
        <div class="card-footer border-0 bg-light text-center">
            {{ $orders->links() }}
        </div>
        @endif
    </div>
</div>

{{-- ================= STYLE ================= --}}
<style>
.text-purple { color: #5b0aa3 !important; }

.btn-gradient {
    background: linear-gradient(135deg, #7209b7, #b5179e);
    color: white;
    border: none;
    font-weight: 600;
    transition: all 0.3s ease;
}
.btn-gradient:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(114, 9, 183, 0.25);
}

.fade-in {
    animation: fadeIn 0.4s ease-in-out;
}
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>
@endsection
