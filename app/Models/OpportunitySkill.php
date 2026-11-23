<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OpportunitySkill extends Model
{
    use HasFactory;

    protected $table = 'opportunity_skills';

    protected $fillable = [
        'opportunity_id',
        'skill_id',
        'importance_level',
    ];

    // Relasi ke peluang
    public function opportunity(): BelongsTo
    {
        return $this->belongsTo(Opportunity::class);
    }

    // Relasi ke keterampilan
    public function skill(): BelongsTo
    {
        return $this->belongsTo(Skill::class);
    }
}
