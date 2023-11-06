<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {

        $items = Course::query()
        ->join('categories', 'courses.category_id', '=', 'categories.id')
        ->join('levels', 'courses.level_id', '=', 'levels.id')
        ->select('courses.*', 'categories.name as category_name', 'levels.name as level_name')
        ->paginate(4);

    if (isset($request->keyword)) {
        $keyword = $request->keyword;
        $items = $items->where('courses.name', 'like', "%$keyword%");
    }

    return view('admin.courses.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::get();
        $courses = Course::get();
        $params = [
            'categories' => $categories,
            'courses' => $courses
        ];

        return view('admin.courses.create' , $params);
    }
    public function store(Request $request)
    {

        $item = new Course();
        $item->name = $request->name;
        $item->description = $request->description;
        $item->status = $request->status;
        $item->category_id = $request->category_id;
        $item->level_id = $request->level_id;
           // xử lý ảnh
           $fieldName = 'image';
           if ($request->hasFile($fieldName)) {
               $fullFileNameOrigin = $request->file($fieldName)->getClientOriginalName();
               $fileNameOrigin = pathinfo($fullFileNameOrigin, PATHINFO_FILENAME);
               $extenshion = $request->file($fieldName)->getClientOriginalExtension();
               $fileName = $fileNameOrigin . '-' . rand() . '_' . time() . '.' . $extenshion;
               $path = 'storage/' . $request->file($fieldName)->storeAs('public/images', $fileName);
               $path = str_replace('public/', '', $path);
               $item->image = $path;
           }


        $item->save();
        // $request->session()->flash('successMessage', 'Thêm thành công');
        return redirect()->route('courses.index')->with('successMessage', 'Thêm thành công');
    }
    public function edit($id)
    {

        $item = Course::find($id);

        return view('admin.categories.edit', compact('item'));
    }
    public function update(Request $request, $id)
    {
        $item = new Course();
        $item->name = $request->name;
        $item->description = $request->description;
        $item->status = $request->status;
        $item->category_id = $request->category_id;
        $item->level_id = $request->level_id;
           // xử lý ảnh
           $fieldName = 'image';
           if ($request->hasFile($fieldName)) {
               $fullFileNameOrigin = $request->file($fieldName)->getClientOriginalName();
               $fileNameOrigin = pathinfo($fullFileNameOrigin, PATHINFO_FILENAME);
               $extenshion = $request->file($fieldName)->getClientOriginalExtension();
               $fileName = $fileNameOrigin . '-' . rand() . '_' . time() . '.' . $extenshion;
               $path = 'storage/' . $request->file($fieldName)->storeAs('public/images', $fileName);
               $path = str_replace('public/', '', $path);
               $item->image = $path;
           }
           $item->save();
        // $request->session()->flash('successMessage1', 'Cập nhật thành công');
        return redirect()->route('categories.index')->with('successMessage', 'Cập nhật thành công');
    }
    public function destroy($id)
    {
        $item = Course::find($id);
        $item->delete();
        // return redirect()->back()->with('successMessage2', 'Xóa thành công');
        return redirect()->route('categories.index')->with('successMessage', 'Xóa thành công');
    }
}
