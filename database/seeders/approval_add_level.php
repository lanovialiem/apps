<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class approval_add_level extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tambahkan data ke tabel approval_levels
        DB::table('approval_levels')->insert([
            [
                'level' => 1,
                'role_id' => 1, // Ganti dengan ID role yang sesuai
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'level' => 2,
                'role_id' => 4, // Ganti dengan ID role yang sesuai
                'created_at' => now(),
                'updated_at' => now(),
            ],
             [
                'level' => 3,
                'role_id' => 5, // Ganti dengan ID role yang sesuai
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
