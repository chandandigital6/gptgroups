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
        Schema::create('ai_visitors', function (Blueprint $table) {
           $table->id();

            $table->uuid('uuid')
                ->unique();

            $table->string('name')
                ->nullable();

            $table->string('email')
                ->nullable()
                ->index();

            $table->string('phone', 30)
                ->nullable()
                ->index();

            $table->string('language', 10)
                ->default('en');

            $table->string('ip_address', 45)
                ->nullable();

            $table->text('user_agent')
                ->nullable();

            $table->timestamp('last_seen_at')
                ->nullable();

            $table->timestamps();

            $table->index('last_seen_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ai_visitors');
    }
};
