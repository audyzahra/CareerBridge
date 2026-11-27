<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StudentProfile extends Model
{
    use HasFactory;

    protected $table = 'student_profiles';

    protected $fillable = [
        'user_id',
        'student_id',
        'university',
        'faculty',
        'major',
        'semester',
        'graduation_year',
        'bio',
        'portfolio_url',
        'linkedin_url',
    ];

    protected function casts(): array
    {
        return [
            'semester' => 'integer',
            'graduation_year' => 'integer',
        ];
    }

    // Relasi ke akun pengguna
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke keterampilan mahasiswa
    public function studentSkills(): HasMany
    {
        return $this->hasMany(StudentSkill::class);
    }

    // Relasi ke minat mahasiswa
    public function studentInterests(): HasMany
    {
        return $this->hasMany(StudentInterest::class);
    }

    // Relasi ke resume mahasiswa
    public function resumes(): HasMany
    {
        return $this->hasMany(Resume::class);
    }

    // Relasi ke rekomendasi peluang
    public function opportunityRecommendations(): HasMany
    {
        return $this->hasMany(OpportunityRecommendation::class);
    }

    // Relasi sebagai mahasiswa yang mencari rekan tim
    public function teammateMatches(): HasMany
    {
        return $this->hasMany(TeammateMatch::class);
    }

    // Relasi sebagai mahasiswa yang menjadi pasangan pencocokan
    public function matchedByOthers(): HasMany
    {
        return $this->hasMany(
            TeammateMatch::class,
            'matched_student_profile_id'
        );
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }
}
