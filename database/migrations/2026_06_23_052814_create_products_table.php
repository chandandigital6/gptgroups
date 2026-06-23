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
        Schema::create('products', function (Blueprint $table) {
         $table->id();

    $table->foreignId('product_brand_id')
        ->nullable()
        ->constrained('product_brands')
        ->nullOnDelete();

    $table->foreignId('product_category_id')
        ->nullable()
        ->constrained('product_categories')
        ->nullOnDelete();

    $table->string('name');
    $table->string('slug')->unique();

    $table->string('model_no')->nullable();
    $table->string('sku')->nullable();

    $table->string('badge')->nullable(); 
    // Example: New, 5G, Tablet, Upcoming

    $table->string('product_type')->default('latest'); 
    // latest, upcoming, normal

    $table->text('short_description')->nullable();
    $table->longText('description')->nullable();

    $table->string('image')->nullable();
    $table->json('gallery')->nullable();

    $table->json('tags')->nullable();
    // Example: ["5G", "Retail", "B2B"]

    $table->json('specifications')->nullable();
    // Example: {"RAM":"8GB","Storage":"128GB","Battery":"5000mAh"}

    $table->date('launch_date')->nullable();

    $table->boolean('is_featured')->default(0);
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
        Schema::dropIfExists('products');
    }
};
