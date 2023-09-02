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
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id();
            $table->string('first_heading_ar');
            $table->string('first_heading_en');
            $table->string('secound_heading_ar');
            $table->string('secound_heading_en');
            $table->string('third_heading_ar');
            $table->string('third_heading_en');
            $table->text('description_ar');
            $table->text('description_en');
            $table->text('background')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_sections');
    }
};
