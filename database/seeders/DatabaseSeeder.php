<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\JobCategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $jobCategories = [
            'Accounting/Finance',
            'Automotive',
            'Banking/Financial Services',
            'Customer Service/Call Center',
            'Education/Training',
            'Engineering',
            'Government/Military',
            'Hospitality/Tourism',
            'Human Resources',
            'Information Technology (IT)',
            'Aviation/Aerospace',
            'Consulting',
            'Health and Safety',
            'Information Security',
            'Legal Services',
            'Market Research',
            'Product Management',
            'Quality Assurance',
            'Software Development',
            'User Experience (UX) Design',
            'Web Development',
            'Pet Care',
            'Veterinary/Animal Care',
        ];
        foreach ($jobCategories as $jobCategs) {
            JobCategory::firstOrCreate(['name' => $jobCategs]);
        }
    }

}
