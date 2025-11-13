@extends('admin.layouts.admin')
@section('title', 'Quản lý tài khoản - Admin')

@section('content')
<div class="container-fluid fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-purple mb-0"></h3>
        <a href="{{ route('admin.users.create') }}" class="btn btn-gradient rounded-pill px-4 shadow-sm">
            ➕ Thêm mới
        </a>
    </div>

    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
        <div class="table-responsive">
            <table class="table align-middle mb-0 table-hover text-center">
                <thead style="background: linear-gradient(90deg, #7209b7, #b5179e); color:white;">
                    <tr class="text-uppercase small">
                        <th width="5%">ID</th>
                        <th width="20%">Họ tên</th>
                        <th width="25%">Email</th>
                        <th width="15%">Vai trò</th>
                        <th width="15%">Ngày tạo</th>
                        <th width="20%">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $u)
                        <tr class="user-row align-middle">
                            <td>{{ $u->id }}</td>
                            <td class="fw-semibold text-start">{{ $u->name }}</td>
                            <td class="text-muted">{{ $u->email }}</td>
                            <td>
                                <span class="badge px-3 py-2 rounded-pill 
                                    {{ $u->is_admin ? 'bg-danger' : 'bg-secondary' }}">
                                    {{ $u->is_admin ? '1 (Admin)' : '0 (User)' }}
                                </span>
                            </td>
                            <td>{{ $u->created_at->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('admin.users.edit', $u) }}" 
                                   class="btn btn-sm btn-outline-primary rounded-pill px-3 me-2">
                                    ✏️ Sửa
                                </a>
                                <form action="{{ route('admin.users.destroy', $u) }}" 
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Xóa tài khoản này?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-sm btn-outline-danger rounded-pill px-3">
                                        🗑️ Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-5 text-center text-muted fs-5">
                                😥 Chưa có tài khoản nào.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
.text-purple { color: #4a148c !important; }

.btn-gradient {
    background: linear-gradient(135deg, #7209b7, #b5179e);
    color: white !important;
    border: none;
    transition: all 0.3s ease;
}
.btn-gradient:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(114, 9, 183, 0.3);
}

.user-row:hover {
    background-color: #f8f4ff;
    transition: 0.2s;
}

.table th, .table td {
    vertical-align: middle !important;
    text-align: center;
    padding: 14px 10px;
}

.badge {
    font-size: 0.85rem;
    font-weight: 600;
}

.fade-in { animation: fadeIn 0.4s ease-in-out; }
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>
@endsection
