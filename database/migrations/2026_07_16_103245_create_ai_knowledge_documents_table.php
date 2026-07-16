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
        Schema::create('ai_knowledge_documents', function (Blueprint $table) {
            $table->id();

            $table->string('title');

            $table->string('slug')
                ->unique();

            $table->enum('type', [
                'company',
                'page',
                'faq',
                'business_vertical',
                'brand',
                'product',
                'network',
                'retail_outlet',
                'career',
                'news',
                'service',
                'contact',
                'custom',
            ])->default('custom');

            $table->string('source_type')
                ->default('manual');

            $table->unsignedBigInteger('source_id')
                ->nullable();

            $table->string('source_url', 2000)
                ->nullable();

            $table->string('language', 10)
                ->default('en');

            $table->text('summary')
                ->nullable();

            $table->longText('content');

            $table->json('keywords')
                ->nullable();

            $table->json('metadata')
                ->nullable();

            $table->unsignedInteger('priority')
                ->default(0);

            $table->boolean('is_active')
                ->default(true);

            $table->boolean('is_synced')
                ->default(false);

            $table->timestamp('last_synced_at')
                ->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index([
                'type',
                'language',
                'is_active',
            ]);

            $table->index([
                'source_type',
                'source_id',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ai_knowledge_documents');
    }
};
