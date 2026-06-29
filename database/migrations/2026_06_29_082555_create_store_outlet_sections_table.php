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
        Schema::create('store_outlet_sections', function (Blueprint $table) {
            $table->id();

            $table->string('page_slug')->default('outlets')->index();
            $table->string('section_id')->default('outlets');

            $table->string('label')->nullable();
            $table->string('title');
            $table->text('description')->nullable();

            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();

            $table->string('cta_label')->nullable();
            $table->string('cta_title')->nullable();
            $table->text('cta_description')->nullable();
            $table->string('cta_button_text')->nullable();
            $table->string('cta_button_link')->nullable();

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
        Schema::dropIfExists('store_outlet_sections');
    }
};
