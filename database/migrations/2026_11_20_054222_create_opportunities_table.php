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
        Schema::create('opportunities', function (Blueprint $table) {
            $table->id();

            // Relasi ke organizer_profiles
            $table->foreignId('organizer_profile_id')
                ->constrained('organizer_profiles')
                ->cascadeOnDelete();

            // Informasi peluang
            $table->string('title');
            $table->string('slug')->unique();

            $table->enum('category', [
                'scholarship',
                'internship',
                'competition',
                'training'
            ]);

            $table->longText('description');
            $table->text('requirements')->nullable();
            $table->text('eligibility')->nullable();
            $table->text('benefits')->nullable();

            // Informasi lokasi dan pendaftaran
            $table->string('location')->nullable();
            $table->string('registration_url')->nullable();

            // Poster peluang
            $table->string('poster_path')->nullable();

            // Periode pendaftaran
            $table->date('registration_start')->nullable();
            $table->date('registration_deadline')->nullable();

            // Status publikasi
            $table->enum('status', [
                'draft',
                'published',
                'closed'
            ])->default('draft');

            // Status verifikasi peluang
            $table->enum('verification_status', [
                'pending',
                'verified',
                'rejected'
            ])->default('pending');

            $table->timestamps();

            // Index untuk pencarian dan filtering
            $table->index('category');
            $table->index('status');
            $table->index('registration_deadline');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opportunities');
    }
};
