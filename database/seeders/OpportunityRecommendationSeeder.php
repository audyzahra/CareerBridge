<?php

namespace Database\Seeders;

use App\Models\Opportunity;
use App\Models\OpportunityRecommendation;
use App\Models\StudentProfile;
use Illuminate\Database\Seeder;

class OpportunityRecommendationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mengambil profil mahasiswa demo
        $student = StudentProfile::whereHas('user', function ($query) {
            $query->where('email', 'test@example.com');
        })->first();

        // Lewati jika profil mahasiswa belum tersedia
        if (!$student) {
            $this->command->warn(
                'Profil mahasiswa demo tidak ditemukan. OpportunityRecommendationSeeder dilewati.'
            );

            return;
        }

        // Daftar rekomendasi peluang untuk mahasiswa demo
        $recommendations = [
            [
                'title' => 'Web Developer Internship Program 2027',
                'similarity_score' => 95.00,
                'recommendation_reason' => 'Peluang ini sangat sesuai dengan keterampilan mahasiswa dalam HTML, CSS, JavaScript, PHP, Laravel, dan MySQL serta minat pada bidang Web Development.',
            ],
            [
                'title' => 'Data Science and Machine Learning Bootcamp 2027',
                'similarity_score' => 88.50,
                'recommendation_reason' => 'Peluang ini sesuai dengan minat mahasiswa pada Data Science dan Artificial Intelligence serta keterampilan Python, Data Analysis, dan Microsoft Excel.',
            ],
            [
                'title' => 'National Student Innovation Competition 2027',
                'similarity_score' => 82.00,
                'recommendation_reason' => 'Peluang ini sesuai dengan kemampuan mahasiswa dalam Problem Solving, Critical Thinking, Communication, dan Teamwork.',
            ],
            [
                'title' => 'Beasiswa Unggulan Mahasiswa Berprestasi 2027',
                'similarity_score' => 78.50,
                'recommendation_reason' => 'Peluang ini relevan dengan profil mahasiswa yang memiliki kemampuan komunikasi, kepemimpinan, dan kerja sama tim.',
            ],
        ];

        foreach ($recommendations as $data) {
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

            // Membuat atau memperbarui rekomendasi
            OpportunityRecommendation::updateOrCreate(
                [
                    'student_profile_id' => $student->id,
                    'opportunity_id' => $opportunity->id,
                ],
                [
                    'similarity_score' => $data['similarity_score'],
                    'recommendation_reason' => $data['recommendation_reason'],
                    'generated_at' => now(),
                ]
            );
        }
    }
}
