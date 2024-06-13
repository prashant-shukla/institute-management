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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('slug')->unique();
            $table->string('course_duration');
            $table->unsignedBigInteger('branch_id');
            
            $table->string('sub_title')->nullable();
            $table->tinyInteger('popular_course'); 
            $table->string('image')->nullable();
            $table->string('description', 160)->nullable(); 
            $table->string('site_title', 60)->nullable();
            $table->string('meta_keyword')->nullable(); 
            $table->string('meta_description', 255)->nullable();
            $table->timestamps();

            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
