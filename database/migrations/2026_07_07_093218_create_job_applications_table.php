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
        Schema::create('job_applications', function (Blueprint $table) {
          $table->id();

            $table->foreignId('job_position_id')
                ->nullable()
                ->constrained('job_positions')
                ->nullOnDelete();

            $table->string('full_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('current_location')->nullable();

            $table->string('cv_path')->nullable();
            $table->text('message')->nullable();

            $table->enum('status', [
                'new',
                'reviewed',
                'shortlisted',
                'rejected',
            ])->default('new');

            $table->timestamps();
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
