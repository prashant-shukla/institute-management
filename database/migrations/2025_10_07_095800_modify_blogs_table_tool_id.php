<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            // Remove software_id if it exists
            if (Schema::hasColumn('blogs', 'software_id')) {
                $table->dropColumn('software_id');
            }

            // Add tool_id if it doesn't exist
            if (!Schema::hasColumn('blogs', 'tool_id')) {
                $table->unsignedBigInteger('tool_id')->nullable()->comment('Related Tool ID');
            }
        });
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            // Re-add software_id
            if (!Schema::hasColumn('blogs', 'software_id')) {
                $table->unsignedBigInteger('software_id')->nullable()->comment('Related Software ID');
            }

            // Drop tool_id
            if (Schema::hasColumn('blogs', 'tool_id')) {
                $table->dropColumn('tool_id');
            }
        });
    }
};
