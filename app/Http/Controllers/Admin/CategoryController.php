<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        // (Bạn sẽ cần tạo view: resources/views/admin/categories/index.blade.php)
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        // (Bạn sẽ cần tạo view: resources/views/admin/categories/form.blade.php)
        return view('admin.categories.form', ['category' => new Category()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate(['name' => 'required|string|max:255|unique:categories,name']);
        $data['slug'] = Str::slug($data['name']);
        Category::create($data);
        return redirect()->route('admin.categories.index')->with('success', 'Thêm danh mục thành công.');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.form', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate(['name' => 'required|string|max:255|unique:categories,name,' . $category->id]);
        $data['slug'] = Str::slug($data['name']);
        $category->update($data);
        return redirect()->route('admin.categories.index')->with('success', 'Cập nhật danh mục thành công.');
    }

    public function destroy(Category $category)
    {
        // (Nâng cao: nên kiểm tra xem danh mục có sản phẩm không trước khi xóa)
        // if ($category->products()->count() > 0) {
        //     return back()->with('error', 'Không thể xóa danh mục này vì còn sản phẩm.');
        // }
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Xóa danh mục thành công.');
    }
}