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
        Schema::create('retail_outlet_sections', function (Blueprint $table) {
            $table->id();
             $table->string('label')->nullable();
            $table->string('title');
            $table->text('description')->nullable();

            $table->string('card_1_title')->nullable();
            $table->text('card_1_description')->nullable();

            $table->string('card_2_title')->nullable();
            $table->text('card_2_description')->nullable();

            $table->string('card_3_title')->nullable();
            $table->text('card_3_description')->nullable();

            $table->string('card_4_title')->nullable();
            $table->text('card_4_description')->nullable();

            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();

            $table->string('image_1')->nullable();
            $table->string('image_1_alt')->nullable();

            $table->string('image_2')->nullable();
            $table->string('image_2_alt')->nullable();

            $table->string('image_3')->nullable();
            $table->string('image_3_alt')->nullable();

            $table->string('image_4')->nullable();
            $table->string('image_4_alt')->nullable();

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
        Schema::dropIfExists('retail_outlet_sections');
    }
};
