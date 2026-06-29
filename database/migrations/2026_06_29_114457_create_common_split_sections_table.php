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
        Schema::create('common_split_sections', function (Blueprint $table) {
            $table->id();

            $table->string('page_slug')->default('home')->index();
            $table->string('section_key')->nullable()->index(); // customer-satisfaction, retail-support etc.

            $table->string('label')->nullable();
            $table->string('title');
            $table->text('description_1')->nullable();
            $table->text('description_2')->nullable();

            $table->string('image_1')->nullable();
            $table->string('image_1_alt')->nullable();

            $table->string('image_2')->nullable();
            $table->string('image_2_alt')->nullable();

            $table->string('image_3')->nullable();
            $table->string('image_3_alt')->nullable();

            $table->string('card_value')->nullable();
            $table->string('card_title')->nullable();
            $table->text('card_description')->nullable();

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
        Schema::dropIfExists('common_split_sections');
    }
};
