<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrganizerProfile extends Model
{
    use HasFactory;

    protected $table = 'organizer_profiles';

    protected $fillable = [
        'user_id',
        'organization_name',
        'organization_type',
        'description',
        'website_url',
        'contact_email',
        'logo_path',
        'verification_status',
    ];

    // Relasi ke akun pengguna
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke peluang yang dibuat penyelenggara
    public function opportunities(): HasMany
    {
        return $this->hasMany(Opportunity::class);
    }

    // Relasi ke poster peluang yang diunggah
    public function opportunityPosters(): HasMany
    {
        return $this->hasMany(OpportunityPoster::class);
    }

    // Relasi ke riwayat verifikasi penyelenggara
    public function verificationLogs(): HasMany
    {
        return $this->hasMany(
            VerificationLog::class,
            'organizer_profile_id'
        );
    }
}
