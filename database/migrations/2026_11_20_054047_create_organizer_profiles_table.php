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
        Schema::create('organizer_profiles', function (Blueprint $table) {
            $table->id();

            // Relasi ke tabel users
            $table->foreignId('user_id')
                ->unique()
                ->constrained('users')
                ->cascadeOnDelete();

            // Informasi organisasi
            $table->string('organization_name');
            $table->string('organization_type', 100);
            $table->text('description')->nullable();

            // Informasi kontak
            $table->string('website_url')->nullable();
            $table->string('contact_email');

            // Logo organisasi
            $table->string('logo_path')->nullable();

            // Status verifikasi organizer
            $table->enum('verification_status', [
                'pending',
                'verified',
                'rejected'
            ])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizer_profiles');
    }
};
