<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PreventBackHistory
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('members')->check()) {
            return $next($request);
        }

        // Xử lý khi chưa đăng nhập
        return redirect()->route('login');
    }
}