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
        Schema::create('hiring_process_steps', function (Blueprint $table) {
             $table->id();

            $table->string('icon_text', 10)->nullable();
            $table->string('title');
            $table->text('description')->nullable();

            $table->string('theme')->default('blue');
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
        Schema::dropIfExists('hiring_process_steps');
    }
};
