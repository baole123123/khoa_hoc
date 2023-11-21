<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthShopController extends Controller
{
    public function login() {
        session()->put('previous_url', url()->previous());
        return view('auth.login-shop');
    }
    public function checkloginShop(Request $request) {
        $messages = [
            "email.exists" => "Email không đúng",
            "password.exists" => "Mật khẩu không đúng",
        ];
        $validator = Validator::make($request->all(), [
            'email' => 'exists:users,email',
            'password' => 'exists:users,password',
        ], $messages);
        
        $data = $request->only('email', 'password');
        if (Auth::guard('members')->attempt($data)) {
            $previousUrl = session()->pull('previous_url', '/dashboard');
            if ($previousUrl === route('login-shop')) {
                return redirect('shop/home')->with('successMessage', 'Đăng nhập thành công');
            } else {
                return redirect()->intended($previousUrl)->with('successMessage', 'Đăng nhập thành công');
            }
        } else {
            return redirect()->back()->with('errorMessage','Đăng nhập thất bại');
        }
    }
    public function register() {
        return view('auth.register');
    }
    public function store_register(Request $request) {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return redirect()->route('login-shop');
    }
}
