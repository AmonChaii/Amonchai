<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\advisor_request as ProjectRequest; 
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id; 
        $myProject = ProjectRequest::where('student_id', $userId)->orderBy('created_at', 'desc')->first();
        $teachers = User::where('role', 2)->get();
        return view('student.HomeScreenStudent', compact('myProject', 'teachers'));
    }

    public function createProject(Request $request)
    {
        $selectedAdvisorId = $request->query('advisor_id');
        $coAdvisorId = Session::get('co_advisor_id'); 
        $coAdvisor = null;
        if ($coAdvisorId) {
            $coAdvisor = User::find($coAdvisorId);
        }
        $teachers = User::where('role', 2)->get(); 
        return view('student.ProjectCreate', compact('teachers', 'selectedAdvisorId', 'coAdvisor'));
    }

    public function storeProject(Request $request)
    {
        $request->validate([
            'topic_name_th' => 'required',
            'topic_name_en' => 'required',
            'advisor_id' => 'required',
            'pdf_file' => 'required|mimes:pdf|max:10240', 
        ]);

        $pendingCount = ProjectRequest::where('student_id', Auth::user()->id)->where('status', 'pending')->count();

        if ($pendingCount >= 3) {
            return redirect()->back()->withErrors(['advisor_id' => 'คุณส่งคำขอครบ 3 รายการแล้ว']);
        }

        $filePath = null;
        if ($request->hasFile('pdf_file')) {
            $filePath = $request->file('pdf_file')->store('projects', 'public');
        }
        
        ProjectRequest::create([
            'student_id'   => Auth::user()->id, 
            'professor_id' => $request->advisor_id,
            'title'        => $request->topic_name_th,
            'description'  => $request->topic_name_en,
            'advisor_type' => 'teacher',                
            'status'       => 'pending',
            'file_path'    => $filePath,
        ]);
        
        Session::forget('co_advisor_id');
        return redirect()->route('student.profile')->with('success', 'ส่งคำขอเรียบร้อยแล้ว');
    }

    public function notification() { return view('student.NotificationStudent'); }

    public function profile()
    {
        $userId = Auth::user()->id; 
        $myProject = ProjectRequest::where('student_id', $userId)->orderBy('created_at', 'desc')->first();
        return view('student.ProfileStudent', compact('myProject'));
    }

    public function selectCoAdvisor(Request $request)
    {
        $selectedAdvisorId = $request->query('advisor_id');
        if (!$selectedAdvisorId) {
            return redirect()->route('student.home')->with('error', 'กรุณาเลือกอาจารย์ก่อน');
        }
        $advisor = User::find($selectedAdvisorId);
        $advisorName = $advisor ? $advisor->name : '-';
        $currentCoAdvisorId = Session::get('co_advisor_id');
        $currentCoAdvisor = null;
        if ($currentCoAdvisorId) {
            $currentCoAdvisor = User::find($currentCoAdvisorId);
        }
        $teachers = User::where('role', 2)->where('id', '!=', $selectedAdvisorId)->get();
        return view('student.CoAdvisor', compact('teachers', 'selectedAdvisorId', 'advisorName', 'currentCoAdvisor'));
    }

    public function confirmCoAdvisor(Request $request, $id)
    {
        $mainAdvisorId = $request->input('main_advisor_id');
        Session::put('co_advisor_id', $id);
        return redirect()->route('student.project.create', ['advisor_id' => $mainAdvisorId]);
    }

    public function removeCoAdvisor(Request $request)
    {
        $mainAdvisorId = $request->query('main_advisor_id');
        Session::forget('co_advisor_id');
        return redirect()->route('student.project.create', ['advisor_id' => $mainAdvisorId]);
    }

    public function cancelProjectRequest($id)
    {
        $project = ProjectRequest::where('advisor_request_id', $id)
                                 ->where('student_id', Auth::user()->id)
                                 ->where('status', 'pending')
                                 ->first();

        if ($project) {
            $project->delete(); 
            return redirect()->route('student.profile')->with('success', 'ยกเลิกคำขอเรียบร้อยแล้ว');
        }

        return redirect()->route('student.profile')->with('error', 'ไม่สามารถยกเลิกรายการนี้ได้');
    }

    public function changePassword()
    {
        return view('student.ChangePassword');
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

        // ✅ เปลี่ยนรหัสเสร็จ กลับไปหน้า Profile
        return redirect()->route('student.profile')->with('success', 'เปลี่ยนรหัสผ่านเรียบร้อยแล้ว');
    }

    public function editProfile()
    {
        return view('student.EditProfile');
    }

    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::id());
        
        $request->validate([
            'name' => 'required|string|max:255',
            'tel' => 'nullable|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->name = $request->name;
        $user->tel = $request->tel;

        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
            $path = $request->file('image')->store('profile_images', 'public');
            $user->image = $path;
        }

        $user->save();
        
        // ✅ แก้ไขตรงนี้: กด Save แล้วไปหน้า Profile ของนิสิต
        return redirect()->route('student.profile')->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
    }
}