<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('warehouses')->insert([
            [
                'warehouse_name' => 'Gudang HO',
                'warehouse_code' => 'WH001',
                'warehouse_location' => 'Dupak Mutiara',
            ],
             [
                'warehouse_name' => 'Gudang Suko',
                'warehouse_code' => 'WH002',
                'warehouse_location' => 'Sukomanuggal',
            ],
        ]);
    }
}
