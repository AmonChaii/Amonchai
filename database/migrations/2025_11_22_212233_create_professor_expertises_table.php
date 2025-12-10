<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessorExpertisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professor_expertise', function (Blueprint $table) {
            $table->id('professor_expertise_id'); // Primary Key: รหัสความเชี่ยวชาญ
            
            // Foreign Key to users table (for the advisor)
            $table->unsignedBigInteger('advisor_id');
            $table->foreign('advisor_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->string('expertise');
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
        Schema::dropIfExists('professor_expertises');
    }
}