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
    public function edit($id){

        $item = Category::find($id);

        return view('admin.categories.edit', compact('item'));
    }
    public function update (Request $request , $id){
        $item = Category::find($id);
        $item->name = $request->name;
        $item->save();
        // $request->session()->flash('successMessage1', 'Cập nhật thành công');
        return redirect()->route('categories.index')->with('successMessage', 'Cập nhật thành công');
    }
    public function destroy ($id){
        $item = Category::find($id);
        $item->delete();
        // return redirect()->back()->with('successMessage2', 'Xóa thành công');
        return redirect()->route('categories.index')->with('successMessage', 'Xóa thành công');
    }
}
