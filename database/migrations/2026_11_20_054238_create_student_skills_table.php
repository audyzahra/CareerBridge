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
        Schema::create('student_skills', function (Blueprint $table) {
            $table->id();

            // Relasi ke student_profiles
            $table->foreignId('student_profile_id')
                ->constrained('student_profiles')
                ->cascadeOnDelete();

            // Relasi ke skills
            $table->foreignId('skill_id')
                ->constrained('skills')
                ->cascadeOnDelete();

            // Tingkat kemampuan mahasiswa
            $table->enum('proficiency_level', [
                'beginner',
                'intermediate',
                'advanced'
            ]);

            $table->timestamps();

            // Mencegah skill yang sama ditambahkan dua kali
            $table->unique(
                ['student_profile_id', 'skill_id'],
                'student_skills_profile_skill_unique'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_skills');
    }
};
