<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id('notification_id'); // Primary Key: รหัสการแจ้งเตือน  
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('project_id')->nullable()->constrained('student_projects', 'student_project_id')->onDelete('cascade');
            $table->foreignId('request_id')->nullable()->constrained('advisor_requests', 'advisor_request_id')->onDelete('cascade');  
            $table->foreignId('signed_documents_id')->nullable()->constrained('signed_documents', 'signed_documents_id')->onDelete('cascade');
            
            $table->string('notification_type', 50);
            $table->text('message');
            $table->boolean('is_read')->default(false);
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
        Schema::dropIfExists('notifications');
    }
}