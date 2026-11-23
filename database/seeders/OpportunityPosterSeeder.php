<?php

namespace Database\Seeders;

use App\Models\Opportunity;
use App\Models\OpportunityPoster;
use App\Models\OrganizerProfile;
use Illuminate\Database\Seeder;

class OpportunityPosterSeeder extends Seeder
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
                'Profil penyelenggara tidak ditemukan. OpportunityPosterSeeder dilewati.'
            );

            return;
        }

        // Daftar poster peluang demo
        $posters = [
            [
                'title' => 'Beasiswa Unggulan Mahasiswa Berprestasi 2027',
                'file_path' => 'posters/beasiswa-unggulan-2027.jpg',
                'extracted_data' => [
                    'title' => 'Beasiswa Unggulan Mahasiswa Berprestasi 2027',
                    'category' => 'scholarship',
                    'registration_deadline' => '2027-03-31',
                    'organizer' => 'Career Development Center',
                ],
            ],
            [
                'title' => 'Web Developer Internship Program 2027',
                'file_path' => 'posters/web-developer-internship-2027.jpg',
                'extracted_data' => [
                    'title' => 'Web Developer Internship Program 2027',
                    'category' => 'internship',
                    'registration_deadline' => '2027-04-15',
                    'organizer' => 'Career Development Center',
                ],
            ],
            [
                'title' => 'National Student Innovation Competition 2027',
                'file_path' => 'posters/student-innovation-competition-2027.jpg',
                'extracted_data' => [
                    'title' => 'National Student Innovation Competition 2027',
                    'category' => 'competition',
                    'registration_deadline' => '2027-05-30',
                    'organizer' => 'Career Development Center',
                ],
            ],
            [
                'title' => 'Data Science and Machine Learning Bootcamp 2027',
                'file_path' => 'posters/data-science-bootcamp-2027.jpg',
                'extracted_data' => [
                    'title' => 'Data Science and Machine Learning Bootcamp 2027',
                    'category' => 'training',
                    'registration_deadline' => '2027-06-15',
                    'organizer' => 'Career Development Center',
                ],
            ],
        ];

        foreach ($posters as $data) {
            // Mencari peluang berdasarkan judul
            $opportunity = Opportunity::where(
                'title',
                $data['title']
            )->first();

            if (!$opportunity) {
                $this->command->warn(
                    "Peluang {$data['title']} tidak ditemukan."
                );

                continue;
            }

            // Membuat atau memperbarui data poster
            OpportunityPoster::updateOrCreate(
                [
                    'organizer_profile_id' => $organizer->id,
                    'opportunity_id' => $opportunity->id,
                ],
                [
                    'file_path' => $data['file_path'],
                    'extracted_data' => $data['extracted_data'],
                    'review_status' => 'approved',
                ]
            );
        }
    }
}
