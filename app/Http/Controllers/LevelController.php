<?php

namespace App\Http\Controllers;
use App\Models\Level;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLevelRequest;
use App\Http\Requests\UpdateLevelRequest;

class LevelController extends Controller
{
    public function index(Request $request) {
        $levels = Level::query();
        if ($request->search) {
            $levels = $levels->where('name', 'LIKE', "%{$request->search}%");
        }
        $levels = $levels->paginate(5);
        return view('admin.levels.index', compact('levels'));
    }
    public function create() {
        return view('admin.levels.create');
    }
    public function store(StoreLevelRequest $request) {
        $levels = new Level();
        $levels->name = $request->name;
        $levels->number_course = 0;
        $levels->save();
        return redirect()->route('levels.index')->with('success','Thêm thành công cấp độ');
    }
    public function edit($id) {
        $level = Level::find($id);
        return view('admin.levels.edit',compact('level'));
    }
    public function update(UpdateLevelRequest $request, $id) {
        $level = Level::find($id);
        $level->name = $request->name;
        $level->number_course = 0;
        $level->save();
        return redirect()->route('levels.index')->with('success','Sửa thành công cấp độ');
    }
    public function destroy($id) {
        try {
            $level = Level::find($id);
            if (!$level) {
                throw new \Exception("Có lỗi xảy ra");
            }
            $level->delete();
            return redirect()->route('levels.index')->with('success','Xóa thành công');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }
}
