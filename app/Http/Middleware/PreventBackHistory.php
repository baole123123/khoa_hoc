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
            if($request->route()->getName() === '/logout') {
                $request->session()->forget('members');
                return redirect()->route('login-shop');
            }
        }
        return $next($request);
    }
}