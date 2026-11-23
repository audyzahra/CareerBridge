<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Resume extends Model
{
    use HasFactory;

    protected $table = 'resumes';

    protected $fillable = [
        'student_profile_id',
        'file_name',
        'file_path',
        'file_type',
        'uploaded_at',
    ];

    protected function casts(): array
    {
        return [
            'uploaded_at' => 'datetime',
        ];
    }

    // Relasi ke profil mahasiswa pemilik resume
    public function studentProfile(): BelongsTo
    {
        return $this->belongsTo(StudentProfile::class);
    }

    // Relasi ke hasil analisis ATS
    public function resumeAnalyses(): HasMany
    {
        return $this->hasMany(ResumeAnalysis::class);
    }
}
