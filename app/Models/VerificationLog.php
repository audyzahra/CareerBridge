<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VerificationLog extends Model
{
    use HasFactory;

    protected $table = 'verification_logs';

    protected $fillable = [
        'organizer_profile_id',
        'opportunity_id',
        'verified_by',
        'verification_type',
        'status',
        'notes',
        'verified_at',
    ];

    protected function casts(): array
    {
        return [
            'verified_at' => 'datetime',
        ];
    }

    // Relasi ke profil penyelenggara yang diverifikasi
    public function organizerProfile(): BelongsTo
    {
        return $this->belongsTo(OrganizerProfile::class);
    }

    // Relasi ke peluang yang diverifikasi
    public function opportunity(): BelongsTo
    {
        return $this->belongsTo(Opportunity::class);
    }

    // Relasi ke admin yang melakukan verifikasi
    public function verifier(): BelongsTo
    {
        return $this->belongsTo(User::class, 'verified_by');
    }
}
