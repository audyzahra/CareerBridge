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
        Schema::create('opportunity_recommendations', function (Blueprint $table) {
            $table->id();

            // Relasi ke student_profiles
            $table->foreignId('student_profile_id')
                ->constrained('student_profiles')
                ->cascadeOnDelete();

            // Relasi ke opportunities
            $table->foreignId('opportunity_id')
                ->constrained('opportunities')
                ->cascadeOnDelete();

            // Nilai kecocokan mahasiswa dengan peluang
            $table->decimal('similarity_score', 5, 2)->default(0);

            // Alasan sistem memberikan rekomendasi
            $table->text('recommendation_reason')->nullable();

            // Waktu rekomendasi dihasilkan
            $table->timestamp('generated_at')->useCurrent();

            $table->timestamps();

            // Mencegah rekomendasi yang sama tercatat berulang
            $table->unique(
                ['student_profile_id', 'opportunity_id'],
                'opportunity_recommendations_student_opportunity_unique'
            );

            // Index untuk pencarian rekomendasi
            $table->index('generated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opportunity_recommendations');
    }
};
