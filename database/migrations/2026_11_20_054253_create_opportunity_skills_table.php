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
        Schema::create('opportunity_skills', function (Blueprint $table) {
            $table->id();

            // Relasi ke opportunities
            $table->foreignId('opportunity_id')
                ->constrained('opportunities')
                ->cascadeOnDelete();

            // Relasi ke skills
            $table->foreignId('skill_id')
                ->constrained('skills')
                ->cascadeOnDelete();

            // Tingkat kebutuhan keterampilan
            $table->enum('importance_level', [
                'optional',
                'preferred',
                'required'
            ])->default('preferred');

            $table->timestamps();

            // Mencegah skill yang sama tercatat dua kali
            $table->unique(
                ['opportunity_id', 'skill_id'],
                'opportunity_skills_opportunity_skill_unique'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opportunity_skills');
    }
};
