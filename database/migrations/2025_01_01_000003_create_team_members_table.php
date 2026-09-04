<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('badge')->nullable();          // e.g. "Lead Attorney"
            $table->string('subtitle')->nullable();        // e.g. "Advocate · High Court of Uganda"
            $table->string('icon')->default('gavel');      // material symbol used in the divider
            $table->text('bio');
            $table->string('photo')->nullable();
            // the 3 mini stat cards under the avatar
            $table->string('stat1_value')->nullable();     // e.g. "10+"
            $table->string('stat1_label')->nullable();     // e.g. "Yrs Exp."
            $table->string('stat2_value')->nullable();
            $table->string('stat2_label')->nullable();
            $table->string('stat3_value')->nullable();
            $table->string('stat3_label')->nullable();
            $table->json('expertise')->nullable();          // ["Land Law","Litigation",...]
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('team_members');
    }
};
