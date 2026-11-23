<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Menjalankan seeder akun pengguna CareerBridge.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Super Admin CareerBridge',
                'email' => 'admin@careerbridge.id',
                'password' => 'password',
                'role' => 'super_admin',
            ],
            [
                'name' => 'Demo Student',
                'email' => 'student@careerbridge.id',
                'password' => 'password',
                'role' => 'student',
            ],
            [
                'name' => 'Demo Organizer',
                'email' => 'organizer@careerbridge.id',
                'password' => 'password',
                'role' => 'organizer',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'password' => $user['password'],
                    'role' => $user['role'],
                ]
            );
        }
    }
}
