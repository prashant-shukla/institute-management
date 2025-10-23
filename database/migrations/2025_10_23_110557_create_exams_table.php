<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // exam name
            $table->unsignedBigInteger('exam_category_id'); // link to category
            $table->integer('total_questions')->nullable(); // optional
            $table->integer('total_marks')->nullable(); // optional
            $table->integer('duration')->nullable()->comment('Duration in minutes'); // ✅ added time duration
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('exam_category_id')
                ->references('id')
                ->on('exam_categories')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
