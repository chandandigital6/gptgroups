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
        Schema::create('ai_leads', function (Blueprint $table) {
              $table->id();

            $table->foreignId('ai_visitor_id')
                ->nullable()
                ->constrained('ai_visitors')
                ->nullOnDelete();

            $table->uuid('request_token')
                ->nullable()
                ->index();

            $table->string('agent_conversation_id', 36)
                ->nullable()
                ->index();

            $table->string('name');

            $table->string('email')
                ->nullable();

            $table->string('phone', 30)
                ->nullable();

            $table->string('company_name')
                ->nullable();

            $table->string('business_type')
                ->nullable();

            $table->string('location')
                ->nullable();

            $table->enum('lead_type', [
                'partnership',
                'vendor',
                'b2b',
                'product',
                'support',
                'career',
                'general',
            ])->default('general');

            $table->text('requirement');

            $table->enum('status', [
                'new',
                'contacted',
                'qualified',
                'in_progress',
                'converted',
                'closed',
                'spam',
            ])->default('new');

            $table->enum('priority', [
                'low',
                'normal',
                'high',
                'urgent',
            ])->default('normal');

            $table->json('metadata')
                ->nullable();

            $table->timestamps();

            $table->index([
                'lead_type',
                'status',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ai_leads');
    }
};
