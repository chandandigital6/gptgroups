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
        Schema::create('business_vertical_items', function (Blueprint $table) {
           $table->id();

            $table->foreignId('business_vertical_section_id')
                ->constrained('business_vertical_sections')
                ->cascadeOnDelete();

            $table->string('badge_text')->nullable();
            $table->string('theme')->default('blue'); // blue, cyan, pink, slate

            $table->string('title');
            $table->text('description')->nullable();

            $table->string('image')->nullable();
            $table->string('image_alt')->nullable();

            $table->string('tags')->nullable(); // comma separated: Mobiles,Tablets,Accessories

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
        Schema::dropIfExists('business_vertical_items');
    }
};
