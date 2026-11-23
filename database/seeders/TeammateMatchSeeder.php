<?php

namespace Database\Seeders;

use App\Models\StudentProfile;
use App\Models\TeammateMatch;
use Illuminate\Database\Seeder;

class TeammateMatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mengambil profil mahasiswa utama
        $student = StudentProfile::whereHas('user', function ($query) {
            $query->where('email', 'test@example.com');
        })->first();

        if (!$student) {
            $this->command->warn(
                'Profil mahasiswa utama tidak ditemukan. TeammateMatchSeeder dilewati.'
            );

            return;
        }

        // Mengambil profil mahasiswa lain sebagai calon rekan tim
        $matchedStudents = StudentProfile::where(
            'id',
            '!=',
            $student->id
        )->get();

        // Minimal harus ada dua profil mahasiswa
        if ($matchedStudents->isEmpty()) {
            $this->command->warn(
                'Belum ada mahasiswa lain untuk pencocokan. Buat minimal satu profil mahasiswa tambahan terlebih dahulu.'
            );

            return;
        }

        // Data simulasi pencocokan dengan mahasiswa lain
        $matches = [
            [
                'similarity_score' => 92.50,
                'match_reason' => 'Memiliki keterampilan yang saling melengkapi dalam pengembangan aplikasi web, analisis data, dan pemecahan masalah. Cocok untuk membentuk tim proyek teknologi.',
                'status' => 'pending',
            ],
        ];

        foreach ($matches as $index => $data) {
            // Mengambil calon rekan tim
            $matchedStudent = $matchedStudents->get($index);

            if (!$matchedStudent) {
                break;
            }

            // Membuat atau memperbarui data pencocokan
            TeammateMatch::updateOrCreate(
                [
                    'student_profile_id' => $student->id,
                    'matched_student_profile_id' => $matchedStudent->id,
                ],
                [
                    'similarity_score' => $data['similarity_score'],
                    'match_reason' => $data['match_reason'],
                    'status' => $data['status'],
                ]
            );
        }
    }
}
