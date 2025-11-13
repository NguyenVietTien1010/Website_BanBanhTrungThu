@extends('admin.layouts.admin')
@section('title', $user->exists ? 'Sửa tài khoản' : 'Thêm tài khoản')

@section('content')
<div class="container-fluid fade-in">

    {{-- Tiêu đề --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-purple mb-0">
            {{ $user->exists ? '' : '➕ Thêm tài khoản' }}
        </h3>
    </div>

    {{-- Form --}}
    <div class="card border-0 shadow-lg rounded-4 p-5">
        <form method="POST" action="{{ $user->exists ? route('admin.users.update', $user) : route('admin.users.store') }}">
            @csrf
            @if($user->exists)
                @method('PUT')
            @endif

            <div class="row g-4">
                {{-- Họ tên --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Họ tên *</label>
                    <input name="name"
                           value="{{ old('name', $user->name) }}"
                           required
                           class="form-control form-control-lg rounded-pill px-4 shadow-sm">
                </div>

                {{-- Email --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Email *</label>
                    <input name="email"
                           value="{{ old('email', $user->email) }}"
                           type="email"
                           required
                           class="form-control form-control-lg rounded-pill px-4 shadow-sm">
                </div>

                {{-- Mật khẩu --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Mật khẩu {{ $user->exists ? '(để trống nếu không đổi)' : '*' }}
                    </label>
                    <input name="password"
                           type="password"
                           class="form-control form-control-lg rounded-pill px-4 shadow-sm"
                           placeholder="{{ $user->exists ? '••••••••' : 'Nhập mật khẩu' }}">
                </div>

                {{-- Vai trò --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Vai trò *</label>
                    <select name="is_admin" class="form-select rounded-pill px-4">
                        <option value="0" {{ old('is_admin', $user->is_admin) == 0 ? 'selected' : '' }}>0 - Người dùng</option>
                        <option value="1" {{ old('is_admin', $user->is_admin) == 1 ? 'selected' : '' }}>1 - Quản trị viên</option>
                    </select>

                </div>
            </div>

            {{-- Nút hành động --}}
            <div class="d-flex justify-content-end gap-3 mt-5">
                <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">
                    ↩️ Hủy
                </a>
                <button type="submit" class="btn btn-gradient rounded-pill px-5 py-2 shadow-sm">
                    {{ $user->exists ? '💾 Cập nhật' : '➕ Thêm mới' }}
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ================= STYLE ================= --}}
<style>
.text-purple { color: #4a148c !important; }

.btn-gradient {
    background: linear-gradient(135deg, #7209b7, #b5179e);
    color: white !important;
    border: none;
    transition: all 0.3s ease;
    font-weight: 500;
}
.btn-gradient:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(114, 9, 183, 0.3);
}

.form-control, .form-select {
    border: 1px solid #ddd;
    transition: all 0.2s;
}
.form-control:focus, .form-select:focus {
    border-color: #7209b7;
    box-shadow: 0 0 0 0.2rem rgba(114, 9, 183, 0.2);
}

.fade-in { animation: fadeIn 0.4s ease-in-out; }
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>
@endsection
