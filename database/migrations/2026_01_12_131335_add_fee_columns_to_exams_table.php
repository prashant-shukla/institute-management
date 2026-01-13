<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('exams', function (Blueprint $table) {

            // 🔥 Course link (optional)
            $table->unsignedBigInteger('course_id')->nullable()->after('exam_category_id');

            // 🔥 Fee related fields
            $table->decimal('exam_fee', 10, 2)->default(0)->after('duration');
            $table->decimal('gst_amount', 10, 2)->default(0)->after('exam_fee');
            $table->decimal('discount', 10, 2)->default(0)->after('gst_amount');
            $table->decimal('total_fee', 10, 2)->default(0)->after('discount');

            // 🔥 Enrollment info
            $table->timestamp('enrolled_at')->nullable()->after('total_fee');
        });

        // Foreign key separately (safe way)
        Schema::table('exams', function (Blueprint $table) {
            $table->foreign('course_id')
                ->references('id')
                ->on('courses')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('exams', function (Blueprint $table) {

            $table->dropForeign(['course_id']);

            $table->dropColumn([
                'course_id',
                'exam_fee',
                'gst_amount',
                'discount',
                'total_fee',
                'enrolled_at',
            ]);
        });
    }
};
