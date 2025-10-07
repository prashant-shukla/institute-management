<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            if (!Schema::hasColumn('blog_posts', 'tags')) {
                $table->text('tags')->nullable()->comment('Comma separated tags for blog')->after('content_overview');
            }

            if (!Schema::hasColumn('blog_posts', 'short_description')) {
                $table->text('short_description')->nullable()->comment('Short summary for blog preview')->after('tags');
            }

            if (!Schema::hasColumn('blog_posts', 'link')) {
                $table->string('link', 256)->nullable()->comment('External or reference link')->after('short_description');
            }

            if (!Schema::hasColumn('blog_posts', 'site_title')) {
                $table->string('site_title', 255)->nullable()->comment('Meta Title for SEO')->after('link');
            }

            if (!Schema::hasColumn('blog_posts', 'meta_keywords')) {
                $table->text('meta_keywords')->nullable()->comment('SEO Keywords')->after('site_title');
            }

            if (!Schema::hasColumn('blog_posts', 'meta_description')) {
                $table->text('meta_description')->nullable()->comment('SEO Description')->after('meta_keywords');
            }
        });
    }

    public function down(): void
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->dropColumn([
                'tags',
                'short_description',
                'link',
                'site_title',
                'meta_keywords',
                'meta_description',
            ]);
        });
    }
};
