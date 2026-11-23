<?php

namespace Database\Seeders;

use App\Models\Skill;
use App\Models\StudentProfile;
use App\Models\StudentSkill;
use Illuminate\Database\Seeder;

class StudentSkillSeeder extends Seeder
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
                'Profil mahasiswa demo tidak ditemukan. StudentSkillSeeder dilewati.'
            );

            return;
        }

        // Daftar keterampilan dan tingkat penguasaan
        $skills = [
            'PHP' => 'intermediate',
            'Python' => 'intermediate',
            'JavaScript' => 'beginner',
            'HTML' => 'advanced',
            'CSS' => 'intermediate',
            'Laravel' => 'intermediate',
            'MySQL' => 'intermediate',
            'Data Analysis' => 'beginner',
            'Microsoft Excel' => 'advanced',
            'Figma' => 'beginner',
            'Communication' => 'advanced',
            'Teamwork' => 'advanced',
            'Problem Solving' => 'intermediate',
        ];

        foreach ($skills as $skillName => $proficiencyLevel) {
            // Mencari keterampilan berdasarkan nama
            $skill = Skill::where('skill_name', $skillName)->first();

            if (!$skill) {
                $this->command->warn(
                    "Skill {$skillName} tidak ditemukan."
                );

                continue;
            }

            // Membuat atau memperbarui keterampilan mahasiswa
            StudentSkill::updateOrCreate(
                [
                    'student_profile_id' => $student->id,
                    'skill_id' => $skill->id,
                ],
                [
                    'proficiency_level' => $proficiencyLevel,
                ]
            );
        }
    }
}
