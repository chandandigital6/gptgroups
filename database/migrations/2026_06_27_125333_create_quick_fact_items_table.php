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
        Schema::create('quick_fact_items', function (Blueprint $table) {
           $table->id();

            $table->foreignId('quick_fact_section_id')
                ->constrained('quick_fact_sections')
                ->cascadeOnDelete();

            $table->string('value')->nullable();
            $table->string('title');
            $table->text('description')->nullable();

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
        Schema::dropIfExists('quick_fact_items');
    }
};
