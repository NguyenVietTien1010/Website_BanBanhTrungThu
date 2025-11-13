<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // <-- Đảm bảo có dòng 'use' này

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Xóa dòng $this->middleware('auth'); nếu bạn muốn ai cũng xem được trang chủ
        // $this->middleware('auth'); 
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Lấy 6 sản phẩm mới nhất
        $products = Product::latest()->take(6)->get();
        
        // Gửi biến $products sang view
        return view('home', compact('products'));
    }
}