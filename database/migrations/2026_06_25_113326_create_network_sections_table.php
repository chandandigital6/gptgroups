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
        Schema::create('network_sections', function (Blueprint $table) {
           $table->id();

            $table->string('label')->nullable();
            $table->string('title');
            $table->text('description')->nullable();

            $table->string('card_1_title')->nullable();
            $table->text('card_1_description')->nullable();

            $table->string('card_2_title')->nullable();
            $table->text('card_2_description')->nullable();

            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();

            $table->string('image')->nullable();
            $table->string('image_alt')->nullable();

            $table->string('overlay_title')->nullable();
            $table->text('overlay_description')->nullable();

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
        Schema::dropIfExists('network_sections');
    }
};
