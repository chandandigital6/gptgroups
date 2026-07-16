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
        Schema::create('ai_unanswered_questions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('ai_visitor_id')
                ->nullable()
                ->constrained('ai_visitors')
                ->nullOnDelete();

            $table->string('agent_conversation_id', 36)
                ->nullable()
                ->index();

            $table->text('question');

            $table->text('agent_response')
                ->nullable();

            $table->unsignedInteger('asked_count')
                ->default(1);

            $table->boolean('is_resolved')
                ->default(false);

            $table->text('admin_answer')
                ->nullable();

            $table->timestamps();

            $table->index([
                'is_resolved',
                'asked_count',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ai_unanswered_questions');
    }
};
