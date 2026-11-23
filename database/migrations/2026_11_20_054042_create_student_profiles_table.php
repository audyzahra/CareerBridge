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
        Schema::create('student_profiles', function (Blueprint $table) {
            $table->id();

            // Relasi ke tabel users
            $table->foreignId('user_id')
                ->unique()
                ->constrained('users')
                ->cascadeOnDelete();

            // Informasi akademik mahasiswa
            $table->string('student_id', 50)->nullable();
            $table->string('university');
            $table->string('faculty')->nullable();
            $table->string('major');
            $table->unsignedTinyInteger('semester')->nullable();
            $table->year('graduation_year')->nullable();

            // Informasi tambahan
            $table->text('bio')->nullable();
            $table->string('portfolio_url')->nullable();
            $table->string('linkedin_url')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_profiles');
    }
};
