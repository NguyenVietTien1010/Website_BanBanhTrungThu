<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = $this->calculateTotal($cart);
        return view('cart.index', compact('cart', 'total'));
    }

    // AJAX Add
    public function add(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $qty = $request->input('qty', 1);
        $cart = session()->get('cart', []);

        if(isset($cart[$product->id])) {
            $cart[$product->id]['qty'] += $qty;
        } else {
            $cart[$product->id] = [
                "name" => $product->name,
                "qty" => (int)$qty,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        
            return response()->json([
                'success' => true,
                'message' => 'Đã thêm sản phẩm vào giỏ!',
                'cartCount' => array_sum(array_column($cart, 'qty')),
                'cartHtml' => $this->renderCartHeader()
            ]);

    }

    // AJAX Update
    public function update(Request $request)
    {
        $cart = session()->get('cart', []);
        $id = $request->product_id;
        $qty = $request->qty;

        if($id && $qty && isset($cart[$id])) {
            if ($qty > 0) {
                $cart[$id]['qty'] = (int)$qty;
            } else {
                unset($cart[$id]); // Xóa nếu số lượng là 0
            }
            session()->put('cart', $cart);
        }

        $total = $this->calculateTotal($cart);

        return response()->json([
            'success' => true,
            'cartHtml' => view('cart._cart_table', compact('cart', 'total'))->render(),
            'cartHeader' => $this->renderCartHeader()
        ]);
    }

    // AJAX Remove
    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);
        $id = $request->product_id;

        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        
        $total = $this->calculateTotal($cart);

        return response()->json([
            'success' => true,
            'message' => 'Đã xóa sản phẩm!',
            'cartHtml' => view('cart._cart_table', compact('cart', 'total'))->render(),
            'cartHeader' => $this->renderCartHeader()
        ]);
    }

    // --- Helper Functions ---
    private function calculateTotal($cart)
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
        }
        return $total;
    }

    private function renderCartHeader()
    {
        // Trả về HTML của giỏ hàng mini trên header
        return view('layouts._cart_mini')->render();
    }
}