<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $items = Category::paginate(4);
        if (isset($request->keyword)) {
            $keyword = $request->keyword;
            $items = Category::where('name', 'like', "%$keyword%")
                ->paginate();
        }
        return view('admin.categories.index', compact('items'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }
    public function store(StoreCategoryRequest $request)
    {

        $item = new Category();
        $item->name = $request->name;

        $item->save();
        // $request->session()->flash('successMessage', 'Thêm thành công');
        return redirect()->route('categories.index')->with('successMessage', 'Thêm thành công');
    }
    public function edit($id)
    {

        $item = Category::find($id);

        return view('admin.categories.edit', compact('item'));
    }
    public function update(Request $request, $id)
    {
        $item = Category::find($id);
        $item->name = $request->name;
        $item->save();
        // $request->session()->flash('successMessage1', 'Cập nhật thành công');
        return redirect()->route('categories.index')->with('successMessage', 'Cập nhật thành công');
    }
    public function destroy($id)
    {
        $item = Category::onlyTrashed()->findOrFail($id);
        $item->forceDelete();
        // return redirect()->back()->with('successMessage2', 'Xóa thành công');
        return redirect()->back()->with('successMessage', 'Xóa thành công');
    }
    public  function softdeletes($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $item = Category::findOrFail($id);
        $item->deleted_at = date("Y-m-d h:i:s");
        $item->save();
        // $request->session()->flash('successMessage2', 'Deleted successfully');
        return redirect()->route('categories.index')->with('successMessage', 'Đã chuyển vào thùng rác');
    }
    public  function trash()
    {
        $categories = Category::onlyTrashed()->get();
        $param = ['categories'    => $categories];
        return view('admin.categories.trash', $param);
    }
    public function restoredelete($id)
    {
        $item = Category::withTrashed()->where('id', $id);
        $item->restore();
        return redirect()->route('categorie.trash')->with('successMessage', 'Khôi phục thành công');
        // return redirect()->route('category.trash');
    }
    public function show($id)
    {
        $item = Category::find($id);

        return view('admin.categories.edit', compact('item'));
    }
}
