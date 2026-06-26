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
        Schema::create('faq_items', function (Blueprint $table) {
             $table->id();

        $table->foreignId('faq_section_id')
            ->constrained('faq_sections')
            ->cascadeOnDelete();

        $table->string('question');
        $table->text('answer')->nullable();

        $table->unsignedInteger('sort_order')->default(0);
        $table->boolean('is_open')->default(0);
        $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faq_items');
    }
};
