<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('study_materials', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->text('description'); 
            $table->enum('file_type', ['doc', 'audio', 'video'])->notNull(); // ENUM('doc', 'audio', 'video') NOT NULL
            $table->string('file_path', 255); 
            $table->unsignedBigInteger('uploaded_by'); 
            $table->timestamp('upload_date'); 
            
            $table->unsignedBigInteger('course_id'); 
            $table->timestamps();
            
             $table->foreign('uploaded_by')->references('id')->on('staff')->onDelete('cascade');
             $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('study_materials');
    }
};
