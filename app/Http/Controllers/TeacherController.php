<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProjectRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    // หน้าหลัก: แสดงเฉพาะรายการที่ 'pending' (รออนุมัติ)
    public function index()
    {
        $requests = ProjectRequest::where('teacher_id', Auth::id()) 
                                  ->where('status', 'pending')
                                  ->orderBy('created_at', 'asc')
                                  ->get();

        // ตรวจสอบชื่อไฟล์ View ให้ตรงเป๊ะๆ
        return view('teacher.HomeScreenTeacher', compact('requests'));
    }

    // ฟังก์ชันอนุมัติ/ปฏิเสธ
    public function updateStatus(Request $request)
    {
        $request->validate([
            'project_id' => 'required|integer|exists:project_requests,id',
            'status'      => 'required|in:approved,rejected',
        ]);

        $teacherId = Auth::id();
        $newStatus = $request->status;

        // เช็คโควตาก่อนอนุมัติ
        if ($newStatus === 'approved') {
            $currentCount = ProjectRequest::where('teacher_id', $teacherId)
                                          ->where('status', 'approved')
                                          ->count();

            if ($currentCount >= 3) {
                return back()->with('error', 'โควตาเต็มแล้ว! คุณรับนิสิตครบ 3 คนแล้ว ไม่สามารถรับเพิ่มได้');
            }
        }

        // อัปเดตสถานะ
        $project = ProjectRequest::where('id', $request->project_id)
                                 ->where('teacher_id', $teacherId)
                                 ->firstOrFail();

        $project->status = $newStatus;
        $project->save();

        // === จุดแก้ไข: ถ้าอนุมัติ ให้ย้ายไปหน้า Profile ===
        if ($newStatus === 'approved') {
            return redirect()->route('teacher.profile')
                             ->with('success', 'ยืนยันรับนิสิตเรียบร้อยแล้ว รายการถูกย้ายไปที่โปรไฟล์');
        } else {
            return back()->with('success', 'ปฏิเสธคำขอเรียบร้อยแล้ว');
        }
    }

    // หน้าแจ้งเตือน
    public function notification()
    {
        $notifications = ProjectRequest::where('teacher_id', Auth::id())
                                       ->where('status', 'pending')
                                       ->latest()
                                       ->get();

        return view('teacher.NotificationTeacher', compact('notifications'));
    }

    // หน้าโปรไฟล์: แสดงประวัติทั้งหมด (All Requests)
    public function profile()
    {
        $allRequests = ProjectRequest::where('teacher_id', Auth::id())
                                     ->latest()
                                     ->get();
        
        return view('teacher.ProfileTeacher', compact('allRequests'));
    }

    // หน้าแก้ไขโปรไฟล์
    public function editProfile()
    {
        return view('teacher.EditProfile');
    }

    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::id());
        
        $request->validate([
            'name' => 'required|string|max:255',
            'tel' => 'nullable|string|max:20',
            'position' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->name = $request->name;
        $user->tel = $request->tel;
        if ($request->has('position')) $user->position = $request->position;

        if ($request->hasFile('image')) {
            if ($user->image) Storage::disk('public')->delete($user->image);
            $user->image = $request->file('image')->store('profile_images', 'public');
        }

        $user->save();
        return redirect()->route('teacher.profile')->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
    }
    
    // หน้าเปลี่ยนรหัสผ่าน
    public function changePassword()
    {
        return view('teacher.ChangePassword'); // ตรวจสอบว่ามีไฟล์นี้จริงหรือไม่
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