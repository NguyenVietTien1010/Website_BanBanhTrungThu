<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; // <-- DÒNG BỊ THIẾU
use App\Models\OrderItem; // <-- DÒNG BỊ THIẾU
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('products.index')->with('error', 'Giỏ hàng trống!');
        }
        $total = 0;
        foreach ($cart as $item) $total += $item['price'] * $item['qty'];

        return view('checkout.index', compact('cart', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_email' => 'required|email|max:255',
            'customer_address' => 'required|string|max:255',
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('products.index')->with('error', 'Giỏ hàng trống!');
        }

        $total = 0;
        foreach ($cart as $item) $total += $item['price'] * $item['qty'];

        // Dòng 41 (gây lỗi) nằm ở đây
        $order = Order::create([ // <-- Lỗi xảy ra ở đây vì không tìm thấy 'Order'
            'code' => 'DH-' . strtoupper(Str::random(8)),
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'customer_email' => $request->customer_email,
            'customer_address' => $request->customer_address,
            'total' => $total,
            'status' => 'pending',
            'payment_status' => 'pending', 
            'user_id' => Auth::id(), 
        ]);

        foreach ($cart as $id => $item) {
            OrderItem::create([ // <-- Bạn cũng cần 'OrderItem'
                'order_id' => $order->id,
                'product_id' => $id,
                'name' => $item['name'],
                'qty' => $item['qty'],
                'price' => $item['price'],
            ]);
        }

        session()->forget('cart');

        return redirect()->route('checkout.success', $order);
    }

    public function success(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(404);
        }
        return view('checkout.success', compact('order'));
    }
}