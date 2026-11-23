<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
            // Programming
            [
                'skill_name' => 'PHP',
                'category' => 'Programming',
                'description' => 'Kemampuan pemrograman menggunakan bahasa PHP.',
            ],
            [
                'skill_name' => 'Python',
                'category' => 'Programming',
                'description' => 'Kemampuan pemrograman menggunakan bahasa Python.',
            ],
            [
                'skill_name' => 'Java',
                'category' => 'Programming',
                'description' => 'Kemampuan pemrograman menggunakan bahasa Java.',
            ],
            [
                'skill_name' => 'JavaScript',
                'category' => 'Programming',
                'description' => 'Kemampuan pemrograman menggunakan JavaScript.',
            ],
            [
                'skill_name' => 'C++',
                'category' => 'Programming',
                'description' => 'Kemampuan pemrograman menggunakan bahasa C++.',
            ],

            // Web Development
            [
                'skill_name' => 'HTML',
                'category' => 'Web Development',
                'description' => 'Kemampuan membuat struktur halaman web menggunakan HTML.',
            ],
            [
                'skill_name' => 'CSS',
                'category' => 'Web Development',
                'description' => 'Kemampuan mengatur tampilan dan desain halaman web.',
            ],
            [
                'skill_name' => 'Laravel',
                'category' => 'Web Development',
                'description' => 'Kemampuan membangun aplikasi web menggunakan framework Laravel.',
            ],
            [
                'skill_name' => 'React',
                'category' => 'Web Development',
                'description' => 'Kemampuan membangun antarmuka web menggunakan React.',
            ],
            [
                'skill_name' => 'MySQL',
                'category' => 'Web Development',
                'description' => 'Kemampuan mengelola database relasional menggunakan MySQL.',
            ],

            // Data Science
            [
                'skill_name' => 'Data Analysis',
                'category' => 'Data Science',
                'description' => 'Kemampuan menganalisis dan menginterpretasikan data.',
            ],
            [
                'skill_name' => 'Data Visualization',
                'category' => 'Data Science',
                'description' => 'Kemampuan menyajikan data dalam bentuk visualisasi.',
            ],
            [
                'skill_name' => 'Microsoft Excel',
                'category' => 'Data Science',
                'description' => 'Kemampuan mengolah dan menganalisis data menggunakan Microsoft Excel.',
            ],
            [
                'skill_name' => 'SQL',
                'category' => 'Data Science',
                'description' => 'Kemampuan mengelola dan mengambil data menggunakan SQL.',
            ],

            // Artificial Intelligence
            [
                'skill_name' => 'Machine Learning',
                'category' => 'Artificial Intelligence',
                'description' => 'Kemampuan mengembangkan model pembelajaran mesin.',
            ],
            [
                'skill_name' => 'Deep Learning',
                'category' => 'Artificial Intelligence',
                'description' => 'Kemampuan mengembangkan model berbasis jaringan saraf tiruan.',
            ],
            [
                'skill_name' => 'Natural Language Processing',
                'category' => 'Artificial Intelligence',
                'description' => 'Kemampuan mengolah dan memahami bahasa manusia menggunakan AI.',
            ],

            // Design
            [
                'skill_name' => 'UI Design',
                'category' => 'Design',
                'description' => 'Kemampuan merancang tampilan antarmuka pengguna.',
            ],
            [
                'skill_name' => 'UX Design',
                'category' => 'Design',
                'description' => 'Kemampuan merancang pengalaman pengguna pada aplikasi.',
            ],
            [
                'skill_name' => 'Figma',
                'category' => 'Design',
                'description' => 'Kemampuan menggunakan Figma untuk desain antarmuka dan prototipe.',
            ],
            [
                'skill_name' => 'Graphic Design',
                'category' => 'Design',
                'description' => 'Kemampuan membuat desain grafis untuk berbagai kebutuhan.',
            ],

            // Business and Management
            [
                'skill_name' => 'Project Management',
                'category' => 'Business and Management',
                'description' => 'Kemampuan merencanakan dan mengelola proyek.',
            ],
            [
                'skill_name' => 'Business Analysis',
                'category' => 'Business and Management',
                'description' => 'Kemampuan menganalisis kebutuhan dan proses bisnis.',
            ],

            // Soft Skills
            [
                'skill_name' => 'Communication',
                'category' => 'Soft Skills',
                'description' => 'Kemampuan berkomunikasi secara efektif.',
            ],
            [
                'skill_name' => 'Teamwork',
                'category' => 'Soft Skills',
                'description' => 'Kemampuan bekerja sama dalam sebuah tim.',
            ],
            [
                'skill_name' => 'Leadership',
                'category' => 'Soft Skills',
                'description' => 'Kemampuan memimpin dan mengarahkan anggota tim.',
            ],
            [
                'skill_name' => 'Problem Solving',
                'category' => 'Soft Skills',
                'description' => 'Kemampuan mengidentifikasi dan menyelesaikan masalah.',
            ],
            [
                'skill_name' => 'Critical Thinking',
                'category' => 'Soft Skills',
                'description' => 'Kemampuan berpikir kritis dalam menganalisis informasi.',
            ],
        ];

        foreach ($skills as $skill) {
            Skill::updateOrCreate(
                ['skill_name' => $skill['skill_name']],
                [
                    'category' => $skill['category'],
                    'description' => $skill['description'],
                ]
            );
        }
    }
}
