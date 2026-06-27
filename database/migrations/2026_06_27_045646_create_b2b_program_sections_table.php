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
        Schema::create('b2b_program_sections', function (Blueprint $table) {
            $table->id();

            $table->string('page_slug')->default('services')->index();

            $table->string('label')->nullable();
            $table->string('title');
            $table->text('description_1')->nullable();
            $table->text('description_2')->nullable();

            $table->string('image')->nullable();
            $table->string('image_alt')->nullable();

            $table->string('card_title')->nullable();
            $table->text('card_description')->nullable();

            $table->string('feature_1_title')->nullable();
            $table->text('feature_1_description')->nullable();

            $table->string('feature_2_title')->nullable();
            $table->text('feature_2_description')->nullable();

            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('b2b_program_sections');
    }
};
