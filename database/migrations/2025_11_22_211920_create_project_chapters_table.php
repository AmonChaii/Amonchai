<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_chapters', function (Blueprint $table) {
            $table->id('project_chapter_id'); 

            // Foreign Key: รหัสโครงงานของนักศึกษา
            $table->unsignedBigInteger('student_project_id');
            $table->foreign('student_project_id')->references('student_project_id')->on('student_projects')->onDelete('cascade');

            $table->integer('chapter_number');
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('project_chapters');
    }
}