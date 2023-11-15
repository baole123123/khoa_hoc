<?php

namespace App\Http\Controllers;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Chapter;
use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;

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
    public function store(StoreLessonRequest $request)
{
    try {
        $item = new Lesson();
        $item->name = $request->name;
        $item->reading = $request->reading;
        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/videos', $fileName);
            $item->video = $fileName;
        }
        $item->chapter_id = $request->chapter_id;
        $item->save();
        return redirect()->route('lessons.index')->with('successMessage', 'Thêm thành công');
    } catch (\Exception $e) {
        return redirect()->back()->with('errorMessage', 'Có lỗi xảy ra');
    }
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
    public function update(UpdateLessonRequest $request, $id)
    {
        try {
            $item = Lesson::find($id);
            $item->update([
                'name' => $request->name,
                'chapter_id' => $request->chapter_id,
                'reading' => $request->reading,
            ]);
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
            return redirect()->route('lessons.index')->with('successMessage', 'Cập nhật thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('errorMessage', 'Đã xảy ra lỗi khi cập nhật');
        }
    }

    public function show($id)
    {
        $item = Lesson::find($id);
        return view('admin.lessons.show', compact('item'));
    }
    public function destroy($id)
    {
        try {
            $item = Lesson::findOrFail($id);
            $item->delete();
            return redirect()->back()->with('successMessage', 'Xóa thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('errorMessage', 'Không thể xóa');
        }
    }
}
