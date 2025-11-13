@extends('admin.layouts.admin')
@section('title','Sản phẩm - Admin')

@section('content')
<div class="container-fluid fade-in">

    {{-- ================= TIÊU ĐỀ & THANH TÌM KIẾM ================= --}}
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

        {{-- Form tìm kiếm --}}
        <form action="{{ route('admin.products.index') }}" method="GET" class="d-flex align-items-center gap-2">
            <input type="text" name="search" value="{{ request('search') }}"
                   class="form-control rounded-pill shadow-sm border-0"
                   placeholder="🔍 Tìm theo tên sản phẩm..." style="width: 260px;">
            
            <select name="category" class="form-select rounded-pill shadow-sm border-0" style="width: 180px;">
                <option value="">-- Tất cả loại --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-gradient rounded-pill px-4 shadow-sm">
                <i class="bi bi-search"></i> Tìm kiếm
            </button>
        </form>

        <a href="{{ route('admin.products.create') }}" class="btn btn-gradient rounded-pill px-4 shadow-sm">
            <i class="bi bi-plus-circle me-1"></i> Thêm mới
        </a>
    </div>

    {{-- ================= BẢNG SẢN PHẨM ================= --}}
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
        <div class="table-responsive">
            <table class="table mb-0 align-middle table-hover">
                <thead style="background: linear-gradient(90deg, #7209b7, #b5179e); color:white;">
                    <tr class="text-center text-uppercase small">
                        <th class="py-3">Ảnh</th>
                        <th class="py-3">Tên sản phẩm</th>
                        <th class="py-3">Danh mục</th>
                        <th class="py-3">Giá</th>
                        <th class="py-3" width="160">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @forelse($products as $product)
                        <tr class="product-row">
                            <td class="text-center">
                                <img src="{{ Str::startsWith($product->image, ['products/', 'public/']) 
                                            ? Storage::url($product->image) 
                                            : asset($product->image) }}"
                                    alt="Hình sản phẩm"
                                    width="70" height="70"
                                    class="rounded object-fit-cover border">
                            </td>
                            <td class="fw-semibold text-dark fs-6">{{ $product->name }}</td>
                            <td class="text-muted fw-semibold">{{ $product->category->name ?? 'Không có' }}</td>
                            <td class="fw-bold text-danger fs-6">{{ number_format($product->price) }}đ</td>
                            <td class="text-end">
                                <a href="{{ route('admin.products.edit', $product) }}" 
                                   class="btn btn-sm btn-outline-primary rounded-pill px-3 me-2">
                                   <i class="bi bi-pencil-square"></i> Sửa
                                </a>
                                <form action="{{ route('admin.products.destroy', $product) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-sm btn-outline-danger rounded-pill px-3">
                                        <i class="bi bi-trash3"></i> Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted fs-5">
                                😥 Chưa có sản phẩm nào phù hợp.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- ================= PHÂN TRANG ================= --}}
        @if ($products->hasPages())
            <div class="card-footer bg-white border-0 py-4">
                <div class="d-flex justify-content-center">
                    {{ $products->onEachSide(1)->links('pagination::bootstrap-5') }}
                </div>
            </div>
        @endif
    </div>
</div>

{{-- ================= STYLE ================= --}}
<style>
.text-purple { color: #4a148c !important; }

.product-row:hover {
    background-color: #faf5ff !important;
    transform: translateY(-2px);
    transition: 0.2s;
}

.btn-gradient {
    background: linear-gradient(135deg, #7209b7, #b5179e);
    color: white !important;
    border: none;
    font-weight: 500;
}
.btn-gradient:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(114, 9, 183, 0.3);
}
</style>
@endsection
