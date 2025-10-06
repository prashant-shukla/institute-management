<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id()->comment('Primary Key: Auto Increment Blog ID');
            $table->string('title', 255)->nullable()->comment('Blog Title');
            $table->string('image', 255)->nullable()->comment('Blog Image Path');
            $table->string('slug', 556)->nullable()->comment('SEO Friendly URL Slug');
            $table->unsignedBigInteger('software_id')->nullable()->comment('Related Software ID');
            $table->text('tags')->nullable()->comment('Comma separated tags for blog');
            $table->text('short_description')->nullable()->comment('Short summary for blog preview');
            $table->longText('description')->nullable()->comment('Full Blog Content');
            $table->string('link', 256)->nullable()->comment('External or reference link');
            $table->unsignedBigInteger('created_by')->nullable()->comment('User who created the blog');
            $table->dateTime('created')->nullable()->comment('Custom created datetime');
            $table->string('site_title', 255)->nullable()->comment('Meta Title for SEO');
            $table->text('meta_keywords')->nullable()->comment('SEO Keywords');
            $table->text('meta_description')->nullable()->comment('SEO Description');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
