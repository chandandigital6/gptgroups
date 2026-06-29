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
        Schema::create('news_posts', function (Blueprint $table) {
            $table->id();
             $table->foreignId('news_category_id')
                ->nullable()
                ->constrained('news_categories')
                ->nullOnDelete();

            $table->string('title');
            $table->string('slug')->unique();

            $table->string('small_title')->nullable();
            $table->text('excerpt')->nullable();
            $table->longText('content')->nullable();

            $table->string('image')->nullable();
            $table->string('image_alt')->nullable();

            $table->date('published_date')->nullable();

            $table->boolean('is_featured')->default(0);
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
        Schema::dropIfExists('news_posts');
    }
};
