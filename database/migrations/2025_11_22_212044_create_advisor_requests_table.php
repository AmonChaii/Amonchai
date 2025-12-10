<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvisorRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advisor_requests', function (Blueprint $table) {
            $table->id('advisor_request_id'); // Primary Key: รหัสคำร้องขอ
            
            // Foreign Key to users table (student making the request)
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');

            // Foreign Key to users table (professor being requested)
            $table->unsignedBigInteger('professor_id');
            $table->foreign('professor_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('advisor_type', 50); // เช่น "หลัก", "ร่วม"
            $table->string('status', 50)->default('รอพิจารณา'); // เช่น "รอพิจารณา", "อนุมัติ"
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
        Schema::dropIfExists('advisor_requests');
    }
}