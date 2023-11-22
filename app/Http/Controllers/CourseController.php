<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Models\Category;
use App\Models\Course;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $items = Course::query()
            ->join('categories', 'courses.category_id', '=', 'categories.id')
            ->join('levels', 'courses.level_id', '=', 'levels.id')
            ->select('courses.*', 'categories.name as category_name', 'levels.name as level_name');

        if (isset($request->keyword)) {
            $keyword = $request->keyword;
            $items = $items->where('courses.name', 'like', "%$keyword%");
        }

        $items = $items->paginate(4);

        return view('admin.courses.index', compact('items'));
    }

    public function create()
    {
        $levels = Level::get();
        $categories = Category::get();
        $courses = Course::get();
        $params = [
            'levels' => $levels,
            'categories' => $categories,
            'courses' => $courses
        ];

        return view('admin.courses.create', $params);
    }
    public function store(StoreCourseRequest $request)
    {

        $item = new Course();
        $item->name = $request->name;
        $item->description = $request->description;
        $item->status = $request->status;
        $item->category_id = $request->category_id;
        $item->level_id = $request->level_id;
        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/videos', $fileName);
            $item->video = $fileName;
        }
        $item->reading = $request->reading;
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

        $levels = Level::get();
        $categories = Category::get();
        $item = Course::findOrFail($id);
        $params = [
            'levels' => $levels,
            'categories' => $categories,
            'item' => $item
        ];

        return view('admin.courses.edit', $params);
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $item = Course::findOrFail($id);
        $item->name = $request->name;
        $item->description = $request->description;
        $item->status = $request->status;
        $item->category_id = $request->category_id;
        $item->level_id = $request->level_id;
        $item->reading = $request->reading;
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
        $existingVideo = $item->video;
        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/videos', $fileName);
            if ($existingVideo) {
                $oldFilePath = 'videos/' . $existingVideo;

                if (Storage::disk('public')->exists($oldFilePath)) {
                    Storage::disk('public')->delete($oldFilePath);
                }
            }
            $item->video = $fileName;
        } else {
            $item->video = $existingVideo;
        }

        $item->save();
        return redirect()->route('courses.index')->with('successMessage', 'Cập nhật thành công');
    }
    public function destroy($id)
    {
        $item = Course::find($id);
        $item->delete();
        // return redirect()->back()->with('successMessage2', 'Xóa thành công');
        return redirect()->route('courses.index')->with('successMessage', 'Xóa thành công');
    }
    public function show($id)
    {
        $item = Course::find($id);
        return view('admin.courses.show', compact('item'));
    }
}
