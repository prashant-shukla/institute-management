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
        Schema::table('students', function (Blueprint $table) {
            $table->decimal('gst_amount', 10, 2)->after('course_fee')->default(0);  // GST 18%
            $table->decimal('total_fee', 10, 2)->after('gst_amount')->default(0);  // Course Fee + GST
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn(['gst_amount', 'total_fee']);
        });
    }
};
