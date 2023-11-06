<?php

namespace App\Http\Controllers;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Requests\StoreLevelRequest;
use App\Http\Requests\UpdateLevelRequest;
use Illuminate\Support\Facades\Cookie;

class LevelController extends Controller
{
    public function index(Request $request) {
        $levels = Level::query();
        $limit = $request->limit ?? $request->cookie('limit', 1);
        if ($request->limit) {
            $limit = $request->limit;
            Cookie::queue('limit', $limit, 60);
        }
        if ($request->search) {
            $levels = $levels->where('name', 'LIKE', "%{$request->search}%");
        }
        $levels = $levels->paginate($limit);
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
        $level = Level::find($id);
        $level->delete();
        return redirect()->route('levels.index');
    }
}
