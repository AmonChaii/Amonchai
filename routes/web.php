<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CoreController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

// ปิดการลงทะเบียนทั่วไป
Auth::routes(["register" => false]);

// --------------------------------------------------------------------------
// 1. จุดเช็ค Login และ Redirect
// --------------------------------------------------------------------------
Route::get('/', function () {
    if (Auth::check()) {
        $role = (int)Auth::user()->role;
        // ใช้ชื่อ Route มาตรฐาน: student.home และ teacher.home
        if ($role === 1) return redirect()->route('student.home');
        if ($role === 2) return redirect()->route('teacher.home');
    }
    return view('student.login'); 
})->name('login');

// Route สำหรับ Login/Logout
Route::post('/login', [CoreController::class, 'studentLogin'])->name('student.login.submit');
Route::post('/students/login', [CoreController::class, 'studentLogin']);
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');


// --------------------------------------------------------------------------
// 2. Group Routes (Auth Required)
// --------------------------------------------------------------------------
Route::group(['middleware' => 'auth'], function() {
    
    // =========================================================
    // 🟢 STUDENT ROUTES
    // =========================================================
    Route::group(['middleware' => 'studentAuth', 'prefix' => 'student', 'as' => 'student.'], function() {
        
        // หน้าหลัก (เรียกใช้: student.home)
        Route::get('/home', [StudentController::class, 'index'])->name('home');
        
        // จัดการโครงงาน
        Route::get('/project/create', [StudentController::class, 'createProject'])->name('project.create');
        Route::post('/project/store', [StudentController::class, 'storeProject'])->name('project.store');
        Route::delete('/project/cancel/{id}', [StudentController::class, 'cancelProjectRequest'])->name('project.cancel');
        
        // อาจารย์ที่ปรึกษาร่วม
        Route::get('/co-advisor/select', [StudentController::class, 'selectCoAdvisor'])->name('co_advisor.select');
        Route::post('/co-advisor/confirm/{id}', [StudentController::class, 'confirmCoAdvisor'])->name('co_advisor.confirm');
        Route::get('/co-advisor/remove', [StudentController::class, 'removeCoAdvisor'])->name('co_advisor.remove');

        // เมนูหลักอื่นๆ
        Route::get('/notification', [StudentController::class, 'notification'])->name('notification');
        Route::get('/profile', [StudentController::class, 'profile'])->name('profile');

        // ✅ แก้ไขโปรไฟล์ (เพิ่มใหม่ให้ครบ)
        Route::get('/profile/edit', [StudentController::class, 'editProfile'])->name('profile.edit');
        Route::post('/profile/update', [StudentController::class, 'updateProfile'])->name('profile.update');

        // เปลี่ยนรหัสผ่าน
        Route::get('/password/change', [StudentController::class, 'changePassword'])->name('password.change');
        Route::post('/password/update', [StudentController::class, 'updatePassword'])->name('password.update');
    });

    // =========================================================
// 🔵 TEACHER ROUTES
// =========================================================
Route::group(['middleware' => 'teacherAuth', 'prefix' => 'teacher', 'as' => 'teacher.'], function () {

    Route::get('/home', [TeacherController::class, 'index'])->name('home');
    Route::post('/project/update-status', [TeacherController::class, 'updateStatus'])->name('updateStatus');
    Route::get('/notification', [TeacherController::class, 'notification'])->name('notification');
    Route::get('/profile', [TeacherController::class, 'profile'])->name('profile');
    Route::get('/profile/edit', [TeacherController::class, 'editProfile'])->name('editProfile');
    Route::post('/profile/update', [TeacherController::class, 'updateProfile'])->name('updateProfile');
    Route::get('/password/change', [TeacherController::class, 'changePassword'])->name('changePassword');
    Route::post('/password/update', [TeacherController::class, 'updatePassword'])->name('updatePassword');

});

});