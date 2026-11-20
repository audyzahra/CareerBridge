<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Skill extends Model
{
    use HasFactory;

    protected $table = 'skills';

    protected $fillable = [
        'skill_name',
        'category',
        'description',
    ];

    // Relasi ke keterampilan yang dimiliki mahasiswa
    public function studentSkills(): HasMany
    {
        return $this->hasMany(StudentSkill::class);
    }

    // Relasi ke keterampilan yang dibutuhkan suatu peluang
    public function opportunitySkills(): HasMany
    {
        return $this->hasMany(OpportunitySkill::class);
    }
}
