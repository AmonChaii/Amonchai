<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     * เพิ่มฟิลด์จาก CSV เพื่อให้บันทึกข้อมูลได้
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'student_id', // รหัสนิสิต (ถ้าเป็นอาจารย์จะเป็น NULL)
        'name',
        'email',
        'password',
        'tel',
        'role', // 1=นิสิต, 2=อาจารย์, 3=Admin (ตัวอย่าง)
        'enrollment_status',
        'number_of_students_advised',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'role' => 'integer', // แปลง role เป็นตัวเลขเสมอเพื่อความชัวร์
    ];

    // ==========================================
    // ส่วนความสัมพันธ์ (Relationships)
    // ==========================================

    // 1. สำหรับนิสิต: ดึงข้อมูลโครงงานของตัวเอง (User 1 คน มี 1 โครงงาน)
    public function myProject()
    {
        // เชื่อม student_id ในตาราง Users กับ student_id ในตาราง ProjectRequest
        return $this->hasOne(ProjectRequest::class, 'student_id', 'student_id');
    }

    // 2. สำหรับอาจารย์: ดึงคำขอที่ส่งมาหา (User 1 คน มีหลายคำขอเข้ามา)
    public function incomingRequests()
    {
        // เชื่อม id (ของอาจารย์) กับ teacher_id ในตาราง ProjectRequest
        return $this->hasMany(ProjectRequest::class, 'teacher_id', 'id');
    }

    // ==========================================
    // ฟังก์ชันเช็คสถานะ (Helper Functions)
    // ==========================================
    
    // เอาไว้เช็คใน Controller หรือ Blade ง่ายๆ ว่าเป็นนิสิตหรืออาจารย์
    public function isStudent() {
        return $this->role == 1;
    }

    public function isTeacher() {
        return $this->role == 2; // สมมติ 2 คืออาจารย์
    }
}