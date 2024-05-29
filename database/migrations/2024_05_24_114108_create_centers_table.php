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
        Schema::create('centers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('logo')->nullable();
            $table->string('receipt_header');
            $table->integer('center_code');
            $table->integer('reg_no_start_from');
            $table->integer('receipt_no_start_from');
            $table->string('email');
            $table->string('mobile_no',25);
            $table->string('phone_no',25);
            $table->unsignedTinyInteger('gstin')->change();
            $table->text('address',255);
            $table->text('state');
            $table->text('city');
            $table->boolean('nonatc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centers');
    }
};
