<?php

namespace Database\Seeders;

use App\Models\StudentInterest;
use App\Models\StudentProfile;
use Illuminate\Database\Seeder;

class StudentInterestSeeder extends Seeder
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
                'Profil mahasiswa demo tidak ditemukan. StudentInterestSeeder dilewati.'
            );

            return;
        }

        // Daftar minat mahasiswa
        $interests = [
            'Web Development',
            'Data Science',
            'Artificial Intelligence',
            'Software Engineering',
            'UI/UX Design',
            'Technology Innovation',
        ];

        foreach ($interests as $interest) {
            StudentInterest::updateOrCreate(
                [
                    'student_profile_id' => $student->id,
                    'interest_name' => $interest,
                ]
            );
        }
    }
}
