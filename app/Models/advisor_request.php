<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class advisor_request extends Model
{
    use HasFactory, SoftDeletes;

    // 1. ระบุชื่อตารางให้ตรงกับใน Database (สำคัญมาก)
    protected $table = 'advisor_requests';
    
    // 2. ระบุ Primary Key (ตามรูป Database ของคุณคือ advisor_request_id)
    protected $primaryKey = 'advisor_request_id'; 

    // 3. *** จุดที่แก้ Error *** อนุญาตให้บันทึกข้อมูลลงคอลัมน์เหล่านี้
    protected $fillable = [
        'student_id',
        'professor_id', // แก้ให้ตรงกับ DB (เดิม teacher_id)
        'title',        // แก้ให้ตรงกับ DB (เดิม topic_th)
        'description',  // แก้ให้ตรงกับ DB (เดิม topic_en)
        'advisor_type', 
        'status',
        'file_path',    // ** ต้องมีคอลัมน์นี้ใน Database ด้วยนะครับ **
        'co_advisor_id', // เพิ่มเผื่อไว้ถ้ามี
    ];

    // ความสัมพันธ์กับตาราง User (นักศึกษา)
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id', 'student_id');
    }

    // ความสัมพันธ์กับตาราง User (อาจารย์)
    public function teacher()
    {
        // ต้องระบุ FK เป็น professor_id ให้ตรงกับ Database
        return $this->belongsTo(User::class, 'professor_id', 'id');
    }
}