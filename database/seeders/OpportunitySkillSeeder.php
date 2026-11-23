<?php

namespace Database\Seeders;

use App\Models\Opportunity;
use App\Models\OpportunitySkill;
use App\Models\Skill;
use Illuminate\Database\Seeder;

class OpportunitySkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Daftar keterampilan yang dibutuhkan setiap peluang
        $opportunitySkills = [
            'Beasiswa Unggulan Mahasiswa Berprestasi 2027' => [
                'Communication' => 'preferred',
                'Leadership' => 'preferred',
                'Critical Thinking' => 'optional',
                'Teamwork' => 'preferred',
            ],

            'Web Developer Internship Program 2027' => [
                'HTML' => 'required',
                'CSS' => 'required',
                'JavaScript' => 'required',
                'PHP' => 'preferred',
                'Laravel' => 'preferred',
                'MySQL' => 'preferred',
                'Teamwork' => 'required',
            ],

            'National Student Innovation Competition 2027' => [
                'Problem Solving' => 'required',
                'Critical Thinking' => 'required',
                'Communication' => 'preferred',
                'Project Management' => 'preferred',
                'Python' => 'optional',
            ],

            'Data Science and Machine Learning Bootcamp 2027' => [
                'Python' => 'required',
                'Data Analysis' => 'required',
                'Data Visualization' => 'preferred',
                'Machine Learning' => 'preferred',
                'Microsoft Excel' => 'optional',
            ],
        ];

        foreach ($opportunitySkills as $opportunityTitle => $skills) {
            // Mencari peluang berdasarkan judul
            $opportunity = Opportunity::where(
                'title',
                $opportunityTitle
            )->first();

            if (!$opportunity) {
                $this->command->warn(
                    "Peluang {$opportunityTitle} tidak ditemukan."
                );

                continue;
            }

            foreach ($skills as $skillName => $importanceLevel) {
                // Mencari skill berdasarkan nama
                $skill = Skill::where(
                    'skill_name',
                    $skillName
                )->first();

                if (!$skill) {
                    $this->command->warn(
                        "Skill {$skillName} tidak ditemukan."
                    );

                    continue;
                }

                // Membuat atau memperbarui relasi peluang dan skill
                OpportunitySkill::updateOrCreate(
                    [
                        'opportunity_id' => $opportunity->id,
                        'skill_id' => $skill->id,
                    ],
                    [
                        'importance_level' => $importanceLevel,
                    ]
                );
            }
        }
    }
}
