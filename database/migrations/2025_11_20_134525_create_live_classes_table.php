<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('live_classes', function (Blueprint $table) {
            $table->id();

            // Course Relation
            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

            // Basic info
            $table->string('title');
            $table->text('description')->nullable();

            // Meeting / live class link
            $table->string('meeting_link')->nullable();

            // Date & Timings
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();

            // Status: 1 = active, 0 = inactive
            $table->boolean('status')->default(1);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('live_classes');
    }
};
