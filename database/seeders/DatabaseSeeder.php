<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $adminEmail = env('ADMIN_EMAIL');
        $adminPassword = env('ADMIN_PASSWORD');

        if ($adminEmail && $adminPassword) {
            User::updateOrCreate(
                ['email' => $adminEmail],
                [
                    'name' => env('ADMIN_NAME', 'Administrator'),
                    'password' => Hash::make($adminPassword),
                    'is_admin' => true,
                ]
            );
        } else {
            $this->command?->warn('Admin user not seeded. Set ADMIN_EMAIL and ADMIN_PASSWORD to create one.');
        }

        $this->call([
            SettingSeeder::class,
            PracticeAreaSeeder::class,
            TeamMemberSeeder::class,
            TrackRecordSeeder::class,
            TestimonialSeeder::class,
            BlogPostSeeder::class,
            FaqSeeder::class,
        ]);
    }
}
