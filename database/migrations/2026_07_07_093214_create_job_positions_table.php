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
        Schema::create('job_positions', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('company')->nullable();

            $table->string('icon_text', 10)->nullable();
            $table->string('icon_theme')->default('blue');

            $table->string('job_type')->default('In-Office');
            $table->string('badge_theme')->default('green');

            $table->string('location')->nullable();
            $table->string('experience')->nullable();

            $table->text('short_description')->nullable();
            $table->longText('full_description')->nullable();

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
        Schema::dropIfExists('job_positions');
    }
};
