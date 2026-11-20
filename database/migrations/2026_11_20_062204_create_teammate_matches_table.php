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
        Schema::create('teammate_matches', function (Blueprint $table) {
            $table->id();

            // Mahasiswa yang mencari rekan tim
            $table->foreignId('student_profile_id')
                ->constrained('student_profiles')
                ->cascadeOnDelete();

            // Mahasiswa yang direkomendasikan
            $table->foreignId('matched_student_profile_id')
                ->constrained('student_profiles')
                ->cascadeOnDelete();

            // Nilai kecocokan keterampilan
            $table->decimal('similarity_score', 5, 2)->default(0);

            // Alasan hasil pencocokan
            $table->text('match_reason')->nullable();

            // Status permintaan kolaborasi
            $table->enum('status', [
                'pending',
                'accepted',
                'rejected'
            ])->default('pending');

            $table->timestamps();

            // Mencegah pasangan mahasiswa yang sama tercatat berulang
            $table->unique(
                ['student_profile_id', 'matched_student_profile_id'],
                'teammate_matches_student_pair_unique'
            );

            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teammate_matches');
    }
};
