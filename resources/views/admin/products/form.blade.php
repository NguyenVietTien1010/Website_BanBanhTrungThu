@extends('admin.layouts.admin')
@section('title', $product->exists ? 'Sửa sản phẩm' : 'Thêm sản phẩm')

@section('content')
<div class="container-fluid fade-in">
    <h1 class="fw-bold text-purple mb-4">
        {{ $product->exists ? '' : '' }}
    </h1>

    <div class="card border-0 shadow-lg rounded-4">
        <div class="card-body p-4">
            <form method="POST"
                action="{{ $product->exists ? route('admin.products.update', $product) : route('admin.products.store') }}"
                enctype="multipart/form-data"
                class="row g-4">
                @csrf
                @if($product->exists)
                    @method('PUT')
                @endif

                {{-- Tên sản phẩm --}}
                <div class="col-12">
                    <label for="name" class="form-label fw-semibold">Tên sản phẩm <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name"
                           class="form-control form-control-lg rounded-pill px-4"
                           placeholder="Nhập tên sản phẩm..."
                           value="{{ old('name', $product->name) }}" required>
                </div>

                {{-- Danh mục & Giá --}}
                <div class="col-md-6">
                    <label for="category_id" class="form-label fw-semibold">Danh mục <span class="text-danger">*</span></label>
                    <select name="category_id" id="category_id"
                            class="form-select form-select-lg rounded-pill px-4"
                            required>
                        <option value="">-- Chọn danh mục --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="price" class="form-label fw-semibold">Giá bán (VNĐ) <span class="text-danger">*</span></label>
                    <input type="number" name="price" id="price"
                           class="form-control form-control-lg rounded-pill px-4"
                           placeholder="Nhập giá..."
                           value="{{ old('price', $product->price) }}" required>
                </div>

                {{-- Mô tả --}}
                <div class="col-12">
                    <label for="description" class="form-label fw-semibold">Mô tả chi tiết</label>
                    <textarea name="description" id="description"
                              class="form-control rounded-4 p-3"
                              rows="5"
                              placeholder="Mô tả về sản phẩm...">{{ old('description', $product->description) }}</textarea>
                </div>

                {{-- Hình ảnh --}}
                <div class="col-12 col-md-6">
                    <label for="image" class="form-label fw-semibold">Hình ảnh sản phẩm</label>
                    <input type="file" name="image" id="image"
                        class="form-control rounded-pill px-3"
                        accept="image/*"
                        onchange="previewImage(event)">

                    <div class="mt-3 text-center">
                        @if($product->exists && $product->image)
                            <img id="image-preview"
                                src="{{ asset($product->image) }}"
                                alt="Hình sản phẩm"
                                width="150" height="150"
                                class="rounded object-fit-cover border shadow-sm">
                        @else
                            {{-- Ảnh mặc định khi chưa chọn --}}
                            <img id="image-preview"
                                src="{{ asset('images/no-image.png') }}"
                                alt="Hình sản phẩm"
                                width="150" height="150"
                                class="rounded object-fit-cover border shadow-sm">
                        @endif
                    </div>
                </div>


                {{-- Nút hành động --}}
                <div class="col-12 d-flex justify-content-end gap-3 mt-4">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                        ↩️ Quay lại
                    </a>
                    <button type="submit" class="btn btn-gradient rounded-pill px-5">
                        {{ $product->exists ? '💾 Cập nhật' : '➕ Thêm mới' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- =================== SCRIPT =================== --}}
<script>
function previewImage(event) {
    const reader = new FileReader();
    const preview = document.getElementById('image-preview');
    reader.onload = function(){
        preview.src = reader.result;
        preview.classList.remove('d-none');
    }
    reader.readAsDataURL(event.target.files[0]);
}
</script>

{{-- =================== STYLE =================== --}}
<style>
.text-purple {
    color: #4a148c !important;
}
.img-preview {
    max-width: 100%;
    height: 250px;
    border-radius: 15px;
    object-fit: cover;
    border: 4px solid #f3e5f5;
    transition: all 0.3s ease;
}
.img-preview:hover {
    transform: scale(1.05);
    border-color: #b5179e;
}

.btn-gradient {
    background: linear-gradient(135deg, #7209b7, #b5179e);
    color: white !important;
    border: none;
    transition: 0.3s;
    font-weight: 500;
}
.btn-gradient:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(114, 9, 183, 0.3);
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
