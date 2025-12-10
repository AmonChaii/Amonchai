<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentAuth
{
    public function handle(Request $request, Closure $next)
    {
        // 1. ต้อง Login แล้ว
        if (!Auth::check()) {
            return redirect('/');
        }

        // 2. ต้องเป็น Role 1 (นิสิต) เท่านั้น
        if ((int)Auth::user()->role === 1) {
            return $next($request);
        }

        // ถ้าไม่ใช่ ให้ดีดออก
        abort(403, 'Access Denied: คุณไม่ใช่บัญชีนิสิต (Role ของคุณคือ ' . Auth::user()->role . ')');
    }
}