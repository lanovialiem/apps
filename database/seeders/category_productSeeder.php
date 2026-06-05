<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class category_productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category_products = [
            'CAT',
            'ELCOMETER',
            'GRACO',
            'PASIR',
            'CONSUMABLE',
        ];

        foreach ($category_products as $catname) {
            DB::table('category_products')->insert([
                'name' => $catname,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
