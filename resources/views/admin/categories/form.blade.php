@extends('admin.layouts.admin')
@section('title', $category->exists ? 'Sửa danh mục' : 'Thêm danh mục')

@section('content')
<h1 class="h3 mb-4">{{ $category->exists ? '' : '' }}</h1>

<div class="card shadow-sm">
    <div class="card-body">
        <form method="POST" 
              action="{{ $category->exists ? route('admin.categories.update', $category) : route('admin.categories.store') }}">
            @csrf
            @if($category->exists)
                @method('PUT')
            @endif

            <div class="mb-3">
                <label for="name" class="form-label">Tên danh mục *</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">{{ $category->exists ? 'Cập nhật' : 'Thêm mới' }}</button>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</div>
@endsection