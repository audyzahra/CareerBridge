<?php

namespace Database\Seeders;

use App\Models\Resume;
use App\Models\StudentProfile;
use Illuminate\Database\Seeder;

class ResumeSeeder extends Seeder
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
                'Profil mahasiswa demo tidak ditemukan. ResumeSeeder dilewati.'
            );

            return;
        }

        // Membuat atau memperbarui data resume mahasiswa
        Resume::updateOrCreate(
            [
                'student_profile_id' => $student->id,
                'file_name' => 'CV_Mahasiswa_Demo.pdf',
            ],
            [
                'file_path' => 'resumes/demo/CV_Mahasiswa_Demo.pdf',
                'file_type' => 'pdf',
                'uploaded_at' => now(),
            ]
        );
    }
}
