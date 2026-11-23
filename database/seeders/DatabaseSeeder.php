<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        /*
        |--------------------------------------------------------------------------
        | CareerBridge Seeders
        |--------------------------------------------------------------------------
        */

        $this->call([
            // User Data
            UserSeeder::class,
            // Master Data
            SkillSeeder::class,

            // Profile Data
            StudentProfileSeeder::class,
            OrganizerProfileSeeder::class,

            // Opportunity Data
            OpportunitySeeder::class,
            OpportunitySkillSeeder::class,
            OpportunityPosterSeeder::class,

            // Student Data
            StudentSkillSeeder::class,
            StudentInterestSeeder::class,

            // Resume and ATS Analysis
            ResumeSeeder::class,
            ResumeAnalysisSeeder::class,

            // Recommendation and Matching
            OpportunityRecommendationSeeder::class,
            TeammateMatchSeeder::class,

            // Verification
            VerificationLogSeeder::class,
        ]);
    }
}
