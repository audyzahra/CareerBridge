<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Opportunity extends Model
{
    use HasFactory;

    protected $table = 'opportunities';

    protected $fillable = [
        'organizer_profile_id',
        'opportunity_type_id',
        'title',
        'slug',
        'category',
        'description',
        'requirements',
        'eligibility',
        'benefits',
        'location',
        'registration_url',
        'poster_path',
        'registration_start',
        'registration_deadline',
        'status',
        'verification_status',
    ];

    protected function casts(): array
    {
        return [
            'registration_start' => 'date',
            'registration_deadline' => 'date',
        ];
    }

    // Relasi ke profil penyelenggara
    public function organizerProfile(): BelongsTo
    {
        return $this->belongsTo(OrganizerProfile::class);
    }

    // Relasi ke keterampilan yang dibutuhkan
    public function opportunitySkills(): HasMany
    {
        return $this->hasMany(OpportunitySkill::class);
    }

    // Relasi ke poster peluang
    public function opportunityPosters(): HasMany
    {
        return $this->hasMany(OpportunityPoster::class);
    }

    // Relasi ke rekomendasi peluang mahasiswa
    public function opportunityRecommendations(): HasMany
    {
        return $this->hasMany(OpportunityRecommendation::class);
    }

    // Relasi ke riwayat verifikasi peluang
    public function verificationLogs(): HasMany
    {
        return $this->hasMany(
            VerificationLog::class,
            'opportunity_id'
        );
    }

    public function opportunityType(): BelongsTo
    {
        return $this->belongsTo(OpportunityType::class);
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }
}
