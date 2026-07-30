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
        Schema::create('home_advertisements', function (Blueprint $table) {
             $table->id();

            $table->string('brand')->nullable();
            $table->string('title');
            $table->string('subtitle')->nullable();

            $table->text('description')->nullable();

            $table->string('image');

            $table->string('link')->nullable();

            $table->string('launch_text')
                ->default('Coming Soon');

            $table->string('launch_note')->nullable();

            $table->boolean('is_active')
                ->default(true);

            $table->unsignedInteger('sort_order')
                ->default(0);

            $table->timestamp('starts_at')
                ->nullable();

            $table->timestamp('ends_at')
                ->nullable();

            $table->timestamps();

            $table->index('is_active');
            $table->index('sort_order');
            $table->index(['starts_at', 'ends_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_advertisements');
    }
};
