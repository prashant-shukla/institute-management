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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('title');                // Expense title
            $table->text('remark')->nullable();     // Optional details
            $table->decimal('amount', 10, 2);       // Expense amount
            $table->date('date');                   // Expense date
            $table->string('attachment')->nullable(); // File path (PDF, Image, etc.)
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
