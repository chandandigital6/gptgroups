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
        Schema::create('service_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_section_id')
                ->constrained('service_sections')
                ->cascadeOnDelete();

            $table->string('label')->nullable();
            $table->string('title');
            $table->text('description')->nullable();

            $table->string('image')->nullable();
            $table->string('image_alt')->nullable();

            $table->string('button_link')->nullable();

            $table->string('accent_color')->nullable(); // blue, cyan, indigo etc
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
        Schema::dropIfExists('service_items');
    }
};
