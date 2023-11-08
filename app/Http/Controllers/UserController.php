<?php

namespace App\Http\Controllers;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $items = User::paginate(4);
        if (isset($request->keyword)) {
            $keyword = $request->keyword;
            $items = User::where('name', 'like', "%$keyword%")
                ->paginate();
        }
        return view('admin.users.index', compact('items'));
    }

    public function create()
    {
        return view('admin.users.create');
    }
    public function store(Request $request)
    {

        $item = new User();
        $item->name = $request->name;
        $item->email = $request->email;
        $item->password = $request->password;


        $item->save();
        // $request->session()->flash('successMessage', 'Thêm thành công');
        return redirect()->route('users.index')->with('successMessage', 'Thêm thành công');
    }
    public function edit($id)
    {

        $item = User::find($id);

        return view('admin.users.edit', compact('item'));
    }
    public function update(Request $request, $id)
    {
        $item = User::find($id);
        $item->name = $request->name;
        $item->email = $request->email;
        $item->password = $request->password;

        $item->save();
        // $request->session()->flash('successMessage1', 'Cập nhật thành công');
        return redirect()->route('users.index')->with('successMessage', 'Cập nhật thành công');
    }
    public function destroy($id)
    {
        $item = User::find($id);
        $item->delete();
        // return redirect()->back()->with('successMessage2', 'Xóa thành công');
        return redirect()->back()->with('successMessage', 'Xóa thành công');
    }
}
