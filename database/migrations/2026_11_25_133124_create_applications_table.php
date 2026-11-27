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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();

            // Relasi ke Student Profile
            $table->foreignId('student_profile_id')
                ->constrained('student_profiles')
                ->cascadeOnDelete();

            // Relasi ke Opportunity
            $table->foreignId('opportunity_id')
                ->constrained('opportunities')
                ->cascadeOnDelete();

            // CV yang digunakan saat mendaftar (opsional)
            $table->foreignId('resume_id')
                ->nullable()
                ->constrained('resumes')
                ->nullOnDelete();

            // Surat pengantar dari Student
            $table->text('cover_letter')->nullable();

            // Status pendaftaran
            $table->enum('status', [
                'pending',
                'reviewing',
                'shortlisted',
                'accepted',
                'rejected',
                'withdrawn',
            ])->default('pending');

            // Waktu pendaftaran
            $table->timestamp('applied_at')->useCurrent();

            $table->timestamps();

            // Mencegah Student mendaftar opportunity yang sama dua kali
            $table->unique(
                ['student_profile_id', 'opportunity_id'],
                'applications_student_opportunity_unique'
            );

            $table->index('status');
            $table->index('applied_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
