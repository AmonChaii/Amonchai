<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateStudentProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_projects', function (Blueprint $table) {
            $table->id('student_project_id'); // Primary Key: รหัสโครงงาน
            
            // Foreign Key to users table (for the student)
            $table->unsignedBigInteger('student_id');
            
            // Foreign Key to users table (for the advisor)
            $table->unsignedBigInteger('advisor_id');
           
            $table->string('title');
            $table->timestamps(); 
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_projects');
    }
}