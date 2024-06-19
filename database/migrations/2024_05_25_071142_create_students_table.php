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
            
            $table->date('reg_date');
            $table->string('reg_no', 255)->unique();
          
            $table->string('father_name',255);
            $table->date('date_of_birth');
           
            $table->text('correspondence_add');
            $table->text('permanent_add');
            $table->string('qualification',255);
            $table->string('college_workplace',255);
            $table->string('photo',255);
            $table->decimal('course_fee');
            $table->string('residential_no',25);
            $table->string('office_no',25);
            $table->string('mobile_no',25);

            // $table->bigInteger('branch');
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
          
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
