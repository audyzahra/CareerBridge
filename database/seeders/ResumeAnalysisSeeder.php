<?php

namespace Database\Seeders;

use App\Models\Resume;
use App\Models\ResumeAnalysis;
use App\Models\StudentProfile;
use Illuminate\Database\Seeder;

class ResumeAnalysisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mengambil resume milik mahasiswa demo
        $resume = Resume::whereHas('studentProfile.user', function ($query) {
            $query->where('email', 'test@example.com');
        })->where('file_name', 'CV_Mahasiswa_Demo.pdf')->first();

        // Lewati jika resume belum tersedia
        if (!$resume) {
            $this->command->warn(
                'Resume mahasiswa demo tidak ditemukan. ResumeAnalysisSeeder dilewati.'
            );

            return;
        }

        // Membuat atau memperbarui hasil analisis ATS
        ResumeAnalysis::updateOrCreate(
            [
                'resume_id' => $resume->id,
            ],
            [
                'extracted_keywords' => [
                    'PHP',
                    'Python',
                    'Laravel',
                    'MySQL',
                    'HTML',
                    'CSS',
                    'JavaScript',
                    'Data Analysis',
                    'Teamwork',
                    'Communication',
                ],

                'missing_keywords' => [
                    'REST API',
                    'Git',
                    'Software Testing',
                    'Agile Methodology',
                ],

                'improvement_suggestions' => 'Tambahkan pengalaman proyek yang relevan, sertakan pencapaian secara terukur, lengkapi informasi pengalaman organisasi, dan tambahkan kata kunci teknis seperti REST API, Git, serta Software Testing untuk meningkatkan kesesuaian CV dengan kebutuhan pekerjaan.',

                'analysis_result' => [
                    'ats_score' => 75,
                    'keyword_match' => 70,
                    'strengths' => [
                        'Memiliki kemampuan dasar pemrograman.',
                        'Menguasai beberapa teknologi pengembangan web.',
                        'Memiliki kemampuan komunikasi dan kerja sama tim.',
                    ],
                    'weaknesses' => [
                        'Belum mencantumkan pengalaman penggunaan REST API.',
                        'Belum mencantumkan Software Testing.',
                        'Pengalaman proyek belum dijelaskan secara terukur.',
                    ],
                    'recommendations' => [
                        'Tambahkan proyek pengembangan aplikasi ke dalam CV.',
                        'Cantumkan pengalaman menggunakan Git.',
                        'Tambahkan pencapaian akademik dan nonakademik.',
                    ],
                ],

                'analyzed_at' => now(),
            ]
        );
    }
}
