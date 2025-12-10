<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectRequest extends Model
{
    use HasFactory;

    // อนุญาตให้เขียนข้อมูลลงในคอลัมน์เหล่านี้
    protected $fillable = [
        'student_id',
        'teacher_id',
        'topic_th',
        'topic_en',
        'description',
        'file_path',
        'status',
    ];

    // เชื่อมความสัมพันธ์กับตาราง User (เผื่ออนาคตอยากดึงชื่อนิสิต/อาจารย์ง่ายๆ)
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id', 'student_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id', 'id');
    }
}