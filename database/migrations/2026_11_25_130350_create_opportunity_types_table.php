<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('opportunity_types', function (Blueprint $table) {
            $table->id();

            // Kategori utama
            $table->enum('category', [
                'scholarship',
                'internship',
                'competition',
                'training'
            ]);

            // Nama jenis peluang
            $table->string('name', 100);

            // Slug untuk identifikasi
            $table->string('slug', 120);

            // Status jenis peluang
            $table->boolean('is_active')->default(true);

            $table->timestamps();

            // Mencegah nama jenis yang sama dalam kategori yang sama
            $table->unique(
                ['category', 'slug'],
                'opportunity_types_category_slug_unique'
            );

            $table->index('is_active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('opportunity_types');
    }
};
