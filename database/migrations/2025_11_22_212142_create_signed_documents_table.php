<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignedDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signed_documents', function (Blueprint $table) {
            $table->id('signed_documents_id'); // Primary Key: รหัสเอกสาร
            
            // Foreign Key to advisor_requests table
            $table->unsignedBigInteger('advisor_request_id');
            $table->foreign('advisor_request_id')->references('advisor_request_id')->on('advisor_requests')->onDelete('cascade');
            
            $table->string('path');
            $table->string('status')->default('รอลงนาม'); // เช่น "รอลงนาม", "ลงนามแล้ว"
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
        Schema::dropIfExists('signed_documents');
    }
}