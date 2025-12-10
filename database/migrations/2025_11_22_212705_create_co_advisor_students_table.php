<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoAdvisorStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('co_advisor_student', function (Blueprint $table) {
            $table->id('co_advisor_student_id'); // Primary Key
            $table->foreignId('advisor_id')->constrained('users');
            $table->foreignId('student_id')->constrained('users');
            $table->timestamps(); // สร้างคอลัมน์ created_at และ updated_at
            $table->softDeletes(); // เพิ่ม SoftDeletes สำหรับการลบข้อมูลชั่วคราว
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('co_advisor_students');
    }
}