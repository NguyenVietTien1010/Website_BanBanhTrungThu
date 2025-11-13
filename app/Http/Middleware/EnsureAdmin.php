<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Chưa đăng nhập -> về trang login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập!');
        }

        // Nếu dùng cột role
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Bạn không có quyền truy cập khu vực này.');
        }

        // Nếu dùng cột is_admin thì dùng dòng dưới (và xóa điều kiện role ở trên):
        if (!Auth::user()->is_admin) { abort(403, 'Bạn không có quyền truy cập khu vực này.'); }

        return $next($request);
    }
}
