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
            $table->unsignedBigInteger('course_categories_id'); // Corrected column name
            $table->string('sub_title')->nullable();
            $table->tinyInteger('popular_course'); 
            $table->string('image')->nullable();
            $table->string('description', 160)->nullable(); 
            $table->string('site_title', 60)->nullable();
            $table->string('meta_keyword')->nullable(); 
            $table->string('meta_description', 255)->nullable();
            $table->enum('mode', ['online', 'offline', 'both']);
            $table->tinyInteger('sessions')->default(0);
            $table->tinyInteger('projects');
            $table->decimal('fee', 10, 2);
            $table->decimal('offer_fee', 10, 2);
            $table->text('faqs');

            $table->timestamps();

            $table->foreign('course_categories_id')->references('id')->on('course_categories')->onDelete('cascade'); // Corrected column name and table name
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
