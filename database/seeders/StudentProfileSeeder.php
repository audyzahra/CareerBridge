<?php

namespace Database\Seeders;

use App\Models\StudentProfile;
use App\Models\User;
use Illuminate\Database\Seeder;

class StudentProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mengambil akun mahasiswa demo
        $student = User::where('email', 'test@example.com')->first();

        // Hentikan proses jika akun mahasiswa belum tersedia
        if (!$student) {
            $this->command->warn(
                'Akun mahasiswa demo test@example.com tidak ditemukan.'
            );

            return;
        }

        // Membuat atau memperbarui profil mahasiswa
        StudentProfile::updateOrCreate(
            [
                'user_id' => $student->id,
            ],
            [
                'student_id' => '20260001',
                'university' => 'Universitas Indonesia',
                'faculty' => 'Fakultas Ilmu Komputer',
                'major' => 'Sistem Informasi',
                'semester' => 5,
                'graduation_year' => 2027,
                'bio' => 'Mahasiswa yang memiliki minat dalam pengembangan teknologi, analisis data, dan pengembangan aplikasi berbasis web.',
                'portfolio_url' => 'https://example.com/portfolio',
                'linkedin_url' => 'https://www.linkedin.com/in/student-demo',
            ]
        );
    }
}
