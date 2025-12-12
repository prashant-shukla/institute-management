<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsFeedbackTable extends Migration
{
    public function up()
    {
        Schema::create('students_feedback', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->index();  // logged-in student
            $table->tinyInteger('q1')->unsigned();
            $table->tinyInteger('q2')->unsigned();
            $table->tinyInteger('q3')->unsigned();
            $table->tinyInteger('q4')->unsigned();
            $table->tinyInteger('q5')->unsigned();
            $table->tinyInteger('q6')->unsigned();
            $table->tinyInteger('q7')->unsigned();
            $table->tinyInteger('q8')->unsigned();
            $table->tinyInteger('q9')->unsigned();
            $table->tinyInteger('q10')->unsigned();
            $table->tinyInteger('q11')->unsigned();
            $table->text('comments')->nullable();
            $table->timestamps();

            // Default: users table ke id se connect
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('students_feedback');
    }
}
