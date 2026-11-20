<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OpportunityRecommendation extends Model
{
    use HasFactory;

    protected $table = 'opportunity_recommendations';

    protected $fillable = [
        'student_profile_id',
        'opportunity_id',
        'similarity_score',
        'recommendation_reason',
        'generated_at',
    ];

    protected function casts(): array
    {
        return [
            'similarity_score' => 'decimal:2',
            'generated_at' => 'datetime',
        ];
    }

    // Relasi ke profil mahasiswa penerima rekomendasi
    public function studentProfile(): BelongsTo
    {
        return $this->belongsTo(StudentProfile::class);
    }

    // Relasi ke peluang yang direkomendasikan
    public function opportunity(): BelongsTo
    {
        return $this->belongsTo(Opportunity::class);
    }
}
