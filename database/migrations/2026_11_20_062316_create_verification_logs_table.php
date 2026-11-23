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
        Schema::create('verification_logs', function (Blueprint $table) {
            $table->id();

            // Relasi ke profil penyelenggara (jika verifikasi organizer)
            $table->foreignId('organizer_profile_id')
                ->nullable()
                ->constrained('organizer_profiles')
                ->nullOnDelete();

            // Relasi ke peluang (jika verifikasi opportunity)
            $table->foreignId('opportunity_id')
                ->nullable()
                ->constrained('opportunities')
                ->nullOnDelete();

            // Admin yang melakukan verifikasi
            $table->foreignId('verified_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            // Jenis data yang diverifikasi
            $table->enum('verification_type', [
                'organizer',
                'opportunity',
            ]);

            // Hasil proses verifikasi
            $table->enum('status', [
                'pending',
                'verified',
                'rejected',
            ])->default('pending');

            // Catatan dari admin
            $table->text('notes')->nullable();

            // Waktu verifikasi dilakukan
            $table->timestamp('verified_at')->nullable();

            $table->timestamps();

            // Index untuk mempermudah pencarian log
            $table->index('verification_type');
            $table->index('status');
            $table->index('verified_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verification_logs');
    }
};
