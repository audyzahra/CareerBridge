<?php

namespace Database\Seeders;

use App\Models\OpportunityType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OpportunityTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            'scholarship' => [
                'Full Scholarship',
                'Partial Scholarship',
                'Merit-Based Scholarship',
                'Research Scholarship',
            ],

            'internship' => [
                'Remote Internship',
                'On-site Internship',
                'Hybrid Internship',
                'Research Internship',
            ],

            'competition' => [
                'Business Competition',
                'Essay Competition',
                'Programming Competition',
                'Design Competition',
                'Scientific Writing Competition',
            ],

            'training' => [
                'Bootcamp',
                'Online Course',
                'Workshop',
                'Certification Program',
            ],
        ];

        foreach ($types as $category => $names) {
            foreach ($names as $name) {
                OpportunityType::updateOrCreate(
                    [
                        'category' => $category,
                        'slug' => Str::slug($name),
                    ],
                    [
                        'name' => $name,
                        'is_active' => true,
                    ]
                );
            }
        }
    }
}
