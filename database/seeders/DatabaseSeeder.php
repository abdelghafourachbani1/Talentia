<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolesSeeder::class);

        $recruiter = User::factory()->create([
            'name' => 'Recruiter User',
            'email' => 'recruiter@example.com',
        ]);
        $recruiter->assignRole('recruiter');

        $jobSeeker = User::factory()->create([
            'name' => 'Job Seeker User',
            'email' => 'seeker@example.com',
        ]);
        $jobSeeker->assignRole('job_seeker');

        // Create some random users
        User::factory(10)->create()->each(function (User $user) {
            $user->assignRole(rand(0, 1) ? 'recruiter' : 'job_seeker');
        });

        $this->call(JobOfferSeeder::class);
    }

}
