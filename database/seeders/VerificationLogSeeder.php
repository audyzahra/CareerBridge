<?php

namespace Database\Seeders;

use App\Models\Opportunity;
use App\Models\OrganizerProfile;
use App\Models\VerificationLog;
use Illuminate\Database\Seeder;

class VerificationLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mengambil profil penyelenggara demo
        $organizer = OrganizerProfile::where(
            'organization_name',
            'Career Development Center'
        )->first();

        if (!$organizer) {
            $this->command->warn(
                'Profil penyelenggara tidak ditemukan. VerificationLogSeeder dilewati.'
            );

            return;
        }

        // Membuat riwayat verifikasi penyelenggara
        $organizerLog = VerificationLog::firstOrNew([
            'organizer_profile_id' => $organizer->id,
            'verification_type' => 'organizer',
        ]);

        $organizerLog->fill([
            'opportunity_id' => null,
            'verified_by' => null,
            'status' => 'verified',
            'notes' => 'Profil penyelenggara telah diperiksa dan dinyatakan memenuhi persyaratan verifikasi.',
            'verified_at' => now(),
        ]);

        $organizerLog->save();

        // Mengambil seluruh peluang milik penyelenggara
        $opportunities = Opportunity::where(
            'organizer_profile_id',
            $organizer->id
        )->get();

        foreach ($opportunities as $opportunity) {
            // Membuat riwayat verifikasi untuk setiap peluang
            $verificationLog = VerificationLog::firstOrNew([
                'opportunity_id' => $opportunity->id,
                'verification_type' => 'opportunity',
            ]);

            $verificationLog->fill([
                'organizer_profile_id' => null,
                'verified_by' => null,
                'status' => 'verified',
                'notes' => 'Informasi dan persyaratan peluang telah diperiksa dan dinyatakan memenuhi ketentuan publikasi.',
                'verified_at' => now(),
            ]);

            $verificationLog->save();
        }
    }
}
