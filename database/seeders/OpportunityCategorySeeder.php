<?php

namespace Database\Seeders;

use App\Models\OpportunityCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OpportunityCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Scholarships',
                'slug' => 'scholarship',
                'description' => 'Financial support for students pursuing their education.',
                'icon' => 'graduation-cap',
                'color' => 'amber',
                'sort_order' => 1,
            ],
            [
                'name' => 'Internships',
                'slug' => 'internship',
                'description' => 'Professional experience and career development opportunities.',
                'icon' => 'briefcase-business',
                'color' => 'emerald',
                'sort_order' => 2,
            ],
            [
                'name' => 'Competitions',
                'slug' => 'competition',
                'description' => 'Competitions to showcase creativity, knowledge, and skills.',
                'icon' => 'trophy',
                'color' => 'purple',
                'sort_order' => 3,
            ],
            [
                'name' => 'Training',
                'slug' => 'training',
                'description' => 'Programs to develop knowledge and practical skills.',
                'icon' => 'book-open',
                'color' => 'sky',
                'sort_order' => 4,
            ],
        ];

        foreach ($categories as $category) {
            OpportunityCategory::updateOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}
