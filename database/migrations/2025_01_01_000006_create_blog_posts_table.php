<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category')->nullable();   // e.g. "Land Law"
            $table->text('excerpt');
            $table->longText('content')->nullable();
            $table->string('image')->nullable();
            $table->string('author_name')->nullable();
            $table->string('author_initials', 4)->nullable();
            $table->date('published_date')->nullable();
            $table->string('read_time')->nullable();   // e.g. "8 min read"
            $table->boolean('is_featured')->default(false);
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};
