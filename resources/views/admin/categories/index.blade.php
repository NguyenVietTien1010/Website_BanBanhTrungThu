@extends('admin.layouts.admin')
@section('title','Danh mục - Admin')

@section('content')
<div class="container-fluid fade-in">
    {{-- Tiêu đề --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-purple"></h1>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-gradient rounded-pill px-4 shadow-sm">
            ➕ Thêm mới
        </a>
    </div>

    {{-- Bảng danh mục --}}
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
        <div class="table-responsive">
            <table class="table align-middle mb-0 table-hover">
                <thead style="background: linear-gradient(90deg, #7209b7, #b5179e); color:white;">
                    <tr class="text-uppercase small text-center">
                        <th class="py-3">Tên danh mục</th>
                        <th class="py-3">Slug</th>
                        <th class="py-3" width="160">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr class="category-row">
                            <td class="fw-semibold fs-6">{{ $category->name }}</td>
                            <td class="text-muted">{{ $category->slug }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.categories.edit', $category) }}" 
                                   class="btn btn-sm btn-outline-primary rounded-pill px-3 me-2">
                                   ✏️ Sửa
                                </a>
                                <form action="{{ route('admin.categories.destroy', $category) }}" 
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Bạn có chắc muốn xóa danh mục này?')">
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
                            <td colspan="3" class="py-5 text-center text-muted fs-5">
                                😥 Chưa có danh mục nào trong hệ thống.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- ================= STYLE ================= --}}
<style>
.text-purple {
    color: #4a148c !important;
}

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

.category-row {
    transition: all 0.2s ease;
}
.category-row:hover {
    background-color: #faf5ff !important;
    transform: translateY(-1px);
}

.fade-in {
    animation: fadeIn 0.4s ease-in-out;
}
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>
@endsection
