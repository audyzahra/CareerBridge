<?php

namespace Database\Seeders;

use App\Models\OrganizerProfile;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrganizerProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mencari akun penyelenggara demo
        $organizer = User::where(
            'email',
            'organizer@example.com'
        )->first();

        // Lewati jika akun belum tersedia
        if (!$organizer) {
            $this->command->warn(
                'Akun organizer@example.com tidak ditemukan. OrganizerProfileSeeder dilewati.'
            );

            return;
        }

        // Membuat atau memperbarui profil penyelenggara
        OrganizerProfile::updateOrCreate(
            [
                'user_id' => $organizer->id,
            ],
            [
                'organization_name' => 'Career Development Center',
                'organization_type' => 'University',
                'description' => 'Pusat pengembangan karier mahasiswa yang menyediakan informasi beasiswa, program magang, kompetisi, dan pelatihan untuk mendukung pengembangan akademik serta profesional mahasiswa.',
                'website_url' => 'https://example.com',
                'contact_email' => 'cdc@example.com',
                'logo_path' => null,
                'verification_status' => 'verified',
            ]
        );
    }
}
