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
        Schema::table('inquiries', function (Blueprint $table) {
            $table->string('mobile')->nullable()->after('email');
            $table->string('address')->nullable()->after('mobile');
            $table->string('qualification')->nullable()->after('address');

            // ✅ Proper foreign key relation
            $table->unsignedBigInteger('course_category_id')->nullable()->after('qualification');
            $table->unsignedBigInteger('tool_id')->nullable()->after('course_category_id');

            // ✅ Boolean field for mode (online/offline)
            $table->boolean('is_online')->default(false)->after('tool_id'); 
            // true = online, false = offline

            // Foreign key constraints
            $table->foreign('course_category_id')->references('id')->on('course_categories')->onDelete('set null');
            $table->foreign('tool_id')->references('id')->on('tools')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inquiries', function (Blueprint $table) {
            $table->dropForeign(['course_category_id']);
            $table->dropForeign(['tool_id']);
            $table->dropColumn([
                'mobile',
                'address',
                'qualification',
                'course_category_id',
                'tool_id',
                'is_online'
            ]);
        });
    }
};
