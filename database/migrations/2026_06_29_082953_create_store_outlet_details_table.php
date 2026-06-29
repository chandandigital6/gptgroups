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
        Schema::create('store_outlet_details', function (Blueprint $table) {
            $table->id();

            $table->foreignId('store_outlet_id')
                ->constrained('store_outlets')
                ->cascadeOnDelete();

            $table->string('label');
            $table->text('value')->nullable();

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
        Schema::dropIfExists('store_outlet_details');
    }
};
