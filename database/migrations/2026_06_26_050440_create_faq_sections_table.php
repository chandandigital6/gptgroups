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
        Schema::create('faq_sections', function (Blueprint $table) {
            $table->id();

        // page slug custom bhi ho sakta hai: home, about, product-page, anything
        $table->string('page_slug')->index();

        $table->string('label')->nullable();
        $table->string('title');
        $table->text('description')->nullable();

        $table->string('button_text')->nullable();
        $table->string('button_link')->nullable();

        $table->boolean('status')->default(1);
        $table->unsignedInteger('sort_order')->default(0);

        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faq_sections');
    }
};
