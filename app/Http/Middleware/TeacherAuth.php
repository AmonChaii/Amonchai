<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // ใช้ Facade เต็มรูปแบบเพื่อความชัวร์

class TeacherAuth
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // 1. เช็คว่า Login หรือยัง? (กันเหนียว)
        if (!Auth::check()) {
            return redirect('/');
        }

        $user = Auth::user();

        // 2. เช็คว่าเป็น "อาจารย์" (Role = 2) หรือไม่?
        // แปลงเป็น integer เพื่อความชัวร์ (เผื่อ Database เก็บเป็น string "2")
        if ((int)$user->role === 2) {
            return $next($request);
        }

        // 3. ถ้าไม่ใช่ ให้แจ้ง Error 403 พร้อมบอกว่าเป็น Role อะไร (จะได้รู้สาเหตุ)
        // ข้อความนี้จะไปโผล่ที่หน้าจอ Error
        abort(403, "Access Denied: สิทธิ์ของคุณคือ Role {$user->role} (ต้องการ Role 2)");
    }
}