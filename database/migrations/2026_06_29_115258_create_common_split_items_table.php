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
        Schema::create('common_split_items', function (Blueprint $table) {
          $table->id();

            $table->foreignId('common_split_section_id')
                ->constrained('common_split_sections')
                ->cascadeOnDelete();

            $table->string('icon_text')->nullable(); // 01, 02
            $table->string('theme')->default('blue'); // blue, cyan, slate, pink
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
        Schema::dropIfExists('common_split_items');
    }
};
