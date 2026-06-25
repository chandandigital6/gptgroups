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
        Schema::create('strategy_sections', function (Blueprint $table) {
            $table->id();
              $table->string('label')->nullable();
            $table->string('title');
            $table->text('description')->nullable();

            $table->string('strategy_1_number')->nullable();
            $table->string('strategy_1_title')->nullable();
            $table->text('strategy_1_description')->nullable();

            $table->string('strategy_2_number')->nullable();
            $table->string('strategy_2_title')->nullable();
            $table->text('strategy_2_description')->nullable();

            $table->string('strategy_3_number')->nullable();
            $table->string('strategy_3_title')->nullable();
            $table->text('strategy_3_description')->nullable();

            $table->string('strategy_4_number')->nullable();
            $table->string('strategy_4_title')->nullable();
            $table->text('strategy_4_description')->nullable();

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
        Schema::dropIfExists('strategy_sections');
    }
};
