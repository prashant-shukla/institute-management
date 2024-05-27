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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            // $table->string('student_id', 255);
            $table->date('reg_date');
            $table->string('reg_no', 255);
            $table->unsignedBigInteger('center_id');
            $table->string('name',255);
            $table->string('father_name',255);
            $table->string('mother_name',255);
            $table->date('date_of_birth');
            $table->string('email');
            $table->text('correspondence_add');
            $table->text('permanent_add');
            $table->string('qualification',255);
            $table->string('college_workplace',255);
            $table->string('photo',255);
            $table->string('residential_no',25);
            $table->string('office_no',25);
            $table->string('mobile_no',25);
            // $table->bigInteger('branch');
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('branch_id');
            $table->json('software_covered');
            $table->boolean('apply_gst');
            $table->decimal('course_fee',8,2);
            $table->unsignedTinyInteger('gst');
            $table->decimal('total',8,2);
            $table->timestamps();

            $table->foreign('center_id')->references('id')->on('centers')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
