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
        Schema::create('banners', function (Blueprint $table) {
           $table->id();

            $table->string('badge')->nullable();
            $table->string('title');
            $table->string('highlight')->nullable();
            $table->text('description')->nullable();

            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();

            $table->string('second_button_text')->nullable();
            $table->string('second_button_link')->nullable();

            $table->string('desktop_image')->nullable();
            $table->string('mobile_image')->nullable();
            $table->string('product_image')->nullable();

            $table->string('theme')->default('cyan'); // cyan, yellow, emerald
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
        Schema::dropIfExists('banners');
    }
};
