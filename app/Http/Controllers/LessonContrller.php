<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonContrller extends Controller
{
    public function index(Request $request)
    {
        $items = Lesson::query();
        if ($request->keyword) {
            $items = $items->where('lessons.name', 'LIKE', "%{$request->keyword}%");
        }
        $items = $items->join('chapters', 'chapters.id', '=', 'lessons.chapter_id')
            ->select('lessons.*', 'chapters.name as chapter_name')
            ->paginate(5);
        return view('admin.lessons.index', compact('items'));
    }

    public function create()
    {
        $chapters = Chapter::get();
        $lessons = Lesson::get();
        $params = [
            'chapters' => $chapters,
            'lessons' => $lessons
        ];
        return view('admin.lessons.create', $params);
    }
    public function store(Request $request)
    {

        $item = new Lesson();
        $item->name = $request->name;
        $item->chapter_id  = $request->chapter_id;


        $item->save();
        // $request->session()->flash('successMessage', 'Thêm thành công');
        return redirect()->route('lessons.index')->with('successMessage', 'Thêm thành công');
    }
    public function edit($id)
    {
        $item = Lesson::find($id);
        $chapters = Chapter::get();
        $params = [
            'chapters' => $chapters,
            'item' => $item 
        ];
        return view('admin.lessons.edit', $params);
    }
    public function update(Request $request, $id)
    {
        $item = Lesson::find($id);
        $item->name = $request->name;
        $item->chapter_id = $request->chapter_id;

        $item->save();
        // $request->session()->flash('successMessage1', 'Cập nhật thành công');
        return redirect()->route('lessons.index')->with('successMessage', 'Cập nhật thành công');
    }
    public function destroy($id)
    {
        $item = Lesson::find($id);
        $item->delete();
        // return redirect()->back()->with('successMessage2', 'Xóa thành công');
        return redirect()->back()->with('successMessage', 'Xóa thành công');
    }
}
