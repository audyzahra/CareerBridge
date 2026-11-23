<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ResumeAnalysis extends Model
{
    use HasFactory;

    protected $table = 'resume_analyses';

    protected $fillable = [
        'resume_id',
        'extracted_keywords',
        'missing_keywords',
        'improvement_suggestions',
        'analysis_result',
        'analyzed_at',
    ];

    protected function casts(): array
    {
        return [
            'extracted_keywords' => 'array',
            'missing_keywords' => 'array',
            'analysis_result' => 'array',
            'analyzed_at' => 'datetime',
        ];
    }

    // Relasi ke resume yang dianalisis
    public function resume(): BelongsTo
    {
        return $this->belongsTo(Resume::class);
    }
}
