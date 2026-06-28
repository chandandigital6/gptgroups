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
        Schema::table('b2b_program_sections', function (Blueprint $table) {
               $table->string('feature_3_title')->nullable()->after('feature_2_description');
        $table->text('feature_3_description')->nullable()->after('feature_3_title');
        $table->string('feature_4_title')->nullable()->after('feature_3_description');
        $table->text('feature_4_description')->nullable()->after('feature_4_title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('b2b_program_sections', function (Blueprint $table) {
             $table->dropColumn([
            'feature_3_title',
            'feature_3_description',
            'feature_4_title',
            'feature_4_description',
        ]);
        });
    }
};
