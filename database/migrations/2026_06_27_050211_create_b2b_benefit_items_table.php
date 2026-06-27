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
        Schema::create('b2b_benefit_items', function (Blueprint $table) {
           $table->id();

            $table->foreignId('b2b_benefit_section_id')
                ->constrained('b2b_benefit_sections')
                ->cascadeOnDelete();

            $table->string('icon_text')->nullable();
            $table->string('title');
            $table->text('description')->nullable();

            $table->string('theme')->default('blue'); // blue, cyan, slate

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
        Schema::dropIfExists('b2b_benefit_items');
    }
};
