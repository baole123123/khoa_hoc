<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreChapterRequest;
use App\Http\Requests\UpdateChapterRequest;
use App\Models\Chapter;
use App\Models\Course;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function index(Request $request)
    {
        $query = Chapter::query();
        if ($request->has('search')) {
            $searchKeyword = $request->input('search');
            $query->where(function ($q) use ($searchKeyword) {
                $q->where('name', 'like', '%' . $searchKeyword . '%')
                  ->orWhereHas('course', function ($q) use ($searchKeyword) {
                      $q->where('name', 'like', '%' . $searchKeyword . '%');
                  });
            });
        }
        $chapters = $query->paginate(5);
        $courses = Course::get();
        return view('admin.chapters.index', compact('chapters', 'courses'));
    }
    public function create()
    {
        $courses = Course::get();
        return view('admin.chapters.create', compact('courses'));
    }
    public function store(StoreChapterRequest $request)
    {
        $chapter = new Chapter();
        $chapter->name = $request->name;
        $chapter->course_id = $request->course_id;
        $chapter->save();
        return redirect()->route('chapters.index');
    }
    public function edit($id)
    {
        $chapters = Chapter::find($id);
        $courses = Course::get();
        return view('admin.chapters.edit', compact('chapters', 'courses'));
    }
    public function update(UpdateChapterRequest $request, $id)
    {
        $chapters = Chapter::find($id);
        $chapters->name = $request->name;
        $chapters->course_id = $request->course_id;
        $chapters->save();
        return redirect()->route('chapters.index');
    }
    public function destroy($id)
    {
        $chapters = Chapter::find($id);
        $chapters->delete();
        return redirect()->route('chapters.index');
    }
}
