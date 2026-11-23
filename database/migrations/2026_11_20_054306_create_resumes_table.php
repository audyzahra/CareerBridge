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
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();

            // Relasi ke student_profiles
            $table->foreignId('student_profile_id')
                ->constrained('student_profiles')
                ->cascadeOnDelete();

            // Informasi dokumen CV
            $table->string('file_name');
            $table->string('file_path');
            $table->string('file_type', 50);

            // Waktu upload CV
            $table->timestamp('uploaded_at')->useCurrent();

            $table->timestamps();

            // Index untuk pencarian berdasarkan mahasiswa
            $table->index('student_profile_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumes');
    }
};
