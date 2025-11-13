<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category; // 🟡 Thêm model Category

class ProductController extends Controller
{
    /**
     * Hiển thị danh sách sản phẩm có bộ lọc & tìm kiếm
     */
    public function index(Request $request)
    {
        // Bắt đầu truy vấn
        $query = Product::query();

        // 🔍 Tìm kiếm theo tên sản phẩm
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // 🧁 Lọc theo loại sản phẩm
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // 🪙 Sắp xếp mới nhất (có thể đổi theo yêu cầu)
        $products = $query->latest()->paginate(12)->withQueryString();

        // 🧩 Lấy toàn bộ danh mục (phục vụ cho select box)
        $categories = Category::all();

        // Trả dữ liệu sang view
        return view('products.index', compact('products', 'categories'));
    }

    /**
     * Hiển thị chi tiết sản phẩm
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('products.show', compact('product'));
    }
}
