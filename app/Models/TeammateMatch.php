<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeammateMatch extends Model
{
    use HasFactory;

    protected $table = 'teammate_matches';

    protected $fillable = [
        'student_profile_id',
        'matched_student_profile_id',
        'similarity_score',
        'match_reason',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'similarity_score' => 'decimal:2',
        ];
    }

    // Relasi ke mahasiswa yang mencari rekan tim
    public function studentProfile(): BelongsTo
    {
        return $this->belongsTo(StudentProfile::class);
    }

    // Relasi ke mahasiswa yang direkomendasikan sebagai rekan tim
    public function matchedStudentProfile(): BelongsTo
    {
        return $this->belongsTo(
            StudentProfile::class,
            'matched_student_profile_id'
        );
    }
}
