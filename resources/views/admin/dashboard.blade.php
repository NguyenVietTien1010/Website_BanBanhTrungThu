@extends('admin.layouts.admin')
@section('title', 'Admin Dashboard')

@section('content')
<div class="container-fluid">
    {{-- Thông báo chào mừng --}}
    <div class="alert alert-info shadow-sm rounded-4 mb-4">
        👋 Xin chào, <strong>{{ Auth::user()->name }}</strong>!  
        Chúc bạn một ngày làm việc hiệu quả tại trang quản trị Tiệm Bánh Trung Thu 🍰
    </div>

    {{-- Thống kê nhanh --}}
    <div class="row g-4 mb-5">
        <div class="col-md-3">
            <div class="card border-0 shadow-lg rounded-4 text-center py-4" 
                 style="background: linear-gradient(135deg, #ffb703, #ffd60a); color:#4a148c;">
                <h5>Đơn hàng hôm nay</h5>
                <h2 class="fw-bold">{{ $todayOrders ?? 0 }}</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-lg rounded-4 text-center py-4" 
                 style="background: linear-gradient(135deg, #7209b7, #3a0ca3); color:white;">
                <h5>Tổng sản phẩm</h5>
                <h2 class="fw-bold">{{ $totalProducts ?? 0 }}</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-lg rounded-4 text-center py-4" 
                 style="background: linear-gradient(135deg, #219ebc, #126782); color:white;">
                <h5>Khách hàng</h5>
                <h2 class="fw-bold">{{ $totalUsers ?? 0 }}</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-lg rounded-4 text-center py-4" 
                 style="background: linear-gradient(135deg, #06d6a0, #118ab2); color:white;">
                <h5>Doanh thu tháng</h5>
                <h2 class="fw-bold">{{ number_format($monthlyRevenue ?? 0) }}đ</h2>
            </div>
        </div>
    </div>

    {{-- Biểu đồ thống kê --}}
    <style>
.text-purple {
    color: #4a148c !important;
}

.chart-container {
    position: relative;
    width: 100%;
    height: 100%;
}

.card {
    background: #fff;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.card:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 16px rgba(0,0,0,0.12);
}
</style>

    <div class="row g-4 align-items-stretch">
        {{-- Biểu đồ Doanh thu --}}
        <div class="col-lg-8 d-flex">
            <div class="card border-0 shadow-lg rounded-4 p-4 flex-fill">
                <h5 class="fw-bold text-purple mb-3">
                    📈 Doanh thu 7 ngày gần đây
                </h5>
                <div class="chart-container" style="position: relative; height: 320px;">
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>
        </div>

        {{-- Biểu đồ Phân loại sản phẩm --}}
        <div class="col-lg-4 d-flex">
            <div class="card border-0 shadow-lg rounded-4 p-4 flex-fill">
                <h5 class="fw-bold text-purple mb-3">
                    🧁 Phân loại sản phẩm
                </h5>
                <div class="chart-container" style="position: relative; height: 320px;">
                    <canvas id="categoryChart"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- ================= Chart.js ================= --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener("DOMContentLoaded", () => {
    // ✅ Lấy dữ liệu từ Controller (hoặc fallback nếu không có)
    const revenueData = @json($revenueData ?? []);
    const categoryData = @json($categoryData ?? []);
    const categoryLabels = @json($categoryLabels ?? []);
    const revenueLabels = @json($dates ?? []);

    // ✅ Nếu dữ liệu rỗng thì dùng dữ liệu giả định để tránh lỗi
    const safeRevenue = (revenueData && revenueData.length > 0) ? revenueData : [12, 19, 3, 5, 2, 3, 9];
    const safeCategories = (categoryData && categoryData.length > 0) ? categoryData : [40, 25, 15, 20];
    const safeLabels = (categoryLabels && categoryLabels.length > 0) ? categoryLabels : ['Bánh Nướng', 'Bánh Dẻo', 'Combo', 'Khác'];
    const safeRevenueLabels = (revenueLabels && revenueLabels.length > 0) ? revenueLabels : ['T2','T3','T4','T5','T6','T7','CN'];

    // 🟣 Biểu đồ Doanh thu 7 ngày
    new Chart(document.getElementById('revenueChart'), {
        type: 'line',
        data: {
            labels: safeRevenueLabels,
            datasets: [{
                label: 'Doanh thu (VNĐ)',
                data: safeRevenue,
                borderColor: '#7209b7',
                backgroundColor: 'rgba(114,9,183,0.1)',
                borderWidth: 3,
                tension: 0.4,
                fill: true,
                pointBackgroundColor: '#ffb703'
            }]
        },
        options: {
            responsive: true,
            scales: { y: { beginAtZero: true } },
            plugins: { legend: { display: false } }
        }
    });

    // 🧁 Biểu đồ phân loại sản phẩm
    new Chart(document.getElementById('categoryChart'), {
        type: 'doughnut',
        data: {
            labels: safeLabels,
            datasets: [{
                data: safeCategories,
                backgroundColor: ['#ffb703','#7209b7','#06d6a0','#219ebc'],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: { color: '#333' }
                }
            }
        }
    });
});
</script>


<style>
    .text-purple {
        color: #4a148c !important;
    }
</style>
@endsection
