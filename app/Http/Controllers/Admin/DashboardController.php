<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Đơn hàng hôm nay
        $todayOrders = Order::whereDate('created_at', Carbon::today())->count();

        // Tổng sản phẩm và người dùng
        $totalProducts = Product::count();
        $totalUsers = User::count();

        // Doanh thu tháng (chỉ tính đơn "Hoàn thành")
        $monthlyRevenue = Order::where('status', 'completed')
            ->whereMonth('updated_at', Carbon::now()->month)
            ->whereYear('updated_at', Carbon::now()->year)
            ->sum('total');

        // Biểu đồ doanh thu 7 ngày gần nhất
        $revenueData = [];
        $dates = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->toDateString();
            $dates[] = Carbon::parse($date)->format('d/m');
            $revenueData[] = Order::where('status', 'completed')
                ->whereDate('updated_at', $date)
                ->sum('total');
        }

        // Biểu đồ phân loại sản phẩm (ví dụ)
        $categoryLabels = ['Bánh Nướng', 'Bánh Dẻo'];
        $categoryData = [
            Product::where('category_id', 1)->count(),
            Product::where('category_id', 2)->count(),
        ];

        return view('admin.dashboard', compact(
            'todayOrders',
            'totalProducts',
            'totalUsers',
            'monthlyRevenue',
            'revenueData',
            'dates',
            'categoryLabels',
            'categoryData'
        ));
    }
}
