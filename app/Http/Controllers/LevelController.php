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
        return redirect()->route('levels.index')->with('successMessage', 'Thêm thành công');
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
        return redirect()->route('levels.index')->with('successMessage', 'Cập nhật thành công');
    }
    public function destroy($id) {
        $level = Level::find($id);
        $level->delete();
        return redirect()->route('levels.index')->with('successMessage', 'Xóa thành công');
    }
}
