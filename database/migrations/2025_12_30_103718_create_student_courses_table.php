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
        Schema::create('student_courses', function (Blueprint $table) {
            $table->id();

            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->foreignId('course_id')->constrained()->cascadeOnDelete();

            $table->decimal('course_fee', 10, 2);
             $table->decimal('gst', 10, 2);
            $table->decimal('discount', 10, 2)->default(0);
            $table->decimal('total_fee', 10, 2);

            $table->enum('mode', ['online', 'offline'])->default('online');
            $table->enum('status', ['active', 'completed', 'cancelled'])->default('active');

            $table->date('enrolled_at');

            $table->timestamps();

            $table->unique(['student_id', 'course_id']); // 🔒 NO DUPLICATE
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_courses');
    }
};
