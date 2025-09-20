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
        Schema::table('student_fees', function (Blueprint $table) {
            $table->string('receipt_no', 50)
                  ->unique()
                  ->nullable()
                  ->after('id'); // Receipt No, unique रहेगा

            $table->decimal('gst_amount', 10, 2)->nullable()->after('fee_amount'); // GST amount
            $table->string('coupon_code', 100)->nullable()->after('gst_amount');  // Coupon code
            $table->decimal('discount_amount', 10, 2)->nullable()->after('coupon_code'); // Discount from coupon
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_fees', function (Blueprint $table) {
            $table->dropColumn(['receipt_no', 'gst_amount', 'coupon_code', 'discount_amount']);
        });
    }
};
