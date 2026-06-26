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
        Schema::create('partner_logos', function (Blueprint $table) {
           $table->id();

            $table->foreignId('partner_logo_section_id')
                ->constrained('partner_logo_sections')
                ->cascadeOnDelete();

            $table->string('name');
            $table->string('logo')->nullable();

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
        Schema::dropIfExists('partner_logos');
    }
};
