<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Lanovia Liem',
        //     'email' => 'admin@niteksindo.com',
        //     'password' => Hash::make('admin123'),
        // ]);

        $this->call([
            CategorySeeder::class,
            category_codesSeeder::class,
            EmployeeSeeder::class,
            WarehouseSeeder::class,
        ]);
    }
}
