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
        Schema::create('page_heroes', function (Blueprint $table) {
          
              $table->id();

            $table->string('page_slug')->unique(); // services, about, custom-page
            $table->string('badge_text')->nullable();

            $table->string('title_line_1');
            $table->string('title_line_2')->nullable();
            $table->text('description')->nullable();

            $table->string('primary_button_text')->nullable();
            $table->string('primary_button_link')->nullable();

            $table->string('secondary_button_text')->nullable();
            $table->string('secondary_button_link')->nullable();

            $table->string('stat_1_value')->nullable();
            $table->string('stat_1_label')->nullable();

            $table->string('stat_2_value')->nullable();
            $table->string('stat_2_label')->nullable();

            $table->string('stat_3_value')->nullable();
            $table->string('stat_3_label')->nullable();

            $table->string('stat_4_value')->nullable();
            $table->string('stat_4_label')->nullable();

            $table->string('image')->nullable();
            $table->string('image_alt')->nullable();

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
        Schema::dropIfExists('page_heroes');
    }
};
