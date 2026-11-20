<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentInterest extends Model
{
    use HasFactory;

    protected $table = 'student_interests';

    protected $fillable = [
        'student_profile_id',
        'interest_name',
    ];

    // Relasi ke profil mahasiswa
    public function studentProfile(): BelongsTo
    {
        return $this->belongsTo(StudentProfile::class);
    }
}
