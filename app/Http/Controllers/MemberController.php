<?php

namespace App\Http\Controllers;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;

class MemberController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search');
        $members = Member::query()
            ->where('name', 'LIKE', "%$search%")
            ->orWhere('email', 'LIKE', "%$search%")
            ->orWhere('phone', 'LIKE', "%$search%")
            ->paginate(2);
        return view('admin.members.index', compact('members'));
    }
    public function create() {
        return view('admin.members.create');
    }
    public function store(StoreMemberRequest $request) {
        $members = new Member();
        $members->name = $request->name;
        $members->email = $request->email;
        $members->password = $request->password;
        $members->phone = $request->phone;
        $fieldName = 'image';
           if ($request->hasFile($fieldName)) {
               $fullFileNameOrigin = $request->file($fieldName)->getClientOriginalName();
               $fileNameOrigin = pathinfo($fullFileNameOrigin, PATHINFO_FILENAME);
               $extenshion = $request->file($fieldName)->getClientOriginalExtension();
               $fileName = $fileNameOrigin . '-' . rand() . '_' . time() . '.' . $extenshion;
               $path = 'storage/' . $request->file($fieldName)->storeAs('public/images', $fileName);
               $path = str_replace('public/', '', $path);
               $members->image = $path;
           }
        $members->save();
        return redirect()->route('members.index')->with('success','Thêm thành công thành viên');
    }
    public function edit($id) {
        $members = Member::find($id);
        return view('admin.members.edit',compact('members'));
    }
    public function update(UpdateMemberRequest $request, $id) {
        $members = Member::find($id);
        $members->name = $request->name;
        $members->email = $request->email;
        $members->phone = $request->phone;
        $fieldName = 'image';
           if ($request->hasFile($fieldName)) {
               $fullFileNameOrigin = $request->file($fieldName)->getClientOriginalName();
               $fileNameOrigin = pathinfo($fullFileNameOrigin, PATHINFO_FILENAME);
               $extenshion = $request->file($fieldName)->getClientOriginalExtension();
               $fileName = $fileNameOrigin . '-' . rand() . '_' . time() . '.' . $extenshion;
               $path = 'storage/' . $request->file($fieldName)->storeAs('public/images', $fileName);
               $path = str_replace('public/', '', $path);
               $members->image = $path;
           }
        $members->save();
        return redirect()->route('members.index')->with('success','Sửa thành công thành viên');
    }
    public function show($id) {
        $members = Member::find($id);
        return view('admin.members.show',compact('members'));
    }
}
