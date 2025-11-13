<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Logic dựa trên file view `index.blade.php` của bạn
    public function index(Request $request)
    {
        $query = Order::query()->latest();
        
        // Lọc theo tìm kiếm
        if ($request->q) {
            $query->where('code', 'like', "%{$request->q}%")
                  ->orWhere('customer_name', 'like', "%{$request->q}%")
                  ->orWhere('customer_phone', 'like', "%{$request->q}%");
        }
        
        // Lọc theo ngày
        if ($request->from) {
            $query->whereDate('created_at', '>=', $request->from);
        }
        if ($request->to) {
            $query->whereDate('created_at', '<=', $request->to);
        }
        
        $orders = $query->paginate(15)->withQueryString();
        $q = $request->q;

        return view('admin.orders.index', compact('orders', 'q'));
    }

    public function show(Order $order)
    {
        $order->load('items.product'); // Tải chi tiết các sản phẩm trong đơn
        return view('admin.orders.show', compact('order'));
    }

    // Xử lý cập nhật status từ dropdown
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate(['status' => 'required|in:pending,confirmed,shipping,completed,canceled']);
        $order->update(['status' => $request->status]);
        return back()->with('success', 'Cập nhật trạng thái thành công.');
    }
}
