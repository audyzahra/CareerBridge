
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
        Schema::create('resume_analyses', function (Blueprint $table) {
            $table->id();

            // Relasi ke resumes
            $table->foreignId('resume_id')
                ->constrained('resumes')
                ->cascadeOnDelete();

            // Keyword yang ditemukan dalam CV
            $table->json('extracted_keywords')->nullable();

            // Keyword yang belum tercantum dalam CV
            $table->json('missing_keywords')->nullable();

            // Saran peningkatan CV
            $table->text('improvement_suggestions')->nullable();

            // Hasil analisis lengkap dari Gemini API
            $table->json('analysis_result')->nullable();

            // Waktu analisis dilakukan
            $table->timestamp('analyzed_at')->nullable();

            $table->timestamps();

            // Index untuk pencarian berdasarkan resume
            $table->index('resume_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resume_analyses');
    }
};
