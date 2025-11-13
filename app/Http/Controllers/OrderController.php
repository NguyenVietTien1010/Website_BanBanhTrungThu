<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function history()
    {
        $orders = Order::where('user_id', auth()->id())
                        ->latest()
                        ->get();

        return view('orders.history', compact('orders'));
    }
    public function show($id)
    {
        $order = Order::where('id', $id)
                      ->where('user_id', auth()->id())
                      ->with('items.product') // nếu có quan hệ order_items
                      ->firstOrFail();

        return view('orders.show', compact('order'));
    }

}
