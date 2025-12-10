<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash; 

class CoreController extends Controller
{
    public function studentLogin(Request $request) {
        // รับค่า input
        $credentials = $request->only('user_email', 'user_password');

        // Map เข้ากับ field ใน Database (email, password)
        if (Auth::attempt(['email' => $credentials['user_email'], 'password' => $credentials['user_password']])) {
            
            session()->forget('url.intended');
            $role = (int)Auth::user()->role; 

            // ✅ แก้ไข: ใช้ชื่อ Route ให้ตรงกับ web.php (student.home / teacher.home)
            if ($role === 1) {
                return redirect()->route('student.home'); 
            } 
            elseif ($role === 2) {
                return redirect()->route('teacher.home'); 
            }
            
            Auth::logout();
            return redirect('/')->withErrors(['login_error' => 'ไม่พบสิทธิ์การใช้งาน']);

        } else {
            return redirect('/')->withErrors(['login_error' => 'อีเมลหรือรหัสผ่านไม่ถูกต้อง']);
        }    
    }

    public function editProfile()
    {
        // เช็ค Role เพื่อเลือก View ที่ถูกต้อง (แยกไฟล์กัน)
        $user = Auth::user();
        if ($user->role == 1) return view('student.EditProfile');
        if ($user->role == 2) return view('teacher.EditProfile');
        return abort(404);
    }

    public function updateProfile(Request $request)
    {
        // ✅ ใช้ User::find เพื่อแก้ปัญหา VS Code แจ้งเตือน method save()
        $user = User::find(Auth::id());
        
        $request->validate([
            'name' => 'required|string|max:255',
            'tel' => 'nullable|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->name = $request->name;
        $user->tel = $request->tel;

        if ($user->role == 2 && $request->has('position')) {
            $user->position = $request->position;
        }

        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
            $path = $request->file('image')->store('profile_images', 'public');
            $user->image = $path;
        }

        $user->save();
        return back()->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
    }

    public function changePassword()
    {
        $user = Auth::user();
        if ($user->role == 1) return view('student.ChangePassword');
        if ($user->role == 2) return view('teacher.ChangePassword');
        return abort(404);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::find(Auth::id());

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'รหัสผ่านปัจจุบันไม่ถูกต้อง']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'เปลี่ยนรหัสผ่านเรียบร้อยแล้ว');
    }
}