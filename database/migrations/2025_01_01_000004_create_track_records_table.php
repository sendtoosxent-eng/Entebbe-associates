<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('track_records', function (Blueprint $table) {
            $table->id();
            $table->string('category');   // e.g. "Land Recovery"
            $table->string('title');      // e.g. "Church of Uganda Land Assets"
            $table->text('description');
            $table->string('icon')->default('domain');
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('track_records');
    }
};
