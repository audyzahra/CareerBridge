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
        Schema::create('opportunity_posters', function (Blueprint $table) {
            $table->id();

            // Relasi ke organizer_profiles
            $table->foreignId('organizer_profile_id')
                ->constrained('organizer_profiles')
                ->cascadeOnDelete();

            // Relasi ke opportunities (opsional)
            $table->foreignId('opportunity_id')
                ->nullable()
                ->constrained('opportunities')
                ->nullOnDelete();

            // Lokasi penyimpanan poster
            $table->string('file_path');

            // Data hasil ekstraksi Gemini Vision
            $table->json('extracted_data')->nullable();

            // Status pemeriksaan hasil ekstraksi
            $table->enum('review_status', [
                'pending',
                'approved',
                'rejected'
            ])->default('pending');

            $table->timestamps();

            // Index untuk pencarian berdasarkan status
            $table->index('review_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opportunity_posters');
    }
};
