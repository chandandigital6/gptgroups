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
        Schema::create('store_outlets', function (Blueprint $table) {
               $table->id();

            $table->foreignId('store_outlet_section_id')
                ->constrained('store_outlet_sections')
                ->cascadeOnDelete();

            $table->string('title');
            $table->string('subtitle')->nullable();

            $table->string('badge')->nullable();
            $table->string('theme')->default('blue'); // blue, cyan, slate, pink

            $table->string('image')->nullable();
            $table->string('image_alt')->nullable();

            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();

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
        Schema::dropIfExists('store_outlets');
    }
};
