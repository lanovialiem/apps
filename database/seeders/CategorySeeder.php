<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Director',
            'General Manager',
            'Manager',
            'Superintendent',
            'Supervisor',
            'Foreman',
            'Planner',
            'Project Control',
            'Engineer',
            'Technician',
            'Operator',
            'General Worker',
            'Admin',
            'Catering & Service Emp',
            'Security Officer',
            'Internship',
            'Supermarket Crew',
            'Religion Community',
            'Tenant Food Court Crew',
            'Cafe Crew',
            'Visitor',
        ];

        foreach ($categories as $job_category) {
            DB::table('categories')->insert([
                'job_category' => $job_category,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
