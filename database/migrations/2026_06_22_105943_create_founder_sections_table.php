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
        Schema::create('founder_sections', function (Blueprint $table) {
             $table->id();
            $table->string('label')->nullable(); // FOUNDER SECTION
            $table->string('title'); // Mr. Tripathi — Founder & CEO, GPT Group.
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->string('stat_1_value')->nullable(); // 20+
            $table->string('stat_1_label')->nullable(); // Years
            $table->string('stat_2_value')->nullable(); // 2016
            $table->string('stat_2_label')->nullable(); // GPT Founded
            $table->string('stat_3_value')->nullable(); // GCC
            $table->string('stat_3_label')->nullable(); // Market Vision
            $table->boolean('status')->default(1);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('founder_sections');
    }
};
