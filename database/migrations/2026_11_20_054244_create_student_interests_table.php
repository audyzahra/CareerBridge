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
        Schema::create('student_interests', function (Blueprint $table) {
            $table->id();

            // Relasi ke student_profiles
            $table->foreignId('student_profile_id')
                ->constrained('student_profiles')
                ->cascadeOnDelete();

            // Bidang yang diminati mahasiswa
            $table->string('interest_name', 150);

            $table->timestamps();

            // Mencegah minat yang sama dicatat berulang
            $table->unique(
                ['student_profile_id', 'interest_name'],
                'student_interests_profile_name_unique'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_interests');
    }
};
