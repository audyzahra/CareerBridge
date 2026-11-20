<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentSkill extends Model
{
    use HasFactory;

    protected $table = 'student_skills';

    protected $fillable = [
        'student_profile_id',
        'skill_id',
        'proficiency_level',
    ];

    // Relasi ke profil mahasiswa
    public function studentProfile(): BelongsTo
    {
        return $this->belongsTo(StudentProfile::class);
    }

    // Relasi ke data keterampilan
    public function skill(): BelongsTo
    {
        return $this->belongsTo(Skill::class);
    }
}
