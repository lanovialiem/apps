<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Syalom',
                'email' => 'Syalom@example.com',
                'email_verified_at' => null,
                'password' => Hash::make('12345678'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lanovia',
                'email' => 'Lanovia@example.com',
                'email_verified_at' => null,
                'password' => Hash::make('12345678'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // assign role sesuai tabel kamu
        $syalom = \App\Models\User::where('name', 'Syalom')->first();
        $lanovia = \App\Models\User::where('name', 'Lanovia')->first();

        $syalom->assignRole('Admin Warehouse');
        $lanovia->assignRole('Super Admin');
    }
}
