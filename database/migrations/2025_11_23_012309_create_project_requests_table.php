<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_requests', function (Blueprint $table) {
        $table->id();
        $table->string('student_id'); 
        
        // ส่งหาอาจารย์คนไหน (เก็บ user_id ของอาจารย์)
        $table->unsignedBigInteger('teacher_id');
        
        // ข้อมูลโครงงาน
        $table->string('topic_th'); 
        $table->string('topic_en')->nullable(); 
        $table->text('description')->nullable();
        
        // ไฟล์และสถานะ
        $table->string('file_path')->nullable(); 
        $table->string('status')->default('pending');
        
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_requests');
    }
}