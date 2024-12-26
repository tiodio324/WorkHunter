<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\User;

class ShoppingCartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get test user
        $testUser = User::where('email', 'test@example.com')->firstOrFail();

        // Get Job ids
        $jobIds = Job::pluck('id')->toArray();

        $randomJobIds = array_rand($jobIds, 3);

        foreach ($randomJobIds as $jobId) {
            $testUser->shoppingCartJobs()->attach($jobIds[$jobId]);
        }
    }
}
