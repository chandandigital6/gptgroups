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
        Schema::create('career_sections', function (Blueprint $table) {
           $table->id();
            $table->string('section_key')->unique();
            $table->string('label')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();

            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();

            $table->string('email_title')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_title')->nullable();
            $table->string('phone')->nullable();

            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career_sections');
    }
};
