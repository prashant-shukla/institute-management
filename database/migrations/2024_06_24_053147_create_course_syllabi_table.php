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
        Schema::create('course_syllabi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->string('title', 100);
            $table->text('description')->nullable();
            $table->string('course_duration')->nullable();
            $table->string('live_sessions')->nullable();
            $table->string('projects')->nullable();
            $table->enum('mode', ['online', 'offline', 'both']);
            $table->string('assignment')->nullable();
            $table->integer('order')->nullable();
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_syllabi');
    }
};
