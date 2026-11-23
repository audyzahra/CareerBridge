<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OpportunityPoster extends Model
{
    use HasFactory;

    protected $table = 'opportunity_posters';

    protected $fillable = [
        'organizer_profile_id',
        'opportunity_id',
        'file_path',
        'extracted_data',
        'review_status',
    ];

    protected function casts(): array
    {
        return [
            'extracted_data' => 'array',
        ];
    }

    // Relasi ke profil penyelenggara
    public function organizerProfile(): BelongsTo
    {
        return $this->belongsTo(OrganizerProfile::class);
    }

    // Relasi ke peluang
    public function opportunity(): BelongsTo
    {
        return $this->belongsTo(Opportunity::class);
    }
}
