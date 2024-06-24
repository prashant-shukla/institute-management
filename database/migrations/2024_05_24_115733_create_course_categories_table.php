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
        Schema::create('course_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('slug')->unique();
            $table->json('software'); 
            $table->string('sub_title');
            $table->string('image')->nullable(); 
            $table->unsignedSmallInteger('order'); 
            $table->string('show_on_website')->default(false);
            $table->string('site_title', 255)->nullable();
            $table->string('meta_keyword')->nullable(); 
            $table->string('meta_description', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_categories');
    }
};
