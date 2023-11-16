<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function login() {
        if(Auth::guard('members')->check()) {
            return redirect()->route('levels.index');
        } else {
            return view('auth.login');
        }
    }
    public function checklogin(Request $request)
    {
        $messages = [
            "email.exists" => "Email không đúng",
            "password.exists" => "Mật khẩu không đúng",
        ];
        $validator = Validator::make($request->all(), [
            'email' => 'exists:members,email',
            'password' => 'exists:members,password',
        ], $messages);
        $data = $request->only('email', 'password');
        if (Auth::guard('members')->attempt($data)) {
            return redirect()->route('courses.index')->with('successMessage', 'Đăng nhập thành công');
        } else {
            return back()->withErrors($validator);

        }
    }
    public function logout() {
        Auth::guard('members')->logout();
        return redirect()->route('login');
    }
}
