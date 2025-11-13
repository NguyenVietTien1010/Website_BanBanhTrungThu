<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Danh sách tài khoản
    public function index()
    {
        $users = User::latest()->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    // Form thêm mới
    public function create()
    {
        $user = new User();
        return view('admin.users.form', compact('user'));
    }

    // Lưu tài khoản mới
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'is_admin' => 'required|boolean',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);

        return redirect()->route('admin.users.index')->with('success', 'Thêm tài khoản thành công!');
    }

    // Form sửa tài khoản
    public function edit(User $user)
    {
        return view('admin.users.form', compact('user'));
    }

    // Cập nhật tài khoản
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'is_admin' => 'required|boolean',
            'password' => 'nullable|min:6',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']); // không cập nhật nếu để trống
        }

        $user->update($validated);

        return redirect()->route('admin.users.index')->with('success', 'Cập nhật tài khoản thành công!');
    }

    // Xóa tài khoản
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'Đã xóa tài khoản!');
    }
}
