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
        Schema::create('proud_students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role')->nullable(); // Job title / position
            $table->string('company')->nullable();
            $table->string('company_url')->nullable();
            $table->string('package')->nullable(); // Salary package
            $table->text('message')->nullable();   // Review / success story
            $table->unsignedTinyInteger('rating')->default(5); // 1–5 stars
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proud_students');
    }
};
