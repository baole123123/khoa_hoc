<?php

namespace App\Http\Controllers;

use App\Models\Course_Member;
use App\Models\Member;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Course_MemberController extends Controller
{
    public function index()
    {
        $items = Course_Member::join('members', 'course_member.member_id', '=', 'members.id')
        ->join('courses', 'course_member.courses_id', '=', 'courses.id')
        ->select('course_member.*', 'members.name as member_name', 'courses.name as course_name')
        ->get();

        return view('admin.orders.index', compact('items'));


    }
    public function destroy($id)
    {
        $items = Course_Member::find($id);
        $items->delete();
        return redirect()->route('course_member.index')->with('successMessage', 'Xóa thành công');
    }

}
