<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('student_exams', function (Blueprint $table) {
            $table->id();

            // 🔗 Relations
            $table->foreignId('student_id')
                ->constrained('students')
                ->cascadeOnDelete();

            $table->foreignId('exam_id')
                ->constrained('exams')
                ->cascadeOnDelete();

            // 💰 Fees
            $table->decimal('exam_fee', 10, 2);
            $table->decimal('discount', 10, 2)->default(0);
            $table->decimal('gst_amount', 10, 2)->default(0);
            $table->decimal('total_fee', 10, 2);

            // 📌 Payment / Status
            $table->enum('status', ['pending', 'paid', 'failed'])
                ->default('pending');

            $table->timestamp('enrolled_at')->nullable();

            $table->timestamps();

            // ❌ Duplicate exam enroll prevent
            $table->unique(['student_id', 'exam_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_exams');
    }
};

