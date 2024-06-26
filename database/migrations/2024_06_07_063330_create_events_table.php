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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('slug')->unique();
            $table->string('organizer');
            $table->DATETIME('start_date');
            $table->DATETIME('end_date');
            $table->DECIMAL('paid',10, 2);
            $table->string('photo')->nullable(); 
            $table->text('address',255); 
            $table->text('location',255)->nullable();
            $table->text('description', 255)->nullable(); 
            $table->string('site_title', 255)->nullable();
            $table->text('meta_keyword')->nullable(); 
            $table->text('meta_description', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
